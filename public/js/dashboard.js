(function () {

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

})(document);