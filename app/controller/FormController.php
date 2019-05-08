<?php

require_once('../app/core/Controller.php');
require_once('../app/model/BaseModel.php');

class FormController extends Controller
{
    protected $form;

    public function __construct(BaseModel $form)
    {
        $this->form = $form;
    }


    public function getAllSolicitation()
    {
        return $this->form->FindAll();
    }


}