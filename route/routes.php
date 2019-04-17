<?php

require_once('../model/Route.php');

Route::set('home', function () {
    UsuarioController::createView('home');
});

Route::set('cadastro', function () {
    UsuarioController::createView('cadastro');
});

Route::set('login', function () {
    UsuarioController::login();
});

Route::set('dashboard', function () {
    UsuarioController::createView('dashboard');
});

