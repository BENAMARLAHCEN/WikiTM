<?php

namespace App\Model;

use App\Database\Connection;
use PDO;
use PDOException;

class Model
{
    protected $pdo;
    protected $table;

    function __construct()
    {
        $instance = Connection::getInstance();
        $this->pdo = $instance->getPDO();
    }

    public function selectRecords(string $columns = "*", string $where = null, string $orderBy = null, string $groupBy = null, string $join = null)
    {
        try {
            $sql = "SELECT $columns FROM $this->table";

            
            if ($join !== null) {
                $sql .= " $join";
            }
    
            if ($where !== null) {
                $sql .= " WHERE $where";
            }
    
            if ($groupBy !== null) {
                $sql .= " GROUP BY $groupBy";
            }
    
            if ($orderBy !== null) {
                $sql .= " ORDER BY $orderBy";
            }

            $this->logQuery($sql);

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        } catch (PDOException $e) {
            $this->logError($e);
            return []; // Return an empty array or handle error as needed
        }
    }

    public function insertRecord(array $data)
    {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = implode(', ', array_fill(0, count($data), '?'));
            $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
            $this->logQuery($sql);

            $stmt = $this->pdo->prepare($sql);

            // // Bind values to the prepared statement
            // foreach ($data as $key => $value) {
            //     $stmt->bindValue(':' . $key, $value);
            // }

            // Execute the prepared statement with values directly
            $stmt->execute(array_values($data));


            // $stmt->execute();

            return true;
        } catch (PDOException $e) {
            $this->logError($e);
            return false;
        }
    }

    public function updateRecord($data, $id)
    {
        try {
            $args = [];

            foreach ($data as $key => $value) {
                $args[] = "$key = :$key";
            }

            $sql = "UPDATE $this->table SET " . implode(', ', $args) . " WHERE id = :id";
            $this->logQuery($sql);

            $stmt = $this->pdo->prepare($sql);

            // Bind values to the prepared statement
            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
            $stmt->bindValue(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            $this->logError($e);
            return false;
        }
    }

    public function deleteRecord(int $id)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $this->logQuery($sql);

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            $this->logError($e);
            return false;
        }
    }

    protected function logError(PDOException $e)
    {
        $logFilePath = dirname(__DIR__ . '../') . '\logs\error.log';
        $errorMessage = "[" . date('Y-m-d H:i:s') . "] " . $e->getMessage() . "\n";
        file_put_contents($logFilePath, $errorMessage, FILE_APPEND);
    }

    protected function logQuery($query)
    {
        $logFilePath = dirname(__DIR__ . '../') . '\logs\query.log';

        $logMessage = "[" . date('Y-m-d H:i:s') . "] " .  $query . "\n";
        file_put_contents($logFilePath, $logMessage, FILE_APPEND);
    }
}
