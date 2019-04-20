<?php
require_once('model/Route.php');

Route::set('home', function () {
    UserController::home();
});

Route::set('cadastro', function () {
    UserController::cadastrar();
});

Route::set('login', function () {
    UserController::login();
});

Route::set('dashboard', function () {
    UserController::createView('dashboard');
});