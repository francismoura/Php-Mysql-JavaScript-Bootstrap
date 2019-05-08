<?php
require_once('../app/view/pages/_includes/header.php');
?>

<body>
<nav class="navbar navbar-expand-lg sb-navbar bg-light navbar-light">
    <div class="container">
        <a class="navbar-brand" href="">
            <img src="../app/view/assets/img/logo.png" width="60" height="60" class="img-nav" alt="logo">
            <span class="ml-1 nav-title"> <strong>Departamento de TI</strong></span>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a id="loginAccess" class="btn btn-secondary btn-sm" tabindex="-1" role="button" aria-disabled="true">Entrar</a>
            </li>
        </ul>
    </div>
</nav>

<main style=" background: #007bff; background: linear-gradient(to right, #0062E6, #33AEFF); padding: 60px">
    <header id="header" class="" style="padding: 0;">
        <div>
            <h1 style="text-align: center;">CRIAR UMA HEADER DIFERENTE AQUI!!!!</h1>
        </div>
    </header><!-- /header -->
</main>

<div class="container" style="">
    <div class="itens-center-div">
        <button class="btn btn-success btn-lg" id="add" name="Add">Nova Solicitação</button>
    </div>
</div>

<div class="container justify-content-center" id="user_dialog" title="Add Data" style="width:400px; display: none">
    <form name="form_solicitation" id="form_solicitation" method="post" action="../config/fetch.php">
        <div class="form-group">
            <label>Enter Name</label> nome
            <label for="nome"></label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            <span id="error_name" class="text-danger"></span>
        </div>
        <div class="form-group">
            <input type="hidden" name="action" id="action" value="insert"/>
            <input type="hidden" name="hidden_id" id="hidden_id"/>
            <input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Send">
        </div>
    </form>
</div>

<div class="row justify-content-center" id="outputCheck" type="hidden">
    <!--Fetch API => return html-->
</div>

<script src="../app/view/assets/js/home.js"></script>

</body>
