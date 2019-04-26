(function () {
        console.log("PRIMEIRO TESTE");
        const form = document.getElementById('form_cadastro').addEventListener('submit', formSubmit);
        const btnHome = document.getElementById('btnHome').addEventListener('click', redirectHome);
        const URL = `../controller/fetch.php`;

        loadTable();

        function loadTable() {
            (async () => {
                    try {
                        const response = await fetch(URL + `?controller=UserController&action=findAll`);
                        const content = await response.json();
                        let output = outputFindAll(content);
                        $('#div-table').html(output);
                        $('#nome').val('');
                    }catch (error) {
                        console.log(error);
                    }
                }
            )();
        }

        function redirectHome(event) {
            event.preventDefault();
            window.location = "home";
        }

        function post(url, data, action) {
            const config = {
                method: 'POST',
                body: data
            };

            (async () => {
                    const response = await fetch(url + `controller=UserController&action=${action}`, config);
                    const content = await response.text();
                    let output;

                    switch (action) {
                        case 'insert':
                            output = outputInsert(content);
                            break;
                        case 'findUnit':
                    }

                    $('#respostaFetch').html(output);
                    loadTable();
                }
            )();
        }

        function formSubmit(event) {
            event.preventDefault();

            const form_data = new FormData(this);
            // validateFormData(form_data);
            post(URL, form_data, "insert");
        }

        function validateFormData($form_data) {
            if (nome == null || nome.indexOf(" ") >= 0 || nome === "") {
                document.getElementById('nome').setCustomValidity('Preencha este campo corretamente');
            } else {

            }
        }
    }
)
(document);

function outputInsert(content) {
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
    return output;
}

function outputFindAll(data) {
    let output =
        `
                <table id = "user_data" class= "table table-bordered table-striped">
                    <thead> 
                        <tr>
                            <th width="1%"> id </th>
                            <th width = "15%"> Nome </th>
                        </tr>
                    </thead>
                    <tbody>
            `;

    if (data.length !== 0) {
        data.map(data => {
            output +=
                `
                    <tr>
                        <td> ` + data.id + ` </td>
                        <td> ` + data.nome + ` </td>
                    </tr>
                `;
        })
    } else {
        output +=
            `
                <td colspan = "4" align = "center"> Data not found </td>
            `;
    }

    output +=
        `
                </tbody>
            </table>
        `;

    return output;

}