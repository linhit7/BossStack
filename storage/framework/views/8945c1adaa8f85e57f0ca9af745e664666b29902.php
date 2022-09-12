<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<h1 class="title" style="color: #fff; display: none;"><?php echo e($title->heading); ?>  - THEO KHÁCH HÀNG</h1>

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

                <h3>Phân loại khách hàng</h3>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Tổng số khách hàng:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>100</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Mới tháng này:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>100</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>KH kết thúc HĐ tháng này:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>100</label>
                                    </div>
                                </div>
                            </div>

                            <label>Đối tượng khách hàng</label>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Nhiều nhất:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>Doanh nhân (45)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Thấp nhất:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>Khác (20)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Độ tuổi nhiều nhất:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>18 - 40</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 text-center">
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>   

                <hr>
                
                <div class="form-group">
                    <div class="info-customer">
                        <a href="#" class="btn btn-primary btn-view-full">Xem đầy đủ</a>
                        <p><b>Lọc danh sách theo:</b></p>
                        <select id="searchFields" class="form-control select2" data-minimum-results-for-search="Infinity" name="searchFields">
                            <option value="">Đối tượng KH 1</option>
                            <option value="">Đối tượng KH 2</option>
                            <option value="">Đối tượng KH 3</option>
                        </select>
                    </div>
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
                                <td style="text-align: center;" class="text-nowrap">aaa</td>
                                <td style="text-align: center;" class="text-nowrap">24</td>
                                <td style="text-align: center;" class="text-nowrap">admin@rbooks.vn</td>
                                <td style="text-align: center;" class="text-nowrap">0123456789</td>
                                <td style="text-align: center;" class="text-nowrap">20/02/2020</td>
                                <td style="text-align: center;" class="text-nowrap">Doanh nhân</td>
                                <td style="text-align: center;" class="text-nowrap">10.000.000</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="text-right clearfix">
                        <ul class="pagination pagination-sm no-margin" role="navigation">
                            <li class="page-item disabled" aria-disabled="true" aria-label="pagination.previous">
                                <span class="page-link" aria-hidden="true">‹</span>
                            </li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link" href="
                                #">2</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" rel="next" aria-label="pagination.next">›</a>
                            </li>
                        </ul>
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
<?php echo $__env->make('product-manage.statistic.partials.script_customer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>