(function () {

    const form = document.getElementById('form_solicitation').addEventListener('submit', addSolicitation);
    const user_dialog = document.getElementById('user_dialog');
    const btn_add = document.getElementById('add');
    const btn_submit = document.getElementById('form_action');
    const URL = `../config/fetch.php`;
    const fieldName = document.getElementById('nome');

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
    function addSolicitation(event) {
        event.preventDefault();
        const formData = new FormData(this);
        // validateFormData(formData); //validação em javaScript

        fetch(URL + `?controller=UserController&action=insert`,
            {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.status === 200) {
                    outputForm(response.text());
                } else if (response.status === 403)
                    console.log('Access denied');
                else if (response.status === 404)
                    console.log('Page not found');
                else if (response.status === 503)
                    console.log('Be right back');
            }).catch(error => error.message);//receber validação da model!!!!!!!!!!!!
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
        fieldName.value = "";
        changeState(btn_submit);
        changeState(user_dialog);
        changeState(btn_add);

    }
})(document);