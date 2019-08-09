<?php

include_once '../dao/SolicitationDao.php';
require_once '../app/model/Estudante.php';

class SolicitacaoEstudante extends SolicitationDao
{
	const TYPEUSER = "SolicitacaoEstudante";
	private $attribute = array();

	public function __construct($estudante)
	{
		parent::__construct($estudante);
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
		$user = $this->user;
		$reponse = $this->FindUnit($user->cod_usuario);
		if (empty($reponse)) {
			return ($user->InsertStudent($user->getAttribute()) && $this->Insert($this->attribute));
		}
		return $this->Insert($this->attribute);
	}

	public function getName()
	{
		$users = array();
		$this->FindAll();

		foreach ($this->attribute as $solicitation) {
			$codUsuario = $solicitation->cod_usuario;
			$users[] = $this->user->FindName($codUsuario);
		}
		return $users;
	}

	public function getById($id)
	{
		return $this->findUnit($id);
	}

	public function getAll()
	{
		$solicitation = array();
		$response = $this->FindAll();
		if (empty($response)) {
			return $this->attribute;
		} else {
			foreach ($response as $key => $value) {
				foreach ((object)$value as $k => $v) {
					$this->attribute[$k] = $v;
				}
				$solicitation [] = $this->attribute;
			}
			return $solicitation;
		}
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