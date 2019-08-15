<?php

Route::set('home', function () {
    View::CreateView('home');
});

Route::set('admin', function () {
    View::CreateView('admin');
});