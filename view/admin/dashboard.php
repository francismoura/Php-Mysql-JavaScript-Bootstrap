<?php

include "includes/header.php" ?>

<div style="margin: 50px 0">
	<h1 align="center">Cadastrar Solicitação</h1>
	<br/>
	<div class="table-responsive">

		<table id="user_data" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">cod_cliente</th>
					<th width="15%">Name</th>
		<!--<th width="15%">Email</th>
		<th>Celular</th>
		<th>Cep</th>
		<th>Tipo</th>
		<th>Serviço</th>
		<th>Id_Serviço</th>
	-->
</tr>
</thead>

<tbody>
	<tr>
		<?php
		$cliente = "";
		foreach ($cliente->findAll() as $key => $value) {
			?>
			<td><?php $value->cod_cliente;?></td>
			<td><?php $value->nome;?></td>


		</tr>
	</tbody>
</table>

</div>
</div>

<?php }?>


<?php
include "includes/footer.php";
?>