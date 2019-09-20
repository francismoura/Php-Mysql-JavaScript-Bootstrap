<?php

class HomeController
{
	private $solicitationUser;

	public function __construct($solicitationUser)
	{
		$this->solicitationUser = $solicitationUser;
	}

	public function create($data)
	{
		foreach ($data['dataSolicitation'] as $key => $value) {
			$this->solicitationUser->$key = $value;
		};
		foreach ($data['dataUser'] as $key => $value) {
			$this->solicitationUser->user->$key = $value;
		}
		return $this->solicitationUser->create();
	}


}