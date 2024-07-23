<?php

namespace App\Tasks\Task_3\Config;

use PDO;
use PDOException;
use Exception;

class DatabaseFactory
{
    public function __construct(
        private readonly string $type,
        private readonly string $host,
        private readonly string $db_name,
        private readonly string $username,
        private readonly string $password
    )
    {}

    /**
     * @return PDO
     * @throws Exception
     */
    public function getConnection(): PDO {
        $dsn = match ($this->type) {
            'mysql' => "mysql:host={$this->host};dbname={$this->db_name}",
            'pgsql' => "pgsql:host={$this->host};dbname={$this->db_name}",
            default => throw new Exception("Unsupported database type: {$this->type}"),
        };

        try {
            $conn = new PDO($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            throw new Exception("Connection failed: " . $exception->getMessage());
        }

        return $conn;
    }
}