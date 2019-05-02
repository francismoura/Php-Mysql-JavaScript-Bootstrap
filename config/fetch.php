<?php

$requestMethod = $_SERVER['REQUEST_METHOD'];//Contém o método de request: 'GET', 'HEAD', 'POST' ou 'PUT'.
$className = $_GET['controller'];
$actionName = $_GET['action'];
$controllerName = $className . "Controller";

require_once('../app/controller/' . $controllerName . '.php');

if ($requestMethod === "POST") {
    if (isset($_POST['nome'])) {
        switch ($actionName) {
            case 'insert':
                $model = new $className();
                $controller = new $controllerName($model);
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
        $form = new $className();
        $controller = new $controllerName($form);//passando a model para controller
        $response = json_encode($controller->getAllSolicitation());
        echo $response;
    }
}
