<?php

require_once '../app/model/User.php';
require_once '../app/model/Solicitation.php';

class ModelFactory
{
	public function __construct()
	{
	}

	public function build($type)
	{
		if ($type == '') {
			throw new Exception('Invalid Car Type.');
		} else {
			$className = ucfirst($type);
			// Assumindo que os arquivos da classe já estão carregados usando o conceito autoload
			if (class_exists($className)) {
				return new $className();
			} else {
				throw new Exception('Car type not found.');
			}
		}

	}
}