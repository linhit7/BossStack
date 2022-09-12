<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('company-manage.checkemployee.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách phê duyệt nghỉ phép
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;" width="1%">STT</th>
                            <th style="text-align: left;" class="text-nowrap" width="14%">Họ và tên</th>
                            <th style="text-align: center;" class="text-nowrap" width="8%">Phép <br> còn lại</th>
                            <th style="text-align: center;" class="text-nowrap" width="8%">Loại phép</th>
                            <th style="text-align: center;" class="text-nowrap" width="34%">Thông tin chi tiết</th>
                            <th style="text-align: center;" class="text-nowrap" width="15%">Người duyệt</th>
                            <th style="text-align: center;" class="text-nowrap">
                                <span class="lbl-action">Chức năng</span>
                                <button class="btn btn-danger btn-xs btn-block hide btn-delete-selected">Xóa <span class="lbl-selected-rows-count">0</span> đã chọn</button>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                    	<?php if($collections->count() === 0): ?>
                            <tr>
                                <td colspan="8"><b>Không có dữ liệu!!!</b></td>
                            </tr>
                        <?php endif; ?>
                        <?php
                        $i = 1
                        ?>
                        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkemployee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <tr>
                            	<td style="text-align: center;"><?php echo e($i, false); ?></td>
	                        	<td><?php echo e($checkemployee->employee->fullname, false); ?></td>
	                        	<td style="text-align: center;"><?php echo e(formatNumber($checkemployee->permission_left, 1, 2, 1), false); ?></td>
	                        	<td><?php echo e($checkemployee->checktype->description, false); ?></td>
	                        	<td>
	                        		<div class="day-off">
	                        			<div class="day-off"><b>Từ ngày: </b><span><?php echo e($checkemployee->fromdate == null ? "" : date("d/m/Y", strtotime($checkemployee->fromdate)), false); ?> <?php echo e($checkemployee->fromtime == "" ? "" : $fromtimetype[$checkemployee->fromtime], false); ?></span><span> - </span><b>Tới ngày: </b><span><?php echo e($checkemployee->todate == null ? "" : date("d/m/Y", strtotime($checkemployee->todate)), false); ?> <?php echo e($checkemployee->totime == "" ? "" : $totimetype[$checkemployee->totime], false); ?></span></div>
	                        			<div class="count-day"><b>Tổng số ngày nghỉ: </b><span><?php echo e($checkemployee->numday, false); ?></span></div>
	                        			<div class="reason"><b>Lý do nghỉ: </b><span><?php echo e($checkemployee->description, false); ?></span></div>
	                        		</div>
                                    <?php if($checkemployee->status == 0): ?>
                                        <b class="alert-warning"><?php echo e($approvetype[$checkemployee->status], false); ?></b>
                                    <?php elseif($checkemployee->status == 1): ?>
                                        <b class="alert-success"><?php echo e($approvetype[$checkemployee->status], false); ?></b>
                                    <?php else: ?>
                                        <b class="alert-danger"><?php echo e($approvetype[$checkemployee->status], false); ?></b>
                                    <?php endif; ?>

                                </td>
	                        	<td>
                        		    <p><?php echo e($checkemployee->approved_user_name, false); ?><br>
                                    Ngày duyệt: <span><?php echo e($checkemployee->approved_at == null ? "" : date("d/m/Y", strtotime($checkemployee->approved_at)), false); ?></span></p>
	                        	</td>
	                        	<td>
                                    <?php if( Auth()->user()->employee()->first()->position_id == 8 || Auth()->user()->employee()->first()->position_id == 9): ?>
                                    <div class="btn-group">
                                        <form id="form1" action="<?php echo e(route('checkemployees-accept', ['id' => $checkemployee->id]), false); ?>" method="post">
                                            <?php echo e(csrf_field(), false); ?>

                                            <?php echo e(method_field('put'), false); ?>

                                            <button type="submit" class="btn btn-success btn-save" tabindex="9" style="width: 84px; margin-bottom: 1px;"><i class="fa fa-check-circle-o"></i> Đồng ý</button>
                                        </form>
                                    </div>
                                    <div class="btn-group">
                                        <form id="form2" action="<?php echo e(route('checkemployees-cancel', ['id' => $checkemployee->id]), false); ?>" method="post">
                                            <?php echo e(csrf_field(), false); ?>

                                            <?php echo e(method_field('put'), false); ?>

                                            <button type="submit" class="btn btn-danger btn-save" tabindex="9" style="width: 84px; margin-bottom: 1px;"><i class="fa fa-times-circle-o"></i> Từ chối</button>
                                        </form>
                                    </div>
                                    <?php else: ?>
	                        		<div class="btn-group">
	                                    <button type="button" class="btn btn-default dropdown-toggle btn-checkemployees" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                        Thao tác <span class="caret"></span>
	                                    </button>
	                                    <ul class="dropdown-menu dropdown-menu-right">
	                                        <li><a href="<?php echo e(route('checkemployees-edit', ['employeeid' => $checkemployee->employee_id_encrypt, 'id'=> $checkemployee->id]), false); ?>"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i> Chỉnh sửa</a></li>
                                            <li><a href="<?php echo e(route('checkemployees-delete', ['employeeid' => $checkemployee->employee_id_encrypt, 'id'=> $checkemployee->id]), false); ?>"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i> Xóa</a></li>
	                                    </ul>
	                                </div>
                                    <?php endif; ?>
	                        	</td>
	                        </tr>
                        <?php
                        $i++
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix text-right">
                <?php echo e($collections->links(), false); ?>

            </div>
        </div>
        <!-- /.box -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>