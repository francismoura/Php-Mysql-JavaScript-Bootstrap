<?php
/**
 * Definições para conexão PDO database
 */
define('DB_NAME', 'cadastro');
define('DB_HOST', 'localhost');
define('DB_PASS', 'O08O08==vida;');
define('DB_USER', 'root');

/**
 * Definições para mapeamento de Rotas
 */
define('PROTOCOL_URL', 'http://');
define('BASE_VIEW', '/projeto/view/');
define('BASE_PATH', '/projeto/public/');
define('URL_ROOT', PROTOCOL_URL . $_SERVER['HTTP_HOST'] . BASE_PATH);
define('PATH_ROOT', $_SERVER['DOCUMENT_ROOT'] . BASE_PATH);


