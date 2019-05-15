<?php

require_once '../app/core/Controller.php';
require_once '../app/core/ModelFactory.php';

class FormController extends Controller
{
    protected $userData;//Dados do usuário
    protected $solicitationData;//Dados referente a solicitação

    public function __construct()
    {
        $modelBase = new ModelFactory();
        $this->solicitationData = $modelBase->createSolicitationAluno();
        $this->userData = $modelBase->createAluno();
    }

    public function getById(int $num){
    }

    public function getAllSolicitation()
    {
        return $this->solicitationData->FindAll();
    }

    public function newSolicitation($data)
    {
        $userData = $this->userData;
        $solicitationData = $this->solicitationData;

        foreach ($data['dataUser'] as $key => $value) {
            $userData->$key = $value;
        }

        foreach ($data['dataSolicitation'] as $key => $value){
            $solicitationData->$key = $value;
        }

        return ($this->userData->post($userData->getAtributes())
            && $this->solicitationData->post($solicitationData->getAtributes()));
    }

}