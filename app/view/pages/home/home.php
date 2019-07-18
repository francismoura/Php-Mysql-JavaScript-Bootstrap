<?php
require_once '../app/view/pages/home/_includes/header.php';
?>

    <body>
    <div class="body-header">
        <nav class="navbar navbar-expand-md" style="padding: 0;">
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
                        <button type="button" class="close" id="btn-close-modal" data-dismiss="modal"
                                aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body-solicitation">

                        <div class="step" id="step1" style="display: block">
                            <div class="form-group">
                                <label for="inputTypeUser">
                                    Estudante/Professor/Técnico
                                    <select id="inputTypeUser" class="form-control" required="">
                                        <option selected>Escolher...</option>
                                        <option>Estudante</option>
                                        <option>Professor</option>
                                        <option>Técnico</option>
                                    </select>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="inputCodeUser">
                                    Código Identificador
                                    <input type="text" class="form-control" id="inputCodeUser" name="inputCodeUser"
                                           required="">
                                </label>
                            </div>
                        </div>

                        <div class="step" id="step2" style="display: none">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">Nome</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Nome">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Endereço</label>
                                <input type="text" class="form-control" id="inputAddress"
                                       placeholder="Rua dos Bobos, nº 0">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Cidade</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEstate">Estado</label>
                                    <select id="inputEstate" class="form-control">
                                        <option selected>Escolher...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputCEP">CEP</label>
                                    <input type="text" class="form-control" id="inputCEP">
                                </div>
                            </div>
                        </div>

                        <div class="step" id="step3" style="display: none">
                            <div class="form-group">
                                <label for="inputService">Serviço</label>
                                <textarea class="form-control" id="inputService" name="inputService" rows="3"
                                          required>
                            </textarea>
                            </div>
                        </div>

                        <div class="step" id="step4" style="display: none;">

                        </div>
                    </div>

                    <div class="modal-footer" id="modal-footer">
                        <div class="form-group" id="group-step-control">
                            <button type="button" class="btn btn-default" id="btn-cancel" name="cancel"
                                    data-dismiss="modal">
                                Cancelar
                                <button type="button" class="btn btn-outline-info" id="btn-next" name="next">
                                    Próximo
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
require_once('../app/view/pages/home/_includes/footer.php');
?>