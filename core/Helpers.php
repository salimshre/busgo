<?php

class Helpers {
    public static function escape($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    public static function redirect($path) {
        header("Location: $path");
        exit;
    }

    public static function setFlash($type, $message) {
        $_SESSION['flash'][$type] = $message;
    }

    public static function getFlash($type) {
        if (isset($_SESSION['flash'][$type])) {
            $message = $_SESSION['flash'][$type];
            unset($_SESSION['flash'][$type]);
            return $message;
        }
        return null;
    }

    public static function hasFlash($type) {
        return isset($_SESSION['flash'][$type]);
    }

    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validatePassword($password) {
        return strlen($password) >= PASSWORD_MIN_LENGTH;
    }

    public static function formatDate($date, $format = 'M j, Y') {
        return date($format, strtotime($date));
    }

    public static function timeAgo($datetime) {
        $time = time() - strtotime($datetime);
        
        if ($time < 60) return 'just now';
        if ($time < 3600) return floor($time/60) . ' minutes ago';
        if ($time < 86400) return floor($time/3600) . ' hours ago';
        if ($time < 2592000) return floor($time/86400) . ' days ago';
        
        return date('M j, Y', strtotime($datetime));
    }

    public static function generateRandomString($length = 32) {
        return bin2hex(random_bytes($length / 2));
    }
}
