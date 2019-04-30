<?php

require_once('../core/Controller.php');
require_once('../model/User.php');


class UserController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * UserController constructor.
     * @param User $user
     */
    function __construct(User $user)
    {
        $this->user=  $user;
    }

    /**
     * @param $nome
     * @return bool
     */
    function newSolicitation($nome)
    {
        return $this->user->Insert($nome);
    }

    function cadastrar()
    {
        //view com form de form
        self::createView('form');
    }

}