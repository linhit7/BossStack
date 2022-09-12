<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<div class="status">
    <b class="alert alert-warning">Tổng số khách hàng: 300</b>        
    <b class="alert alert-success">Khách hàng mới: 5</b>        
    <b class="alert alert-danger">Thông tin chờ xử lý: 10</b>   
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-cashs">
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Thống kê dữ liệu khách hàng đăng ký</h3>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Tìm kiếm nhanh</h3>
                        </div>
                    </div>
                </div>
                <?php echo $__env->make('product-manage.cash.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="form-group">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center;" class="text-nowrap" width="15%">TÊN KHÁCH HÀNG</th>
                                <th style="text-align: center;" class="text-nowrap">TUỔI</th>
                                <th style="text-align: center;" class="text-nowrap">EMAIL</th>
                                <th style="text-align: center;" class="text-nowrap">ĐIỆN THOẠI</th>
                                <th style="text-align: center;" class="text-nowrap">NGÀY ĐĂNG KÝ</th>
                                <th style="text-align: center;" class="text-nowrap">GÓI DỊCH VỤ</th>
                                <th style="text-align: center;" class="text-nowrap">KẾ HOẠCH TÀI CHÍNH</th>
                                <th style="text-align: center;" class="text-nowrap">SỐ DƯ TK(VND)</th>
                                <th style="text-align: center;" class="text-nowrap">HOẠT ĐỘNG LẦN CUỐI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: left;" class="text-nowrap">Nguyễn Văn A</td>
                                <td style="text-align: center;" class="text-nowrap">24</td>
                                <td style="text-align: center;" class="text-nowrap">a@lamians.com</td>
                                <td style="text-align: center;" class="text-nowrap">0123456789</td>
                                <td style="text-align: center;" class="text-nowrap">01/01/2020</td>
                                <td style="text-align: center;" class="text-nowrap">Gói dịch vụ 1</td>
                                <td style="text-align: left;" class="text-nowrap">
                                    <ul>
                                        <li><b>Nghỉ hưu</b></li>
                                        <li><b>Mua nhà</b></li>
                                    </ul>
                                    <a class="detail" href="#">&gt; Chi tiết</a>
                                </td>
                                <td style="text-align: right;" class="text-nowrap"><b style="color: green;">+10.000.000</b></td>
                                <td style="text-align: center;" class="text-nowrap">16/01/2020</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="box-footer clearfix text-right">
                        
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>

<a class="btn btn-primary btn-cancel" href="#" style="width: 8%;"><i class="fa fa-arrow-left"></i> Quay lại</a>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('product-manage.cash.partials.script_manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>