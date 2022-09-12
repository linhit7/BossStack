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
                <h3 class="box-title">Thông tin role chức năng</h3>
            </div>
            <form role="form" action="<?php echo e(route('applicationroles-store'), false); ?>?index=true" method="post" id="frm">
                <?php echo e(csrf_field(), false); ?>

                <div class="box-body">
                    
                    <div class="form-group">
                        <label>Mã role chức năng <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="code" value="<?php echo e(old('code'), false); ?>">
                        <?php if($errors->has('code')): ?><span class="text-danger"><?php echo e($errors->first('code'), false); ?></span><?php endif; ?>                        
                    </div>                      
                    <div class="form-group">
                        <label>Tên role <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e(old('name'), false); ?>">
                        <?php if($errors->has('name')): ?><span class="text-danger"><?php echo e($errors->first('name'), false); ?></span><?php endif; ?>                        
                    </div>                      
                    <div class="form-group">
                        <label>Module truy cập <small class="text-danger text"> (*)</small>: </label><br>
                            <?php $__currentLoopData = $applicationmodules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($item->id, false); ?>. <?php echo e($item->applicationmodulename, false); ?>&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="modules_<?php echo e($item->id, false); ?>" value="<?php echo e($item->id, false); ?>" <?php echo e((old('modules_' . $item->id) == $item->id) ? 'checked' : '', false); ?>> <br> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="form-group">
                        <label>Ghi chú : </label>
                        <input type="text" class="form-control" name="description" value="<?php echo e(old('description'), false); ?>">
                    </div>
                    <div class="form-group">
                        <label>Sao y các quyền truy cập của nhóm:</label>
                        <select class="form-control select2" name="code_cp">
                            <option value=""></option>
                            <?php $__currentLoopData = $applicationroles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->code == old('code_cp')): ?>
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
                <button type="submit" class="btn btn-primary btn-save" tabindex="5">Lưu</button>
                <a href="<?php echo e(route('applicationroles-index'), false); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('company-manage.applicationroles.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>