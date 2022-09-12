<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>


<?php echo $__env->make('product-manage.advisory.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="status">
    <b class="alert alert-warning">Tổng số yêu cầu: 300</b>        
    <b class="alert alert-success">Đã xử lý: 5</b>        
    <b class="alert alert-danger">Thông tin chờ xử lý: 10</b>   
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-help">
        	<div class="box-header">
        		<ul class="nav nav-pills">
					<li class="active">
						<a data-toggle="pill" href="#email">Email</a>
					</li>
					<li>
						<a data-toggle="pill" href="#website">Website</a>
					</li>
				</ul>
        	</div>
            
            <div class="box-body">

				<div class="tab-content">
					<div id="email" class="tab-pane fade in active">
						<table class="table table-hover">
		                    <thead>
		                        <tr>
		                            <th class="text-center">MỨC ĐỘ<br> QUAN TRỌNG</th>
		                            <th class="text-center">TÊN KHÁCH HÀNG</th>
		                            <th class="text-center">EMAIL</th>
		                            <th class="text-center">SỐ ĐIỆN THOẠI</th>
		                            <th class="text-center" style="width: 35%;">YÊU CẦU HỖ TRỢ</th>
		                            <th class="text-center">THAO TÁC</th>
		                            <th class="text-center">NHÂN VIÊN<br> HỖ TRỢ</th>
		                            <th class="text-center">HOÀN THÀNH</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	<?php if($collections->count() === 0): ?>
			                    	<tr>
			                    		<td class="text-center">Không có dữ liệu !!!</td>
			                    	</tr>
			                    <?php endif; ?>
		                        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advisory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                        	<?php echo $__env->make('product-manage.advisory.mailAdvisoryAnswer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			                        <tr>
			                            <td class="text-center">Gấp</td>
			                            <td class="text-center"><?php echo e($advisory->fullname); ?></td>
			                            <td class="text-center"><?php echo e($advisory->email); ?></td>
			                            <td class="text-center"><?php echo e($advisory->phone); ?></td>
			                            <td>
			                            	<p><b>Tiêu đề: </b><?php echo e($advisory->titleadvisory); ?></p>
			                            	<p><b>Nội dung: </b><?php echo e($advisory->contentadvisory); ?></p>
			                            </td>
			                            <td class="text-center">
			                            	<a data-toggle="modal" href="#answerEmail">
			                            		<i class="fas fa-undo-alt"></i> Trả lời
			                            	</a>
			                            </td>
			                            <td class="text-center"><?php echo e($advisory->advisoryAnswer == NULL ? "" : $advisory->advisoryAnswer->user()->first()->name); ?></td>
			                            <?php if($advisory->status == 0): ?>
											<td class="text-center" style="color: red;"><b>Chờ xử lý</b></td>
			                            <?php else: ?>
			                            	<td class="text-center" style="color: #197b30;"><b>Đã hoàn thành</b></td>
			                            <?php endif; ?>
			                        </tr>
		                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                    </tbody>
		                </table>
					</div>

					<div id="website" class="tab-pane fade">
						<table class="table table-hover">
		                    <thead>
		                        <tr>
		                            <th class="text-center">MỨC ĐỘ<br> QUAN TRỌNG</th>
		                            <th class="text-center">TÊN KHÁCH HÀNG</th>
		                            <th class="text-center">EMAIL</th>
		                            <th class="text-center">SỐ ĐIỆN THOẠI</th>
		                            <th class="text-center" style="width: 35%;">YÊU CẦU HỖ TRỢ</th>
		                            <th class="text-center">THAO TÁC</th>
		                            <th class="text-center">NHÂN VIÊN<br> HỖ TRỢ</th>
		                            <th class="text-center">HOÀN THÀNH</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	<?php echo $__env->make('product-manage.advisory.mailAdvisoryAnswer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		                        <tr>
		                            <td class="text-center">Gấp</td>
		                            <td class="text-center">Nguyễn Văn C</td>
		                            <td class="text-center">abc@gmail.com</td>
		                            <td class="text-center">01234567890</td>
		                            <td>
		                            	<p><b>Tiêu đề: </b>Title</p>
		                            	<p><b>Nội dung: </b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....</p>
		                            </td>
		                            <td class="text-center">
		                            	<a data-toggle="modal" href="#answerWebsite">
		                            		<i class="fas fa-undo-alt"></i> Trả lời
		                            	</a>
		                            </td>
		                            <td class="text-center">Nguyễn Văn D</td>
		                            <td class="text-center" style="color: #197b30;"><b>Đã hoàn thành</b></td>
		                        </tr>
		                    </tbody>
		                </table>
					</div>
				</div>

            </div>
            
            <div class="box-footer clearfix text-right">
                
            </div>

        </div>
	</div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('product-manage.advisory.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>