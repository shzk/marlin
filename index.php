<?php
include 'functions.php';
$db = include 'database/start.php';

$posts = $db->getAll();

include 'index.view.php';
?>