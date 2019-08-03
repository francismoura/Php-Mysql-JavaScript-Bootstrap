<?php
require_once '../app/view/pages/home/_includes/header.php';
?>

    <body>
    <nav class="navbar navbar-expand-md" style="padding: 0;">
        <div class="container">
            <a class="navbar-brand">
                <img class="img-nav" src="../app/view/resources/img/logo.png" alt="logo">
                <span class="nav-title">
                    Departamento de Tecnologia da Informação
                </span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn-signIn" id="btn-signIn">
                        Sign in
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <header>
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

    <!--Add Modal-->
    <div id="add-modal" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document" id="modal-dialog-submit">
            <div class="modal-content">
                <form name="form-solicitation" id="form" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Etapa 1: (Definir Usuário)</h4>
                        <a class="close" id="btn-close-modal" data-dismiss="modal" aria-hidden="true">×</a>
                    </div>
                    <div class="modal-body" id="modal-body-solicitation">

                        <div class="step" id="step1" style="display: block">
                            <div class="form-group">
                                <label for="inputTypeUser">
                                    Estudante/Professor/Técnico
                                    <select name="inputTypeUser" id="inputTypeUser" class="form-control">
                                        <option selected value="">Escolher...</option>
                                        <option>Estudante</option>
                                        <option>Professor</option>
                                        <option>Técnico</option>
                                    </select>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="inputCodeUser">
                                    Código Identificador
                                    <input type="text" class="form-control" id="inputCodeUser" name="inputCodeUser">
                                </label>
                            </div>
                        </div>

                        <div class="step" id="step2" style="display: none">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                                           placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">Nome</label>
                                    <input type="text" class="form-control" id="inputName" name="inputName"
                                           placeholder="Nome">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Endereço</label>
                                <input type="text" class="form-control" id="inputAddress" name="inputAddress"
                                       placeholder="Rua dos Bobos, nº 0">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Cidade</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Estado</label>
                                    <select name="inputState" id="inputState" class="form-control">
                                        <option value="">Escolher...</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputCEP">CEP</label>
                                    <input type="text" class="form-control" id="inputCEP" name="inputCEP">
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputSector">Setor</label>
                                    <select class="form-control" name="inputSector" id="inputSector">
                                        <option value="">Escolher...</option>
                                        <option value="DAD">Departamento Adminitração</option>
                                        <option value="DAG">Departamento Agricultura</option>
                                        <option value="DCC">Departamento Computação</option>
                                        <option value="DCH">Departamento Ciências Humanas</option>
                                        <option value="DEN">Departamento Engenharia</option>
                                        <option value="DEX">Departamento Exatas</option>
                                        <option value="DGTI">Departamento Gestão Tecnologia Informação</option>
                                        <option value="DTRANS">Departamento Transporte</option>
                                        <option value="PRG">Pró Reitoria Graduação</option>
                                        <option value="PRPG">Pró Reitoria Pós Graduação</option>
                                    </select>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputSector">Setor</label>
                                    <select class="form-control" name="inputSector" id="inputSector">
                                        <option value="">Escolher...</option>
                                        <option value="" selected>Nenhum</option>
                                        <option value="ADM">Adminitração</option>
                                        <option value="AGR">Agronomia</option>
                                        <option value="CCO">Ciências da Computação</option>
                                        <option value="ECV">Engenharia Civil</option>
                                        <option value="EEL">Engenharia Elétrica</option>
                                        <option value="CCO">Engenharia Mecânica</option>
                                        <option value="MED">Medicina</option>
                                        <option value="DTRANS">Departamento Transporte</option>
                                        <option value="PRG">Pró Reitoria Graduação</option>
                                        <option value="PRPG">Pró Reitoria Pós Graduação</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="step" id="step3" style="display: none">
                            <div class="form-group">
                                <label for="inputService">Serviço</label>
                                <textarea class="form-control" id="inputService" name="inputService"
                                          rows="3"></textarea>
                            </div>
                        </div>

                        <div class="step" id="step4" style="display: none;">

                        </div>

                    </div>

                    <div class="modal-footer" id="modal-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-7">
                                    <input type="hidden" name="action" value="insert" id="insert">
                                    <button type="button" class="btn btn-secondary" id="btn-cancel" name="cancel"
                                            data-dismiss="modal">
                                        Cancelar
                                    </button>
                                </div>
                                <div class="col-sm-5">
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-warning" id="btn-toBack"
                                                    value="Voltar" role="button" style="margin: 0">
                                                Voltar
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary" name="submit"
                                                    id="btn-submit" value="Send" role="button">
                                                Próximo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div><!-- end add-modal -->

<?php
require_once('../app/view/pages/home/_includes/footer.php');
?>