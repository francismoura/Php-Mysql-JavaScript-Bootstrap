(function () {

    const form = document.getElementById('form_solicitation')
        .addEventListener('submit', addSolicitation);
    const user_dialog = document.getElementById('user_dialog');
    const btn_add = document.getElementById('add');
    const btn_submit = document.getElementById('form_action');
    const fieldName = document.getElementById('nome');
    const fieldCodClient = document.getElementById('cod_cliente');
    const fieldService = document.getElementById('servico');

    const URL = `../config/fetch.php`;

    document.getElementById('loginAccess')
        .addEventListener("click", function (event) {
            event.preventDefault();
            window.location = "login";
        });

    btn_add.addEventListener("click", function (event) {
        event.preventDefault();
        this.style.display = "none";
        user_dialog.style.display = "block";
    });

    //recupera os dados enviados através do formulário e envia para controller
    async function addSolicitation(event) {
        event.preventDefault();
        const formData = new FormData(this);
        const data = formatFormData(formData);
        const response = await fetch(URL,
            {
                method: 'POST',
                headers: {
                    'Accept': 'application/json, text/plain, */*',
                    'Content-Type': 'application/json'
                },
                body:JSON.stringify(data)
            });

        if (response.status === 200) {
            // console.log(response.text());
            await outputForm(response.text());
        } else if (response.status === 403)
            console.log('Access denied');
        else if (response.status === 404)
            console.log('Page not found');
        else if (response.status === 503)
            console.log('Be right back');
    }

    function formatFormData(formData) {
        const data = {};
        const dataClient = {};
        const dataSolicitation = {};

        formData.forEach((value, key) => {
            if (key === 'servico') {
                dataSolicitation[key] = value;
            } else if (key === 'cod_cliente') {
                dataClient[key] = value;
                dataSolicitation[key] = value;
            } else if (key === 'action'){
                data[key] = value;
            } else {
                dataClient[key] = value
            }
        });

        data['dataUser'] = dataClient;
        data['dataSolicitation'] = dataSolicitation;

        return data;
    }

    //modifica o estado do display
    function changeState(div) {
        let disp = div.style.display;
        div.style.display = disp === 'none' ? 'block' : 'none';
    }

    function validateFormData(form_data) {
        // if (nome == null || nome.indexOf(" ") >= 0 || nome === "") {
        //     document.getElementById('nome').setCustomValidity('Preencha este campo corretamente');
        // } else {
        //
        // }
    }

    //confirma se os dados foram inseridos
    function outputForm(content) {
        let output;

        if (content) {
            output =
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
            output =
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
        changeState(btn_submit);
        changeState(user_dialog);
        changeState(btn_add);
    }
})(document);