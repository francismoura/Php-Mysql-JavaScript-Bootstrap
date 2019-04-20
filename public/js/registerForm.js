(function () {

    console.log("PRIMEIRO TESTE");
    const form = document.getElementById('form_cadastro').addEventListener('submit', formSubmit);
    const btnHome = document.getElementById('btnHome').addEventListener('click', redirectHome);
    const nome = document.getElementById('nome');
    let textNome;
    let output = ``;

    loadTable();

    function redirectHome(event) {
        event.preventDefault();
        window.location = "home";
    }

    function loadTable() {
        fetch('../controller/fetch.php')
            .then(response => response.json()
                .then(function (data) {

                    output =
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
                        data.forEach(field => {
                            output +=
                                `
                                    <tr>
                                        <td> ` + field.id + ` </td>
                                        <td> ` + field.nome + ` </td>
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

                    $('#div-table').html(output);
                    $('#nome').val('');
                })
            ).catch(error => console.error(error))
    }

    function post(url, data) {
        const config = {
            method: 'POST',
            headers: {
                'Accept': 'application/json, text/plain, */*',
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8" // otherwise $_POST is empty
            },
            body: data // Coordinate the body type with 'Content-Type'
        };

        (async () => {
            const rawResponse = await fetch(url, config);
            const content = await rawResponse.text();
            $('#respostaFetch').html(content);
            loadTable();
        })();
    }

    function formSubmit(event) {
        event.preventDefault();

        textNome = nome.value;

        if (textNome.length === 0 || textNome.indexOf(" ") >= 0) {

            output +=
                `
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong> É necessário preencher todos os dados do formulário</strong> 
                    </div>
                `;

            $('#respostaFetch').html(output);

        } else {
            post('../controller/fetch.php', ('nome=' + textNome));
        }
    }

})(document);