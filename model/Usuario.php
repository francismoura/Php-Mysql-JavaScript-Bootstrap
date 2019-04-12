<?php
require_once ('../model/CrudUser.php');

class Usuario extends CrudUser {

	public $nome;

    public function __construct()
    {

    }

    /**
	 * @return mixed
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @param mixed $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}

}