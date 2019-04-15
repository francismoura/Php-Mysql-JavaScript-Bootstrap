<?php
require_once('includes/header.php');
require_once('../model/Usuario.php');
?>

    <nav class="navbar navbar-dark bd-navbar bg-dark" style="padding: 30px" xmlns="">
        <a class="btn btn-link" id="btnHome" style="margin-right: 20px;" href='../public'>Sair</a>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <legend style="text-align: center">FORMULÁRIO DE SOLICITAÇÃO DE SERVIÇO</legend>
            <form action="" name="form_cadastro" id="form_cadastro" method="post" style="margin: 30px 0">
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

        </div>

        <div class="row">
            <div>
                <h1 align="center">Solicitação</h1>
            </div>
            <div class="table-responsive" id="div-table"> </div>
        </div>
    </div>

<script src="../view/assets/js/script.js"></script>

</body>
</html>