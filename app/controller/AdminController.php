<?php

require_once('../app/model/BaseModel.php');

class AdminController
{

    protected $admin;

    public function __construct(BaseModel $admin)
    {
        $this->admin = $admin;
    }

    public function login(User $admin)
    {
        $login = new Login();
        if ($login->isUserValid($admin)) {
            //apos login deve abrir a view admin e carregar a table
            $this->dashboard();
            return true;
        } else {
            return false;
        }
    }

    public function dashboard()
    {
        //após verificar os dados de login redirecionar para admin
        //pedir para model todos os dados dos usuários fetchAll
//        if ($userLogado === "root") {
            View::build('admin');
//        }
    }
}