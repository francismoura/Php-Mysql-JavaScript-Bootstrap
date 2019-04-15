<?php

require_once('Usuario.php');

$usuario = new Usuario();

if (isset ($_POST['nome'])) {
    $usuario->setNome($_POST['nome']);
    if ($usuario->insert($_POST['nome'])) {
        echo '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>OK!</strong> Incluido com sucesso!!! </div>';
    } else {
        echo "Deu errado";
        echo '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>OK!</strong> Erro ao incluir dados!!! </div>';
    };
};