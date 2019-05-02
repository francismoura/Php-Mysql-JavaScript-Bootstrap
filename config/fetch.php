<?php

$requestMethod = $_SERVER['REQUEST_METHOD'];//Contém o método de request: 'GET', 'HEAD', 'POST' ou 'PUT'.

$requestUri = $_SERVER['REQUEST_URI'];
$prepareUri = explode('?', $requestUri);
$urlParams = explode('&',end($prepareUri));

$controllerName = substr(array_shift($urlParams), strlen('controller=' ));
$actionName = substr(current($urlParams), strlen('action='));

/*
 *Poderia trocar tudo por:
 * $controllerName = $_GET['controller'];
 * $actionName = $_GET['action'];
 */

require_once("../app/controller/".$controllerName.".php");

if ($requestMethod === "POST") {
    if (isset($_POST['nome'])) {
        switch ($actionName) {
            case 'insert':
                require_once('../app/model/User.php');
                $controller = new UserController(new User());
                echo $controller->newSolicitation($_POST['nome']);
                break;
            case 'findUnit':
                //fazer alog
                break;
            case 'update':
                //fazer algo
                break;
            case 'delete':
                //fazer algo
                break;
        }
    } else {
        echo 0;
    }
} else if ($requestMethod === "GET") {//será sempre de acesso do Admin
    if ($actionName === "findAll") {
//        require_once("../model/Form.php");
        $form = new Form();
        $controller = new FormController($form);//passando a model para controller
        $response = json_encode($controller->getAllSolicitation());
        echo $response;
    }
}
