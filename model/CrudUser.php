<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once ($root . '/database/Connection.php');
require_once ($root . '/model/User.php');

abstract class CrudUser extends DB
{

    protected $tabela = 'Usuario';

//    protected function dbPrepare($sql)
//    {
//        $db = new DB();
//        return $this->prepare($sql);
//    }

    /**
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

    /**
     *
     * @return array com dados de todos os usuários
     */
    public function findAll()
    {
        $sql = "SELECT * FROM  $this->tabela";
        $stm = self::prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * Salvar o contato
     * @return boolean
     */
    public function insert($user)
    {

        var_dump($user->atributos);
        $colunas = $this->preparar($user);
        if (!isset($user->nome)) {
            $query = "INSERT INTO $this->tabela (".
                implode(', ', array_keys($colunas)).
                ") VALUES (".
                implode(', ', array_values($colunas)).");";
        } else {
            foreach ($colunas as $key => $value) {
                if ($key !== 'nome') {
                    $definir[] = "{$key}={$value}";
                }
            }
            $query = "UPDATE $this->tabela SET ".implode(', ', $definir)." WHERE nome = :nome";
        }
        if (self::getInstance()) {
            $stmt = self::prepare($query);
             return $stmt->execute();
        }
        return false;
    }

    private function escapar($dados)
    {
        if (is_string($dados) & !empty($dados)) {
            return "'".addslashes($dados)."'";
        } elseif (is_bool($dados)) {
            return $dados ? 'TRUE' : 'FALSE';
        } elseif ($dados !== '') {
            return $dados;
        } else {
            return 'NULL';
        }
    }
    /**
     * Verifica se dados são próprios para ser salvos
     * @param array $dados
     * @return array
     */
    private function preparar($dados)
    {
        $resultado = array();
        foreach ($dados as $k => $v) {
            if (is_scalar($v)) {
                $resultado[$k] = $this->escapar($v);
            }
        }
        return $resultado;
    }

    /**
     * @param [integer] $id
     * @return bool
     */
    public function update($id)
    {
        $sql = "UPDATE $this->tabela SET nome = :nome WHERE id = :id";
        $stm = $this->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':nome', $id);
        return $stm->execute();
    }

    /**
     * @param [integer] $id
     * @return bool
     */
    public function delete($id)
    {
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stm = $this->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }

}