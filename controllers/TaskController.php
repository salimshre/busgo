<?php

class TaskController {
    private $auth;
    private $taskModel;

    public function __construct() {
        $this->auth = new Auth();
        $this->taskModel = new Task();
    }

    public function index() {
        $this->auth->requireAuth();
        
        $user = $this->auth->getCurrentUser();
        $filters = [
            'status' => $_GET['status'] ?? '',
            'search' => $_GET['search'] ?? ''
        ];
        
        $tasks = $this->taskModel->findByUserId($user['id'], $filters);
        
        require_once __DIR__ . '/../views/tasks/index.php';
    }

    public function create() {
        $this->auth->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../views/tasks/create.php';
            return;
        }

        $user = $this->auth->getCurrentUser();
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $status = $_POST['status'] ?? 'pending';
        $dueDate = $_POST['due_date'] ?? null;
        $token = $_POST[CSRF_TOKEN_NAME] ?? '';

        // Validate CSRF token
        if (!Csrf::validateToken($token)) {
            Helpers::setFlash('error', 'Invalid request. Please try again.');
            Helpers::redirect('/tasks/create');
        }

        // Validate input
        $errors = [];

        if (empty($title)) {
            $errors[] = 'Title is required.';
        }

        if (!in_array($status, ['pending', 'in_progress', 'completed'])) {
            $errors[] = 'Invalid status selected.';
        }

        if (!empty($dueDate) && !strtotime($dueDate)) {
            $errors[] = 'Invalid due date format.';
        }

        if (!empty($errors)) {
            Helpers::setFlash('error', implode('<br>', $errors));
            Helpers::redirect('/tasks/create');
        }

        // Create task
        $taskData = [
            'user_id' => $user['id'],
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'due_date' => !empty($dueDate) ? $dueDate : null
        ];

        if ($this->taskModel->create($taskData)) {
            Helpers::setFlash('success', 'Task created successfully!');
            Helpers::redirect('/tasks');
        } else {
            Helpers::setFlash('error', 'Failed to create task. Please try again.');
            Helpers::redirect('/tasks/create');
        }
    }

    public function edit() {
        $this->auth->requireAuth();
        
        $user = $this->auth->getCurrentUser();
        $taskId = $_GET['id'] ?? null;

        if (!$taskId) {
            Helpers::setFlash('error', 'Task not found.');
            Helpers::redirect('/tasks');
        }

        $task = $this->taskModel->findById($taskId, $user['id']);
        if (!$task) {
            Helpers::setFlash('error', 'Task not found.');
            Helpers::redirect('/tasks');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../views/tasks/edit.php';
            return;
        }

        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $status = $_POST['status'] ?? 'pending';
        $dueDate = $_POST['due_date'] ?? null;
        $token = $_POST[CSRF_TOKEN_NAME] ?? '';

        // Validate CSRF token
        if (!Csrf::validateToken($token)) {
            Helpers::setFlash('error', 'Invalid request. Please try again.');
            Helpers::redirect('/tasks/edit?id=' . $taskId);
        }

        // Validate input
        $errors = [];

        if (empty($title)) {
            $errors[] = 'Title is required.';
        }

        if (!in_array($status, ['pending', 'in_progress', 'completed'])) {
            $errors[] = 'Invalid status selected.';
        }

        if (!empty($dueDate) && !strtotime($dueDate)) {
            $errors[] = 'Invalid due date format.';
        }

        if (!empty($errors)) {
            Helpers::setFlash('error', implode('<br>', $errors));
            Helpers::redirect('/tasks/edit?id=' . $taskId);
        }

        // Update task
        $taskData = [
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'due_date' => !empty($dueDate) ? $dueDate : null
        ];

        if ($this->taskModel->update($taskId, $taskData, $user['id'])) {
            Helpers::setFlash('success', 'Task updated successfully!');
            Helpers::redirect('/tasks');
        } else {
            Helpers::setFlash('error', 'Failed to update task. Please try again.');
            Helpers::redirect('/tasks/edit?id=' . $taskId);
        }
    }

    public function delete() {
        $this->auth->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            Helpers::redirect('/tasks');
        }

        $user = $this->auth->getCurrentUser();
        $taskId = $_POST['id'] ?? null;
        $token = $_POST[CSRF_TOKEN_NAME] ?? '';

        // Validate CSRF token
        if (!Csrf::validateToken($token)) {
            Helpers::setFlash('error', 'Invalid request. Please try again.');
            Helpers::redirect('/tasks');
        }

        if (!$taskId) {
            Helpers::setFlash('error', 'Task not found.');
            Helpers::redirect('/tasks');
        }

        if ($this->taskModel->delete($taskId, $user['id'])) {
            Helpers::setFlash('success', 'Task deleted successfully!');
        } else {
            Helpers::setFlash('error', 'Failed to delete task.');
        }

        Helpers::redirect('/tasks');
    }
}
