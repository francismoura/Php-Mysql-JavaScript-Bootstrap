<?php

require_once '../dao/AlunoDao.php';

class Aluno extends AlunoDao
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

    public function getAtributes(){
        return $this->atributos;
    }

    public function __isset($atributo)
    {
        return isset($this->atributos[$atributo]);
    }

    public function getById($id)
    {
        return $this->FindUnit($id);
    }

    public function getAll()
    {
        return $this->FindAll();
    }

    public function post($dataAluno)
    {
        return $this->Insert($dataAluno);
    }

    public function edit($id)
    {
        return $this->Update($id);
    }

    public function remove($id)
    {
        return $this->Delete($id);
    }

}