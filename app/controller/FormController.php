<?php

require_once '../app/core/ModelFactory.php';

class FormController
{
	private $user;//Dados do usuário
	private $solicitation;

	public function __construct()
	{
		try {
			$factory = new ModelFactory();
			$this->user = $factory->build('user');
			$this->solicitation = $factory->build('solicitation');
		} catch (Exception $e) {
			var_dump($e->getMessage());
		}
	}

	public function getById(int $num)
	{
	}

	public function getAllSolicitation()
	{
		return $this->user->getAll();
	}

	public function insert($data)
	{
		forEach ($data as $key => $value) {
			switch ($key) {
				case "inputService":
					$this->solicitation["inputService"] = $value;
					break;
				default:
					$this->user[$key]  = $value;
					break;
			}
		};
		$this->solicitation['user'] = $this->user;
		return ($this->user->post() && $this->solicitation->post());
	}

	/**
	 * @return Solicitation
	 */
	public function getSolicitationData(): Solicitation
	{
		return $this->solicitation;
	}//Dados referente a solicitação

	/**
	 * @return User
	 */
	public function getUserData(): User
	{
		return $this->user;
	}

}