<?php

require_once '../database/Connection.php';
require_once '../app/model/Aluno.php';
require_once 'DAO.php';

abstract class AlunoDao implements DAO
{
    protected $tableDB = 'Aluno';

    abstract function __construct();

    public function dbPrepare($sql)
    {
        return Connection::prepare($sql);
    }

    public function findUnit($id)
    {
        $sql = "SELECT * FROM " . $this->tableDB . " WHERE id = :id";
        $stm = $this->dbPrepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
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

    public function insert($user)
    {
        $sql = "INSERT INTO $this->tableDB (cod_aluno, nome) VALUES (:cod_aluno, :nome)";
        $stm = $this->dbPrepare($sql);

        foreach ($user as $data => &$value) {
            $stm->bindParam($data, $value);
        }

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