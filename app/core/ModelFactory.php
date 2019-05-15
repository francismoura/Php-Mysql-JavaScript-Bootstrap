<?php


require_once '../app/model/Aluno.php';
require_once'../app/model/Solicitation.php';


class ModelFactory
{
    public function createAluno(): Aluno
    {
        return new Aluno();
    }

    public function createSolicitationAluno(): Solicitation
    {
        return new Solicitation();
    }
}