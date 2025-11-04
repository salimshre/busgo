<?php
$title = 'Dashboard';
require_once __DIR__ . '/../partials/head.php';
require_once __DIR__ . '/../partials/header.php';
?>

<main class="main">
    <div class="container">
        <div class="page-header">
            <h1>Dashboard</h1>
            <p>Welcome back, <?= Helpers::escape($user['name']) ?>!</p>
        </div>

        <?php require_once __DIR__ . '/../partials/flash.php'; ?>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card stat-card-primary">
                <div class="stat-icon">📋</div>
                <div class="stat-content">
                    <h3><?= $stats['total'] ?></h3>
                    <p>Total Tasks</p>
                </div>
            </div>

            <div class="stat-card stat-card-success">
                <div class="stat-icon">✅</div>
                <div class="stat-content">
                    <h3><?= $stats['completed'] ?></h3>
                    <p>Completed</p>
                </div>
            </div>

            <div class="stat-card stat-card-warning">
                <div class="stat-icon">🔄</div>
                <div class="stat-content">
                    <h3><?= $stats['in_progress'] ?></h3>
                    <p>In Progress</p>
                </div>
            </div>

            <div class="stat-card stat-card-info">
                <div class="stat-icon">⏳</div>
                <div class="stat-content">
                    <h3><?= $stats['pending'] ?></h3>
                    <p>Pending</p>
                </div>
            </div>
        </div>

        <!-- Progress Section -->
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h2>Overall Progress</h2>
                <div class="progress-container">
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: <?= $stats['progress_percentage'] ?>%"></div>
                        <span class="progress-text"><?= $stats['progress_percentage'] ?>% Complete</span>
                    </div>
                </div>
                <p class="progress-summary">
                    You've completed <?= $stats['completed'] ?> out of <?= $stats['total'] ?> tasks.
                    <?php if ($stats['progress_percentage'] >= 80): ?>
                        Excellent work! 🎉
                    <?php elseif ($stats['progress_percentage'] >= 50): ?>
                        Great progress! Keep it up! 💪
                    <?php else: ?>
                        You're just getting started! 🚀
                    <?php endif; ?>
                </p>
            </div>

            <!-- Quote of the Day -->
            <div class="dashboard-card">
                <h2>Quote of the Day</h2>
                <?php if ($quote): ?>
                    <blockquote class="quote">
                        <p>"<?= Helpers::escape($quote['text']) ?>"</p>
                        <footer>— <?= Helpers::escape($quote['author']) ?></footer>
                    </blockquote>
                <?php else: ?>
                    <p class="no-quote">No quote available today.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Upcoming Buses Widget -->
        <div class="dashboard-card">
            <h2>🚌 Upcoming Buses</h2>
            <div class="buses-grid">
                <?php foreach ($upcomingBuses as $bus): ?>
                    <div class="bus-card">
                        <div class="bus-header">
                            <span class="bus-number"><?= Helpers::escape($bus['bus_no']) ?></span>
                            <span class="seats-available <?= $bus['seats_available'] <= 5 ? 'low-seats' : '' ?>">
                                <?= $bus['seats_available'] ?> seats
                            </span>
                        </div>
                        <div class="bus-route"><?= Helpers::escape($bus['route']) ?></div>
                        <div class="bus-time">🕐 <?= Helpers::escape($bus['departure']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="action-buttons">
                <a href="/tasks/create" class="btn btn-primary">
                    <span>➕</span> Add New Task
                </a>
                <a href="/tasks" class="btn btn-secondary">
                    <span>📋</span> View All Tasks
                </a>
            </div>
        </div>

        <?php if (!empty($overdueTasks)): ?>
            <!-- Overdue Tasks Alert -->
            <div class="dashboard-card alert-card">
                <h2>⚠️ Overdue Tasks</h2>
                <p>You have <?= count($overdueTasks) ?> overdue task(s) that need attention:</p>
                <ul class="overdue-list">
                    <?php foreach (array_slice($overdueTasks, 0, 3) as $task): ?>
                        <li>
                            <a href="/tasks/edit?id=<?= $task['id'] ?>">
                                <?= Helpers::escape($task['title']) ?>
                            </a>
                            <small>(Due: <?= Helpers::formatDate($task['due_date']) ?>)</small>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php if (count($overdueTasks) > 3): ?>
                    <p><a href="/tasks?status=overdue">View all overdue tasks</a></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
