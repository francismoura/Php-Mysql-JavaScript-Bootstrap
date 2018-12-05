<?php
/**
 * Created by PhpStorm.
 * User: sabrina
 * Date: 03/12/18
 * Time: 14:19
 */

class DB
{

    public function getInstance()
    {

        try {
            $instance = new PDO("mysql:host=localhost;dbname=cadastro", "root", "O08O08==vida;");
            $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $instance;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function prepare($sql)
    {
        return $this->getInstance()->prepare($sql);
    }
}
