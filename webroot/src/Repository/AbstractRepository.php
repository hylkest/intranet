<?php
namespace src\Repository;

use PDO;
use PDOException;

abstract class AbstractRepository {

    protected PDO $connection;

    /**
     * Connect to the database
     */
    public function __construct() {
        $this->connect();
    }

    /**
     * Connect to the database
     *
     * @return void
     */
    protected function connect() {
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->connection = new \PDO("mysql:host=host.docker.internal;dbname=las;charset=utf8mb4", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $options);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
