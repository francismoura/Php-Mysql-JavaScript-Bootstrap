<?php

require_once('../config/Controller.php');
require_once('../app/model/User.php');
require_once('../app/model/View.php');

class AdminController extends Controller
{

    protected $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function login(User $admin)
    {
        $login = new Login();
        if ($login->isUserValid($admin)) {
            //apos login deve abrir a view dashboard e carregar a table
            $this->dashboard();
            return true;
        } else {
            return false;
        }
    }

    public function dashboard()
    {
        //após verificar os dados de login redirecionar para dashboard
        //pedir para model todos os dados dos usuários fetchAll
//        if ($userLogado === "root") {
            View::make('dashboard');
//        }
    }
}