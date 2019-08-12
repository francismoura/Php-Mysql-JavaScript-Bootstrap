<?php

require_once '../dao/UserDao.php';

class User extends UserDao
{
	private $attribute = array();

	public function __construct($typeUser)
	{
		parent::__construct($typeUser);
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
}