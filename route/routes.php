<?php

require_once('../model/Route.php');

Route::set('', function () {
    UsuarioController::createView('home');
});

Route::set('cadastro', function () {
    UsuarioController::createView('cadastro');
});