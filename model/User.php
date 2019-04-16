<?php

require_once ('../model/CrudUser.php');


class User extends CrudUser {

    public $cod_usuario;//ano atual + n° ente 0 e 9999. Ex: 20190018, 20190001
    public $nome;
    public $cel;
    public $email;
    public $rua;
    public $num;
    public $bairro;
    public $cidade;
    public $cep;
    public $estado;
    public $tipo_cliente; //(aluno, professor, técnico administrativo)
    public $setor;
    public $curso;
    public $dados_usuario = [];


    /**
     * @return mixed
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }


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
    public function getCel()
    {
        return $this->cel;
    }

    /**
     * @param mixed $cel
     */
    public function setCel($cel): void
    {
        $this->cel = $cel;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @param mixed $rua
     */
    public function setRua($rua): void
    {
        $this->rua = $rua;
    }

    /**
     * @return mixed
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * @param mixed $num
     */
    public function setNum($num): void
    {
        $this->num = $num;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro): void
    {
        $this->bairro = $bairro;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade): void
    {
        $this->cidade = $cidade;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep): void
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getTipoCliente()
    {
        return $this->tipo_cliente;
    }

    /**
     * @param mixed $tipo_cliente
     */
    public function setTipoCliente($tipo_cliente): void
    {
        $this->tipo_cliente = $tipo_cliente;
    }

    /**
     * @return mixed
     */
    public function getSetor()
    {
        return $this->setor;
    }

    /**
     * @param mixed $setor
     */
    public function setSetor($setor): void
    {
        $this->setor = $setor;
    }

    /**
     * @return mixed
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * @param mixed $curso
     */
    public function setCurso($curso): void
    {
        $this->curso = $curso;
    }

    //necessario setar um ou mais formularios para cada User
    public function setDadosUsuario(): void
    {
        $item = [];

        if (empty($dados_usuario)) {
            $item['cod_usuario'] = $this->cod_usuario;
            $item['nome'] = $this->nome;
            $item['celular'] = $this->cel;
            $item['email'] = $this->email;//validar
            $item['rua'] = $this->rua;
            $item['num'] = $this->num;
            $item['bairro'] = $this->bairro;
            $item['cidade'] = $this->cidade;
            $item['cep'] = $this->cep;
            $item['estado'] = $this->estado;
            $item['tipo_cliente'] = $this->tipo_cliente;
            $item['setor'] = $this->setor;
            $item['curso'] = $this->curso;
        }
        $this->dados_usuario = $item;
    }

    public function  getDadosUsuario(){
        return $this->dados_usuario;
    }


}