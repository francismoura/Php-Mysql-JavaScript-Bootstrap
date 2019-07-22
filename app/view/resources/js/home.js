(function () {

        const URL = `../config/fetch.php`;
        const form = document.getElementById('form');
        const btn_submit = document.getElementById('btn-submit');
        const btn_toBack = document.getElementById('btn-toBack');
        const btn_Login = document.getElementById('login-access');
        const btn_cancel = document.getElementById('btn-cancel');
        const btn_closeModal = document.getElementById('btn-close-modal');
        const btn_addSolicitation = document.getElementById('btn-add-solicitation');
        const modalFooter = document.getElementById('modal-footer');
        const modalTitle = document.getElementById('modal-title');
        const steps = document.getElementsByClassName('step');
        const footerStepControl = document.getElementById('group-step-control');

        let currentStep;
        let nextStep;
        let count = 0;
        let solicitation;

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
            previousDisplay();
            if (btn_submit.textContent === 'Enviar') {
                btn_submit.innerText = 'Próximo';
            }
            if (currentStep.id === 'step1') {
                changeDisplayValue([btn_toBack]);
            }
        });

        btn_addSolicitation.addEventListener('click', function (event) {
            event.preventDefault();
            updateStep();
            changeDisplayValue([btn_toBack]);
        });

        form.addEventListener('submit', function () {
            event.preventDefault();
            if (nextStep !== null) {//acabou as etapas?
                nextDisplay();
                switch (currentStep.id) {
                    case 'step1':
                        break;
                    case 'step2':
                        modalTitle.innerText = 'Etapa 2: (Informe seus dados pessoais)';
                        changeDisplayValue([btn_toBack]);
                        break;
                    case 'step3':
                        modalTitle.innerText = 'Etapa 3: (Faça seu pedido de suporte)';
                        break;
                    case 'step4'://step submit
                        solicitation = getFormData(this);
                        currentStep.innerHTML = setDivConfirmationStep(solicitation);//step4
                        modalTitle.innerHTML = "Etapa 4: (Confirmar Dados)";
                        btn_submit.innerText = 'Enviar';
                        break;
                }
            } else {
                post(solicitation);
            }
        });

        function reload() {
            location.reload();
        }

        function updateStep() {
            currentStep = steps[count];
            nextStep = currentStep.nextElementSibling;
        }

        function previousDisplay() {
            count--;
            updateStep();
            changeDisplayValue([currentStep, nextStep]);
        }

        function nextDisplay() {
            changeDisplayValue([currentStep, nextStep]);
            count++;
            updateStep();
        }

        //altera o valor do display de um ou mais elementos [div1, div2,...]
        function changeDisplayValue(div) {
            div.map(div => {
                const currentStyle = div.style.display;
                div.style.display = currentStyle === 'none' ? 'block' : 'none';
            });
        }

        function getFormData(context) {
            const formData = new FormData(context);
            //validar data neste porto  !!!!!!!!!!!! importante
            return formatFormData(formData);
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
                })
                .catch(error => console.error(error));
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

        function checkValidateFormData(form_data) {
            // if (nome == null || nome.indexOf(" ") >= 0 || nome === "") {
            //     document.getElementById('nome').setCustomValidity('Preencha este campo corretamente');
            // } else {
            //
            // }
        }

        function setDivConfirmationStep(solicitation) {
            return `<table id="user_data" class="table responsive-table table-hover table-striped">
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
                                        <u>` + solicitation.dataUser.cod_aluno + `</u>
                                    </a>
                                </td>
                                <td>` + solicitation.dataUser.nome + `</td>
                                <td>` + solicitation.dataSolicitation.servico + `</td>
                            </tr>
                        </tbody>
                    </table>`;
        }
    }
)(document);