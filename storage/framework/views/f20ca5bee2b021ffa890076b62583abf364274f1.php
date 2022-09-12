<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin module chức năng</h3>
            </div>
            <form role="form" action="<?php echo e(route('applicationmodules-update', ['id' => $model->id])); ?>?continue=true" method="post" id="frm">
                <?php echo e(csrf_field()); ?>

                <div class="box-body">
                    <div class="form-group">
                        <label>Mã module <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="code" value="<?php echo e($model->code); ?>">
                        <?php if($errors->has('code')): ?><span class="text-danger"><?php echo e($errors->first('code')); ?></span><?php endif; ?>                        
                    </div>                      
                    <div class="form-group">
                        <label>Tên module <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="applicationmodulename" value="<?php echo e($model->applicationmodulename); ?>">
                        <?php if($errors->has('applicationmodulename')): ?><span class="text-danger"><?php echo e($errors->first('applicationmodulename')); ?></span><?php endif; ?>                        
                    </div>                                           
                    <div class="form-group">
                        <label>Hiển thị/Ẩn:&nbsp;&nbsp;</label>
                        <input type="checkbox" tabindex="4" name="hidden" value="1" id="chk-hidden" <?php echo e($model->hidden==1 ? 'checked="checked"' : ''); ?>>
                    </div>                                           
                    <div class="form-group">
                        <label>Thứ tự hiển thị: </label>
                        <input type="text" class="form-control" name="displayorder" value="<?php echo e($model->displayorder); ?>">
                        <?php if($errors->has('displayorder')): ?><span class="text-danger"><?php echo e($errors->first('displayorder')); ?></span><?php endif; ?>                        
                    </div>
                    <div class="form-group">
                        <label>Image : </label>
                        <input type="text" class="form-control" name="image" value="<?php echo e($model->image); ?>">
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
                <a href="<?php echo e(route('applicationmodules-index')); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('company-manage.applicationmodules.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>