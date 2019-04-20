<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . '/controller/UserController.php');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === "POST") {
    if (isset ($_POST['nome'])) {
        if (UserController::insertUser($_POST['nome'])){
            $output =
                '
                    <div class="alert alert-success alert-dismissible" role="alert">
			            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			            </button>
			            <strong>OK!</strong> 
			            Incluido com sucesso!!! 
			        </div>
	            ';
            echo $output;
        } else {
            $output =
                '
                    <div class="alert alert-success alert-dismissible" role="alert">
			            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			            <span aria-hidden="true">&times;</span>
			            </button>
			            <strong>OK!</strong> 
			            Erro ao incluir dados!!! 
			        </div>
	            ';
            echo $output;
        };
    };
}


if ($method === "GET") {
//    echo "teste";
    $usuario = new User();

//    var_dump($usuario);
    $todosUsuarios = $usuario->findAll();
//    var_dump($todosUsuarios);
    $responseJSON = json_encode($todosUsuarios);

    echo $responseJSON;
}
