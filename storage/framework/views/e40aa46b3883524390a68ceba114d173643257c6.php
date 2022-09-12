<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">ĐẦU TƯ - CHỈ SỐ DANH MỤC CẤP [1/2/3] - KHÁCH HÀNG</h3>
            </div>

            <b class="alert-warning">Tổng số khách hàng: 300</b>        
            <b class="alert-success">Khách hàng mới: 5</b>        
            <b class="alert-danger">Thông tin chờ xử lý: 10</b>        

            <div class="box-body">
                <div class="form-group">
                    <label><h5>TỔNG TIỀN ĐẦU TƯ</h5></label>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('product-manage.invest.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>