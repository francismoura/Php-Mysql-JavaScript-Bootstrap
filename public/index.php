<?php

require_once('../model/Route.php');
require_once('../route/routes.php');

function __autoload($class_name)
{
    if (file_exists('../controller/' . $class_name . '.php')) {
        require_once '../controller/' . $class_name . '.php';
    } else if (file_exists('../core/' . $class_name . '.php')) {
        require_once '../core/'. $class_name . '.php';
    }
}

$app = new App();
$app->run();