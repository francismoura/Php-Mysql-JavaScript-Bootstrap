<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once ($root . '/model/CrudUser.php');

class User extends CrudUser {

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