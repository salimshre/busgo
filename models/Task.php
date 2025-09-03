<?php

class Task {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findById($id, $userId = null) {
        $sql = "SELECT * FROM tasks WHERE id = ?";
        $params = [$id];

        if ($userId) {
            $sql .= " AND user_id = ?";
            $params[] = $userId;
        }

        return $this->db->fetch($sql, $params);
    }

    public function findByUserId($userId, $filters = []) {
        $sql = "SELECT * FROM tasks WHERE user_id = ?";
        $params = [$userId];

        if (isset($filters['status']) && !empty($filters['status'])) {
            $sql .= " AND status = ?";
            $params[] = $filters['status'];
        }

        if (isset($filters['search']) && !empty($filters['search'])) {
            $sql .= " AND (title LIKE ? OR description LIKE ?)";
            $searchTerm = '%' . $filters['search'] . '%';
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }

        $sql .= " ORDER BY created_at DESC";

        return $this->db->fetchAll($sql, $params);
    }

    public function create($data) {
        try {
            $this->db->query(
                "INSERT INTO tasks (user_id, title, description, status, due_date) VALUES (?, ?, ?, ?, ?)",
                [
                    $data['user_id'],
                    $data['title'],
                    $data['description'] ?? null,
                    $data['status'] ?? 'pending',
                    $data['due_date'] ?? null
                ]
            );
            return $this->db->lastInsertId();
        } catch (Exception $e) {
            return false;
        }
    }

    public function update($id, $data, $userId) {
        $fields = [];
        $params = [];

        if (isset($data['title'])) {
            $fields[] = "title = ?";
            $params[] = $data['title'];
        }

        if (isset($data['description'])) {
            $fields[] = "description = ?";
            $params[] = $data['description'];
        }

        if (isset($data['status'])) {
            $fields[] = "status = ?";
            $params[] = $data['status'];
        }

        if (isset($data['due_date'])) {
            $fields[] = "due_date = ?";
            $params[] = $data['due_date'];
        }

        if (empty($fields)) {
            return false;
        }

        $params[] = $id;
        $params[] = $userId;
        $sql = "UPDATE tasks SET " . implode(', ', $fields) . ", updated_at = CURRENT_TIMESTAMP WHERE id = ? AND user_id = ?";

        try {
            $stmt = $this->db->query($sql, $params);
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            return false;
        }
    }

    public function delete($id, $userId) {
        try {
            $stmt = $this->db->query(
                "DELETE FROM tasks WHERE id = ? AND user_id = ?",
                [$id, $userId]
            );
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getStats($userId) {
        $stats = $this->db->fetch(
            "SELECT 
                COUNT(*) as total,
                SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed,
                SUM(CASE WHEN status = 'in_progress' THEN 1 ELSE 0 END) as in_progress,
                SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending
            FROM tasks WHERE user_id = ?",
            [$userId]
        );

        $stats['progress_percentage'] = $stats['total'] > 0 
            ? round(($stats['completed'] / $stats['total']) * 100, 1)
            : 0;

        return $stats;
    }

    public function getOverdueTasks($userId) {
        return $this->db->fetchAll(
            "SELECT * FROM tasks 
            WHERE user_id = ? AND due_date < CURDATE() AND status != 'completed'
            ORDER BY due_date ASC",
            [$userId]
        );
    }
}
