<?php

require_once('../app/controller/FormController.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];//Contém o método de request: 'GET', 'HEAD', 'POST' ou 'PUT'.

if ($requestMethod === "POST") {
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if ($contentType === "application/json") {
        //Receive the RAW post data.
        $content = trim(file_get_contents("php://input"));
        $formData = json_decode($content, true);

        //If json_decode failed, the JSON is invalid.
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
                    //fazer alog
                    break;
                case 'update':
                    //fazer algo
                    break;
                case 'delete':
                    //fazer algo
                    break;
            }
        }
    }
} else if ($requestMethod === "GET") {//será sempre de acesso do Admin
    $controller = new FormController();
    echo json_encode($controller->getAllSolicitation());
}

