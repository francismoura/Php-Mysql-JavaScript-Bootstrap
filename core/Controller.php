<?php

class Controller
{
    public static function createView($viewName)
    {
        if (Route::isRouteValid()) {
            // Create the view and the view controller.

            $dirs = array(
                '../view/',
                '../view/' . $viewName . '/'
            );

            foreach ($dirs as $dir) {
                if (file_exists($dir . $viewName . '.php')) {
                    require_once $dir . $viewName . '.php';
                }
            }
        }
    }

}