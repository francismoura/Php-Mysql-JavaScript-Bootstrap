(function () {

    console.log("PRIMEIRO TESTE");
    const form = document.querySelector('#form_cadastro');

    function get(url, data) {
        // let nome = document.getElementById('nome').value;

        const config = {
            credentials: 'same-origin', // 'include', default: 'omit'
            method: 'POST',
            body: data, // Coordinate the body type with 'Content-Type'

        };

        return fetch(url, config)

    }

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const request_uri = location.pathname + location.search;

        let nome = document.getElementById('nome').value;

        get('teste.php', {nome: (nome)})
            .then(response => response.text())
            .then(data => console.log(data)) // Result from the `response.json()` call
            .catch(error => console.error(error))
    });

    $('#insert').click(function () {
        const nome = $('#nome').val();
        //	console.log($('#action').val('nome'))
    })

})(document);