(function () {
    console.log("Script Funcionando Corretamente");
    //const request_uri = location.pathname + location.search;
    const nome = document.getElementById('nome');
    let textNome;
    const form = document.querySelector('#form_cadastro');
    const output = `<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> É necessário preencher todos os dados do formulário</strong> </div>`;

    loadTable();

    function loadTable() {
        fetch('../view/includes/tabela.php')
            .then(response => response.text())
            .then(function (data) {
                console.log(data);
                $('#div-table').html(data);
                $('#nome').val('');
            })
            .catch(error => console.error(error))
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

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        textNome = nome.value;

        if (textNome === '') {
            $('#respostaFetch').html(output);
        }else{
            post('../model/teste.php', ('nome=' + textNome));
        }
    });


    $('#insert').click(function () {
        const table = document.getElementById('user_data');
        //parei aqui;
    })

})(document);