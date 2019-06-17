<!--navbar Dashboard-->

<body>

<nav class="navbar navbar-expand-md" style="padding: 0;">
    <div class="container">
        <a class="navbar-brand">
            <img class="img-nav" src="../app/view/resources/img/logo.png" width="30px" style="vertical-align: middle"
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
<div class="container" style="margin-top: 2em">
    <div class="table-title"> <!--Trocar nome table-->
        <div class="row my-sm-1">
            <div class="col-sm-4">
                <a class="header-title">Controle de <b>Serviços</b></a>
            </div>
            <div class="col">
                <input class="form-control" id="txtSearch" type="search" placeholder="Pesquisar"
                       aria-label="Pesquisar">
            </div>
            <div class="col">
                <a href="#addModal" class="btn btn-success" data-toggle="modal">
                    <i class="material-icons">add_circle</i>
                    <span>Solicitar</span>
                </a>
                <a href="#deleteModal" class="btn btn-danger" data-toggle="modal">
                    <i class="material-icons">remove_circle</i>
                    <span>Remover</span>
                </a>
            </div>
        </div>
    </div>
</div>