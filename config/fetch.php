<?php

require_once('../app/controller/FormController.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];//Contém o método de request: 'GET', 'HEAD', 'POST' ou 'PUT'.

if ($requestMethod === "POST") {
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if ($contentType === "application/json") {
        //recebe os dados "brutos" do post
        $content = trim(file_get_contents("php://input"));
        $formData = json_decode($content, true);

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
    }
} else if ($requestMethod === "GET") {//será sempre de acesso do Admin
    $controller = new FormController();
    $solicitations = $controller->getAllSolicitation();
    echo json_encode($solicitations);
}

