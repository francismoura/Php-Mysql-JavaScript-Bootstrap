<?php

include_once '../dao/SolicitationDao.php';
require_once '../app/model/Estudante.php';

class SolicitacaoEstudante extends SolicitationDao
{
	private $attribute = array();

	public function __construct($estudante)
	{
		$this->attribute['user'] = $estudante;
	}

	public function __set($name, $value)
	{
		$this->attribute[$name] = $value;
	}

	public function __get($name)
	{
		return $this->attribute[$name];
	}

	public function __isset($name)
	{
		return isset($this->atribute[$name]);
	}


	public function getById($id)
	{
		return $this->findUnit($id);
	}

	public function getAll()
	{
		$solicitations = [];
		$user = $this->attribute["user"];
		$types = ["Estudante", "Professor", "Tecnico"];

		foreach ($types as $type) {
			$user->setTableDB($type);
			$this->setTableDB($type);
			foreach ($this->findAll() as $solicitation) {
				//pegar todas as solicitações
				//separar cod_usuario de cada solicitação e colocar como elemento único num array em ordem alfabética
				//buscar o nome e o que mais representante de cod_usuario e insetir em solitações
				//
				$solicitations[$type] = $solicitation;
				$teste = $solicitations['Estudante']->cod_usuario;

			}
		}
		return true;
	}

	public function setAttributes($data){
		forEach ($data["dataSolicitation"] as $key => $value) {
			$this->attribute[$key] = $value;
		};
	}

	public function create()
	{
		$user = $this->attribute['user'];
		$typeUser = $user->tipo_usuario;
		$user->setTableDB($typeUser);
		$this->setTableDB($typeUser);
		unset($user->tipo_usuario);
		if (($typeUser == "Tecnico") || ($typeUser == "Professor")) {
			unset($user->curso);
			return $user->Insert($user->getAttribute()) && $this->Insert($this->attribute);
		}
		return $user->InsertEstudante($user->getAttribute()) && $this->Insert($this->attribute);
	}

	public function edit($id)
	{

//        return $stm->execute();
	}

	public function delete($id)
	{

//        return $stm->execute();
	}
}