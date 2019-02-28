<?php
/**
 * Created by PhpStorm.
 * User: sabrina
 * Date: 05/12/18
 * Time: 08:36
 */
require_once 'class/Cliente.php';

$cliente = new Cliente(); // ----- CRIA O OBJETO DE CLIENTE ----- //

//var_dump($cliente);

// Cadastro de Usuario


$cod_cliente = $_POST['cod_cliente'];
$nome = $_POST['nome'];

$cliente->setCodCliente($cod_cliente); // ----- CARREGA A CLASSE CLIENTE----- //
$cliente->setNome($nome);

if ($cliente->insert()) {

    echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>OK!</strong> Incluido com sucesso!!! </div>';

} else {
    echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>OK!</strong> Erro ao alterar!!! </div>';
};

?>