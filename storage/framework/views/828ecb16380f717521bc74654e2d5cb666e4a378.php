<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin quan hệ nhân thân</h3>
            </div>
            <form role="form" action="<?php echo e(route('familyrlships-store'), false); ?>?index=true" method="post" id="frm">
                <?php echo e(csrf_field(), false); ?>

                <input type="hidden" name="employeeid"  value="<?php echo e($employeeid, false); ?>">                
                <div class="box-body">
                    <div class="form-group">
                        <label>Quan hệ <small class="text-danger text"> (*)</small>: </label>
                        <select class="form-control select2" name="relation">
                            <?php $__currentLoopData = $relationshiptype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key == old('relation')): ?>
                                    <option value="<?php echo e($key, false); ?>" selected><?php echo e($value, false); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>                                                                    
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('relation')): ?><span class="text-danger"><?php echo e($errors->first('relation'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Họ tên <small class="text-danger text"> (*)</small>: </label>
                        <input type="text" class="form-control" name="fullname" value="<?php echo e(old('fullname'), false); ?>">
                         <?php if($errors->has('fullname')): ?><span class="text-danger"><?php echo e($errors->first('fullname'), false); ?></span><?php endif; ?>                       
                    </div>                    
                    <div class="form-group">
                        <label>Ngày sinh: </label>
                        <input type="date" class="form-control" name="birthday" value="<?php echo e(old('birthday'), false); ?>">
                        <?php if($errors->has('birthday')): ?><span class="text-danger"><?php echo e($errors->first('birthday'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ: </label>
                        <input type="text" class="form-control" name="address" value="<?php echo e(old('address'), false); ?>">
                    </div>
                    <div class="form-group">
                        <label>Công việc / Điện thoại liên lạc:</label>
                        <input type="text" class="form-control" name="work" value="<?php echo e(old('work'), false); ?>">
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
                <button type="submit" class="btn btn-primary btn-save" tabindex="5">Lưu</button>
                <a href="<?php echo e(route('familyrlships-index', ['employeeid' => $employeeid]), false); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('user-employees.familyrlship.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>