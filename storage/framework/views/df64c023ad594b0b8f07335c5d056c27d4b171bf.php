<?php $__env->startSection('content'); ?>
<?php if(isset($infor)): ?>
<div class="alert alert-success">
    <?php echo e($infor, false); ?> 
</div>
<?php endif; ?>

<form role="form" action="<?php echo e(route('monthinsurances-approved'), false); ?>" method="post" id="frm">
<?php echo e(csrf_field(), false); ?>

<input type='hidden' name='typereport' value=''>
<input type='hidden' name='month' value='<?php echo e($month, false); ?>'>
<input type='hidden' name='year' value='<?php echo e($year, false); ?>'>
<div class="box-header with-border">
    <h3 class="box-title">BẢNG TÍNH BẢO HIỂM XÃ HỘI THÁNG <?php echo e($month, false); ?>/<?php echo e($year, false); ?>

    <?php if($approved == 0): ?>
        <b class="alert-warning">Chưa duyệt</b>
    <?php else: ?>
        <b class="alert-success">Đã duyệt</b>
    <?php endif; ?>     
    </h3>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">

            <div class="box-body no-padding">
                <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>

                        <tr>
                            <th style="text-align: center; vertical-align: middle; background: #eeeeee">STT</th>
                            <th style="text-align: left; vertical-align: middle; background: #eeeeee">Họ tên</th>
                            <th style="text-align: left; vertical-align: middle; background: #eeeeee">Chức vụ</th>
                            <th style="text-align: left; vertical-align: middle; background: #eeeeee">Phòng ban</th>
                            <th style="text-align: center; vertical-align: middle; background: #eeeeee">Mức lương <br> đóng BHXH</th>
                            <th style="text-align: center; background: #eeeeee">BHXH do <br> Công ty đóng <br> (<?php echo e($configinsurances->bhxh_ct, false); ?>%)</th>
                            <th style="text-align: center; background: #eeeeee">BHTNLD_BNN <br> do Công ty đóng <br> (<?php echo e($configinsurances->bhtnld_bnn_ct, false); ?>%)</th>
                            <th style="text-align: center; background: #eeeeee">BHYT do <br> Công ty đóng <br> (<?php echo e($configinsurances->bhyt_ct, false); ?>%)</th>
                            <th style="text-align: center; background: #eeeeee">BHTN do <br> Công ty đóng <br> (<?php echo e($configinsurances->bhtn_ct, false); ?>%)</th>
                            <th style="text-align: center; background: #eeeeee">BHXH do <br> NLĐ đóng <br> (<?php echo e($configinsurances->bhxh_nld, false); ?>%)</th>
                            <th style="text-align: center; background: #eeeeee">BHTNLD_BNN <br> do NLĐ đóng <br> (<?php echo e($configinsurances->bhtnld_bnn_nld, false); ?>%)</th>
                            <th style="text-align: center; background: #eeeeee">BHYT do <br> NLĐ đóng <br> (<?php echo e($configinsurances->bhyt_nld, false); ?>%)</th>
                            <th style="text-align: center; background: #eeeeee">BHTN do <br> NLĐ đóng <br> (<?php echo e($configinsurances->bhtn_nld, false); ?>%)</th>
                            <th style="text-align: center; vertical-align: middle; background: #eeeeee">Tổng cộng <br> (<?php echo e($configinsurances->bhxh_nld + $configinsurances->bhxh_ct + $configinsurances->bhtnld_bnn_nld + $configinsurances->bhtnld_bnn_ct + $configinsurances->bhyt_nld + $configinsurances->bhyt_ct + $configinsurances->bhtn_nld + $configinsurances->bhtn_ct, false); ?>%)</th>
                            <th width="5%" style="text-align: center; vertical-align: middle; background: #eeeeee">Chức năng</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $i = 1;
                        ?>
                        <?php $__currentLoopData = $monthinsurances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="text-align: center;"><?php echo e($i++, false); ?></td>
                                <td style="text-align: left;"><?php echo e($item['fullname'], false); ?></td>
                                <td style="text-align: left;"><?php echo e($item['position_name'], false); ?></td>
                                <td style="text-align: left;"><?php echo e($item['department_name'], false); ?></td>
                                <td style="text-align: right;"><?php echo e(formatNumber($item['salary_insurance'], 1, 0, 0), false); ?></td>
                                <td style="text-align: right;"><?php echo e(formatNumber($item['bhxh_ct'], 1, 0, 0), false); ?></td>
                                <td style="text-align: right;"><?php echo e(formatNumber($item['bhtnld_bnn_ct'], 1, 0, 0), false); ?></td>
                                <td style="text-align: right;"><?php echo e(formatNumber($item['bhyt_ct'], 1, 0, 0), false); ?></td>
                                <td style="text-align: right;"><?php echo e(formatNumber($item['bhtn_ct'], 1, 0, 0), false); ?></td>
                                <td style="text-align: right;"><?php echo e(formatNumber($item['bhxh_nld'], 1, 0, 0), false); ?></td>
                                <td style="text-align: right;"><?php echo e(formatNumber($item['bhtnld_bnn_nld'], 1, 0, 0), false); ?></td>
                                <td style="text-align: right;"><?php echo e(formatNumber($item['bhyt_nld'], 1, 0, 0), false); ?></td>
                                <td style="text-align: right;"><?php echo e(formatNumber($item['bhtn_nld'], 1, 0, 0), false); ?></td>
                                <td style="text-align: right;"><?php echo e(formatNumber($item['sum_insurance'], 1, 0, 0), false); ?></td>
                                <td style="text-align: center;">
                                    <?php if($item['approved'] == "1"): ?>
                                        <img src="<?php echo e(asset('image/check.gif'), false); ?>">   
                                    <?php else: ?>
                                        <div class="btn-group">
                                            <a href="<?php echo e(route('monthinsurances-edit', ['id'=> $item['id']]), false); ?>"><i class="fas fa-pencil-alt" style="margin-right: 10px; color: #283b91;"></i></a>
                                        </div>                                             
                                    <?php endif; ?>   
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <th style="text-align: left;" colspan="5">Tổng cộng:</th>
                                <th style="text-align: right;"><?php echo e(formatNumber($summonthinsurances['bhxh_ct'], 1, 0, 0), false); ?></th>
                                <th style="text-align: right;"><?php echo e(formatNumber($summonthinsurances['bhtnld_bnn_ct'], 1, 0, 0), false); ?></th>
                                <th style="text-align: right;"><?php echo e(formatNumber($summonthinsurances['bhyt_ct'], 1, 0, 0), false); ?></th>
                                <th style="text-align: right;"><?php echo e(formatNumber($summonthinsurances['bhtn_ct'], 1, 0, 0), false); ?></th>
                                <th style="text-align: right;"><?php echo e(formatNumber($summonthinsurances['bhxh_nld'], 1, 0, 0), false); ?></th>
                                <th style="text-align: right;"><?php echo e(formatNumber($summonthinsurances['bhtnld_bnn_nld'], 1, 0, 0), false); ?></th>
                                <th style="text-align: right;"><?php echo e(formatNumber($summonthinsurances['bhyt_nld'], 1, 0, 0), false); ?></th>
                                <th style="text-align: right;"><?php echo e(formatNumber($summonthinsurances['bhtn_nld'], 1, 0, 0), false); ?></th>
                                <th style="text-align: right;"><?php echo e(formatNumber($summonthinsurances['sum_insurance'], 1, 0, 0), false); ?></th>
                                <th style="text-align: right;">&nbsp;</th>
                            </tr>
                    </tbody>

                </table>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="box-footer text-left">
    <button class="btn btn-success" onclick="processReports('frm', 'approved')">Đồng ý duyệt</button>
    <button class="btn btn-danger" onclick="processReports('frm', 'cancelapproved')">Bỏ duyệt</button>
    <?php if($approved == 0): ?>
        <button class="btn btn-default" onclick="processReports('frm', 'delete')">Xóa bảng tính</button>
    <?php endif; ?>    
</div>
<div class="row">
    <div class="col-md-12">
        <h4>
            <small><small class="text-danger text"><font size=3>(*)</font></small> Bảng lương chỉ được <b>Xóa</b> hoặc <b>Tạo mới</b> lại khi bảng lương <b>chưa được duyệt</b>.</small><br>
        </h4>
    </div>
</div>
<div class="box-body"> 
    <a href="<?php echo e(route('monthinsurances-index'), false); ?>" class="btn btn-default btn-cancel" style="width: 8%;"><i class="fa fa-arrow-left"></i> Quay lại</a>  
</div>
</form>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>