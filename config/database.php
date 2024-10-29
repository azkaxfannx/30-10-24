<?php
// config/database.php
class Database {
    private $host = 'localhost';
    private $db_name = 'mvc';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            error_log("Connection error: " . $e->getMessage());
            throw new PDOException("Database connection failed: " . $e->getMessage());
        }
    }
}