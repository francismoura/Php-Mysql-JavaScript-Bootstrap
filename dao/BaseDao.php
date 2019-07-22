<?php

require_once('../database/Connection.php');
require_once ('DAO.php');

abstract class BaseDao implements DAO
{

    protected $tableDB = 'Usuario';

    abstract public function __construct();

    public function dbPrepare($sql)
    {
        return Connection::prepare($sql);
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

    public function insert($nome)
    {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $sql = "INSERT INTO $this->tableDB (nome) VALUES (:nome)";
        $stm = $this->dbPrepare($sql);
        $stm->bindValue(':nome', $nome);
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