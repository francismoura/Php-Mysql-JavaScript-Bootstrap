<?php

class SolicitationController
{
	private $solicitation;

	public function __construct($solicitation)
	{
		$this->solicitation = $solicitation;

	}

	public function post($data)
	{
		//cria uma solicitação com seu respectivo usuário
		switch ($data["action"]) {
			case "create":
				$response = $this->solicitation->create($data);
				echo $response;
				break;
			case "findUnit":
				echo $this->solicitation->findUnit($data);
				//fazer algo
				break;
			case "update":
				echo $this->solicitation->update($data);
				//fazer algo
				break;
			case "delete":
				echo $this->solicitation->delete($data);
				//fazer algo
				break;
		}
	}

	private function create($data)
	{
		$this->solicitation->setAttributes($data);
		return ($this->solicitation->post());
	}

	public function getAll()
	{
		$this->solicitation->user = $this->user;
		$solicitations = $this->solicitation->getAll();
		return true;
	}

	public function findUnit($data)
	{
		return $this->user->findUnit($data);
	}

	public function update($data)
	{
		return $this->solicitation->edit($data);
	}

	public function delete($data)
	{
		return true;
	}

}