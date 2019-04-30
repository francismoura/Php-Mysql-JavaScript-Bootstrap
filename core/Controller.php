<?php

class Controller
{
    public static function createView($viewName)
    {
        if (Route::isRouteValid()) {
            // Create the view and the view controller.

            $dirs = array(
                '../view/' . $viewName . '/',
                '../view/admin/',
                '../view/user/',
                '../view/error/'
            );

            foreach ($dirs as $dir) {
                if (file_exists($dir . $viewName . '.php')) {
                    require_once $dir . $viewName . '.php';
                    break;
                }
            }
        }
    }

}