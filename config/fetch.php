<?php

require_once '../app/controller/SolicitationController.php';
require_once '../app/model/Solicitacao.php';
require_once '../app/model/User.php';


$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod === "POST") {
	$data = json_decode($_POST["json"], true);
	//Se json_decode falhar, é um JSON invalido
	if (!is_array($data)) {
		echo 0;
	} else {
		$controller = new SolicitationController( new Solicitacao(new User($data['tipo_usuario'])));
		$actionName = $_GET['action'];
		echo $controller->$actionName($data);
	}

} else if ($requestMethod === "GET") {
	$solicitations = array();
	$actionName = $_GET['action'];
	$className = ["Estudante", "Professor", "Tecnico"];
	foreach ($className as $userType) {
		$controller = $controller = new SolicitationController( new Solicitacao(new User($userType)));
		$response = $controller->$actionName();
		if (sizeof($response) > 0){
			foreach ($response as $item => $value){
				$solicitations[$item] = $value;
			}

		}
	}
	$teste =  json_encode($solicitations);
	return $teste;

}