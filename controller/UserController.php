<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . '/core/Controller.php');
require_once($root . '/model/User.php');

class UserController extends Controller
{
    public static function insertUser($nome){
        $user = new User();
        $user->nome= $nome;
        return $user->insert($user);
    }

    public static function login()
    {

        self::createView('login');

    }

    public static function home()
    {

        self::createView('home');

    }

    public static function form()
    {

    }

    public static function cadastrar()
    {

        self::createView('cadastro');

    }

}