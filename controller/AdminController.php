<?php

require_once('../core/Controller.php');
require_once('../model/User.php');

class AdminController extends Controller
{

    protected $admin;

    function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    function getAllSolicitation()
    {
        return $this->admin->FindAll();
    }

    function login(User $admin)
    {
        $login = new Login();
        if ($login->isUserValid($admin)) {
            self::dashboard($admin);
            return true;
        } else {
            return false;
        }
    }

    function dashboard(User $userLogado)
    {
        //após verificar os dados de login redirecionar para dashboard
        //pedir para model todos os dados dos usuários fetchAll
        if ($userLogado === "root") {
            self::createView('dashboard');
        }
    }

}