<?php
include "includes/header.php";
require_once '../conexao/Conexao.php';
require_once '../model/Usuario.php';
?>

<nav class="navbar navbar-dark bd-navbar bg-dark" style="padding: 30px">
	<a class="btn btn-link" id="btnHome" style="margin-right: 20px;" href='../public/index.php'>Sair</a>
</nav>

<div class="container">

	<div class="row justify-content-center" style="margin: 20px 0">
		<legend style="text-align: center">FORMULÁRIO DE SOLICITAÇÃO DE SERVIÇO</legend>
		<form name="form_cadastro" id="form_cadastro" method="post" style="margin: 30px 0">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputNome">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
				</div>
			</div>
			<input name="cadastrar" id="cadastrar" type="submit" class="btn btn-primary" value="Enviar">
		</form>
	</div>

	<div class="row">
		<?php
$usuario = new Usuario();
if (isset($_POST['nome'])) {
	$nome = filter_input(INPUT_POST, nome);
	if (empty($nome)) {
		echo '<p>Preencha todos os dados do formulário acima.<p>';
	} else {
		$usuario->setNome($nome);
		if ($usuario->insert()) {
			echo '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>OK!</strong> Incluido com sucesso!!! </div>';
		} else {
			echo '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>OK!</strong> Erro ao incluir dados!!! </div>';
		}
	}
} else {
	echo "Deu errado";
}
?>
	</div>

	<div class="row"style="margin: 50px 0">
		<h1 align="center">Solicitação</h1>
		<br/>
		<div class="table-responsive">
			<table id="user_data" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="1%">id</th>
						<th width="15%">Nome</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php foreach ($usuario->findAll() as $value): ?>
							<td><?=$value['id']?></td>
							<td><?=$value['name']?></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
include "includes/footer.php"
?>