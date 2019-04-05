(function() {

    console.log("PRIMEIRO TESTE");
    const form = document.querySelector('#form_cadastro');

    function get(url) {
        const headers = new Headers();
        headers.append('Content-Type', 'text/plain');

        let nome = document.getElementById('nome').value;

        let user = "nome:" + nome;

        //let nome = new FormData(document.getElementById('nome'));

        //console.log(nome.values);

        const config = {
            method: 'POST',
            headers: {
                nome: nome
            }
            //body: user
        };

        return fetch(url, config)
    }

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const request_uri = location.pathname + location.search;

        get('../model/teste.php')
            .then(response => response)
            .then(result => console.log(result))
            .catch(error => console.log(error))
    })

    $('#insert').click(function() {
        const nome = $('#nome').val();
        //	console.log($('#action').val('nome'))
    })

})(document);