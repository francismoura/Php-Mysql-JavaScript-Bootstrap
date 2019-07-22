<?php

include_once('../dao/SolicitationDao.php');

class Solicitation extends SolicitationDao
{
    private $atributes = [];

    public function __construct()
    {
    }

    public function __set($atribute, $value)
    {
        $this->atributes[$atribute] = $value;
    }

    public function __get($atribute)
    {
        return $this->atributes[$atribute];
    }

    public function getAtributes()
    {
        return $this->atributes;
    }

    public function __isset($atribute)
    {
        return isset($this->atributes[$atribute]);
    }


    public function getById($id)
    {

        return $this->findUnit($id);
    }

    public function getAll()
    {
        return $this->findAll();
    }

    public function post($data)
    {
        return $this->insert($data);
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