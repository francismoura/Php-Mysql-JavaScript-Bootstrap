<?php

require_once '../conexao/Conexao.php';
require_once 'CrudUser.php';

class Usuario extends CrudUser {

	protected $tabela = 'Usuario';

	protected function dbPrepare($sql) {
		$db = new DB();
		return $db->prepare($sql);
	}

	/**
	 * Find unique User ID
	 * @param  [integer] $id
	 * @return [Usuario]
	 */
	public function findUnit($id) {
		$sql = "SELECT * FROM $this->tabela WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindValue(':id', $id, PDO::PARAM_INT);
		$stm->execute();
		return $stm->fetch();
	}

	public function findAll() {
		$sql = "SELECT * FROM  $this->tabela";
		$stm = $this->dbPrepare($sql);
		$stm->execute();
		return $stm->fetchAll();
	}

	public function insert($nome) {
		$sql = "INSERT INTO $this->tabela (nome) VALUES (:nome)";
		$stm = $this->dbPrepare($sql);
		$stm->bindValue(':nome', $this->nome);
		return $stm->execute();
	}

	public function update($id) {
		$sql = "UPDATE $this->tabela SET nome = :nome WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		$stm->bindParam(':nome', $this->nome);
		return $stm->execute();
	}

	public function delete($id) {
		$sql = "DELETE FROM $this->tabela WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		return $stm->execute();
	}

}