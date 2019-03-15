<?php
include "../view/includes/header.php"
?>
<body>
	<nav class="navbar bd-navbar bg-dark" style="padding: 30px;   background: #007bff;
	background: linear-gradient(to right, #0062E6, #33AEFF);">
	<a class="navbar-brand" href="../public/index.php">
		<img src="../img/setor_de_ti.jpeg" width="60" height="60" class="img-nav d-inline-block align-middle" style="margin-right: 10px; margin-left: 20px" alt="">
		<span class="nav-title">Departamento de tecnologia da informação</span>
	</a>
	<a class="btn btn-link" id="btnHome" style="margin-right: 20px; background: #0092E9;" href='../view/login.php'">Entrar</a>
</nav>

<div class="container-fluid" style="">
	<div class="itens-center-div">
		<a href="../view/cadastro.php" style="">
			<button class="btn btn-success btn-lg center">Nova Solicitação</button>
		</a>
	</div>
</div>

<?php
include "../view/includes/footer.php";
?>
