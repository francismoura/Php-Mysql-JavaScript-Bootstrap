<?php

require_once '../database/Connection.php';
require_once 'DAO.php';

abstract class SolicitationDao implements DAO
{

	protected $tableDB =  "Solicitacao";

	abstract public function __construct();

	public function dbPrepare($sql)
	{
		return Connection::prepare($sql);
	}

	public function Insert($num_solicitation)
	{
		$sql = "INSERT INTO $this->tableDB (num_solicitacao) 
				VALUES (:num_solicitacao)";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':num_solicitacao', $num_solicitation, PDO::PARAM_INT);
		return $stm->execute();
	}

	public function FindUnit($num_solicitacao)
	{
		$sql = "SELECT * FROM " . $this->tableDB . " WHERE num_solicitacao = :num_solicitacao";
		$stm = $this->dbPrepare($sql);
		$stm->bindValue(':cod_usuario', $num_solicitacao, PDO::PARAM_INT);
		$stm->execute();
		return $stm->fetch();
	}

	public function FindAll()
	{
		$sql = "SELECT * FROM  $this->tableDB";
		$stm = $this->dbPrepare($sql);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function Delete($id)
	{
		// TODO: Implement Delete() method.
	}

	public function Update($id)
	{
		// TODO: Implement Update() method.
	}
}