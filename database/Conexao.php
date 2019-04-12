<?php
include '../config/config.php';

class DB
{
    private static $pdo;

    private static function getInstance()
    {
        try {
            if (is_null(self::$pdo)) {
                self::$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_PERSISTENT, false);
                self::$pdo->exec('set names utf8');

                // self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return self::$pdo;
    }

    public static function prepare($sql)
    {
        return self::getInstance()->prepare($sql);
    }
}