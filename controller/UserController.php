<?php

//$root = $_SERVER['DOCUMENT_ROOT'];
require_once('../core/Controller.php');
require_once('../model/User.php');

class UserController extends Controller
{

    public static function login(User $admin)
    {
        $login = new Login();
        if ($login->isUserValid($admin)) {
            self::dashboard($admin);
            return true;
        } else {
            return false;
        }
    }

    public static function home()
    {

    }

    public static function getAllSolicitation()
    {
        $user = new User();
        return $user->FindAll();
    }

    public static function newSolicitation($nome)
    {
        $user = new User();
        return $user->Insert($nome);
    }


    public static function cadastrar()
    {
        //view com form de cadastro
        self::createView('cadastro');

    }

    public static function dashboard(User $userLogado)
    {

        //após verificar os dados de login redirecionar para dashboard
        //pedir para model todos os dados dos usuários fetchAll
        if ($userLogado === "root") {
            self::createView('dashboard');
        }

    }
}