<?php
require_once '../app/view/pages/home/_includes/header.php';
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
                        <a class="hint-log" href="" id="login-access" style="color: white">
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
                        <button class="btn btn-outline-light btn-lg" id="btn-add-solicitation" name="Add"
                                data-toggle="modal" data-target="#add-modal">
                            Solicitar Serviço
                        </button>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
    </div>


    <div class="row justify-content-center" id="outputCheck" type="hidden">
        <!--Fetch API => return html-->
    </div>

    <!--Add Modal-->
    <div id="add-modal" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" id="modal-dialog-submit" style="display: block">
            <div class="modal-content">
                <form name="form-solicitation" id="form" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Adicionar Serviço</h4>
                        <button type="button" class="close" id="btn-close-modal" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body-solicitation">
                        <div class="form-group">
                            <label for="cod_cliente">
                                Código Identificador
                                <input type="text" class="form-control" id="cod_cliente" name="cod_cliente" required="">
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="nome">
                                Nome completo
                                <input type="text" class="form-control" id="nome" name="nome" required="">
                            </label>
                        </div>
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="email">-->
                        <!--                                Email-->
                        <!--                                <input type="email" class="form-control" required="">-->
                        <!--                            </label>-->
                        <!--                        </div>-->
                        <div class="form-group">
                            <label for="servico">
                                Serviço
                                <textarea class="form-control" id="servico" name="servico" rows="3"
                                          required=""></textarea>
                            </label>
                        </div>
                        <!--                        <div class="form-group">-->
                        <!--                            <label>-->
                        <!--                                Phone-->
                        <!--                                <input type="text" class="form-control" required="">-->
                        <!--                            </label>-->
                        <!--                        </div>-->
                    </div>
                    <div class="modal-footer" id="modal-footer">
                        <div class="form-group">
                            <input type="hidden" name="action" id="action" value="insert">
                            <button type="button" class="btn btn-default" id="btn-cancel" data-dismiss="modal">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-outline-info" name="form_action" id="btn-submit">
                                Próximo
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
require_once('../app/view/pages/home/_includes/footer.php');
?>