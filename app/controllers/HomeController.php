<?php

namespace App\controllers;

use App\exceptions\AccountIsBlockedException;
use App\exceptions\NotEnoughMoneyException;
use App\QueryBuilder;
use League\Plates\Engine;
use PDO;

class HomeController
{
    private $templates;
    private $auth;

    public function __construct()
    {
        $this->templates = new Engine('../app/views');
        $db = new PDO("mysql:host=localhost;dbname=marlin;charset=utf8;", "root", "root");
        $this->auth = new \Delight\Auth\Auth($db);
    }

    public function index($vars)
    {
        $this->auth->admin()->addRoleForUserById(2, \Delight\Auth\Role::ADMIN);
        d($this->auth->getRoles());die;
        $db = new QueryBuilder();
        $posts = $db->getAll('posts');
        echo $this->templates->render('homepage', ['postsInView' => $posts]);
    }

    public function about($vars)
    {

        try {
            $userId = $this->auth->register('den4@me.com', '123', 'den4', function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            });

            echo 'We have signed up a new user with the ID ' . $userId;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
        echo $this->templates->render('about', ['name' => 'Jonathan']);
    }

    public function emailVerification()
    {
        try {
            $this->auth->confirmEmail('cZKUPxfui5SzABqM', '-DqXGDBcg4zxJnE_');

            echo 'Email address has been verified';
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            die('Invalid token');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            die('Token expired');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('Email address already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    public function login()
    {
        try {
            $this->auth->login('den4@me.com', '123');

            echo 'User is logged in';
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Wrong email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Wrong password');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }
}