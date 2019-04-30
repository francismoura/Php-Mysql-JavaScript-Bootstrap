<?php

require_once('../database/DB.php');
require_once 'ICRUD.php';

abstract class Crud implements ICRUD
{

    protected $tableDB = 'Usuario';

    abstract function __construct();

    public function dbPrepare($sql)
    {
        return DB::prepare($sql);
    }

    /**
     * @param  [integer] $id
     * @return mixed []
     */
    public function FindUnit($id)
    {
        $sql = "SELECT * FROM $this->tableDB WHERE id = :id";
        $stm = $this->dbPrepare($sql);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }

    /**
     * @return array
     */
    public function FindAll()
    {
//      $result  = array();
        $sql = "SELECT * FROM  $this->tableDB";
        $stm = $this->dbPrepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * Salvar o contato
     * @param $nome
     * @return boolean
     */
    public function Insert($nome)
    {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $sql = "INSERT INTO $this->tableDB (nome) VALUES (:nome)";
        $stm = $this->dbPrepare($sql);
        $stm->bindValue(':nome', $nome);
        return $stm->execute();
    }

    /**
     * @param [integer] $id
     * @return bool
     */
    public function Update($id)
    {
        $sql = "UPDATE $this->tableDB SET nome = :nome WHERE id = :id";
        $stm = $this->dbPrepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':nome', $id);
        return $stm->execute();
    }

    /**
     * @param [integer] $id
     * @return bool
     */
    public function Delete($id)
    {
        $sql = "DELETE FROM $this->tableDB WHERE id = :id";
        $stm = $this->dbPrepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }

}