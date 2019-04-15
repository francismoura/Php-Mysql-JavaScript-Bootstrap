<?php


//Usuário deve ser identificado junto com

class Formulario {

    public $cod_usuario;
    public $id_solicitacao;

    /**
     * @return mixed
     */
    public function getCodUsuario()
    {
        return $this->cod_usuario;
    }

    /**
     * @param mixed $cod_usuario
     */
    public function setCodUsuario($cod_usuario): void
    {
        $this->cod_usuario = $cod_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdSolicitacao()
    {
        return $this->id_solicitacao;
    }

    /**
     * @param mixed $id_solicitacao
     */
    public function setIdSolicitacao($id_solicitacao): void
    {
        $this->id_solicitacao = $id_solicitacao;
    }


}