<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin trang truy cập</h3>
            </div>
            <form role="form" action="<?php echo e(route('applicationresources-update', ['id' => $model->id]), false); ?>?continue=true" method="post" id="frm">
                <?php echo e(csrf_field(), false); ?>

                <div class="box-body">
                    <div class="form-group">
                        <label>Mã trang truy cập <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="code" value="<?php echo e($model->code, false); ?>">
                        <?php if($errors->has('code')): ?><span class="text-danger"><?php echo e($errors->first('code'), false); ?></span><?php endif; ?>                        
                    </div>                      
                    <div class="form-group">
                        <label>Tên trang truy cập <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($model->name, false); ?>">
                        <?php if($errors->has('name')): ?><span class="text-danger"><?php echo e($errors->first('name'), false); ?></span><?php endif; ?>                        
                    </div>                                           
                    <div class="form-group">
                        <label>File name : </label>
                        <input type="text" class="form-control" name="filename" value="<?php echo e($model->filename, false); ?>">
                    </div>                                           
                    <div class="form-group">
                        <label>Page security : </label>
                        <input type="text" class="form-control" name="pagesecurity" value="<?php echo e($model->pagesecurity, false); ?>">
                    </div>                                           
                    <div class="form-group">
                        <label>Image : </label>
                        <input type="text" class="form-control" name="image" value="<?php echo e($model->image, false); ?>">
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
                <a href="<?php echo e(route('applicationresources-index'), false); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('company-manage.applicationresources.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>