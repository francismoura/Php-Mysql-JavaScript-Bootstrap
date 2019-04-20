(function () {

    document.getElementById('acessologin')
        .addEventListener("click", function(event){
            event.preventDefault();
            window.location = "login";
        });

    document.getElementById('acessoForm')
        .addEventListener("click", function (event) {
            event.preventDefault();
            window.location = "cadastro";

        });

})(document);