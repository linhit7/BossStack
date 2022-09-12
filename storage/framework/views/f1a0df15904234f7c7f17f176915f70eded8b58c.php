<div class="modal fade employeepermissiondays" tabindex="-1" role="dialog" aria-labelledby="employeepermissiondays" aria-hidden="true" id="employeepermissiondays">
    <form action="<?php echo e(route('employeepermissiondays', ['employee_id' => $employee->id ]), false); ?>" enctype="multipart/form-data" method="POST">
        <?php echo e(csrf_field(), false); ?>

        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Đăng kí ngày nghỉ</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Ngày tồn năm ngoái</label>
                            <input type="number" class="form-control" placeholder="Ngày tồn năm ngoái" step="0.01" name="permissionlastyear">
                        </div>

                        <div class="form-group">
                            <label>Phép hiện có năm nay</label>
                            <input type="number" class="form-control" placeholder="Phép hiện có năm nay" step="0.01" name="permissioncurryear">
                        </div>

                        <div class="form-group">
                            <label>Phép đã nghỉ</label>
                            <input type="number" class="form-control" placeholder="Phép đã nghỉ" step="0.01" name="permissionleave">
                        </div>

                        <div class="form-group">
                            <label>Phép còn lại</label>
                            <input type="number" class="form-control" placeholder="Phép còn lại" step="0.01" name="permissionleft">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-create">Đăng ký</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>