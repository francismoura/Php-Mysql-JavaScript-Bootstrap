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

    /*
     * O método run() é o primeiro método a ser executado.
     * run() obtém a rota atual e checa sua validade.
     * Se a rota é inválida, não processa mais.
    */
    public function run()
    {
        $this->getRoute();
    }
}