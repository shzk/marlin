<?php
function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die;
}

function connectToDB()
{
    $pdo = new PDO('mysql:host=localhost;dbname=marlin;charset=utf8;', 'root', 'root');
    return $pdo;
}

