var btn = document.getElementById('btn_admin');
btn.addEventListener('click', function () {
    document.location.href = '../../view/dashboard.php';
});


$(document).ready(function () {

    console.log('teste');

    $("#enviar").click(function (e) {
        var cod_cliente = $('#cod_cliente').val();
        var nome = $('#nome').val();

        $.ajax({
            url: "insert.php",
            type: 'post',
            data: {
                cod_cliente,
                nome
            },
            success: function (result) {
                alert(result)
            }
        });
    });
});

