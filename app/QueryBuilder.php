<?php

namespace App;

class QueryBuilder
{
    public function getAll($table)
    {
        $sql = "SELECT * FROM {$table}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}