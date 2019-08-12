<?php

include_once '../dao/SolicitationDao.php';
require_once '../app/model/Professor.php';

class SolicitacaoProfessor extends SolicitationDao
{
	const TYPEUSER = "SolicitacaoProfessor";
	private $attribute = array();
	private $user;

	public function __construct($professor)
	{
		$this->user = $professor;
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
		$solicitation = array();
		$response = $this->FindAll();
		if (empty($response)) {
			//retorna um usuário vazio
			return $this->attribute;
		} else {
			//retorna todos os usuario encontrados
			foreach ($response as $key) {
				foreach ((object)$key as $item => $value) {
					if ($item == 'cod_usuario') {
						$this->user->nome = $this->user->FindName($value);
					}
					$this->$item = $value;
				}
				unset($this->tableDB);
				unset($this->user->tableDB);
				$solicitation [] = $this;
			}
		}
		return $solicitation;
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