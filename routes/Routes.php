<?php

require_once ('classes/Route.php');

Route::set('index', function(){
	UsuarioController::CreateIndex('index');

});

Route::set('home', function(){
	UsuarioController::CreateView('home');
});

Route::set('cadastro', function(){
	UsuarioController::CreateView('cadastro');
});


 ?>