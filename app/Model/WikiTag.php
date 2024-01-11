<?php

namespace App\Model;

use PDOException;

class WikiTag extends Model
{
    protected $table = 'wikitags';

    public function deleteRecord(int $id)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE wiki_id = :id";
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
}
