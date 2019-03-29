<?php
include "includes/header.php";
require_once '../conexao/Conexao.php';
require_once '../model/Usuario.php';
require_once '../model/teste.php';
?>

<nav class="navbar navbar-dark bd-navbar bg-dark" style="padding: 30px">
	<a class="btn btn-link" id="btnHome" style="margin-right: 20px;" href='../public/index.php'>Sair</a>
</nav>

<div class="container">
	<div class="row justify-content-center" style="margin: 20px 0">
		<legend style="text-align: center">FORMULÁRIO DE SOLICITAÇÃO DE SERVIÇO</legend>
		<form action="cadastro.php" name="form_cadastro" id="form_cadastro" method="post" style="margin: 30px 0">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputNome">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
				</div>
			</div>
			<input type="submit" name="insert" id="insert" class="btn btn-primary" value="Enviar">
		</form>
	</div>

	<div class="row" id="respostaFetch" type="hidden">

	</div>

	<pre>
		<?php //print_r($all_users) ?> 
	</pre>

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
						<?php 
						$usuario = new Usuario();
						$usuarios = $usuario->findAll();
						foreach ($usuarios as $value): ?>
							<td><?=$value['id']?></td>
							<td><?=$value['nome']?></td>
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