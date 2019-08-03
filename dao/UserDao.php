<?php

require_once '../database/Connection.php';
require_once '../app/model/User.php';
require_once 'DAO.php';

abstract class UserDao implements DAO
{
	protected $tableDB = 'Aluno';

	abstract function __construct();

	public function dbPrepare($sql)
	{
		return Connection::prepare($sql);
	}

	public function FindUnit($id)
	{
		$sql = "SELECT * FROM " . $this->tableDB . " WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		$stm->execute();
		return $stm->fetch();
	}

	public function FindAll()
	{
		$sql = "SELECT * FROM  $this->tableDB";
		$stm = $this->dbPrepare($sql);
		$stm->execute();
		$result = $stm->fetchAll(PDO::FETCH_OBJ);

		return $result;
	}

	public function Insert($user)
	{
		$sql = "INSERT INTO 
				$this->tableDB (cod_user, nome, email, celular, rua, num, bairro, cidade, cep, estado, setor, curso) 
				VALUES (:insertCodeUser, :insertEmail, :insertName, :insert )";
		$stm = $this->dbPrepare($sql);

		foreach ($user as $data => &$value) {
			$stm->bindParam($data, $value);
		}

		return $stm->execute();
	}

	public function Update($id)
	{
		$sql = "UPDATE $this->tableDB SET nome = :nome WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		$stm->bindParam(':nome', $id);
		return $stm->execute();
	}

	public function Delete($id)
	{
		$sql = "DELETE FROM $this->tableDB WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		return $stm->execute();
	}

}