<?php

require_once('../app/core/Controller.php');
require_once('../app/model/User.php');


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

    function newSolicitation($nome)
    {
        return $this->user->Insert($nome);
    }

}