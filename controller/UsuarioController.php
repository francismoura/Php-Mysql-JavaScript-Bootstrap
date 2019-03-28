<?php 

require_once '../model/Usuario.php';


/**
 * summary
 */
class UserController extends Usuario {


	public $usuario;

	public $allUsers = $usuario->findAll();

	public $json_users = formatarDadosUsuarios($allUsers);



	function formatarDadosUsuarios($allUsuers) {

		$usuario = new Usuario();
		foreach ($allUsers as $item) {


		}
	}
}






?>