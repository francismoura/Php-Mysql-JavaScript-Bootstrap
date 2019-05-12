<?php

require_once('../app/core/Controller.php');
require_once('../app/model/BaseModel.php');
require_once '../app/core/SolicitationFactory.php';

class FormController extends Controller
{
    protected $basemodel;

    public function __construct()
    {
        $parser = new SolicitationFactory();
        $this->basemodel= $parser->createBaseModel();
    }

    public function getAllSolicitation()
    {
        return $this->basemodel->FindAll();
    }
}