<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Solicitação de <b>Serviços</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addModal" class="btn btn-success" data-toggle="modal">
                        <i class="material-icons">add_circle</i>
                        <span>Nova Solicitação</span>
                    </a>

                    <a href="#deleteModal" class="btn btn-danger" data-toggle="modal">
                        <i class="material-icons">remove_circle</i>
                        <span>Delete</span>
                    </a>

                </div>
            </div>
        </div>

        <div class="table table-responsive" id="div-table">

        </div>

        <div>
            <ul class="pagination pagination-lg">
                <li class="page-item disabled"><a href="#">Previous</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
        </div>

    </div>

<!--    My Modal-->
    <div id="myModal" class="modal fullscreen fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <!--Overlay iframe inserted here-->
                </div>
                <div class="close-btn" data-dismiss="modal">×</div>
            </div>
        </div>
    </div>

    <?php
    require_once('../config/function.php');
    getEditModal();
    getDeleteModal();
    getAddModal();
    ?>
</div>

<script src="../app/view/assets/js/table.js"></script>

