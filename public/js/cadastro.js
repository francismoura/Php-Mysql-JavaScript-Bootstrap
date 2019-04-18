(function () {

    console.log("PRIMEIRO TESTE");
    const form = document.getElementById('form_cadastro');
    const nome = document.getElementById('nome');
    let textNome;
    const output =
        `
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong> É necessário preencher todos os dados do formulário</strong> 
            </div>
        `;

    loadTable();

    function loadTable() {
        fetch('../controller/tabela.php')
            .then(response => response.text()
                .then(function (data) {
                    $('#div-table').html(data);
                    $('#nome').val('');
                }))
            .catch(error => console.error(error))
    }

    function get(url, data) {
        const config = {
            method: 'POST',
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
        console.log(textNome.indexOf(" ") >= 0);

        if (textNome.length === 0 || textNome.indexOf(" ") >= 2) {
            $('#respostaFetch').html(output);
        } else {
            get('../controller/teste.php', ('nome=' + textNome));
        }
    });

})(document);