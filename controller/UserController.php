<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . '/core/Controller.php');
require_once($root . '/model/User.php');

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

    public static function findAll()
    {
        $user = new User();
        return $user->FindAll();
    }

    public static function home()
    {

    }

    public static function newSolicitation($nome)
    {
        $user = new User();
        return $user->Insert($nome);
    }

    public static function show()
    {
        //retornar todas solicitações selecionadas
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

    public static function fetch()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === "POST") {//recebeu post?
            $action = $_GET['action'];
            switch ($action) {
                case 'insert':
                    echo \UserController::newSolicitation($_POST['nome']);
                    break;
                case 'FIND_UNIT':
                    //fazer alog
                    break;
                case 'UPDATE':
                    //fazer algo
                    break;
                case 'DELETE':
                    //fazer algo
                    break;
            }
        } else if ($method === "GET") {
            if ($_GET['action'] === 'findAll'){
                $responseJSON = json_encode(UserController::findAll());
                echo $responseJSON;
            }
        }
    }
}

echo UserController::fetch();