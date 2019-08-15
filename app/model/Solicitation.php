<?php

require_once '../dao/SolicitationDao.php';

class Solicitation extends SolicitationDao
{

	public function __construct()
	{
	}

	public function create()
	{
		$allSolicitations = 0;
		$solicitations = $this->FindAll();
		if (count($solicitations) > 0) {
			$allSolicitations = sizeof($solicitations);
		}
		return $this->Insert($allSolicitations + 1);
	}

}