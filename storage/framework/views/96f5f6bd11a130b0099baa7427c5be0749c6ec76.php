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
                <h3 class="box-title">Thông tin lương & phụ cấp</h3>
            </div>
            <form role="form" action="<?php echo e(route('payrolls-store'), false); ?>?index=true" method="post" id="frm">
                <?php echo e(csrf_field(), false); ?>

                <input type="hidden" name="employeeid"  value="<?php echo e($employeeid, false); ?>">                
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Lương công việc <small class="text-danger text"> (*)</small>: </label>
                            <input type="text" class="form-control" name="worksalary" onkeyup='this.value=formatNumberDecimal(this.value)' value="<?php echo e(old('worksalary'), false); ?>">
                            <?php if($errors->has('worksalary')): ?><span class="text-danger"><?php echo e($errors->first('worksalary'), false); ?></span><?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phụ cấp: </label>
                            <input type="text" class="form-control" name="extrasalary" onkeyup='this.value=formatNumberDecimal(this.value)' value="<?php echo e(old('extrasalary'), false); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ngày bắt đầu hiệu lực <small class="text-danger text"> (*)</small>: </label>
                        <input type="date" class="form-control" name="effectdate" value="<?php echo e(old('effectdate'), false); ?>">
                        <?php if($errors->has('effectdate')): ?><span class="text-danger"><?php echo e($errors->first('effectdate'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Ghi chú: </label>
                        <textarea class="form-control" name="description" rows="2"><?php echo e(old('description'), false); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kích hoạt:</label>
                        <input type="checkbox" tabindex="4" name="active" value="1" id="chk-active" <?php echo e(old( 'active')==1 ? 'checked="checked"' : '', false); ?>> <br>(<font size='1'><u>Ghi chú:</u> chỉ có 1 mức lương đóng BHXH được kích hoạt ở cùng thời điểm.</font>)
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
                <a href="<?php echo e(route('payrolls-index', ['employeeid' => $employeeid]), false); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('user-employees.payrolls.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>