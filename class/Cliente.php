<?php
/**
 * Created by PhpStorm.
 * User: sabrina
 * Date: 04/12/18
 * Time: 19:06
 */

require_once '../class/DB.php';
require_once '../class/CrudUser.php';

class Cliente extends CrudUser {

    protected $tabela = 'Cliente';

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
        $sql = "INSERT INTO $this->tabela (cod_cliente, nome) VALUES (:cod_cliente, :nome)";
        $stm = new DB();
        $stm = $stm->prepare($sql);
        $stm->bindValue(':cod_cliente', $this->cod_cliente);
        $stm->bindValue(':nome', $this->nome);
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