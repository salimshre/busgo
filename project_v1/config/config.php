<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'seatgo_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Application Configuration
define('APP_NAME', 'SeatGo');
define('APP_URL', 'http://localhost:8000');
define('SESSION_NAME', 'seatgo_session');

// Security Configuration
define('CSRF_TOKEN_NAME', '_token');
define('PASSWORD_MIN_LENGTH', 8);

// Timezone
date_default_timezone_set('UTC');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_name(SESSION_NAME);
    session_start();
}
