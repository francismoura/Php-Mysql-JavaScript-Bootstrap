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