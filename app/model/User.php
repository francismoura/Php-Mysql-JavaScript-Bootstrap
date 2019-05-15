<?php

require_once('../dao/AlunoDao.php');

class User extends AlunoDao
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