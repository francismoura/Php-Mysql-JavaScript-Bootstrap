<?php
require_once '../app/view/pages/_includes/header.php';
?>

    <body>
    <div class="body-header">
        <nav class="navbar navbar-expand-sm" style="padding: 0;">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img class="img-nav" src="../app/view/resources/img/logo.png" width="30px"
                         style="vertical-align: middle" alt="logo">
                    <span class="nav-title">
                        Departamento de Tecnologia da Informação
                    </span>
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="hint-log" href="" id="loginAccess" style="color: white">
                            Sign in
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <header class="mainHome" id="header">
            <div class="container p-5">
                <div class="row my-5">
                    <div class="col-sm-8">
                        <h1 class="display-4">
                            <span>
                                Como podemos ajudar?
                            </span>
                        </h1>
                        <p class="lead">
                            Faça seu pedido de suporte!
                        </p>
                    </div>
                    <div class="col-sm-4 content-center">
                        <span>
                            <a href="#addModal" class="btn btn-outline-light btn-lg" id="add" name="Add"
                               data-toggle="modal">
                                <span>
                                    Solicitar Serviço
                                </span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
    </div>

    <div class="container div-form" id="user_dialog" style="display: none;">
        <div>
            <h3>Formulário de solicitação de serviços</h3>
            <p>*Todos os campos devem ser preenchidos</p>

            <form name="form_solicitation" id="form_solicitation" method="post" action="">
                <div class="form-group">
                    <label for="cod_cliente">Código Identificador</label>
                    <input type="text" class="form-control" id="cod_cliente" name="cod_cliente"
                           placeholder="Ex: 123456">
                    <span id="error_code" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="nome">Nome completo</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                           placeholder="Ex: João Antônio da Silva">
                    <span id="error_name" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="servico">Serviço</label>
                    <textarea type="text" class="form-control" id="servico" name="servico" rows="3"
                              placeholder="Cadastro de email, bugs, cabeamentos, formatação, etc">
                    </textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="action" id="action" value="insert"/>
                    <!--            <input type="hidden" name="hidden_id" id="hidden_id"/>-->
                    <input class="btn btn-outline-info" role="button" type="submit" id="form_action"
                           name="form_action"
                           value="Enviar">
                    <a href="#" class="btn btn-outline-secondary" role="button" aria-disabled="true">Limpar</a>
                    <a href="" class="btn btn-outline-dark" role="button" aria-disabled="true">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <div class="justify-content-center" id="outputCheck" type="hidden">
        <!--Fetch API => return html-->
        <!--Isso precisa ser um modal de confirmação-->
    </div>

    <script src="../app/view/resources/js/home.js"></script>

<?php
require_once('../app/view/pages/_includes/footer.php');
?>