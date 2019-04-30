<?php

require_once('../model/Crud.php');

class Admin extends Crud
{

    private $atributos = [];

    public function __construct()
    {

    }

    public function __set($atributo, $valor)
    {
        $this->atributos[$atributo] = $valor;
    }

    public function __get($atributo)
    {
        return $this->atributos[$atributo];
    }

    public function __isset($atributo)
    {
        return isset($this->atributos[$atributo]);
    }
}