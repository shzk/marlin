<?php
if (isset($_GET['id'])) {
    $title = 'change';

    $pdo = new PDO('mysql:host=localhost;dbname=marlin;charset=utf8', 'root', 'root');
    var_dump($pdo);
    $statement = "UPDATE posts SET title='$title' WHERE id=2";
    var_dump($statement);
    $result = $pdo->exec($statement);
    var_dump($result);
    echo 'Статья успешно изменена!' . "<br>";
    echo '<a href="user.php">Мои статьи</a>';
}
?>