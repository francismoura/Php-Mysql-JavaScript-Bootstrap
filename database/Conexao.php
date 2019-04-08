<?php
include 'config.php';

class DB {
    private static $conexao;

	public static function getInstance() {
		try {
            if (is_null(self::$conexao)) {
                self::$conexao = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
//                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                self::$conexao->setAttribute(PDO::ATTR_PERSISTENT, false);
//                self::$conexao->exec('set names utf8');

                // self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return self::$conexao;
	}

	public static function prepare($sql) {
		return self::getInstance()->prepare($sql);
	}
}

?>