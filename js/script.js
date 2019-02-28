

var btn = document.getElementById('btnHome');
btn.addEventListener('click', function () {
   //console.log("teste");;
});


$(document).ready(function () {

    //console.log('teste');

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

