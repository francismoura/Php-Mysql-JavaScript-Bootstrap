<?php

//$root = $_SERVER['DOCUMENT_ROOT'];
require_once ("../controller/UserController.php");
$controller = $_GET['controller'];
$action = $_GET['action'];
$method = $_SERVER['REQUEST_METHOD'];

if ($method === "POST") {//recebeu post?
    switch ($action) {
        case 'insert':
            echo $controller::newSolicitation($_POST['nome']);
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
} else if ($method === "GET") {
    if ($action === "findAll") {
        $responseJSON = json_encode($controller::getAllSolicitation());
        echo $responseJSON;
    }
}
