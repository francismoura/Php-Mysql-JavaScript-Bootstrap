<?php

require_once '../database/Connection.php';
require_once 'DAO.php';
require_once '../app/model/Tecnico.php';


abstract class SolicitationDao implements DAO
{
	protected $tableDB;

	abstract public function __construct($typeUser);

	public function dbPrepare($sql)
	{
		return Connection::prepare($sql);
	}

	public function setTableDB($typeUser)
	{
		$this->tableDB = $typeUser;
	}

	public function findUnit($id)
	{
		$sql = "SELECT * FROM " . $this->tableDB . " WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindValue(':id', $id, PDO::PARAM_INT);
		$stm->execute();
		return $stm->fetch();
	}

	public function findAll()
	{
		$sql = "SELECT * FROM  $this->tableDB";
		$stm = $this->dbPrepare($sql);
		$stm->execute();
		$result = $stm->fetchAll(PDO::FETCH_OBJ);

		return $result;
	}

	public function insert($solicitation)
	{
		$sql = "INSERT INTO $this->tableDB (cod_usuario, servico, dataSolicitacao) 
				VALUES (:cod_usuario, :servico, :dataSolicitacao )";
		$stm = $this->dbPrepare($sql);
		$date = date("Y-m-d H:i:s", strtotime($solicitation['dataSolicitacao']));
		$stm->bindParam(':cod_usuario', $solicitation['user']->cod_usuario);
		$stm->bindParam(':servico', $solicitation['servico']);
		$stm->bindParam(':dataSolicitacao', $date);
		return $stm->execute();
	}

	public function update($id)
	{
		$sql = "UPDATE $this->tableDB SET nome = :nome WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		$stm->bindParam(':nome', $id);
		return $stm->execute();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM $this->tableDB WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		return $stm->execute();
	}

}