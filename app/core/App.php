<?php

class App
{
    public function getRoute()
    {
        global $Routes;
        $uri = $_SERVER['REQUEST_URI'];
        // Checa se a route é uma $Routes "cadastrada"
        if (!in_array($uri, $Routes)) {
            die('Invalid route.');
        }
        return $uri;
    }

    public function run()
    {
        $this->getRoute();
    }
}