<?php


require_once "../app/core/Controller.php";
require_once "../app/model/Form.php";

class FormController extends Controller
{
    protected $form;

    public function __construct(Form $form)
    {
        $this->form = $form;
    }


    public function getAllSolicitation()
    {
        return $this->form->FindAll();
    }


}