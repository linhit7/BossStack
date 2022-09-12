<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>


<form role="form" action="<?php echo e(route('statistic-customer')); ?>" name="frm">
<input type='hidden' name='typereport' value=''>

<div class="status">
    <b class="alert alert-warning">Tổng số khách hàng: <?php echo e($totalCustomer); ?></b>        
    <b class="alert alert-success">Khách hàng mới: <?php echo e($totalNewCustomer); ?></b>        
    <b class="alert alert-danger">Thông tin chờ xử lý: <?php echo e($totalWaitCustomer); ?></b> 
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">                   
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-10">
                            <h3>Thống kê dữ liệu khách hàng đăng ký</h3>
                        </div>
<!--                        <div class="col-md-2">
                            <select class="form-control select2" name="searchperiodtype" onchange='document.frm.submit();'>
                                <option value=""></option>
                                <?php $__currentLoopData = $periodtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key == $searchperiodtype): ?>
                                        <option value="<?php echo e($key); ?>" selected><?php echo e($value); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>                                                                    
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div> -->
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
                                        <label><?php echo e($totalCustomer); ?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Mới tháng này:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label><?php echo e($totalNewCustomer); ?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>KH kết thúc HĐ tháng này:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label><?php echo e($totalFinishContractCustomer); ?></label>
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
                                        <label><?php echo e($customertype[$typeMaxCustomer->customertype]); ?> (<?php echo e($typeMaxCustomer->countcustomer); ?>)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Thấp nhất:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <?php if($typeMinCustomer != null): ?>
                                            <label><?php echo e($customertype[$typeMinCustomer->customertype]); ?> (<?php echo e($typeMinCustomer->countcustomer); ?>)</label>                                        
                                        <?php else: ?>
                                            <label></label>        
                                        <?php endif; ?>                                         
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
                        <p><b>Lọc danh sách theo:</b></p>
                        <select class="form-control select2" name="searchcustomertype" onchange='document.frm.submit();'>
                            <option value=""></option>
                            <?php $__currentLoopData = $customertype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key == $searchcustomertype): ?>
                                    <option value="<?php echo e($key); ?>" selected><?php echo e($value); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>                                                                    
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php if($listcustomertype->count() === 0): ?>
                            <tr>
                                <td colspan="7"><b>Không có dữ liệu!!!</b></td>
                            </tr>
                            <?php endif; ?>
                            <?php
                                $i = 1
                            ?>                        
                            <?php $__currentLoopData = $listcustomertype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="table-customer">
                                    <td style="text-align: center;" class="text-nowrap"><?php echo e($i++); ?></td>
                                    <td style="text-align: left;" class="text-nowrap"><?php echo e($customer->fullname); ?></td>
                                    <td style="text-align: center;" class="text-nowrap"><?php echo e((Carbon\Carbon::now()->year) - (substr($customer->birthday, 0, 4))); ?></td>
                                    <td style="text-align: left;" class="text-nowrap"><?php echo e($customer->email); ?></td>
                                    <td style="text-align: left;" class="text-nowrap"><?php echo e($customer->phone); ?></td>
                                    <td style="text-align: center;" class="text-nowrap"><?php echo e($customer->created_at == null ? "" : ConvertSQLDate($customer->created_at)); ?></td>
                                    <td style="text-align: center;" class="text-nowrap"><?php echo e($customertype[$customer->customertype]); ?></td>
                                    <td style="text-align: right;" class="text-nowrap"><?php echo e(formatNumber(0, 1, 0, 0)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    
                    <div class="box-footer clearfix text-right">
                        <?php echo e($listcustomertype->links()); ?>

                    </div>
                </div>                

            </div>
        </div>
        <!-- /.box -->
    </div>
</div>

<a  class="btn btn-primary btn-cancel" href="<?php echo e(route('dashboard')); ?>" style="width: 8%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   

</form>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('product-manage.statistic.partials.script_customer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>