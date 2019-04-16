(function () {

    let login;

    loadTable();

    function loadTable() {
        fetch('../view/cadastro/tabela.php')
            .then(response => response.text())
            .then(function (data) {
                $('#div-table').html(data);
                $('#nome').val('');
            })
            .catch(error => console.error(error))
    }


})(document);