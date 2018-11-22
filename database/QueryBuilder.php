<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function getAll()
    {
        //2 make query
        $sql = 'SELECT * FROM posts';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        //3. get array $posts
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}