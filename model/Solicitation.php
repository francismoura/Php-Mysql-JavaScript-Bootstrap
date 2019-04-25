<?php


class Solicitation
{
    private $data_solicitation = [];


    public function __construct()
    {

    }

    public function __set($name, $value)
    {
        $this->data_solicitation[$name] = $value;
        // TODO: Implement __set() method.
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
    }


    public function __isset($name)
    {
        // TODO: Implement __isset() method.
    }


}