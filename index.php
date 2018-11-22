<?php
include 'functions.php';
include 'database/QueryBuilder.php';

$pdo = connectToDB();

$db = new QueryBuilder($pdo);
$posts = $db->getAll();

//$posts = getAllPosts($pdo);

//4. output
include 'index.view.php';
?>