<div class="modal fade" id="getFormAdd" role="dialog">
    <form action="<?php echo e(route('emplperdays-store'), false); ?>?index=true" enctype="multipart/form-data" method="POST">
        <?php echo e(csrf_field(), false); ?>

        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tạo mới phép năm</h4>
                </div>
                <div class="modal-body">
                	<div class="form-group">
                		<label>Họ tên</label>
                        <select class="form-control select2" name="employee_id">
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($employee->id, false); ?>"><?php echo e($employee->fullname, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phép tồn năm trước</label>
                        <input type="number" class="form-control" placeholder="Phép tồn năm trước" step="0.01" name="permission_lastyear">
                    </div>
                    <div class="form-group">
                        <label>Phép được hưởng</label>
                        <input type="number" class="form-control" placeholder="Phép được hưởng" step="0.01" name="permission_curryear">
                    </div>
                    <div class="form-group">
                        <label>Phép đã nghỉ</label>
                        <input type="number" class="form-control" placeholder="Phép đã nghỉ" step="0.01" name="permission_leave">
                    </div>
                    <div class="form-group">
                        <label>Phép còn lại</label>
                        <input type="number" class="form-control" placeholder="Phép còn lại" step="0.01" name="permission_left">
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