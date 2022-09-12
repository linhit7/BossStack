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
                <h3 class="box-title">Thông tin phân quyền chức năng</h3>
            </div>
            <form role="form" action="<?php echo e(route('securityresources-store'), false); ?>?index=true" method="post" id="frm">
                <input type="hidden" name="resourcecode"  value="<?php echo e($applicationresourceid, false); ?>">
                <?php echo e(csrf_field(), false); ?>

                <div class="box-body">
                    <div class="form-group">
                        <label>Trang truy cập <small class="text-danger text"> (*)</small>:</label><br>
                        <font size=2><?php echo e($applicationresourceid . '. ' . $applicationresources->name, false); ?></font>
                    </div>                      
                    <div class="form-group">
                        <label>Nhóm truy cập <small class="text-danger text"> (*)</small>:</label>
                        <select class="form-control select2" name="rolecode">
                            <option value=""></option>
                            <?php $__currentLoopData = $applicationroles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->code == old('rolecode')): ?>
                                    <option value="<?php echo e($item->code, false); ?>" selected><?php echo e($item->code . '. ' . $item->name, false); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($item->code, false); ?>"><?php echo e($item->code . '. ' . $item->name, false); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($errors->has('rolecode')): ?><span class="text-danger"><?php echo e($errors->first('rolecode'), false); ?></span><?php endif; ?>
                        </select>
                    </div>                     
                    <div class="form-group">
                        <label>View:&nbsp;&nbsp;</label>
                        <input type="checkbox" tabindex="4" name="cview" value="1" <?php echo e(old( 'cview')==1 ? 'checked="checked"' : '', false); ?>>
                    </div>  
                    <div class="form-group">
                        <label>Add:&nbsp;&nbsp;</label>
                        <input type="checkbox" tabindex="4" name="cadd" value="1" <?php echo e(old( 'cadd')==1 ? 'checked="checked"' : '', false); ?>>
                    </div> 
                    <div class="form-group">
                        <label>Delete:&nbsp;&nbsp;</label>
                        <input type="checkbox" tabindex="4" name="cdelete" value="1" <?php echo e(old( 'cdelete')==1 ? 'checked="checked"' : '', false); ?>>
                    </div> 
                    <div class="form-group">
                        <label>Update:&nbsp;&nbsp;</label>
                        <input type="checkbox" tabindex="4" name="cupdate" value="1" <?php echo e(old( 'cupdate')==1 ? 'checked="checked"' : '', false); ?>>
                    </div> 
                    <div class="form-group">
                        <label>Approve:&nbsp;&nbsp;</label>
                        <input type="checkbox" tabindex="4" name="capprove" value="1" <?php echo e(old( 'capprove')==1 ? 'checked="checked"' : '', false); ?>>
                    </div> 
                    
                    
                    <div class="form-group">
                        <label>User view :</label><br>
                        <select class="form-control select2" multiple id="cuserview" name="cuserview[]">                        
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if( old('cuserview') != null ): ?>
                                <?php if( in_array($item->id, old('cuserview')) ): ?>
                                    <option value="<?php echo e($item->id, false); ?>" selected><?php echo e($item->id . '. ' . $item->name, false); ?></option>
                                <?php endif; ?>
                            <?php else: ?>
                                <option value="<?php echo e($item->id, false); ?>"><?php echo e($item->id . '. ' . $item->name, false); ?></option>
                            <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>                     
                    
                    <div class="form-group">
                        <label>Ghi chú : </label>
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
                <a href="<?php echo e(route('securityresources-index', ['applicationresourceid'=>$applicationresourceid]), false); ?>" class="btn btn-default btn-cancel" tabindex="6">Trở về</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('company-manage.securityresources.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>