<?php
include "includes/header.php"
?>
<body style="background: #007bff; ">

	<div class="container itens-center-div">
		<div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
			<div class="card">
				<div class="card-body">
					<img class="mb-4 img-login" src="../img/usuario.png" alt="" >
					<h5 class="login-title text-center">Autenticação do Sistema</h5>
					<form class="form-signin">
						<div class="form-label-group">
							<input type="email" id="inputEmail" class="form-control " placeholder="Email address" required autofocus>
							<label for="inputEmail">Email</label>
						</div>
						<div class="form-label-group">
							<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
							<label for="inputPassword">Senha</label>
						</div>
						<div class="custom-control custom-checkbox mb-3">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1">Lembrar-me</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
include "includes/footer.php";
?>