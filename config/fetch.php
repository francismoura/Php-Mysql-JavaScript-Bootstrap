<?php

include_once '../app/controller/SolicitationController.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod === "POST") {
	$request = $_POST["json"];
	$data = json_decode($request, true);
	//Se json_decode falhar, é um JSON invalido
	if (!is_array($data)) {
		echo 0;
	} else {
		$user = $data["tipo_usuario"];
		$controller = requireController($user);
		$controller->post($data);
	}
} else if ($requestMethod === "GET") {
	$className = ["Estudante", "Professor", "Tecnico"];
	$solicitations = array();
	foreach ($className as $user) {
		$controller = requireController($user);
		$controller->getAll();
	}
	echo json_encode($solicitations);
}

function requireController($user){
	require_once '../app/model/' . $user . '.php';
	require_once '../app/model/Solicitacao' . $user . '.php';
	$className = 'Solicitacao' . $user;
	$solicitation = new $className(new $user());
	return new SolicitationController($solicitation);
}