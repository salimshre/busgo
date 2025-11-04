    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="/dashboard">
                        <span class="logo-icon">🚌</span>
                        <span class="logo-text"><?= APP_NAME ?></span>
                    </a>
                </div>
                
                <?php if ($auth->isLoggedIn()): ?>
                    <nav class="nav">
                        <a href="/dashboard" class="nav-link <?= $_SERVER['REQUEST_URI'] === '/dashboard' ? 'active' : '' ?>">Dashboard</a>
                        <a href="/tasks" class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/tasks') === 0 ? 'active' : '' ?>">Tasks</a>
                    </nav>
                    
                    <div class="user-menu">
                        <span class="user-name">Hello, <?= Helpers::escape($auth->getCurrentUser()['name']) ?>!</span>
                        <form method="POST" action="/logout" class="logout-form">
                            <?= Csrf::getTokenField() ?>
                            <button type="submit" class="btn btn-secondary btn-sm">Logout</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
