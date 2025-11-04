<?php
$title = 'Edit Task';
require_once __DIR__ . '/../partials/head.php';
require_once __DIR__ . '/../partials/header.php';
?>

<main class="main">
    <div class="container">
        <div class="page-header">
            <h1>Edit Task</h1>
            <a href="/tasks" class="btn btn-secondary">
                <span>←</span> Back to Tasks
            </a>
        </div>

        <?php require_once __DIR__ . '/../partials/flash.php'; ?>

        <div class="form-card">
            <form method="POST" action="/tasks/edit?id=<?= $task['id'] ?>" class="task-form">
                <?= Csrf::getTokenField() ?>
                
                <div class="form-group">
                    <label for="title">Task Title *</label>
                    <input type="text" id="title" name="title" required 
                           value="<?= isset($_POST['title']) ? Helpers::escape($_POST['title']) : Helpers::escape($task['title']) ?>"
                           placeholder="Enter task title">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" 
                              placeholder="Enter task description (optional)"><?= isset($_POST['description']) ? Helpers::escape($_POST['description']) : Helpers::escape($task['description']) ?></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <?php 
                            $currentStatus = isset($_POST['status']) ? $_POST['status'] : $task['status'];
                            ?>
                            <option value="pending" <?= $currentStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="in_progress" <?= $currentStatus === 'in_progress' ? 'selected' : '' ?>>In Progress</option>
                            <option value="completed" <?= $currentStatus === 'completed' ? 'selected' : '' ?>>Completed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input type="date" id="due_date" name="due_date" 
                               value="<?= isset($_POST['due_date']) ? Helpers::escape($_POST['due_date']) : Helpers::escape($task['due_date']) ?>">
                    </div>
                </div>

                <div class="task-meta-info">
                    <p><strong>Created:</strong> <?= Helpers::formatDate($task['created_at'], 'M j, Y g:i A') ?></p>
                    <?php if ($task['updated_at'] !== $task['created_at']): ?>
                        <p><strong>Last Updated:</strong> <?= Helpers::formatDate($task['updated_at'], 'M j, Y g:i A') ?></p>
                    <?php endif; ?>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update Task</button>
                    <a href="/tasks" class="btn btn-outline">Cancel</a>
                    
                    <form method="POST" action="/tasks/delete" class="delete-form" style="display: inline; margin-left: auto;">
                        <?= Csrf::getTokenField() ?>
                        <input type="hidden" name="id" value="<?= $task['id'] ?>">
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Are you sure you want to delete this task? This action cannot be undone.')">
                            Delete Task
                        </button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
