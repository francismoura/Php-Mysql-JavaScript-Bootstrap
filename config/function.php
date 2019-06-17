<?php

function getHeader(){
    require_once('../app/view/pages/_includes/header.php');
}

function getFooter(){
    require_once('../app/view/pages/admin/_includes/footer.php');
}


 //Funções para a view Dashboard
function getFooterAdmin(){
    require_once('../app/view/pages/admin/_includes/footer/footer.php');
}

function getHeaderAdmin(){
    require_once('../app/view/pages/admin/_includes/header/header.php');
}

function getController($controllerName){
    require_once ('../app/controller/'. $controllerName . '.php');
}

function getRequestManagerTable(){
    require_once('../app/view/pages/admin/_includes/body/table.php');
}

function getNavbar(){
    require_once('../app/view/pages/admin/_includes/body/navbar.php');
}

function getDeleteModal(){
    require_once('../app/view/pages/admin/_includes/modal/delete.php');
}

function getEditModal(){
    require_once('../app/view/pages/admin/_includes/modal/edit.php');
}

function getAddModal(){
    require_once('../app/view/pages/admin/_includes/modal/add.php');

}
function getShowModal(){
    require_once('../app/view/pages/admin/_includes/modal/show.php');

}