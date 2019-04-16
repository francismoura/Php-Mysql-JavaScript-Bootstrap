<?php


class Solicitation
{
    public $id_solicitacao;
    public $serv_solicitado;
    public $data_solicitacao;
    public $dados_solicitacao = [];

    /**
     * @return array
     */
    public function getDadosSolicitacao(): array
    {
        return $this->dados_solicitacao;
    }

    /**
     * @param array $dados_solicitacao
     */
    public function setDadosSolicitacao(array $dados_solicitacao): void
    {
        $this->dados_solicitacao = $dados_solicitacao;
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

    /**
     * @return mixed
     */
    public function getServSolicitado()
    {
        return $this->serv_solicitado;
    }

    /**
     * @param mixed $serv_solicitado
     */
    public function setServSolicitado($serv_solicitado): void
    {
        $this->serv_solicitado = $serv_solicitado;
    }

    /**
     * @return mixed
     */
    public function getDataSolicitacao()
    {
        return $this->data_solicitacao;
    }

    /**
     * @param mixed $data_solicitacao
     */
    public function setDataSolicitacao($data_solicitacao): void
    {
        $this->data_solicitacao = $data_solicitacao;
    }


}