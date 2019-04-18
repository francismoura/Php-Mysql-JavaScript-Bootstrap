<?php

require_once('../model/Route.php');

Route::set('home', function () {
    UsuarioController::home();
});

Route::set('cadastro', function () {
    UsuarioController::cadastrar();
});

Route::set('login', function () {
    UsuarioController::login();
});

Route::set('dashboard', function () {
    UsuarioController::createView('dashboard');
});