<?php 
require_once('route/routes.php');
require_once('model/Route.php');
require_once('controller/UsuarioController.php');
require_once('model/CrudUser.php');


$controlername = $_GET('controller').'UsuarioController';

function __autoload($class_name){
	if (file_exists('model/'.$class_name.'.php')) {
		require_once 'model/'.$class_name.'.php';
	}else if (file_exists('controller/'.$class_name.'.php')){
		require_once 'controller/'.$class_name.'.php';
	}else if (file_exists('view/'.$class_name.'.php')){
		require_once '/view/'.$class_name.'.php';
	};
}

?>
