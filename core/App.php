<?php

class App
{
    public function getRoute()
    {
        global $Routes;
        $uri = $_SERVER['REQUEST_URI'];

        // Checa se a route é uma $Routes
        if (!in_array($uri, $Routes)) {
            die('Invalid route.');
        }

        return $uri;
    }

    /*
     * O método run() é o primeiro método a ser executado.
     * run() obtém a rota atual e chega sua validade.
     * Se a rota invalida, o assets não processa mais.
    */
    public function run()
    {
        // Should be capturing the output of this method. We will at some point.
        $this->getRoute();
    }
}