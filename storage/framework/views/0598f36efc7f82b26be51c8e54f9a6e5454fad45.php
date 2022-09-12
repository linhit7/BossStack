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
                <h3 class="box-title">Thông tin nhóm chức năng</h3>
            </div>
            <form role="form" action="<?php echo e(route('applicationfunctiongroups-store')); ?>?index=true" method="post" id="frm">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="applicationmoduleid"  value="<?php echo e($applicationmoduleid); ?>">                
                <div class="box-body">
                    <div class="form-group">
                        <label>Module chức năng <small class="text-danger text"> (*)</small>:</label><br>
                        <?php echo e($applicationmodules->id . '. ' . $applicationmodules->applicationmodulename); ?>

                    </div>                      
                    <div class="form-group">
                        <label>Nhóm chức năng <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
                        <?php if($errors->has('name')): ?><span class="text-danger"><?php echo e($errors->first('name')); ?></span><?php endif; ?>                        
                    </div>                      
                    <div class="form-group">
                        <label>Thứ tự <small class="text-danger text"> (*)</small>: </label>
                        <input type="text" class="form-control" name="displayorder" value="<?php echo e(old('displayorder')); ?>">
                    </div>
                    <div class="form-group">
                        <label>Image : </label>
                        <input type="text" class="form-control" name="image" value="<?php echo e(old('image')); ?>">
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
                <a href="<?php echo e(route('applicationfunctiongroups-index', ['applicationmoduleid' => $applicationmoduleid])); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('company-manage.applicationfunctiongroups.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>