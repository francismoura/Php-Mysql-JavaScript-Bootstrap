<?php


class Login {

    private $senha;
    private $login;

    /**
     * Login constructor.
     * @param $senha
     * @param $login
     */
    public function __construct($senha, $login)
    {
        $this->senha = $senha;
        $this->login = $login;
    }

    public function isUserValid($user){

//        define('DB_USER', $user->name);

        //passar dados de login para classe Connection
        //resolver a resposta de getIntance()/
        return true;
    }
}