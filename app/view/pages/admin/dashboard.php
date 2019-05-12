<?php

require_once ('../config/function.php');

getHeaderAdmin();//inclui a header do admin

getNavbar();//inclui o menu de navegação do admin e inicia o corpo(<body>) do html

getRequestManagerTable();//inclui a tabela para gerenciar as solicitações

/* Modais para CRUD*/
    getAddModal();

    getEditModal();

    getDeleteModal();

    getShowModal();
/*Fim Modal */

getFooterAdmin();//importa o javascript e finaliza html (</body> </html>)