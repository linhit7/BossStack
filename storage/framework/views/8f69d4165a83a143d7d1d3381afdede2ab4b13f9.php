<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<h1 class="title" style="color: #fff; display: none;"><?php echo e($title->heading); ?>  - THEO SẢN PHẨM</h1>

<div class="status">
    <b class="alert alert-warning">Tổng số khách hàng: 300</b>        
    <b class="alert alert-success">Khách hàng mới: 5</b>        
    <b class="alert alert-danger">Thông tin chờ xử lý: 10</b> 
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">     

            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-10">
                            <h3>Thống kê dữ liệu khách hàng đăng kí</h3>
                        </div>
                        <div class="col-md-2">
                            <select id="searchFields" class="form-control select2" data-minimum-results-for-search="Infinity" name="searchFields">
                                <option value="">Hôm nay</option>
                                <option value="">Tháng này</option>
                                <option value="">Năm này</option>
                            </select>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Thống kê sản phẩm</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tổng số khách hàng:</label>
                                    </div>
                                    <div class="col-md-6">
                                        100
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Mới tháng này:</label>
                                    </div>
                                    <div class="col-md-6">
                                        100
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>KH kết thúc HĐ tháng này:</label>
                                    </div>
                                    <div class="col-md-6">
                                        100
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Cao điểm:</label>
                                    </div>
                                    <div class="col-md-6">
                                        07/12/2019
                                    </div>
                                </div>
                                <br>  
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Phân loại sản phẩm</label>
                                    </div>                            
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nhiều nhất:</label>
                                    </div>
                                    <div class="col-md-6">
                                        Đầu tư (180)
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Thấp nhất:</label>
                                    </div>
                                    <div class="col-md-6">
                                        Tiết kiệm (20)
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="box-body no-padding">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;" class="text-nowrap" width="20%">Sản phẩm</th>
                                            <th style="text-align: center;" class="text-nowrap" width="20%">Số lượng KH</th>
                                            <th style="text-align: center;" class="text-nowrap" width="15%">KH mới</th>
                                            <th style="text-align: center;" class="text-nowrap" width="25%">Gói SP Cao nhất</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">Dòng tiền cá nhân</td>
                                            <td style="text-align: center;">100</td>
                                            <td style="text-align: center;">50</td>
                                            <td style="text-align: center;">Quản lý</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Đầu tư</td>
                                            <td style="text-align: center;">150</td>
                                            <td style="text-align: center;">10</td>
                                            <td style="text-align: center;">Gói 2</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Tiết kiệm</td>
                                            <td style="text-align: center;">50</td>
                                            <td style="text-align: center;">5</td>
                                            <td style="text-align: center;">TK có kỳ hạn</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <label>Thống kê gói sản phẩm</label>
                            <div id="chart2"></div>
                        </div>

                        <div class="col-md-4 text-center">
                            <label>Tổng tiền đầu tư</label>
                            <div id="chart3"></div>
                        </div>

                        <div class="col-md-4 text-center">
                            <label>Tổng tiền tiết kiệm</label>
                            <div id="chart4"></div>
                        </div>
                    </div>
                </div>
                                
            </div>

        </div>
        <!-- /.box -->
    </div>
</div>

<a href="#" class="btn btn-primary btn-edit">Chỉnh sửa</a>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('product-manage.statistic.partials.script_product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>