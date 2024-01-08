<?php
namespace App\Database;

use PDO;

class Connection {

    private $dbname;
    private $host;
    private $username;
    private $password;
    private $pdo;
    private static $instance;


    public function __construct(string $dbname, string $host, string $username, string $password) {
        $this->dbname = $dbname;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }


    public static function getInstance(string $dbname, string $host, string $username, string $password): Connection {
        if (self::$instance === null) {
            // Create a new instance if it doesn't exist
            self::$instance = new self($dbname, $host, $username, $password);
        }
        return self::$instance;
    }


    public function getPDO(): PDO {
        return $this->pdo ?? $this->pdo = new PDO("mysql:dbname={$this->dbname};host={$this->host}", $this->username, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }
}