<div class="modal fade" id="getFormAdd" role="dialog">
    <form action="<?php echo e(route('users-store'), false); ?>" enctype="multipart/form-data" method="POST">
        <?php echo e(csrf_field(), false); ?>

        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tạo mới người dùng</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên người dùng</label>
                            <input type="text" name="name" class="form-control">
                            <?php if($errors->has('name')): ?><span class="help-block"><?php echo e($errors->first('name'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email">
                        <?php if($errors->has('email')): ?><span class="help-block"><?php echo e($errors->first('email'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control">
                        <?php if($errors->has('password')): ?><span class="help-block"><?php echo e($errors->first('password'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Quyền truy cập</label>
                        <select class="form-control select2" name="role">
                            <option value=""></option>
                            <?php $__currentLoopData = $applicationroles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->code == old('role')): ?>
                                    <option value="<?php echo e($item->code, false); ?>" selected><?php echo e($item->code . '. ' . $item->name, false); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($item->code, false); ?>"><?php echo e($item->code . '. ' . $item->name, false); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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