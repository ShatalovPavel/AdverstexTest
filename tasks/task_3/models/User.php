<?php

namespace App\Tasks\Task_3\Models;

namespace App\Tasks\Task_3\Models;

use PDO;
use PDOException;
use Exception;

class User {
    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAllUsers(): array {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error executing the model User database: " . $e->getMessage());
        }
    }
}