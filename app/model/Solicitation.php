<?php

include_once('../dao/SolicitationDao.php');

class Solicitation extends SolicitationDao
{
    private $attribute = [];


    public function __construct()
	{
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
        return $this->findAll();
    }

    public function post()
    {
    	$user = $this->attribute['user'];

        return ($this->insert($this->attribute && $user->insert()));
    }

    public function edit($id)
    {

//        return $stm->execute();
    }

    public function delete($id)
    {

//        return $stm->execute();
    }


}