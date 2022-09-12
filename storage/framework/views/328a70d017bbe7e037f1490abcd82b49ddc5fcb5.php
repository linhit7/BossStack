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
                <h3 class="box-title">Thông tin khen thưởng / kỷ luật</h3>
            </div>
            <form role="form" action="<?php echo e(route('disciplines-store'), false); ?>?index=true" method="post" id="frm">
                <?php echo e(csrf_field(), false); ?>

                <input type="hidden" name="employeeid"  value="<?php echo e($employeeid, false); ?>">                
                <div class="box-body">
                    <div class="form-group">
                        <label>Ngày quyết định <small class="text-danger text"> (*)</small>: </label>
                        <input type="date" class="form-control" name="fromdate" value="<?php echo e(old('fromdate'), false); ?>">
                        <?php if($errors->has('fromdate')): ?><span class="text-danger"><?php echo e($errors->first('fromdate'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Loại <small class="text-danger text"> (*)</small>:</label>
                        <select class="form-control select2" name="checktype_id">
                            <?php $__currentLoopData = $disciplinetype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key == old('checktype_id')): ?>
                                    <option value="<?php echo e($key, false); ?>" selected><?php echo e($value, false); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>                                                                    
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('checktype_id')): ?><span class="text-danger"><?php echo e($errors->first('checktype_id'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Số quyết định <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="disciplinenumber" value="<?php echo e(old('disciplinenumber'), false); ?>">
                        <?php if($errors->has('disciplinenumber')): ?><span class="text-danger"><?php echo e($errors->first('disciplinenumber'), false); ?></span><?php endif; ?>                        
                    </div>                      
                    <div class="form-group">
                        <label>Nội dung <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="contentdiscipline" value="<?php echo e(old('contentdiscipline'), false); ?>">
                        <?php if($errors->has('contentdiscipline')): ?><span class="text-danger"><?php echo e($errors->first('contentdiscipline'), false); ?></span><?php endif; ?>                        
                    </div>                      
                    <div class="form-group">
                        <label>Hình thức :</label>
                        <input type="text" class="form-control" name="formdiscipline" value="<?php echo e(old('formdiscipline'), false); ?>">
                    </div>                      
                    <div class="form-group">
                        <label>Mô tả : </label>
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
                <a href="<?php echo e(route('disciplines-index', ['employeeid' => $employeeid]), false); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('user-employees.discipline.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>