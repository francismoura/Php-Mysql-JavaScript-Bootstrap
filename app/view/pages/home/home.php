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
                        <button class="btn btn-outline-light btn-lg" id="add" name="Add"
                                data-toggle="modal" data-target="#addModal">
                            <span>
                                Solicitar Serviço
                            </span>
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
    <div id="addModal" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" id="modal-dialog" style="display: block">
            <div class="modal-content" id="modal-content" style="display: block">
                <form name="form-solicitation" id="form-solicitation" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Adicionar Serviço</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <input type="hidden" name="action" id="action" value="insert"/>
                            <!--            <input type="hidden" name="hidden_id" id="hidden_id"/>-->
                            <input type="submit" class="btn btn-outline-info" name="form_action" id="input_action"
                                   value="Enviar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Edit Modal-->
    <div id="editModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Name
                                <input type="text" class="form-control" required="">
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                Email
                                <input type="email" class="form-control" required="">
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                Address
                                <textarea class="form-control" required=""></textarea>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                Phone
                                <input type="text" class="form-control" required="">
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
require_once('../app/view/pages/home/_includes/footer.php');
?>