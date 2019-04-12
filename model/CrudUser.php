<?php

include '../database/Conexao.php';

abstract class CrudUser extends DB
{

    protected $tabela = 'Usuario';

    protected function dbPrepare($sql)
    {
        $db = new DB();
        return $db->prepare($sql);
    }

    /**
     * Find unique User ID
     * @param  [integer] $id
     * @return mixed []
     */
    public function findUnit($id)
    {
        $sql = "SELECT * FROM $this->tabela WHERE id = :id";
        $stm = $this->prepare($sql);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM  $this->tabela";
        $stm = $this->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $result;
    }

    public function insert($nome)
    {
        $sql = "INSERT INTO $this->tabela (nome) VALUES (:nome)";
        $stm = $this->dbPrepare($sql);
        $stm->bindValue(':nome', $nome);
        return $stm->execute();
    }

    public function update($id)
    {
        $sql = "UPDATE $this->tabela SET nome = :nome WHERE id = :id";
        $stm = $this->dbPrepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':nome', $id);
        return $stm->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stm = $this->dbPrepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }

}