<?php

namespace App;
use Aura\SqlQuery\QueryFactory;
use PDO;

class QueryBuilder
{
    private $pdo;
    private $queryFactory;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=marlin;charset=utf8;", "root", "root");
        $this->queryFactory = new QueryFactory('mysql');
    }

    public function getAll($table)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data, $table)
    {
        $insert = $this->queryFactory->newInsert();

        $insert
            ->into($table)
            ->cols($data);
        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());
    }

    public function update($data, $id, $table)
    {
        $update = $this->queryFactory->newUpdate();

        $update
            ->table($table)                  // update this table
            ->cols($data)
            ->where('id = :id', ['id' => $id]);

        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());
    }
}