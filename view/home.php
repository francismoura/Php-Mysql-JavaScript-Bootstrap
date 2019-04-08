<?php 
include 'includes/header.php';
?>

<body>
	<nav class="navbar navbar-expand-lg sb-navbar bg-light navbar-light" style="font-family: nunito,-apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol,noto color emoji;">
		<div class="container">
			<a class="navbar-brand" href=""  >
				<img src="img/logo.png" width="60" height="60" class="img-nav"  alt="logo">
				<span class="ml-1 nav-title"> <strong>Departamento de TI</strong></span>
			</a>
			<ul class="navbar-nav" >
				<li class="nav-item">
					<a href="view/login.php" class="btn btn-secondary btn-sm" tabindex="-1" role="button" aria-disabled="true">Entrar</a>
				</li>
			</ul>
		</div>
	</nav>

	<main style=" background: #007bff; background: linear-gradient(to right, #0062E6, #33AEFF); padding: 60px">
		<header id="header" class="" style="padding: 0;">
			<div>
				<h1 style="text-align: center;">TESTE</h1>
			</div>

		</header><!-- /header -->

		<div class="container" style="">
			<div class="itens-center-div">
				<a href="cadastro.php" style="">
					<button class="btn btn-success btn-lg">Nova Solicitação</button>
				</a>
			</div>
		</div>

	</main>

<?php 
include'includes/footer.php';
?>
