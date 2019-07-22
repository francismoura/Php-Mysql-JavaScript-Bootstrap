<?php

include_once('../config/config.php');

class Connection
{
    private static $pdo;

    private static function getInstance()
    {
        try {
            if (is_null(self::$pdo)) {
                self::$pdo = new PDO(
                    'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
                    DB_USER,
                    DB_PASS);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_PERSISTENT, true);
                self::$pdo->exec('set names utf8');
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return self::$pdo;
    }

    //prepara o sql e devolve uma instância com status da conexão
    public static function prepare($sql)
    {
        return self::getInstance()->prepare($sql);
    }
}