<?php

include 'Conexao.php';

abstract class CrudUser extends DB {

	public $nome;

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
		var_dump($nome);
		$this->nome = $nome;
	}

}