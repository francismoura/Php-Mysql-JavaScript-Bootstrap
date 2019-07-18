<?php
require_once '../app/view/pages/admin/_includes/header.php';
?>

<body>
<div class="body-header">
    <nav class="navbar navbar-expand-md" style="padding: 0;">
        <div class="container">
            <a class="navbar-brand" href="">
                <img class="img-nav" src="../app/view/resources/img/logo.png" width="30px"
                     style="vertical-align: middle"
                     alt="logo">
                <span class="nav-title">
                Departamento de Tecnologia da Informação
                </span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" id="logout" style="color: white">
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="container" style="margin-top: 2em">
    <div class="table-wrapper" id="div-table">
        <div class="table-title" id="table-title"> <!--Trocar nome table-->
            <div class="row my-sm-1">
                <div class="col-sm-4">
                    <a class="header-title">Controle de <b>Serviços</b></a>
                </div>
                <div class="col">
                    <input class="form-control" id="txtSearch" type="search" placeholder="Pesquisar"
                           aria-label="Pesquisar">
                </div>
                <div class="col">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addModal">
                        <i class="material-icons">add_circle</i>
                        <span>Solicitar</span>
                    </button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                        <i class="material-icons">remove_circle</i>
                        <span>Remover</span>
                    </button>
                </div>
            </div>
        </div>

        <!--        fetch          -->

        <div class="clearfix">
            <div class="hint-text">Exibindo <b>X</b> de <b>Y</b> resultados</div>
            <ul class="pagination">
                <li class="page-item disabled"><a href="#">Anterior</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">Próxima</a></li>
            </ul>
        </div>

    </div>
</div>


<!--Add Modal-->
<div id="addModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Adicionar Serviço</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Name
                            <input type="text" class="form-control" required="">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Email
                            <input type="email" class="form-control" required="">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Address
                            <textarea class="form-control" required=""></textarea>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Phone
                            <input type="text" class="form-control" required="">
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>

<!--Edit Modal-->
<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Name
                            <input type="text" class="form-control" required="">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Email
                            <input type="email" class="form-control" required="">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Address
                            <textarea class="form-control" required=""></textarea>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Phone
                            <input type="text" class="form-control" required="">
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!--Delete Modal-->
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning">
                        <small>This action cannot be undone.</small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>

<!--Show Modal -->
<div id="showModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
            </form>
        </div>
    </div>
</div>

<?php
require_once '../app/view/pages/admin/_includes/footer.php';
?>

