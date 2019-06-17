<?php
require_once '../config/function.php';

getHeaderAdmin();//cabeçaho do <html>

getNavbar();//<body>

getRequestManagerTable();

/* Modais para CRUD*/
getAddModal();

getEditModal();

getDeleteModal();

getShowModal();
/*Fim Modal */

getFooterAdmin();//importa o javascript e finaliza html (</body> </html>)