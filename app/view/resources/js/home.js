(function () {

    const form = document.getElementById('form-solicitation');
    const modalContent = document.getElementById('modal-content');
    const modalDialog = document.getElementById('modal-dialog');
    const modalTitle = document.getElementById('modal-title');
    const addModal = document.getElementById('addModal');
    const btn_add = document.getElementById('add');
    const btn_submit = document.getElementById('input_action');
    const btn_login = document.getElementById('loginAccess');
    const fieldName = document.getElementById('nome');
    const fieldCodClient = document.getElementById('cod_cliente');
    const fieldService = document.getElementById('servico');
    const mainHome = document.getElementById('header');
    const URL = `../config/fetch.php`;
    let output = ``;
    let table = ``;

    // acesso ao painel do admin
    btn_login.addEventListener("click", function (event) {
        event.preventDefault();
        window.location = "dashboard";
    });

    //Executa método post com os dados da solicitação de serviço
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        submit(this)
            .then(data => {
                document.getElementById('confirmation')
                    .addEventListener('click', function () {
                        fetch(URL,
                            {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: 'json=' + JSON.stringify(data)
                            })
                            .then(response => {
                                if (response.status === 200) {
                                    $('#addModal').modal('hide');
                                    const element = document.getElementById('modal-dialog-teste');
                                    addModal.removeChild(element);
                                    setDisplayValue(modalDialog);
                                    form.reset();
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
                    .addEventListener('click', function () {
                        const element = document.getElementById('modal-dialog-teste');
                        addModal.removeChild(element);
                        setDisplayValue(modalDialog);
                    })
            }).catch(error => console.error(error));
    });

    async function submit(context) {
        const formData = new FormData(context);
        const data = formatFormData(formData);
        changeContentModal(data);
        const modalTeste = document.getElementById('modal-dialog-teste');
        setDisplayValue(modalDialog);
        setDisplayValue(modalTeste);

        return data;
    }

    /**
     *Formatar o objeto FormData() em um objeto javascript válido.
     *O Objeto deve conter os seguintes atributos a serem enviados pelo formulário:
     *(1)atributos  referentes ao cliente que está solicitando suporte
     *(2)atributos sobre a solicitação de serviço em si
     *(3)atributo que informa a ação para model
     *Parameters: FormData com os dados enviados pelo cliente
     *Return: Objeto com os dados formatados
     */
    function formatFormData(formData) {
        const dataSolicitation = {};//inicializa dados da solicitação
        const dataClient = {};//inicializa dados dos usuários
        const data = {};//inicializa objeto que vai receber os dados formatados (dataSolicitation + dataClient)

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

    /**
     * Faz modificação do valor do atributo display de qualquer div
     */
    function setDisplayValue(div) {
        const disp = div.style.display;
        div.style.display = disp === 'none' ? 'block' : 'none';
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
    function changeContentModal(data) {
        table =
            `<div class="modal-dialog" role="document" id="modal-dialog-teste" style="display: none">
                <div class="modal-content" id="form-solicitation">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Confirmar Dados</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body" id="modal-body-solicitation">
                        <table id="user_data" class="table responsive-table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                            <label for="selectAll"/>
                                        </span>
                                    </th>
                                    <th> Código </th>
                                    <th> Nome </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="position-relative">
                                    <td>
                                        <a class="icone" href="#">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"/>
                                            <u>` + data.dataUser.cod_client + `</u>
                                        </a>
                                    </td>
                                    <td>` + data.dataUser.nome + `</td>
                                    <td>` + data.dataSolicitation.servico + `</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-warning"  id="toBack" value="Voltar">
                        <input type="click" class="btn btn-outline-info" name="save" id="confirmation" value="Confirmar">
                    </div>
                </div>
            </div>`;

        addModal.children[0].insertAdjacentHTML('afterend', table);
    }

    function outputForm(content) {
        if (content) {
            output +=
                `
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>OK!</strong>
                Incluido com sucesso!!!
            </div>
        `;
        } else {
            output +=
                `
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>OK!</strong>
                Erro ao incluir dados!!!
            </div>
         `;
        }

        document.getElementById('outputCheck').innerHTML = output;

    }

})(document);