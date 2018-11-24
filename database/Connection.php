<?php

class Connection
{
    public static function make()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=marlin;charset=utf8;', 'root', 'root');
        return $pdo;
    }
}