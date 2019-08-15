<?php

class AdminController
{
	private $solicitation;

	public function __construct($typeUser)
	{
		$this->solicitation = $typeUser;
	}

	public function getDataToTable()
	{
		return $this->solicitation->getDataToTable();
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
