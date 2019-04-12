(function () {

    loadTable();

    function loadTable() {
        fetch('../controller/table.php')
            .then(response => response.text())
            .then(function (data) {
                $('#div-table').html(data);
                $('#nome').val('');
            })
            .catch(error => console.error(error))
    }

    console.log("PRIMEIRO TESTE");
    const form = document.querySelector('#form_cadastro');


    function get(url, data) {
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

        const request_uri = location.pathname + location.search;

        const output = `<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> É necessário preencher todos os dados do formulário</strong> </div>`;

        let nome = document.getElementById('nome').value;
        if (nome === '') {
            $('#respostaFetch').html(output);
        }else{
            get('../model/teste.php', ('nome=' + nome));
        }
    });


    $('#insert').click(function () {
        const table = document.getElementById('user_data');
        //parei aqui;
    })

})(document);