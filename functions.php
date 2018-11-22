<?php
function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die;
}

function getAllPosts()
{
    //1. connect to db
    $pdo = new PDO('mysql:host=localhost;dbname=marlin;charset=utf8;', 'root', 'root');

    //2 make query
    $sql = 'SELECT * FROM posts';
    $statement = $pdo->prepare($sql);
    $statement->execute();

    //3. get array $posts
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}