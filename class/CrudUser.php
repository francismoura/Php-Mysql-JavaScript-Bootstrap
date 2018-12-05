<?php
/**
 * Created by PhpStorm.
 * User: sabrina
 * Date: 04/12/18
 * Time: 09:59
 */


require_once 'DB.php';

abstract class CrudUser extends DB{

    public $cod_cliente;
    public $nome;

    /**
     * @return mixed
     */
    public function getCodCliente()
    {
        return $this->cod_cliente;
    }

    /**
     * @param mixed $cod_cliente
     */
    public function setCodCliente($cod_cliente)
    {
        $this->cod_cliente = $cod_cliente;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


}