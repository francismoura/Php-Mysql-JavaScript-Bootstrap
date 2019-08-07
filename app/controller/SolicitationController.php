<?php

class SolicitationController
{
	private $solicitation;

	public function __construct($solicitation)
	{
		$this->solicitation = $solicitation;
	}


	public function create($data)
	{
		foreach ($data['dataSolicitation'] as $key => $value) {
			$this->solicitation->$key = $value;
		};

		foreach ($data['dataUser'] as $key => $value) {
			$this->solicitation->user->$key = $value;
		}

		return $this->solicitation->create();
	}

	public function getAll()
	{
		return $this->solicitation->getAll();;
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