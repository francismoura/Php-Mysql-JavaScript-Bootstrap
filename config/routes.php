<?php

require_once('../app/core/View.php');
require_once('../app/core/Route.php');

Route::set('home', function () {
    View::build('home');
});

Route::set('form', function () {
    View::build('form');
});

Route::set('login', function () {
    View::build('login');
});

Route::set('dashboard', function () {
    View::build('dashboard');
});