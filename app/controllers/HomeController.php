<?php

namespace App\controllers;

use App\exceptions\AccountIsBlockedException;
use App\exceptions\NotEnoughMoneyException;
use App\QueryBuilder;
use League\Plates\Engine;

class HomeController
{
    private $templates;

    public function __construct()
    {
        $this->templates = new Engine('../app/views');
    }

    public function index($vars)
    {
        $db = new QueryBuilder();
        $posts = $db->getAll('posts');
        echo $this->templates->render('homepage', ['postsInView' => $posts]);
    }

    public function about($vars)
    {
        try {
            $this->withdraw($vars['amount']);
        } catch (NotEnoughMoneyException $exception) {
            flash()->error("Ваш баланс меньше чем ".$vars['amount']);
        } catch (AccountIsBlockedException $exception) {
            flash()->error('Ваш аккаунт временно заблокирован');
        }
        echo $this->templates->render('about', ['name' => 'Jonathan']);
    }

    public function withdraw($amount = 1)
    {
        $total = 10;

        throw new AccountIsBlockedException('Your account is temporary blocked');
        exit;

        if ($amount > $total) {
            throw new NotEnoughMoneyException('not enough funds');
        }
    }
}