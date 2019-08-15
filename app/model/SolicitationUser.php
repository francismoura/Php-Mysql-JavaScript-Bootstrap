<?php

require_once '../dao/SolicitationUserDao.php';
require_once "../app/model/Solicitation.php";

class SolicitationUser extends SolicitationUserDao
{
	private $attribute = array();

	public function __construct(User $typeUser)
	{
		$this->attribute['user'] = $typeUser;
		$this->setTableDB('Solicitacao' . $typeUser->getTableDB());
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
		$solicitation = new Solicitation();
		$this->attribute['num_solicitacao'] = $solicitation->create();
		$user = $this->attribute["user"];
		//verificar se já existe usuário
		if (!$this->FindUnit($user->cod_usuario)) {
			//inserir usuário e solicitação
			if ($user->getTableDB() == "Estudante") {
				return $user->InsertStudent($user->getAttribute()) && $this->Insert($this->attribute);
			}
			unset($user->curso);
			return $user->Insert($user->getAttribute()) && $this->Insert($this->attribute);
		}
		//inserir apenas a solicitação
		return $this->Insert($this->attribute);
	}

	public function getDataToTable()
	{
		$solicitation = array();
		$response = $this->FindAll();
		if ($response) {
			foreach ($response as $key => $value) {
				$solicitationUser = array();
				foreach ($value as $item => $data) {
					if ($item == 'cod_usuario') {
						$responseUser = $this->attribute['user']->FindName($data);
						$solicitationUser ['nome'] = $responseUser->nome;
					}
					$solicitationUser[$item] = $data;
				}
				$solicitation [$key] = $solicitationUser;
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