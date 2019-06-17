(function () {

    const form = document.getElementById('form_solicitation');
    const user_dialog = document.getElementById('user_dialog');
    const btn_add = document.getElementById('add');
    const btn_submit = document.getElementById('form_action');
    const btn_login = document.getElementById('loginAccess');
    const fieldName = document.getElementById('nome');
    const fieldCodClient = document.getElementById('cod_cliente');
    const fieldService = document.getElementById('servico');
    const mainHome = document.getElementById('header');
    const URL = `../config/fetch.php`;
    let output = ``;

    /**
     * Login de acesso ao painel do admin
     */
    btn_login.addEventListener("click", function (event) {
        event.preventDefault();
        window.location = "dashboard";
    });

    /**
     * Aciona formulário e recolhe o atributo <header> da home.php
     */
    btn_add.addEventListener("click", function (event) {
        event.preventDefault();
        setDisplayValue(mainHome);
        setDisplayValue(user_dialog);
        // const teste = mainHome.nextElementSibling.toggleAttribute('centralized');
        // const div = mainHome.id;
        // console.log(div);
        // // console.log(teste);
        // const hide = ($('.mainHome').hide());
        // hide.next().toggle('slow, 1000');
    });

    /**
     * Executa método post com os dados da solicitação de serviço
     */
    form.addEventListener('submit', function () {
        (async () => {
            event.preventDefault();
            const formData = new FormData(this);//armazena todos os dados do form num objeto tipo FormData
            const data = formatFormData(formData);
            const response = await fetch(URL,
                {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json, text/plain, */*',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

            if (response.status === 200) {
                const content = response.text();
                await outputForm(content);
            } else if (response.status === 403)
                console.log('Access denied');
            else if (response.status === 404)
                console.log('Page not found');
            else if (response.status === 503)
                console.log('Be right back');
        })();
    });

    /**
     *Formatar o objeto FormData() em um objeto javascript válido.
     *Subdivide os dados submtidos através do formulário em:
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
    function outputForm(content) {
        output = ``;
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
        fieldCodClient.value = "";
        fieldName.value = "";
        fieldService.value = "";
        setDisplayValue(btn_submit);
        setDisplayValue(user_dialog);
        setDisplayValue(btn_add);
    }
})(document);