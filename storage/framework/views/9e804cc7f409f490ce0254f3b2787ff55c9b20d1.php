<div class="modal fade" id="getFormAddBusiness" role="dialog">
    <form action="<?php echo e(route('checkbusiness-store'), false); ?>?index=true" enctype="multipart/form-data" method="POST">
        <?php echo e(csrf_field(), false); ?>

        <input type="hidden" name="employeeid"  value="<?php echo e($employeeid, false); ?>">                
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Đăng ký công tác</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Lý do công tác <small class="text-danger text"> (*)</small>:</label>
                        <select class="form-control select2" name="checktype_id" required>
                            <option value=""></option>
                            <?php $__currentLoopData = $checktypes->where('showtype', 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checktype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($checktype->id, false); ?>"><?php echo e($checktype->description, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($errors->has('checktype_id')): ?><span class="text-danger"><?php echo e($errors->first('checktype_id'), false); ?></span><?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group from_start_box">
                        <label>Ngày bắt đầu <small class="text-danger text"> (*)</small>:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" class="form-control fromdate" name="fromdate" value="" required>
                                <?php if($errors->has('fromdate')): ?><span class="text-danger"><?php echo e($errors->first('fromdate'), false); ?></span><?php endif; ?>
                            </div>
                            <div class="col-md-6" id="fromtime_box">
                                <select class="form-control select2 fromtime" name="fromtime" required>
                                    <option value="FULL">Cả ngày</option>
                                    <option value="SA">Sáng</option>
                                    <option value="CH">Chiều</option>
                                </select>
                                <?php if($errors->has('fromtime')): ?><span class="text-danger"><?php echo e($errors->first('fromtime'), false); ?></span><?php endif; ?>                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group to_end_box">
                        <label>Ngày kết thúc <small class="text-danger text"> (*)</small>:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" class="form-control todate" name="todate" value="" required>
                                <?php if($errors->has('todate')): ?><span class="text-danger"><?php echo e($errors->first('todate'), false); ?></span><?php endif; ?>
                            </div>
                            <div class="col-md-6" id="totime_box">
                                <select class="form-control select2 totime" name="totime" required>
                                    <option value="FULL">Cả ngày</option>
                                    <option value="SA">Sáng</option>
                                </select>
                                <?php if($errors->has('totime')): ?><span class="text-danger"><?php echo e($errors->first('totime'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tổng ngày đi công tác <small class="text-danger text"> (*)</small>:</label>
                        <input type="number" class="form-control numday" step="0.01" name="numday" required>
                        <?php if($errors->has('numday')): ?><span class="text-danger"><?php echo e($errors->first('numday'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Nơi đến <small class="text-danger text"> (*)</small>:</label>
                        <input type="text" class="form-control" name="place" required">
                        <?php if($errors->has('place')): ?><span class="text-danger"><?php echo e($errors->first('place'), false); ?></span><?php endif; ?>                        
                    </div>                      
                    <div class="form-group">
                        <label>Diễn giải <small class="text-danger text"> (*)</small>:</label>
                        <textarea class="form-control" name="description" rows="2" required></textarea>                        
                        <?php if($errors->has('description')): ?><span class="text-danger"><?php echo e($errors->first('description'), false); ?></span><?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Phương tiện <small class="text-danger text"> (*)</small>:</label>                    
                        <select class="form-control select2 totime" name="transportation" required>
                        <?php $__currentLoopData = $transportationtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('transportation')): ?><span class="text-danger"><?php echo e($errors->first('transportation'), false); ?></span><?php endif; ?>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-create">Đăng ký</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('company-manage.checkbusiness.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

