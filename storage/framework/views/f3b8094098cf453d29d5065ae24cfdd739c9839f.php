<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/style.css'), false); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin quá trình công tác</h3>
            </div>
            <form role="form" action="<?php echo e(route('historyworks-update', ['id' => $model->id]), false); ?>?continue=false" method="post" id="frm">
                <?php echo e(csrf_field(), false); ?>

                <?php echo e(method_field('put'), false); ?>

                <input type="hidden" name="employeeid"  value="<?php echo e($employeeid, false); ?>">                
                <div class="box-body">
                    <div class="form-group">
                        <label>Phòng ban <small class="text-danger text"> (*)</small>: </label>
                        <select class="form-control select2" name="department_id">
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->id == $model->department_id): ?>
                                    <option value="<?php echo e($item->id, false); ?>" selected><?php echo e($item->name, false); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($item->id, false); ?>"><?php echo e($item->name, false); ?></option>                                                                    
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('department_id')): ?><span class="text-danger"><?php echo e($errors->first('department_id'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Chức vụ <small class="text-danger text"> (*)</small>: </label>
                        <select class="form-control select2" name="position_id">
                            <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->id == $model->position_id): ?>
                                    <option value="<?php echo e($item->id, false); ?>" selected><?php echo e($item->name, false); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($item->id, false); ?>"><?php echo e($item->name, false); ?></option>                                                                    
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('position_id')): ?><span class="text-danger"><?php echo e($errors->first('position_id'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Số tháng đã làm: </label>
                        <input type="text" class="form-control" name="nummonths" value="<?php echo e($model->nummonths, false); ?>">
                    </div>
                    <div class="form-group">
                        <div class="form-group col-md-6">
                            <label>Ngày bắt đầu <small class="text-danger text"> (*)</small>: </label>
                            <input type="date" class="form-control" name="fromdate" value="<?php echo e($model->fromdate, false); ?>">
                            <?php if($errors->has('fromdate')): ?><span class="text-danger"><?php echo e($errors->first('fromdate'), false); ?></span><?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ngày kết thúc : </label>
                            <input type="date" class="form-control" name="todate" value="<?php echo e($model->todate, false); ?>">
                            <?php if($errors->has('todate')): ?><span class="text-danger"><?php echo e($errors->first('todate'), false); ?></span><?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả công việc: </label>
                        <textarea class="form-control" name="description" rows="2"><?php echo e($model->description, false); ?></textarea>
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
                <a href="<?php echo e(route('historyworks-index', ['employeeid' => $employeeid]), false); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('user-employees.historywork.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>