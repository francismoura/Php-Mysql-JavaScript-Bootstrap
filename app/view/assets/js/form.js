(function () {
        console.log("PRIMEIRO TESTE");
        const btnHome = document.getElementById('btnHome').addEventListener('click', redirectHome);
        const URL = `../config/fetch.php`;

        //redirect home
        function redirectHome(event) {
            event.preventDefault();
            window.location = "home";
        }

        //recupera os dados enviados através do formulário e envia para controller
        function submitForm(event) {
            event.preventDefault();
            const formData = new FormData(this);
            // validateFormData(formData); //validação em javaScript

            fetch(URL + `?controller=UserController&action=insert`,
                {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.status === 200)
                        outputForm(response.text());
                    else if (response.status === 403)
                        console.log('Access denied');
                    else if (response.status === 404)
                        console.log('Page not found');
                    else if (response.status === 503)
                        console.log('Be right back');
                })
                .catch(error => error.message);//receber validação da model!!!!!!!!!!!!
        }

        function validateFormData(form_data) {
            // if (nome == null || nome.indexOf(" ") >= 0 || nome === "") {
            //     document.getElementById('nome').setCustomValidity('Preencha este campo corretamente');
            // } else {
            //
            // }
        }

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
            document.getElementById('nome').value = "";
        }
    }
)(document);
