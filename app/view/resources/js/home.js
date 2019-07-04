(function () {

    const form = document.getElementById('form');
    const btn_cancel = document.getElementById('btn-cancel');
    const modalDialogSubmit = document.getElementById('modal-dialog-submit');
    const addModal = document.getElementById('add-modal');
    const btn_Login = document.getElementById('login-access');
    const btn_closeModal = document.getElementById('btn-close-modal');
    const URL = `../config/fetch.php`;
    let output = ``;
    let table = ``;

    // acessar painel do admin
    btn_Login.addEventListener("click", function (event) {
        event.preventDefault();
        window.location = "dashboard";
    });

    //se fechar modal, resetar campos do form
    btn_closeModal.addEventListener('click', function (event) {
        event.preventDefault();
        resetForm();
    });

    //se cancelar modal, resetar campos do form
    btn_cancel.addEventListener('click', function (event) {
        event.preventDefault();
        resetForm();
    });

    //Executa método post com os dados da solicitação de serviço
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        submit(this)
            .then(getContentModalConfirmation)
            .then(post)
            .catch(error => console.error(error));
    });

    async function submit(context) {
        const formData = new FormData(context);
        //validar data neste porto  !!!!!!!!!!!! importante
        return formatFormData(formData);
    }

    function resetForm() {
        form.reset();
    }

    function changeDisplayValue(div) {
        const disp = div.style.display;
        div.style.display = disp === 'none' ? 'block' : 'none';
    }

    function post(solicitation) {
        document.getElementById('btn-confirmation')
            .addEventListener('click', function () {
                fetch(URL,
                    {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'json=' + JSON.stringify(solicitation.data)
                    })
                    .then(response => {
                        if (response.status === 200) {
                            //esconde modal
                            addModal.style.visibility = 'hidden';
                            // reseta campos do form
                            resetForm();
                            //retorna dialogo inicial para o modal
                            changeDisplayValue(modalDialogSubmit);
                            //remove da tela o dialogo de confirmação
                            changeDisplayValue(solicitation.elementModal);
                            //remove dialogo de confirmação do modal (config. inicial)
                            addModal.removeChild(solicitation.elementModal);
                            //alerta de confirmação de envio
                            outputForm(response.text());
                        } else if (response.status === 403)
                            console.log('Access denied');
                        else if (response.status === 404)
                            console.log('Page not found');
                        else if (response.status === 503)
                            console.log('Be right back');
                    });
            });
        document.getElementById('toBack')
            .addEventListener('click', function (event) {
                event.preventDefault();
                addModal.removeChild(solicitation.elementModal);
                changeDisplayValue(modalDialogSubmit);
            })
    }

    /**
     * Formatar FormData() em um objeto javascript válido.
     *Parameters: FormData com os dados enviados pelo cliente
     *Return: Objeto com os dados formatados
     */
    function formatFormData(formData) {
        const dataSolicitation = {};//inicializa dados da solicitação
        const dataClient = {};//inicializa dados dos usuários
        const data = {};//inicializa objeto que vai receber os dados formatados (dataSolicitation + dataClient)

        // O Objeto deve conter os seguintes atributos a serem enviados pelo formulário:
        // (1)atributos  referentes ao cliente que está solicitando suporte
        // (2)atributos sobre a solicitação de serviço em si
        // (3)atributo que informa a ação para model
        formData.forEach((value, key) => {
            if (key === 'servico') {
                dataSolicitation[key] = value;
            } else if (key === 'cod_cliente') {
                dataClient['cod_aluno'] = value;
                dataSolicitation[key] = value;
            } else if (key === 'action') {
                data[key] = value;
            } else {
                dataClient[key] = value
            }
        });

        data['dataUser'] = dataClient;
        data['dataSolicitation'] = dataSolicitation;

        return data;
    }

    function validateFormData(form_data) {
        // if (nome == null || nome.indexOf(" ") >= 0 || nome === "") {
        //     document.getElementById('nome').setCustomValidity('Preencha este campo corretamente');
        // } else {
        //
        // }
    }

    /**
     * Verifica se a solicitação post foi atendida e retorna um html como string
     */
    function getContentModalConfirmation(data) {
        table =
            `<div class="modal-dialog" role="document" id="modal-dialog-confirmation" style="display: none">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Confirmar Dados</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <table id="user_data" class="table responsive-table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th> Código </th>
                                    <th> Nome </th>
                                    <th>Serviço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="position-relative">
                                    <td>
                                        <a class="icone" href="#">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"/>
                                            <u>` + data.dataUser.cod_aluno + `</u>
                                        </a>
                                    </td>
                                    <td>` + data.dataUser.nome + `</td>
                                    <td>` + data.dataSolicitation.servico + `</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning"  id="toBack" value="Voltar">
                        Voltar
                        <button type="click" class="btn btn-outline-info" data-dismiss="modal" name="save" id="btn-confirmation" value="Confirmar">
                        Confirmar
                    </div>
                </div>
            </div>`;


        addModal.children[0].insertAdjacentHTML('afterend', table);
        const modalDialogConfirmation = document.getElementById('modal-dialog-confirmation');
        changeDisplayValue(modalDialogSubmit);
        changeDisplayValue(modalDialogConfirmation);

        return {
            'data': data,
            'elementModal': modalDialogConfirmation,
        };
    }

    function outputForm(content) {
        if (content) {
            output +=
                `<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>OK!</strong>
                    Incluido com sucesso!!!
                </div>`;
        } else {
            output +=
                `<div class="alert alert-success alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>OK!</strong>
                    Erro ao incluir dados!!!
                </div>`;
        }
        document.getElementById('outputCheck').innerHTML = output;
    }

})(document);