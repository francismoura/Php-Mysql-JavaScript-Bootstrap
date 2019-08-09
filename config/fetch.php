<?php

include_once '../app/controller/SolicitationController.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod === "POST") {
	$data = json_decode($_POST["json"], true);
	//Se json_decode falhar, é um JSON invalido
	if (!is_array($data)) {
		echo 0;
	} else {
		$controller = requireController($data["tipo_usuario"]);
		$actionName = $_GET['action'];
		echo $controller->$actionName($data);
	}

} else if ($requestMethod === "GET") {
	$solicitations = array();
	$actionName = $_GET['action'];
	$className = ["Estudante", "Professor", "Tecnico"];
	foreach ($className as $user) {
		$controller = requireController($user);
		$solicitations[$user] = $controller->$actionName();
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