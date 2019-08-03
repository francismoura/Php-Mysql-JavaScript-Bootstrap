<?php

require_once '../dao/UserDao.php';
require_once 'Solicitation.php';

class User extends UserDao
{

	private $attribute = [];

	public function __construct()
	{
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

	public function getById($id)
	{
		return $this->FindUnit($id);
	}

	public function getAll()
	{
		$data = $this->FindAll();
		$userData = new User();

		foreach ($data['dataUser'] as $key => $value) {
			$userData->$key = $value;
		}
	}

	public function post()
	{
		return $this->Insert($this->attribute);
	}

	public function edit($id)
	{
		return $this->Update($id);
	}

	public function remove($id)
	{
		return $this->Delete($id);
	}

	public function getUsers()
	{
		return $this->attribute;
	}

	//        $this->attributes['name'] = [
//            'type' => 'string',
//            'validate' => 'required',
//            'size' => '50',
//        ];
//        $this->attributes['telephone'] = [
//            'type' => 'string',
//            'size' => '15',
//        ];
//        $this->attributes['address'] = [
//            'type' => 'string',
//            'size' => '250',
//        ];


}