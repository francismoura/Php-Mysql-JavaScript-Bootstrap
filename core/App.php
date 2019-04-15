<?php

class App
{
    public function getRoute()
    {
        global $Routes;
        $uri = $_SERVER['REQUEST_URI'];

        echo '<pre>';
        echo "URI: " . $uri;
        echo "</br>";
        echo "</br>";
        echo "</br>";
        var_dump($Routes);
        echo '</pre>';

        foreach ($Routes as $value){
            echo '<pre>';
            echo "value: ".$value;
            echo '</pre>';

        }

        // Checa se a route é uma $Routes
        if (!in_array($uri, $Routes)) {
            die('Invalid route.');
        }

        return $uri;
    }

    /*
     * O método run() é o primeiro método a ser executado.
     * run() obtém a rota atual e chega sua validade.
     * Se a rota é inválida, não processa mais.
    */
    public function run()
    {
        // Should be capturing the output of this method. We will at some point.
        $this->getRoute();
    }
}