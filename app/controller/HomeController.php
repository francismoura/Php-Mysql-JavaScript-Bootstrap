<?php

class HomeController
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
			$this->solicitation->getUser()->$key = $value;
		}
		return $this->solicitation->create();
	}


}