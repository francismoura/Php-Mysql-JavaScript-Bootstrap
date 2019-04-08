<?php

echo "testeFetch";

include '../view/includes/header.php';
require_once '../database/Conexao.php';
require_once 'CrudUser.php';
require_once 'Usuario.php';

$usuario = new Usuario();


if (isset ($_POST['nome'])){
	if (empty($_POST['nome'])){
		echo '<p>Preencha todos os dados do formulário acima.<p>';
	}else{
		$usuario->setNome($_POST['nome']);
		if ($usuario->insert($_POST['nome'])){
			echo "Deu certo";
			echo $usuario->getNome();
			echo `<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>OK!</strong> Incluido com sucesso!!! </div>`;
		} else {
			echo "Deu errado";
			echo  `<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>OK!</strong> Erro ao incluir dados!!! </div>`;
		};
	};

}else{
	echo "Não foi nada mas entrou";
	$teste = $usuario->findAll();
	return $teste;
};

?>

<?php 
include '../view/includes/footer.php';
?>