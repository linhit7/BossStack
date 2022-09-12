<div class="modal fade" id="getFormAdd" role="dialog">
    <form action="<?php echo e(route('positions-store'), false); ?>?index=true" enctype="multipart/form-data" method="POST">
        <?php echo e(csrf_field(), false); ?>

        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tạo mới chức vụ</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Mã chức vụ</label>
                        <input type="text" class="form-control" placeholder="Nhập mã chức vụ" name="code_position">
                    </div>
                    <div class="form-group">
                        <label>Chức vụ</label>
                        <input type="text" class="form-control" placeholder="Nhập tên chức vụ" name="name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-create">Tạo mới</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </form>
</div>