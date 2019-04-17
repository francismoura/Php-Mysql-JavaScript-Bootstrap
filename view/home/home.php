<?php
include '../view/includes/header.php';
?>
<body>
<nav class="navbar navbar-expand-lg sb-navbar bg-light navbar-light">
    <div class="container">
        <a class="navbar-brand" href="">
            <img src="img/logo.png" width="60" height="60" class="img-nav" alt="logo">
            <span class="ml-1 nav-title"> <strong>Departamento de TI</strong></span>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a id="acessologin" class="btn btn-secondary btn-sm" tabindex="-1" role="button" aria-disabled="true">Entrar</a>
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
            <button class="btn btn-success btn-lg" id="acessoForm">Nova Solicitação</button>
        </div>
    </div>

</main>

<script src="js/home.js"></script>

</body>
</html>
