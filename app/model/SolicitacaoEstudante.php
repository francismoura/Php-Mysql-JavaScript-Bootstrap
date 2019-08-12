<?php

include_once '../dao/SolicitationDao.php';
require_once '../app/model/Estudante.php';

class SolicitacaoEstudante extends SolicitationDao
{
	const TYPEUSER = "SolicitacaoEstudante";
	private $attribute = array();
	private $user;

	public function __construct($estudante)
	{
		$this->user = $estudante;
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
		//verificar se já existe usuário
		if (empty($this->FindUnit($this->user->cod_usuario))) {
			//inserir usuário e solicitação
			return ($this->user->InsertStudent($this->user->getAttribute()) && $this->Insert($this->attribute));
		}
		//inserir apenas a solicitação
		return $this->Insert($this->attribute);
	}

	public function getAll()
	{
		$solicitation = array();
		$sol = array();
		$response = $this->FindAll();
		if (empty($response)) {
			//retorna um usuário vazio
			return $this->attribute;
		} else {
			//retorna todos os usuario encontrados
			foreach ($response as $key) {
				foreach ((object)$key as $item => $value) {
					if ($item == 'cod_usuario') {
						$response = $this->user->FindName($value);
						$sol['nome'] = $response->nome;
					}
					$sol[$item] = $value;
				}
				$solicitation [] = $sol;
			}
		}
		return $solicitation;
	}

	public function getName()
	{
		$users = array();
		$this->FindAll();
		foreach ($this->attribute as $solicitation) {
			$codUsuario = $solicitation->cod_usuario;
			$this->user = $this->user->FindName($codUsuario);
		}
		return $users;
	}

	public function getById($id)
	{
		return $this->findUnit($id);
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