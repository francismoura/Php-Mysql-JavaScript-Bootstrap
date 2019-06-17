<?php

require_once '../app/core/Controller.php';
require_once '../app/core/ModelFactory.php';

class FormController extends Controller
{
    private $userData;//Dados do usuário
    private $solicitationData;//Dados referente a solicitação

    public function __construct()
    {
        $factory = new ModelFactory();
        $this->solicitationData = $factory->createSolicitationAluno();
        $this->userData = $factory->createAluno();
    }

    public function getById(int $num)
    {
    }

    public function getAllSolicitation()
    {
        return $this->solicitationData->findAll();
    }

    public function newSolicitation($data)
    {
        $userData = $this->userData;
        $solicitationData = $this->solicitationData;

        foreach ($data['dataUser'] as $key => $value) {
            $userData->$key = $value;
        }

        foreach ($data['dataSolicitation'] as $key => $value) {
            $solicitationData->$key = $value;
        }

        return ($this->userData->post($userData->getAtributes())
            && $this->solicitationData->post($solicitationData->getAtributes()));
    }

    /**
     * @return Aluno
     */
    public function getUserData(): Aluno
    {
        return $this->userData;
    }

}