<?php

require_once('../model/Route.php');
require_once('../route/routes.php');

spl_autoload_register(function ($class_name) {
    $dirs = ['../controller/', '../core/'];
    foreach ($dirs as $dir) {
        if (file_exists($dir . $class_name . '.php')) {
            require_once  "$dir" . $class_name . '.php';
        }
    }
});

$app = new App();
$app->run();
//iniciar sessão aqui
