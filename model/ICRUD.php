<?php

interface ICRUD
{

    public function Insert($data);

    public function FindUnit($id);

    public function FindAll();

    public function Update($id);

    public function Delete($id);
}
