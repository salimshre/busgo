<?php

class Auth {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function login($email, $password) {
        $user = $this->db->fetch(
            "SELECT * FROM users WHERE email = ?", 
            [$email]
        );

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            return true;
        }

        return false;
    }

    public function register($name, $email, $password) {
        // Check if email already exists
        $existingUser = $this->db->fetch(
            "SELECT id FROM users WHERE email = ?", 
            [$email]
        );

        if ($existingUser) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        try {
            $this->db->query(
                "INSERT INTO users (name, email, password) VALUES (?, ?, ?)",
                [$name, $email, $hashedPassword]
            );
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function logout() {
        session_destroy();
        session_start();
        session_regenerate_id(true);
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function getCurrentUser() {
        if (!$this->isLoggedIn()) {
            return null;
        }

        return [
            'id' => $_SESSION['user_id'],
            'name' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email']
        ];
    }

    public function requireAuth() {
        if (!$this->isLoggedIn()) {
            header('Location: /login');
            exit;
        }
    }

    public function redirectIfLoggedIn() {
        if ($this->isLoggedIn()) {
            header('Location: /dashboard');
            exit;
        }
    }
}
