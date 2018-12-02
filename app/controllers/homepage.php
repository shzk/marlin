<?php

use App\QueryBuilder;

$db = new QueryBuilder();
$posts = $db->getAll('posts');

var_dump($posts);