<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<div class="status">
    <b class="alert alert-warning">Tổng số khách hàng: 100</b>        
    <b class="alert alert-success">Khách hàng mới: 0</b>        
    <b class="alert alert-danger">Thông tin chờ xử lý: 0</b> 
</div>

<div class="row">
	<div class="col-md-6">
		<div class="box">                   
            <div class="box-body">
            	<div class="form-group">
            		<h3>Thống kê dữ liệu khách hàng đăng ký</h3>
            		<div id="chart1"></div>
            	</div>
            </div>
        </div>
	</div>
	<div class="col-md-6">
		<div class="box">                   
            <div class="box-body">
            	<div class="form-group">
            		<h3>Thống kê gói sản phẩm đăng ký</h3>
            		<div id="chart2"></div>
            	</div>
            </div>
        </div>
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<div class="box">                   
            <div class="box-body">
            	<div class="form-group">
            		<?php echo $__env->make('dashboard.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            		<table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center;" class="text-nowrap" width="1%">STT</th>
                                <th style="text-align: center;" class="text-nowrap" width="15%">TÊN KHÁCH HÀNG</th>
                                <th style="text-align: center;" class="text-nowrap">TUỔI</th>
                                <th style="text-align: center;" class="text-nowrap">EMAIL</th>
                                <th style="text-align: center;" class="text-nowrap">ĐIỆN THOẠI</th>
                                <th style="text-align: center;" class="text-nowrap">ĐĂNG KÝ</th>
                                <th style="text-align: center;" class="text-nowrap">ĐỐI TƯỢNG</th>
                                <th style="text-align: center;" class="text-nowrap">SỐ DƯ TK(VND)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-customer">
                                <td style="text-align: center;" class="text-nowrap">01</td>
                                <td style="text-align: left;" class="text-nowrap">Nguyễn Văn A</td>
                                <td style="text-align: center;" class="text-nowrap">24</td>
                                <td style="text-align: left;" class="text-nowrap">a@lamians.com</td>
                                <td style="text-align: left;" class="text-nowrap">0132456789</td>
                                <td style="text-align: center;" class="text-nowrap">01/01/2020</td>
                                <td style="text-align: center;" class="text-nowrap">Doanh nhân</td>
                                <td style="text-align: right;" class="text-nowrap"><b style="color: green;">+10.000.000</b></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="box-footer clearfix text-right">
                        
                    </div>
            	</div>
            </div>
        </div>
	</div>
	<div class="col-md-5">
		<div class="box">                   
            <div class="box-body">
            	<div class="form-group">
            		<h3>Tổng tiền đầu tư</h3>
            		<div id="chart3"></div>
            	</div>
            </div>
        </div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('dashboard.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>