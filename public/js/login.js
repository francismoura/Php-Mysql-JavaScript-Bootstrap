(function () {

    document.getElementById('login')
        .addEventListener("click", function(event){
            event.preventDefault();
            window.location = ("dashboard");
        });

    //fetch com estrutura php para login:
    //deve entregar o nome o senha, permitir login e salvar SESSÃO de usuário *importante!
})(document);