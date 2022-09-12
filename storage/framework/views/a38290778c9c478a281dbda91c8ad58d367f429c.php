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
                <h3 class="box-title">Thông tin kinh nghiệm làm việc</h3>
            </div>
            <form role="form" action="<?php echo e(route('experiences-store'), false); ?>?index=true" method="post" id="frm">
                <?php echo e(csrf_field(), false); ?>

                <input type="hidden" name="employeeid"  value="<?php echo e($employeeid, false); ?>">                
                <div class="box-body">
                    <div class="form-group">
                        <div class="form-group col-md-6">
                            <label>Ngày bắt đầu <small class="text-danger text"> (*)</small>: </label>
                            <input type="date" class="form-control" name="fromdate" value="<?php echo e(old('fromdate'), false); ?>">
                            <?php if($errors->has('fromdate')): ?><span class="text-danger"><?php echo e($errors->first('fromdate'), false); ?></span><?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ngày kết thúc <small class="text-danger text"> (*)</small>: </label>
                            <input type="date" class="form-control" name="todate" value="<?php echo e(old('todate'), false); ?>">
                            <?php if($errors->has('todate')): ?><span class="text-danger"><?php echo e($errors->first('todate'), false); ?></span><?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Công ty <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="companyname" value="<?php echo e(old('companyname'), false); ?>">
                        <?php if($errors->has('companyname')): ?><span class="text-danger"><?php echo e($errors->first('companyname'), false); ?></span><?php endif; ?>                        
                    </div>                      
                    <div class="form-group">
                        <label>Chức vụ :</label>
                        <input type="text" class="form-control" name="major" value="<?php echo e(old('major'), false); ?>">
                    </div>                      
                    <div class="form-group">
                        <label>Mô tả công việc : </label>
                        <textarea class="form-control" name="description" rows="2"><?php echo e(old('description'), false); ?></textarea>
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
                <a href="<?php echo e(route('experiences-index', ['employeeid' => $employeeid]), false); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('user-employees.experience.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>