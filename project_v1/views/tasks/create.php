<?php
$title = 'Create Task';
require_once __DIR__ . '/../partials/head.php';
require_once __DIR__ . '/../partials/header.php';
?>

<main class="main">
    <div class="container">
        <div class="page-header">
            <h1>Create New Task</h1>
            <a href="/tasks" class="btn btn-secondary">
                <span>←</span> Back to Tasks
            </a>
        </div>

        <?php require_once __DIR__ . '/../partials/flash.php'; ?>

        <div class="form-card">
            <form method="POST" action="/tasks/create" class="task-form">
                <?= Csrf::getTokenField() ?>
                
                <div class="form-group">
                    <label for="title">Task Title *</label>
                    <input type="text" id="title" name="title" required 
                           value="<?= isset($_POST['title']) ? Helpers::escape($_POST['title']) : '' ?>"
                           placeholder="Enter task title">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" 
                              placeholder="Enter task description (optional)"><?= isset($_POST['description']) ? Helpers::escape($_POST['description']) : '' ?></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="pending" <?= (!isset($_POST['status']) || $_POST['status'] === 'pending') ? 'selected' : '' ?>>Pending</option>
                            <option value="in_progress" <?= (isset($_POST['status']) && $_POST['status'] === 'in_progress') ? 'selected' : '' ?>>In Progress</option>
                            <option value="completed" <?= (isset($_POST['status']) && $_POST['status'] === 'completed') ? 'selected' : '' ?>>Completed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input type="date" id="due_date" name="due_date" 
                               value="<?= isset($_POST['due_date']) ? Helpers::escape($_POST['due_date']) : '' ?>">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Create Task</button>
                    <a href="/tasks" class="btn btn-outline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
