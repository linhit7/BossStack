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
                <h3 class="box-title">Thông tin hợp đồng lao động</h3>
            </div>
            <form role="form" action="<?php echo e(route('laborcontracts-store'), false); ?>?index=true" method="post" id="frm">
                <?php echo e(csrf_field(), false); ?>

                <input type="hidden" name="employeeid"  value="<?php echo e($employeeid, false); ?>">                
                <div class="box-body">
                    <div class="form-group">
                        <label>Loại hợp đồng <small class="text-danger text"> (*)</small>: </label>
                        <select class="form-control select2" name="labortype">
                            <?php $__currentLoopData = $labortype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key == old('labortype')): ?>
                                    <option value="<?php echo e($key, false); ?>" selected><?php echo e($value, false); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>                                                                    
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('labortype')): ?><span class="text-danger"><?php echo e($errors->first('labortype'), false); ?></span><?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngày bắt đầu <small class="text-danger text"> (*)</small>: </label>
                                <input type="date" class="form-control" name="fromdate" value="<?php echo e(old('fromdate'), false); ?>">
                                <?php if($errors->has('fromdate')): ?><span class="text-danger"><?php echo e($errors->first('fromdate'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngày kết thúc : </label>
                                <input type="date" class="form-control" name="todate" value="<?php echo e(old('todate'), false); ?>">
                                <?php if($errors->has('todate')): ?><span class="text-danger"><?php echo e($errors->first('todate'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Số hợp đồng: </label>
                        <textarea class="form-control" name="description" rows="2"><?php echo e(old('description'), false); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kích hoạt:</label>
                        <input type="checkbox" tabindex="4" name="active" value="1" id="chk-active" <?php echo e(old( 'active')==1 ? 'checked="checked"' : '', false); ?>> <br>(<font size='1'><u>Ghi chú:</u> chỉ có 1 loại HĐLĐ được kích hoạt ở cùng thời điểm.</font>)
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
                <a href="<?php echo e(route('laborcontracts-index', ['employeeid' => $employeeid]), false); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('user-employees.laborcontract.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>