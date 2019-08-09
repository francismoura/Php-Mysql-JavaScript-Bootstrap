<?php

include_once '../dao/SolicitationDao.php';
require_once '../app/model/Tecnico.php';

class SolicitacaoTecnico extends SolicitationDao
{
	const TYPEUSER = "SolicitacaoTecnico";
	private $attribute = array();

	public function __construct($tecnico)
	{
		parent::__construct($tecnico);
		$this->attribute['user'] = $tecnico;
		$this->setTableDB(self::TYPEUSER);
	}

	public function getAttribute(): array
	{
		return $this->attribute;
	}

	public function __set($name, $value)
	{
		$this->attribute[$name] = $value;
	}

	public function __get($name)
	{
		return $this->attribute[$name];
	}

	public function create()
	{
		$user = $this->attribute['user'];
		unset($user->curso);
		return $user->Insert($user->getAttribute()) && $this->Insert($this->attribute);
	}

	public function getName(){
		$users = array();
		$user = $this->attribute['user'];
		foreach ($this->FindAll() as $solicitation) {
			$codUsuario = $solicitation->cod_usuario;
			$users[] = $user->getName($codUsuario);
		}
		return $users ;
	}

	public function getAll()
	{
		$this->FindAll();
		return $this->attribute;
	}
	public function getById($id)
	{
		return $this->FindUnit($id);
	}

	public function remove($id)
	{
        return $this->Delete($id);
	}

	public function edit($id)
	{
		return $this->Update($id);
	}


}