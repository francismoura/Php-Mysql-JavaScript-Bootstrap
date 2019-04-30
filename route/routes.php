<?php

require_once('../controller/UserController.php');
require_once('../core/Route.php');

Route::set('home', function () {
    UserController::createView('home');
});

Route::set('form', function () {
    UserController::createView('form');
});

Route::set('login', function () {
    UserController::createView('login');
});

Route::set('dashboard', function () {
    UserController::createView('dashboard');
});