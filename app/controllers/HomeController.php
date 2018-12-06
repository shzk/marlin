<?php
namespace App\controllers;

use App\QueryBuilder;

class HomeController
{
    public function index($vars)
    {
        d($vars['id']);
        $db = new QueryBuilder();
    }
}