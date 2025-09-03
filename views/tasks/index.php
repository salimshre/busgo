<?php
$title = 'Tasks';
require_once __DIR__ . '/../partials/head.php';
require_once __DIR__ . '/../partials/header.php';
?>

<main class="main">
    <div class="container">
        <div class="page-header">
            <h1>Tasks</h1>
            <a href="/tasks/create" class="btn btn-primary">
                <span>➕</span> Add New Task
            </a>
        </div>

        <?php require_once __DIR__ . '/../partials/flash.php'; ?>

        <!-- Filters -->
        <div class="filters-card">
            <form method="GET" action="/tasks" class="filters-form">
                <div class="filter-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status">
                        <option value="">All Status</option>
                        <option value="pending" <?= $filters['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="in_progress" <?= $filters['status'] === 'in_progress' ? 'selected' : '' ?>>In Progress</option>
                        <option value="completed" <?= $filters['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="search">Search:</label>
                    <input type="text" id="search" name="search" 
                           value="<?= Helpers::escape($filters['search']) ?>"
                           placeholder="Search tasks...">
                </div>

                <div class="filter-actions">
                    <button type="submit" class="btn btn-secondary">Filter</button>
                    <a href="/tasks" class="btn btn-outline">Clear</a>
                </div>
            </form>
        </div>

        <!-- Tasks List -->
        <?php if (empty($tasks)): ?>
            <div class="empty-state">
                <div class="empty-icon">📝</div>
                <h3>No tasks found</h3>
                <p>
                    <?php if (!empty($filters['status']) || !empty($filters['search'])): ?>
                        Try adjusting your filters or <a href="/tasks">view all tasks</a>.
                    <?php else: ?>
                        Get started by <a href="/tasks/create">creating your first task</a>.
                    <?php endif; ?>
                </p>
            </div>
        <?php else: ?>
            <div class="tasks-grid">
                <?php foreach ($tasks as $task): ?>
                    <div class="task-card task-<?= $task['status'] ?>">
                        <div class="task-header">
                            <h3 class="task-title"><?= Helpers::escape($task['title']) ?></h3>
                            <span class="task-status status-<?= $task['status'] ?>">
                                <?= ucfirst(str_replace('_', ' ', $task['status'])) ?>
                            </span>
                        </div>

                        <?php if (!empty($task['description'])): ?>
                            <p class="task-description"><?= Helpers::escape($task['description']) ?></p>
                        <?php endif; ?>

                        <div class="task-meta">
                            <?php if ($task['due_date']): ?>
                                <div class="task-due-date <?= strtotime($task['due_date']) < time() && $task['status'] !== 'completed' ? 'overdue' : '' ?>">
                                    📅 Due: <?= Helpers::formatDate($task['due_date']) ?>
                                </div>
                            <?php endif; ?>
                            <div class="task-created">
                                Created: <?= Helpers::timeAgo($task['created_at']) ?>
                            </div>
                        </div>

                        <div class="task-actions">
                            <a href="/tasks/edit?id=<?= $task['id'] ?>" class="btn btn-sm btn-secondary">Edit</a>
                            <form method="POST" action="/tasks/delete" class="delete-form" style="display: inline;">
                                <?= Csrf::getTokenField() ?>
                                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
