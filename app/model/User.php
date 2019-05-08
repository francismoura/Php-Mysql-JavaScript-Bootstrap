<?php

require_once('../dao/BaseDao.php');

class User extends BaseDao
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