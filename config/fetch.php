<?php

require_once "../app/model/User.php";
require_once "../app/model/SolicitationUser.php";

$requestMethod = $_SERVER["REQUEST_METHOD"];
$actionName = $_GET['action'];

if ($requestMethod === "POST") {
	$data = json_decode($_POST["json"], true);
	$controller = requireController($data["tipo_usuario"]);
	echo $controller->$actionName($data);
} else if ($requestMethod === "GET") {
	$result = array();
	$solicitation = array();
	if ($actionName == "getDataToTable") {
		$className = ["Estudante", "Professor", "Tecnico"];
		foreach ($className as $userType) {
			$controller = requireController($userType);
			$response = $controller->$actionName();
			if (sizeof($response) > 0) {
				$result [] = $response;
			}
		}
		foreach ($result as $item => $k) {
			foreach ($k as $value) {
				array_push($solicitation, $value);
			}
		}
	}
	echo json_encode($solicitation);
}

function requireController($typeUser){
	$controller = $_GET['controller'];
	require_once "../app/controller/" .$controller .".php";
	return new $controller(new SolicitationUser(new User($typeUser)));
}