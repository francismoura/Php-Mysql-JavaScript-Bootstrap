<?php
include_once('../app/view/_includes/header.php');
require_once('../app/controller/UserController.php');
?>

<body>
<nav class="navbar navbar-dark bd-navbar bg-dark" style="padding: 30px" xmlns="">
    <a class="btn btn-link" id="btnHome" style="margin-right: 20px; color: #ffffff;" href=''>Home</a>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <legend style="text-align: center">FORMULÁRIO DE SOLICITAÇÃO DE SERVIÇO</legend>
        <form name="form_cadastro" id="form_cadastro" method="post" action="../config/fetch.php"
              style="margin: 30px 0">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
            </div>
            <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Enviar">
        </form>
    </div>

    <div class="row justify-content-center" id="respostaFetch" type="hidden">
        <!--Fetch API => return html-->
    </div>

</div>

<script src="./js/form.js">


</script>

</body>
</html>