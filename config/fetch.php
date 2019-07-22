<?php

require_once('../app/controller/FormController.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];//Contém o método de request: 'GET', 'HEAD', 'POST' ou 'PUT'.

if ($requestMethod === "POST") {
    $data = $_POST['json'];
    $formData = json_decode($data, true);
    //Se json_decode falhar, é um JSON invalido
    if (!is_array($formData)) {
        echo 0;
    } else {
        $actionName = $formData['action'];
        switch ($actionName) {
            case 'insert':
                $controller = new FormController();
                echo $controller->newSolicitation($formData);
                break;
            case 'findUnit':
                //fazer algo
                break;
            case 'update':
                //fazer algo
                break;
            case 'delete':
                //fazer algo
                break;
        }
    }
} else
    if ($requestMethod === "GET") {//será sempre de acesso do Admin
        $controller = new FormController();
        $solicitations = $controller->getAllSolicitation();
        echo json_encode($solicitations);
    }

