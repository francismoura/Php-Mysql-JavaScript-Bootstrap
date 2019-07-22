<?php
require_once '../app/view/pages/_includes/header.php';
?>

<body>
<h4 class="text-center my-5">Autenticação do Sistema</h4>
<div class="col-sm-3 mx-auto">
    <div class="card card-signin my-5">
        <div class="card-body">
            <img class="mb-4 img-login" src="../app/view/resources/img/usuario.png" alt="">
            <h5 class="login-title text-center">Login</h5>
            <form class="form-signin">
                <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control " placeholder="Email address" required
                           autofocus>
                    <label for="inputEmail">Email</label>
                </div>
                <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <label for="inputPassword">Senha</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Lembrar-me</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" id="login" type="submit">Entrar</button>
            </form>
        </div>
    </div>
</div>

<script src="../app/view/resources/js/login.js"></script>

</body>
</html>