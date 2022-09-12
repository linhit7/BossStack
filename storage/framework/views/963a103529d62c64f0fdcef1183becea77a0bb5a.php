<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Chỉnh sửa người dùng</h3>
            </div>
            <form  method="post" action="<?php echo e(route('users-update', ['id' => $model->id ]), false); ?>" role="form" id="users-form">
                <?php echo e(csrf_field(), false); ?>

                <?php echo e(method_field('put'), false); ?>

                <div class="box-body">
                    <div class="form-group <?php echo e(($errors->has('name')) ? ' has-error' : '', false); ?>">
                        <label>Tên người dùng</label>
                        <input type="text" class="form-control" name="name" tabindex="1" value="<?php echo e($model->name, false); ?>">
                        <?php if($errors->has('name')): ?><span class="help-block"><?php echo e($errors->first('name'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" tabindex="2" value="<?php echo e($model->email, false); ?>">
                        <?php if($errors->has('email')): ?><span class="help-block"><?php echo e($errors->first('email'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Set mật khẩu</label>
                        <input type="password" class="form-control" name="password" tabindex="3" value="<?php echo e($model->password, false); ?>">
                        <?php if($errors->has('password')): ?><span class="help-block"><?php echo e($errors->first('password'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Quyền truy cập</label>
                        <select class="form-control select2" name="role">
                            <option value=""></option>
                            <?php $__currentLoopData = $applicationroles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->code == $model->role): ?>
                                    <option value="<?php echo e($item->code, false); ?>" selected><?php echo e($item->code . '. ' . $item->name, false); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($item->code, false); ?>"><?php echo e($item->code . '. ' . $item->name, false); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Chức năng</h3>
            </div>
            <div class="box-body">
                <button type="submit" class="btn btn-primary btn-save" tabindex="9">Lưu</button>
                <a href="<?php echo e(route('users-index'), false); ?>" class="btn btn-default btn-cancel" tabindex="10">Trở về</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('user-employees.user.user_account.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>