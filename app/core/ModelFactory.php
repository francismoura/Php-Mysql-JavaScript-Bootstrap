<?php

require_once '../app/model/Solicitation.php';

class ModelFactory
{
	public function __construct()
	{
	}

	public function build($typeUser)
	{
		if ($typeUser == '') {
			throw new Exception('Invalid Car Type.');
		} else {
			// Assumindo que os arquivos da classe já estão carregados usando o conceito autoload
			if (class_exists($typeUser)) {
				$className = "Solicitacao".$typeUser;
				return new $className();
			} else {
				throw new Exception('Car type not found.');
			}
		}

	}
}