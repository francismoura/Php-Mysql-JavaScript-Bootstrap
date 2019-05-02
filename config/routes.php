<?php

require_once('../app/model/View.php');
require_once('../app/model/Route.php');

Route::set('home', function () {
    View::make('home');
});

Route::set('form', function () {
    View::make('form');
});

Route::set('login', function () {
    View::make('login');
});

Route::set('dashboard', function () {
    View::make('dashboard');
});