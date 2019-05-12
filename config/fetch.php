<?php

$requestMethod = $_SERVER['REQUEST_METHOD'];//Contém o método de request: 'GET', 'HEAD', 'POST' ou 'PUT'.
$controllerName = $_GET['controller'];
$actionName = $_GET['action'];

require_once('../app/controller/' . $controllerName . '.php');

if ($requestMethod === "POST") {
    if (isset($_POST['nome'])) {
        switch ($actionName) {
            case 'insert':
                $controller = new $controllerName();
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
        $controller = new $controllerName();//passando a model para controller
        $response = json_encode($controller->getAllSolicitation());
        echo $response;
    }
}
