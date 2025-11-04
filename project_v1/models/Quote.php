<?php

class Quote {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getRandomQuote() {
        return $this->db->fetch(
            "SELECT * FROM quotes ORDER BY RAND() LIMIT 1"
        );
    }

    public function getDailyQuote() {
        // Get quote based on day of year to ensure same quote per day
        $dayOfYear = date('z') + 1; // 1-366
        
        return $this->db->fetch(
            "SELECT * FROM quotes WHERE id = ((? - 1) % (SELECT COUNT(*) FROM quotes)) + 1",
            [$dayOfYear]
        );
    }

    public function getAll() {
        return $this->db->fetchAll(
            "SELECT * FROM quotes ORDER BY author, text"
        );
    }

    public function create($text, $author) {
        try {
            $this->db->query(
                "INSERT INTO quotes (text, author) VALUES (?, ?)",
                [$text, $author]
            );
            return $this->db->lastInsertId();
        } catch (Exception $e) {
            return false;
        }
    }
}
