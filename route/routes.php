<?php

require_once('../controller/UserController.php');
require_once ('../model/Route.php');

Route::set('home', function () {
    UserController::createView('home');
});

Route::set('cadastro', function () {
    UserController::createView('cadastro');
});

Route::set('login', function () {
    UserController::createView('login');
});

Route::set('dashboard', function () {
    UserController::createView('dashboard');
});