<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . "/controller/UserController.php";
$controller = $_GET['controller'];
$action = $_GET['action'];
$method = $_SERVER['REQUEST_METHOD'];

if ($method === "POST") {//recebeu post?
    $action = $_GET['action'];
    switch ($action) {
        case 'insert':
            echo $controller::newSolicitation($_POST['nome']);
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
    if ($_GET['action'] === 'findAll') {
        $responseJSON = json_encode($controller::findAllSolicitation());
        echo $responseJSON;
    }
}
