<?php
// SeatGo Bus Reservation System - Main Router
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/core/Auth.php';
require_once __DIR__ . '/core/Csrf.php';
require_once __DIR__ . '/core/Helpers.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/models/Task.php';
require_once __DIR__ . '/models/Quote.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/DashboardController.php';
require_once __DIR__ . '/controllers/TaskController.php';

// Initialize Auth instance for views
$auth = new Auth();

// Get the request URI and method
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Remove trailing slash except for root
if ($requestUri !== '/' && substr($requestUri, -1) === '/') {
    $requestUri = rtrim($requestUri, '/');
}

// Route handling
try {
    switch ($requestUri) {
        case '/':
            // Redirect based on auth status
            if ($auth->isLoggedIn()) {
                Helpers::redirect('/dashboard');
            } else {
                Helpers::redirect('/login');
            }
            break;

        case '/login':
            $controller = new AuthController();
            if ($requestMethod === 'GET') {
                $controller->showLogin();
            } elseif ($requestMethod === 'POST') {
                $controller->login();
            }
            break;

        case '/register':
            $controller = new AuthController();
            if ($requestMethod === 'GET') {
                $controller->showRegister();
            } elseif ($requestMethod === 'POST') {
                $controller->register();
            }
            break;

        case '/logout':
            $controller = new AuthController();
            if ($requestMethod === 'POST') {
                $controller->logout();
            } else {
                Helpers::redirect('/dashboard');
            }
            break;

        case '/dashboard':
            $controller = new DashboardController();
            $controller->index();
            break;

        case '/tasks':
            $controller = new TaskController();
            $controller->index();
            break;

        case '/tasks/create':
            $controller = new TaskController();
            $controller->create();
            break;

        case '/tasks/edit':
            $controller = new TaskController();
            $controller->edit();
            break;

        case '/tasks/delete':
            $controller = new TaskController();
            if ($requestMethod === 'POST') {
                $controller->delete();
            } else {
                Helpers::redirect('/tasks');
            }
            break;

        // Static assets
        case (preg_match('/^\/assets\/(.+)$/', $requestUri, $matches) ? true : false):
            $file = __DIR__ . '/assets/' . $matches[1];
            if (file_exists($file)) {
                $mimeTypes = [
                    'css' => 'text/css',
                    'js' => 'application/javascript',
                    'png' => 'image/png',
                    'jpg' => 'image/jpeg',
                    'jpeg' => 'image/jpeg',
                    'gif' => 'image/gif',
                    'svg' => 'image/svg+xml',
                    'ico' => 'image/x-icon'
                ];
                
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';
                
                header('Content-Type: ' . $mimeType);
                header('Cache-Control: public, max-age=31536000'); // 1 year cache
                readfile($file);
                exit;
            }
            http_response_code(404);
            echo '404 - File Not Found';
            break;

        default:
            // 404 Page
            http_response_code(404);
            $title = '404 - Page Not Found';
            require_once __DIR__ . '/views/partials/head.php';
            if ($auth->isLoggedIn()) {
                require_once __DIR__ . '/views/partials/header.php';
            }
            ?>
            <main class="main">
                <div class="container">
                    <div class="empty-state">
                        <div class="empty-icon">🚌</div>
                        <h1>404 - Page Not Found</h1>
                        <p>The page you're looking for doesn't exist.</p>
                        <div class="action-buttons">
                            <?php if ($auth->isLoggedIn()): ?>
                                <a href="/dashboard" class="btn btn-primary">Go to Dashboard</a>
                                <a href="/tasks" class="btn btn-secondary">View Tasks</a>
                            <?php else: ?>
                                <a href="/login" class="btn btn-primary">Login</a>
                                <a href="/register" class="btn btn-secondary">Register</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </main>
            <?php
            require_once __DIR__ . '/views/partials/footer.php';
            break;
    }
} catch (Exception $e) {
    // Error handling
    error_log('SeatGo Error: ' . $e->getMessage());
    
    http_response_code(500);
    $title = 'Server Error';
    require_once __DIR__ . '/views/partials/head.php';
    if ($auth->isLoggedIn()) {
        require_once __DIR__ . '/views/partials/header.php';
    }
    ?>
    <main class="main">
        <div class="container">
            <div class="empty-state">
                <div class="empty-icon">⚠️</div>
                <h1>Server Error</h1>
                <p>Something went wrong. Please try again later.</p>
                <div class="action-buttons">
                    <?php if ($auth->isLoggedIn()): ?>
                        <a href="/dashboard" class="btn btn-primary">Go to Dashboard</a>
                    <?php else: ?>
                        <a href="/login" class="btn btn-primary">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once __DIR__ . '/views/partials/footer.php';
}