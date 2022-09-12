<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css')); ?>">
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
            <form  method="post" action="<?php echo e(route('usercustomers-update', ['id' => $model->id ])); ?>" role="form" id="users-form">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('put')); ?>

                <div class="box-body">
                    <div class="form-group <?php echo e(($errors->has('name')) ? ' has-error' : ''); ?>">
                        <label>Tên người dùng</label>
                        <input type="text" class="form-control" name="name" tabindex="1" value="<?php echo e($model->name); ?>">
                        <?php if($errors->has('name')): ?><span class="help-block"><?php echo e($errors->first('name')); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" tabindex="2" value="<?php echo e($model->email); ?>">
                        <?php if($errors->has('email')): ?><span class="help-block"><?php echo e($errors->first('email')); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Đặt lại mật khẩu</label>
                        <input type="password" class="form-control" name="password" tabindex="3" value="">
                    </div>
                    <div class="form-group">
                        <label>Quyền truy cập</label>
                        <select class="form-control select2" name="role">
                            <option value=""></option>
                            <?php $__currentLoopData = $applicationroles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->code == $model->role): ?>
                                    <option value="<?php echo e($item->code); ?>" selected><?php echo e($item->code . '. ' . $item->name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($item->code); ?>"><?php echo e($item->code . '. ' . $item->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><u>TÀI KHOẢN KHÁCH HÀNG</u>:</label>
                        <select class="form-control select2" name="customer_id">
                            <option value=""></option>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->id == $model->customer_id): ?>
                                    <option value="<?php echo e($item->id); ?>" selected><?php echo e("[" . $item->customercode . "] " . $item->fullname . " - " . $item->email); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e("[" . $item->customercode . "] " . $item->fullname . " - " . $item->email); ?></option>                                                                    
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
                <a href="<?php echo e(route('usercustomers-index')); ?>" class="btn btn-default btn-cancel" tabindex="10">Trở về</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('user-employees.user.user_account_customer.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>