<?php

require_once '../app/core/Controller.php';
require_once '../app/core/ModelFactory.php';

class FormController extends Controller
{
    private $userData;//Dados do usuário
    private $solicitationData;

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

    public function newSolicitation(array $data)
    {
        $userData = $this->userData;
        $solicitationData = $this->solicitationData;

        foreach ($data['dataSolicitation'] as $key => $value) {
            $solicitationData->$key = $value;
        }

        foreach ($data['dataUser'] as $key => $value) {
            $userData->$key = $value;
        }

        return ($this->userData->post()
            && $this->solicitationData->post($solicitationData->getAtributes()));
    }

    /**
     * @return Solicitation
     */
    public function getSolicitationData(): Solicitation
    {
        return $this->solicitationData;
    }//Dados referente a solicitação

    /**
     * @return Aluno
     */
    public function getUserData(): Aluno
    {
        return $this->userData;
    }

}