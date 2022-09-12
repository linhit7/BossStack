<?php $__env->startSection('content'); ?>
<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<div class="row">
    <form role="form" action="<?php echo e(route('checkemployees-update', ['id' => $checkemployee->id]), false); ?>?continue=false" method="post" id="frm">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chỉnh sửa đăng kí ngày nghỉ</h3>
                </div>
                <?php echo e(csrf_field(), false); ?>

                <?php echo e(method_field('put'), false); ?>

                <input type="hidden" name="employeeid"  value="<?php echo e($employeeid, false); ?>">
                <div class="box-body">

                    <div class="form-group">
                        <label>Lý do nghỉ <small class="text-danger text"> (*)</small>:</label>
                        <select class="form-control select2" name="checktype_id" required>
                            <option value=""></option>
                            <?php $__currentLoopData = $checktypes->where('showtype', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checktype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($checkemployee->checktype_id == $checktype->id): ?>
                                    <option value="<?php echo e($checktype->id, false); ?>" selected><?php echo e($checktype->description, false); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($checktype->id, false); ?>"><?php echo e($checktype->description, false); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($errors->has('checktype_id')): ?><span class="text-danger"><?php echo e($errors->first('checktype_id'), false); ?></span><?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group from_start_box">
                        <label>Ngày bắt đầu <small class="text-danger text"> (*)</small>:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" class="form-control fromdate" name="fromdate" value="<?php echo e($checkemployee->fromdate->toDateString(), false); ?>" required>
                                <?php if($errors->has('fromdate')): ?><span class="text-danger"><?php echo e($errors->first('fromdate'), false); ?></span><?php endif; ?>
                            </div>
                            <div class="col-md-6" id="fromtime_box">
                                <select class="form-control select2 fromtime" name="fromtime" required>
                                    <?php $__currentLoopData = $timetype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($checkemployee->fromtime == $key): ?>
                                            <option value="<?php echo e($key, false); ?>" selected><?php echo e($value, false); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('fromtime')): ?><span class="text-danger"><?php echo e($errors->first('fromtime'), false); ?></span><?php endif; ?>                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group to_end_box">
                        <label>Ngày kết thúc <small class="text-danger text"> (*)</small>:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" class="form-control todate" name="todate" value="<?php echo e($checkemployee->todate->toDateString(), false); ?>" required>
                                <?php if($errors->has('todate')): ?><span class="text-danger"><?php echo e($errors->first('todate'), false); ?></span><?php endif; ?>
                            </div>
                            <div class="col-md-6" id="totime_box">
                                <select class="form-control select2 totime" name="totime" required>
                                    <?php $__currentLoopData = $timetype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($checkemployee->totime == $key): ?>
                                            <option value="<?php echo e($key, false); ?>" selected><?php echo e($value, false); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('totime')): ?><span class="text-danger"><?php echo e($errors->first('totime'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tổng ngày nghỉ <small class="text-danger text"> (*)</small>:</label>
                        <input type="number" class="form-control numday" step="0.01" name="numday" value="<?php echo e($checkemployee->numday, false); ?>" required>
                        <?php if($errors->has('numday')): ?><span class="text-danger"><?php echo e($errors->first('numday'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Diễn giải <small class="text-danger text"> (*)</small>:</label>
                        <textarea class="form-control" name="description" rows="2" required><?php echo e($checkemployee->description, false); ?></textarea>                        
                        <?php if($errors->has('description')): ?><span class="text-danger"><?php echo e($errors->first('description'), false); ?></span><?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chức năng</h3>
                </div>
                <div class="box-body">
                    <button type="submit" class="btn btn-primary btn-save" tabindex="9">Lưu</button>
                    <a href="<?php echo e(route('checkemployee-empl', [ 'parameter' => $employeeid ]), false); ?>" class="btn btn-default btn-cancel" tabindex="10">Trở về</a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('company-manage.checkemployee.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>