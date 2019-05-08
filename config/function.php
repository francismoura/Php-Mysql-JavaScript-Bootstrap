<?php

function getHeader(){
    require_once('../app/view/pages/_includes/header.php');
}

function getHeaderAdmin(){
    require_once('../app/view/pages/admin/_includes/header.php');
}

function getFooter(){
    require_once('../app/view/pages/_includes/footer.php');
}


function getController($controllerName){
    require_once ('../app/controller/'. $controllerName . '.php');
}

function getTable(){
    require_once('../app/view/pages/admin/_includes/table.php');
}

//function getScript($scriptName){
//   return '<script src="../app/view/assets/js/' .$scriptName. '"></script>';
//}

function getNavbar(){
    require_once('../app/view/pages/admin/_includes/navbar.php');
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