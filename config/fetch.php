<?php

require_once('../app/controller/FormController.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];//Contém o método de request: 'GET', 'HEAD', 'POST' ou 'PUT'.

if ($requestMethod === "POST") {
	$request = $_POST['json'];
	$data = json_decode($request, true);
	//Se json_decode falhar, é um JSON invalido
	if (!is_array($data)) {
		echo 0;
	} else {
		$actionName = $data['action'];
		$controller = new FormController();
		switch ($actionName) {
			case 'insert':
				echo $controller->insert($data);
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
} else if ($requestMethod === "GET") {//será sempre de acesso do Admin
	$controller = new FormController();
	$solicitations = $controller->getAllSolicitation();
	echo json_encode($solicitations);
}

