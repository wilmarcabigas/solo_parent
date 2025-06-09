<?php
require_once __DIR__ . '/data/database.php';

class DatabaseController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchUsers() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }

    // Additional methods for handling database operations can be added here
}

// Initialize the controller
$controller = new DatabaseController($pdo);

// Example of fetching users
$users = $controller->fetchUsers();
foreach ($users as $user) {
    echo "User: " . htmlspecialchars($user['name']) . "<br>";
}
?>