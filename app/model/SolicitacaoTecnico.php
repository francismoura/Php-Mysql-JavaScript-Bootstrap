<?php

include_once '../dao/SolicitationDao.php';
require_once '../app/model/Tecnico.php';

class SolicitacaoTecnico extends SolicitationDao
{
	const TYPEUSER = "SolicitacaoTecnico";
	private $user = array();
	private $attribute = array();

	public function __construct($typeUser)
	{
		$this->user = $typeUser();
	}

	public function __set($name, $value)
	{
		$this->attribute[$name] = $value;
	}

	public function __get($name)
	{
		return $this->attribute[$name];
	}

	public function __isset($name)
	{
		return isset($this->atribute[$name]);
	}


	public function getById($id)
	{
		return $this->findUnit($id);
	}

	public function getAll()
	{
		$this->setTable();
		return $this->findAll();
	}

	public function setAttributes($data)
	{
		forEach ($data["dataSolicitation"] as $key => $value) {
			$this->attribute[$key] = $value;
		};
	}

	public function create()
	{
		$this->setTable();
		return $this->user->Insert($this->user->getAttribute()) && $this->Insert($this->attribute);
	}

	public function edit($id)
	{

//        return $stm->execute();
	}

	public function delete($id)
	{

//        return $stm->execute();
	}

	private function setTable()
	{
		$this->user->setTableDB(self::TYPEUSER);
		$this->setTableDB(self::TYPEUSER);
	}

}