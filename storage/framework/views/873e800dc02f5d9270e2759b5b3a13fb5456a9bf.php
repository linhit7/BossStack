<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<?php $__env->stopSection(); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<i class="fa fa-plane"></i>
				<h3 class="box-title">THEO DÕI ĐI CÔNG TÁC</h3>
			</div>
			<div class="box-body">
				<div class="status">
					<div class="registration">
		                <a href="#" data-toggle="modal" data-target="#getFormAddBusiness" class="btn btn-primary btn-registration">Đăng ký công tác</a>
		            </div>
				</div>
			</div>
			<div class="box-footer" style="max-height: 610px; overflow-y: auto;">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Ngày/Lý do</th>
							<th width="45%">Thông tin chi tiết</th>
							<th width="15%">Công việc cụ thể</th>
							<th>Người duyệt (Chờ)</th>
						</tr>
					</thead>
					<tbody>
                    <?php $__currentLoopData = $checkbusiness; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php echo e($item['checktype_name'], false); ?><br>
                                <?php echo e($item['fromdate'] == null ? "" : date("d/m/Y", strtotime($item['fromdate'])), false); ?>

                            </td>
                            <td style="text-align: left;">
                                Từ ngày: <span><?php echo e($item['fromdate'] == null ? "" : date("d/m/Y", strtotime($item['fromdate'])), false); ?> <?php echo e($item['fromtime'] == "" ? "" : $fromtimetype[$item['fromtime']], false); ?></span> - Tới ngày: <span><?php echo e($item['todate'] == null ? "" : date("d/m/Y", strtotime($item['todate'])), false); ?> <?php echo e($item['totime'] == "" ? "" : $totimetype[$item['totime']], false); ?></span><br>
                                Số ngày đi công tác: <?php echo e($item['numday'], false); ?><br>
                                Nơi đến: <?php echo e($item['place'], false); ?><br>
                                Phương tiện: <?php echo e($transportationtype[$item['transportation']], false); ?><br>
                                <?php if($item['status'] == 0): ?>
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('checkbusiness-edit', ['employeeid' => $employeeid, 'id'=> $item['id']]), false); ?>"><i class="fa fa-edit" aria-hidden="true"></i> Chỉnh sửa</a> - 
                                        <a href="<?php echo e(route('checkbusiness-delete', ['employeeid' => $employeeid, 'id'=> $item['id']]), false); ?>"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                    </div>  
                                <?php elseif($item['status'] == 1): ?>
                                    <b class="alert-success"><?php echo e($approvetype[$item['status']], false); ?></b>
                                <?php elseif($item['status'] == 2): ?>
                                    <b class="alert-warning"><?php echo e($approvetype[$item['status']], false); ?></b>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: left;"><?php echo e($item['description'], false); ?></td>
                            <td style="text-align: center;"><font size='2' color='#4181d0'><b><?php echo e($item['approved_user_name'], false); ?></b></font></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div>
    <a href="<?php echo e(route('employees-detail', ['id' => $employeeid]), false); ?>" class="btn btn-default btn-cancel" style="width: 8%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
</div>
<?php echo $__env->make('company-manage.checkbusiness.add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>