<?php

require_once('model/Route.php');
require_once('route/routes.php');

function __autoload($class_name)
{
    // Define uma matriz de diretórios prioritários para iterar.
    $dirs = array(
        'controller/',
        'core/'
    );

    foreach ($dirs as $dir) {
        if (file_exists($dir . $class_name . '.php')) {
            require_once $dir . $class_name . '.php';
        }
    }

}

$app = new App();
$app->run();
//iniciar sessão aqui
