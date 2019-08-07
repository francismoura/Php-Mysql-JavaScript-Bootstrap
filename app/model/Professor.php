<?php

include_once '../dao/UserDao.php';
require_once '../app/model/Professor.php';

class Professor extends UserDao
{
	const TYPEUSER = "Professor";
	private $attribute = array();

	public function __construct()
	{
		$this->setTableDB(self::TYPEUSER);

	}

	public function __set($nameAttr, $value)
	{
		$this->attribute[$nameAttr] = $value;
	}

	public function __get($nameAttr)
	{
		return $this->attribute[$nameAttr];
	}

	public function __isset($attribute)
	{
		return isset($this->attributes[$attribute]);
	}

	public function __unset($nameAttr)
	{
		unset($this->attribute[$nameAttr]);
	}

	public function getById($id)
	{
		return $this->FindUnit($id);
	}

}