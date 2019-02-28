<?php
//require_once '../../model/Cliente.php';

include "includes/header.php";

?>
    <!-- Form cadastrar -->
    <div class="row justify-content-center" style="margin: 20px 0">

    <div>
        <legend style="text-align: center">FORMULÁRIO DE SOLICITAÇÃO DE SERVIÇO</legend>
        <form name="form_cadastro" id="form_cadastro" method="post" style="margin: 30px 0">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCodCliente">Código</label>
                    <input type="text" class="form-control" id="cod_cliente" name="cod_cliente" placeholder="Código"
                           required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputNome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required
                </div>
            </div>

            <!--
            <div class="form-group">
                <label for="inputEndereco">Endereço</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Rua, Avenida, Travessa...">
            </div>
            <div class="form-group">
                <div>
                    <label for="inputTipo">Tipo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                           value="opcao1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                           value="opcao2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                           value="opcao3">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputCity">Cidade</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Cidade">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEstado">Estado</label>
                    <select id="inputEstado" class="form-control">
                        <option selected>Escolher...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCEP">CEP</label>
                    <input type="text" class="form-control" id="inputCEP" placeholder="(00)00000-0000">
                </div>
            </div>
            -->

            <input name="cadastrar" id="cadastrar" type="submit" class="btn btn-primary" value="Enviar">

        </form>
    </div>


    <div style="margin: 50px 0">
        <h1 align="center">Cadastrar Solicitação</h1>
        <br/>
        <div class="table-responsive">

            <table id="user_data" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="1%">id</th>
                    <th width="1%">cod_cliente</th>
                    <th width="15%">Nome</th>
                    <!--<th width="15%">Email</th>
                    <th>Celular</th>
                    <th>Cep</th>
                    <th>Tipo</th>
                    <th>Serviço</th>
                    <th>Id_Serviço</th>
                    -->
                </tr>
                </thead>

                <tbody>

                <tr>

                    <?php
foreach ($cliente->findAll() as $key => $value) {?>
                    <td><?php $value->id;?></td>
                    <td><?php $value->cod_cliente;?></td>
                    <td><?php $value->nome;?></td>

                    <!--
                    <td>francs@</td>
                    <td>99-99999-999</td>
                    <td>00000</td>
                    <td>Aluno</td>
                    <td>Tudo</td>
                    <td>1</td>
                    -->

                    <?php }?>
                </tr>



                </tbody>
            </table>

        </div>
    </div>


<?php
include "includes/footer.php"
?>