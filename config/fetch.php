<?php

include_once '../app/controller/SolicitationController.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod === "POST") {
	//recupera os dados do form passados por requisição
	$request = $_POST["json"];
	//json to array
	$data = json_decode($request, true);
	//Se json_decode falhar, é um JSON invalido
	if (!is_array($data)) {
		echo 0;
	} else {
		//recebe uma controller com a solicitação do usuário
		$controller = requireController($data["tipo_usuario"]);
		//deixa a controller lidar com a ação pedida pelo request
		$actionName = $data["action"];
		echo $controller->$actionName($data);
	}
} else if ($requestMethod === "GET") {
	//inicializa solicitações
	$solicitations = array();
	//inicializa array com todas os tipos de usuários
	$className = ["Estudante", "Professor", "Tecnico"];
	//buscar solicitação(s) de cada usuário
	foreach ($className as $user) {
		$controller = requireController($user);
		$solicitations[$user] = $controller->getAll();
	}
	echo json_encode($solicitations);
}

function requireController($user){
	require_once '../app/model/' . $user . '.php';
	require_once '../app/model/Solicitacao' . $user . '.php';
	$className = 'Solicitacao' . $user;
	//inicializa a solicitação com o respectivo usuário que solicitou
	$solicitation = new $className(new $user());
	//inicializa a controller com a solicitação
	return new SolicitationController($solicitation);
}