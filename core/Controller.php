<?php

class Controller
{
    public static $flag;

    public static function createView($viewName)
    {
        if (Route::isRouteValid()) {
            // Create the view and the view controller.
            if (file_exists('../view/' . $viewName . '.php')) {
                require_once('../view/' . $viewName . '.php');
            } else if (file_exists('../view/includes'.$viewName.'.php')){
                require_once ('../view/includes'.$viewName.'.php');
            } else {
                require_once('../public/index.php');
            }

            self::setFlag(1);
        }
        return self::$flag;
    }

    public static function setFlag($valor)
    {
        if (is_numeric($valor)) {
            self::$flag = $valor;
        }
    }
}