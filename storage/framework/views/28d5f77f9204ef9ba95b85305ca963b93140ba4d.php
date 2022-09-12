<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin functiongroup chức năng</h3>
            </div>
            <form role="form" action="<?php echo e(route('functionassignment-update', ['id' => $model->id]), false); ?>?continue=true" method="post" id="frm">
                <?php echo e(csrf_field(), false); ?>

                <input type="hidden" name="applicationmoduleid"  value="<?php echo e($applicationmoduleid, false); ?>">                
                <input type="hidden" name="applicationfunctiongroupid"  value="<?php echo e($applicationfunctiongroupid, false); ?>">                
                <div class="box-body">
                    <div class="form-group">
                        <label>Module chức năng <small class="text-danger text"> (*)</small>:</label><br>
                        <?php echo e($applicationmodules->applicationmodulename, false); ?>

                    </div>                      
                    <div class="form-group">
                        <label>Nhóm menu chức năng <small class="text-danger text"> (*)</small>:</label><br>
                        <?php echo e($applicationfunctiongroup->name, false); ?>

                    </div>                      
                    <div class="form-group">
                        <label>Chức năng <small class="text-danger text"> (*)</small>:</label>
                        <select class="form-control select2" name="applicationresourceid">
                            <option value=""></option>
                            <?php $__currentLoopData = $applicationresources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->id == $model->applicationresourceid): ?>
                                    <option value="<?php echo e($item->id, false); ?>" selected><?php echo e($item->code . '. ' . $item->name, false); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($item->id, false); ?>"><?php echo e($item->code . '. ' . $item->name, false); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($errors->has('applicationresourceid')): ?><span class="text-danger"><?php echo e($errors->first('applicationresourceid'), false); ?></span><?php endif; ?>
                        </select>
                    </div>                      
                    <div class="form-group">
                        <label>Thứ tự hiển thị: </label>
                        <input type="text" class="form-control" name="displayorder" value="<?php echo e($model->displayorder, false); ?>">
                        <?php if($errors->has('displayorder')): ?><span class="text-danger"><?php echo e($errors->first('displayorder'), false); ?></span><?php endif; ?>                        
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
                <a href="<?php echo e(route('functionassignment-index', ['applicationmoduleid'=> $applicationmoduleid, 'applicationfunctiongroupid'=> $applicationfunctiongroupid]), false); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('company-manage.applicationfunctiongroups.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>