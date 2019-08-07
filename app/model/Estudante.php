<?php

require_once '../dao/UserDao.php';

class Estudante extends UserDao
{
	const TYPEUSER = "Estudante";
	private $attribute = array();

	public function __construct()
	{
		$this->setTableDB(self::TYPEUSER);
	}

	/**
	 * @return array
	 */
	public function getAttribute(): array
	{
		return $this->attribute;
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