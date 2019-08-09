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

	public function getName(){

		return $this->solicitation->getName();
	}

	public function getAll()
	{
		return $this->solicitation->getAll();
	}

	public function getById($data)
	{
		return $this->solicitation->getById($data);
	}

	public function edit($data)
	{
		return $this->solicitation->edit($data);
	}

	public function remove($id)
	{
		return $this->solicitation->remove($id);
	}

}