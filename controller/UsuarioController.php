<?php

require_once('../core/Controller.php');

class UsuarioController extends Controller
{

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