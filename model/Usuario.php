<?php

require_once '../conexao/Conexao.php';
require_once 'CrudUser.php';

class Usuario extends CrudUser {

	protected $tabela = 'Usuario';

	/**
	 * Find unique User ID
	 * @param  [integer] $id
	 * @return [Usuario]
	 */
	public function findUnit($id) {
		$sql = "SELECT * FROM $this->tabela WHERE id = :id";
		$db = new DB();
		$stm = $db->prepare($sql);
		$stm->bindValue(':id', $id, PDO::PARAM_INT);
		$stm->execute();
		return $stm->fetch();
	}

	public function findAll() {
		$sql = "SELECT * FROM  $this->tabela";
		$stm = new DB();
		$stm = $stm->prepare($sql);
		$stm->execute();
		return $stm->fetchAll();
	}

	public function insert() {
		$sql = "INSERT INTO $this->tabela (name) VALUES (:name)";
		$stm = new DB();
		$stm = $stm->prepare($sql);
		$stm->bindValue(':name', $this->nome);
		return $stm->execute();
	}

	public function update($id) {
		$sql = "UPDATE $this->tabela SET cod_cliente = :cod_cliente, nome = :nome WHERE id = :id";
		$db = new DB();
		$stm = $db->prepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		$stm->bindParam(':cod_cliente', $this->cod_cliente);
		$stm->bindParam(':nome', $this->nome);
		return $stm->execute();
	}

	public function delete($id) {
		$sql = "DELETE FROM $this->tabela WHERE id = :id";
		$db = new DB();
		$stm = $db->prepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		return $stm->execute();
	}

}