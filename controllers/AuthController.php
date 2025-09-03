<?php

class AuthController {
    private $auth;
    private $userModel;

    public function __construct() {
        $this->auth = new Auth();
        $this->userModel = new User();
    }

    public function showLogin() {
        $this->auth->redirectIfLoggedIn();
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function login() {
        $this->auth->redirectIfLoggedIn();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            Helpers::redirect('/login');
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $token = $_POST[CSRF_TOKEN_NAME] ?? '';

        // Validate CSRF token
        if (!Csrf::validateToken($token)) {
            Helpers::setFlash('error', 'Invalid request. Please try again.');
            Helpers::redirect('/login');
        }

        // Validate input
        if (empty($email) || empty($password)) {
            Helpers::setFlash('error', 'Please fill in all fields.');
            Helpers::redirect('/login');
        }

        if (!Helpers::validateEmail($email)) {
            Helpers::setFlash('error', 'Please enter a valid email address.');
            Helpers::redirect('/login');
        }

        // Attempt login
        if ($this->auth->login($email, $password)) {
            Helpers::setFlash('success', 'Welcome back!');
            Helpers::redirect('/dashboard');
        } else {
            Helpers::setFlash('error', 'Invalid email or password.');
            Helpers::redirect('/login');
        }
    }

    public function showRegister() {
        $this->auth->redirectIfLoggedIn();
        require_once __DIR__ . '/../views/auth/register.php';
    }

    public function register() {
        $this->auth->redirectIfLoggedIn();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            Helpers::redirect('/register');
        }

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $token = $_POST[CSRF_TOKEN_NAME] ?? '';

        // Validate CSRF token
        if (!Csrf::validateToken($token)) {
            Helpers::setFlash('error', 'Invalid request. Please try again.');
            Helpers::redirect('/register');
        }

        // Validate input
        $errors = [];

        if (empty($name)) {
            $errors[] = 'Name is required.';
        }

        if (empty($email)) {
            $errors[] = 'Email is required.';
        } elseif (!Helpers::validateEmail($email)) {
            $errors[] = 'Please enter a valid email address.';
        }

        if (empty($password)) {
            $errors[] = 'Password is required.';
        } elseif (!Helpers::validatePassword($password)) {
            $errors[] = 'Password must be at least ' . PASSWORD_MIN_LENGTH . ' characters long.';
        }

        if ($password !== $confirmPassword) {
            $errors[] = 'Passwords do not match.';
        }

        if (!empty($errors)) {
            Helpers::setFlash('error', implode('<br>', $errors));
            Helpers::redirect('/register');
        }

        // Check if email already exists
        if ($this->userModel->emailExists($email)) {
            Helpers::setFlash('error', 'An account with this email already exists.');
            Helpers::redirect('/register');
        }

        // Attempt registration
        if ($this->auth->register($name, $email, $password)) {
            Helpers::setFlash('success', 'Account created successfully! Please log in.');
            Helpers::redirect('/login');
        } else {
            Helpers::setFlash('error', 'Registration failed. Please try again.');
            Helpers::redirect('/register');
        }
    }

    public function logout() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            Helpers::redirect('/dashboard');
        }

        $token = $_POST[CSRF_TOKEN_NAME] ?? '';
        if (!Csrf::validateToken($token)) {
            Helpers::setFlash('error', 'Invalid request.');
            Helpers::redirect('/dashboard');
        }

        $this->auth->logout();
        Helpers::setFlash('success', 'You have been logged out successfully.');
        Helpers::redirect('/login');
    }
}
