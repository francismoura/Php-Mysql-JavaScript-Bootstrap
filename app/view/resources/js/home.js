(function () {

        const URL = `../config/fetch.php`;
        const form = document.getElementById('form');
        const btn_toBack = document.getElementById('btn-toBack');
        const btn_Login = document.getElementById('login-access');
        const btn_cancel = document.getElementById('btn-cancel');
        const btn_closeModal = document.getElementById('btn-close-modal');
        const btn_addSolicitation = document.getElementById('btn-add-solicitation');
        const modalFooter = document.getElementById('modal-footer');
        const modalTitle = document.getElementById('modal-title');
        const steps = document.getElementsByClassName('step');
        const footerStepControl = document.getElementById('group-step-control');

        // console.log(footerStepControl);

        let currentStep;
        let nextStep;
        let count = 0;
        let footerStepSubmit;

        // acessar painel do admin
        btn_Login.addEventListener("click", function (event) {
            event.preventDefault();
            window.location = "dashboard";
        });

        //se fechar modal, resetar campos do form
        btn_closeModal.addEventListener('click', reload);

        //se cancelar modal, resetar campos do form
        btn_cancel.addEventListener('click', reload);

        btn_toBack.addEventListener('click', function (event) {
            event.preventDefault();
            restartForm(currentStep);//lastStep

        });

        btn_addSolicitation.addEventListener('click', function (event) {
            event.preventDefault();
            updateStep();
            changeDisplayValue([btn_toBack]);
        });

        //Executa método post com os dados da solicitação de serviço
        form.addEventListener('submit', function () {
            event.preventDefault();
            nextDisplay(currentStep, nextStep);
            switch (currentStep.id) {
                case 'step1':
                    changeDisplayValue([btn_toBack]);
                    break;
                case 'step2':
                    modalTitle.innerText = 'Etapa 2:   (Informe seus dados pessoais)';
                    changeDisplayValue([btn_toBack]);
                    break;
                case 'step3':
                    modalTitle.innerText = 'Etapa 3:   (Faça seu pedido de suporte)';
                    break;
                case 'step4':
                    submit(this)//recuperar dados enviados
                        .then(checkSolicitation)//enviar ou cancelar?
                        .catch(error => console.error(error));
                    break;
            }
        });

        function reload() {
            location.reload();
        }

        function updateStep() {
            currentStep = steps[count];
            nextStep = currentStep.nextElementSibling;
        }

        function nextDisplay(current, next) {
            changeDisplayValue([current, next]);
            count++;
            updateStep();
        }

        function restartForm(lastStep) {
            count = 0;
            updateStep();
            form.reset();
            changeDisplayValue([currentStep, lastStep, footerStepControl, footerStepSubmit]);
            modalFooter.removeChild(footerStepSubmit);
        }

        //altera o valor do display de um ou mais elementos [div1, div2,...]
        function changeDisplayValue(div) {
            div.map(div => {
                const currentStyle = div.style.display;
                div.style.display = currentStyle === 'none' ? 'block' : 'none';
            });
        }

        async function submit(context) {
            const formData = new FormData(context);
            //validar data neste porto  !!!!!!!!!!!! importante
            return formatFormData(formData);
        }

        // function changeModalDialog(data) {
        //     currentStep.innerHTML = getDivStepConfirmation(data);//step4
        //
        //
        //     if (!modalFooter.contains(footerStepSubmit)) {//não criar caso já exista
        //         modalFooter.insertAdjacentHTML('beforeend', getDivFooterSubmit());
        //         footerStepSubmit = document.getElementById('group-submit');
        //     }
        //
        //     changeDisplayValue([footerStepControl, footerStepSubmit]);
        //     return data;
        // }

        function checkSolicitation(solicitation) {
            currentStep.innerHTML = getDivStepConfirmation(solicitation);//step4
            modalTitle.innerHTML = "Confirmar Dados";
            document.getElementById('btn-submit').innerText = 'Enviar';
            for (const button of modalFooter.children) {
                button.addEventListener('click', function (event) {
                        switch (event.target.id) {
                            case 'btn-submit':
                                post(solicitation);
                                break;
                            case 'btn-toBack':
                                restartForm(currentStep);//lastStep
                                break;
                        }
                    }
                )
            }
        }

        function post(solicitation) {
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
                        reload();
                        if (response.text()) {
                            alert("Sua solicitação foi enviada com sucesso");
                        } else {
                            alert("Erro ao enviar solicitação. Tente outra vez.");
                        }
                        // document.getElementById('outputCheck').innerHTML = elementOutput;
                    } else if (response.status === 403)
                        console.log('Access denied');
                    else if (response.status === 404)
                        console.log('Page not found');
                    else if (response.status === 500)
                        console.log('Error insert Database(Code)');
                    else if (response.status === 503)
                        console.log('Be right back');
                });
        }

        //Formatar FormData() e criar um objeto js válido.
        function formatFormData(formData) {
            const dataSolicitation = {};//inicializa dados da solicitação
            const dataClient = {};//inicializa dados dos usuários
            const data = {};//inicializa objeto que vai receber os dados formatados (dataSolicitation + dataClient)

            // O Objeto deve conter os seguintes atributos a serem enviados pelo formulário:
            // (1)atributos expecíficos do cliente
            // (2)atributos da solicitação de serviço em si
            // (3)atributo que informa a ação para model
            formData.forEach((value, key) => {
                switch (key) {
                    case 'servico':
                        dataSolicitation[key] = value;
                        break;
                    case 'cod_cliente':
                        dataClient['cod_aluno'] = value;
                        dataSolicitation[key] = value;
                        break;
                    case 'action':
                        data[key] = value;
                        break;
                    default:
                        dataClient[key] = value;
                        break;
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

        function getDivFooterSubmit() {
            return `<div class="form-group" id="group-submit" style="display: none">

                        <input type="hidden" name="action" id="action" value="insert">
                        <button type="button" class="btn btn-warning"  id="btn-toBack" value="Voltar">
                            Voltar
                        </button>
                        <button type="submit" class="btn btn-outline-info" data-dismiss="modal" name="submit" id="btn-submit"
                            value="Enviar">
                            Enviar
                        </button>
                    </div>`;
        }

        function getDivStepConfirmation(data) {
            return `
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
                   `;
        }

        function outputSuccess() {
            window.open(`<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>OK!</strong>
                    Incluido com sucesso!!!
                </div>`);
        }

        function outputError() {
            `<div class="alert alert-success alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>OK!</strong>
                    Erro ao incluir dados!!!
                </div>`;
        }

    }

)(document);