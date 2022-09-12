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
            <form role="form" action="<?php echo e(route('applicationroles-update', ['id' => $model->id])); ?>?continue=true" method="post" id="frm">
                <?php echo e(csrf_field()); ?>

                <div class="box-body">
                    <div class="form-group">
                        <label>Mã role chức năng <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="code" value="<?php echo e($model->code); ?>">
                        <?php if($errors->has('code')): ?><span class="text-danger"><?php echo e($errors->first('code')); ?></span><?php endif; ?>                        
                    </div>                      
                    <div class="form-group">
                        <label>Tên role <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($model->name); ?>">
                        <?php if($errors->has('name')): ?><span class="text-danger"><?php echo e($errors->first('name')); ?></span><?php endif; ?>                        
                    </div>                                           
                    <div class="form-group">
                        <label>Module truy cập <small class="text-danger text"> (*)</small>: </label><br>
                            <?php $__currentLoopData = $applicationmodules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($item->id); ?>. <?php echo e($item->applicationmodulename); ?>&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="modules_<?php echo e($item->id); ?>" value="<?php echo e($item->id); ?>" <?php echo e(in_array($item->id,$modulesallowed) ? 'checked' : ''); ?>> <br> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="form-group">
                        <label>Ghi chú : </label>
                        <input type="text" class="form-control" name="description" value="<?php echo e($model->description); ?>">
                    </div>  
                    <div class="form-group">
                        <label>Sao y các quyền truy cập của nhóm:</label>
                        <select class="form-control select2" name="code_cp">
                            <option value=""></option>
                            <?php $__currentLoopData = $applicationroles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->code == $model->code_cp): ?>
                                    <option value="<?php echo e($item->code); ?>" selected><?php echo e($item->code . '. ' . $item->name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($item->code); ?>"><?php echo e($item->code . '. ' . $item->name); ?></option>
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
                <a href="<?php echo e(route('applicationroles-index')); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('company-manage.applicationroles.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>