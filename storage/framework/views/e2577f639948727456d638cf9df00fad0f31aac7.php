<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/style.css'), false); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col-md-3">
        <div class="employee-left">
            <div class="employee-avatar">
                <img src="https://rbooks.vn/public/rbooks-vn-management/public/image/no-image.jpg" class="img-circle" width="100%" height="100%">
            </div>
            <h3 class="employee-name"><b><?php echo e($detai_employee->fullname, false); ?></b></h3>
            <p class="employee-status"><?php echo e($detai_employee->position_name, false); ?>

            
            </p>
            <div class="registration">
                <span><a href="<?php echo e(route('checkemployee-empl', [ 'parameter' => $parameter ]), false); ?>" class="btn btn-primary btn-registration">Đăng ký nghỉ phép</a></span>
                <span><a href="<?php echo e(route('checkbusiness-empl', [ 'parameter' => $parameter ]), false); ?>" class="btn btn-primary btn-registration">Công tác</a></span>
            </div>
        </div>
        <div class="employee-notification">
            <div class="panel panel-default">
                <div class="panel-heading"><h5><b>THÔNG BÁO</b></h5></div>
                <div class="panel-body">
                    <ul>
                        <li class="clearfix">
                            <span class="icon"><i class="fa fa-birthday-cake"></i></span>
                            <span class="text"><a href="#" data-toggle="modal" data-target="#getBirthday">Thông báo sinh nhật trong tháng</a></span>
                            <span class="count"><?php echo e($birthdayInMonth->count(), false); ?></span>
                        </li>
                        <li class="clearfix">
                            <span class="icon"><i class="fa fa-check-circle"></i></span>
                            <span class="text"><a href="#" data-toggle="modal" data-target="#getCheckEmployee">Thông báo nhân sự xin nghỉ hôm nay và ngày mai</a></span>
                            <span class="count"><?php echo e($checkemplInDay->count(), false); ?></span>
                        </li>
                        <li class="clearfix">
                            <span class="icon"><i class="fa fa-check-circle"></i></span>
                            <span class="text"><a href="#" data-toggle="modal" data-target="#getCheckBusiness">Thông báo nhân sự xin công tác hôm nay và ngày mai</a></span>
                            <span class="count"><?php echo e($checkbusiInDay->count(), false); ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>

    <div class="col-md-4">
        <div class="employee-center">
            <div class="employee-personal">
                <div class="head-title">
                    <div class="row">
                        <div class="col-md-8"><h3 class="title"><b><i class="fa fa-address-card"></i> THÔNG TIN CÁ NHÂN</b></h3></div>
                        <div class="col-md-4"></div>
                    </div>
                </div>

                <hr style="margin: 10px 0 10px 0;">

                <div class="content">
                    <div class="item">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="40%"><b>Mã nhân viên:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->id_staff, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Họ tên:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->fullname, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Tuổi:</b></td>
                                    <td width="60%"><?php echo e((Carbon\Carbon::now()->year) - (substr($detai_employee->birthday, 0, 4)), false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Giới tính:</b></td>
                                    <?php if($detai_employee->gender == 0): ?>
                                        <td width="60%">Nữ</td>
                                    <?php elseif($detai_employee->gender == 1): ?>
                                        <td width="60%">Nam</td>
                                    <?php else: ?>
                                        <td width="60%">Khác</td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Ngày sinh:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->birthday == null ? "" : date("d/m/Y", strtotime($detai_employee->birthday)), false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>CMND/CCCD:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->id_No, false); ?> - <?php echo e($detai_employee->identycarddate == NUll ? "" : date("d/m/Y", strtotime($detai_employee->identycarddate)), false); ?> - <?php echo e($detai_employee->identycardplace_issue, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Hôn nhân:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->maritalstatus, false); ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="item">
                        <h5><b>Thông tin liên lạc</b></h5>
                        <hr style="margin: 0 0 10px 0;">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="40%"><b>Điện thoại:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->phone, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Địa chỉ:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->address, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Địa chỉ thường trú:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->temporaryaddress, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Quê quán:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->cityprovince_name, false); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="item">
                        <h5><b>Thông tin khác</b></h5>
                        <hr style="margin: 0 0 10px 0;">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="40%"><b>Số tài khoản:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->account_No, false); ?> - <?php echo e($detai_employee->bankname, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Mã số thuế:</b></td>
                                    <?php if($detai_employee->personaltaxcode != NULL): ?>
                                        <td width="60%"><?php echo e($detai_employee->personaltaxcode, false); ?></td>
                                    <?php else: ?>
                                        <td width="60%">-</td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="employee-right">
            <div class="employee-company">
                <div class="head-title">
                    <div class="row">
                        <div class="col-md-7"><h3 class="title"><b> YÊU CẦU PHÊ DUYỆT</b></h3></div>
                    </div>
                </div>

                <hr style="margin: 10px 0 10px 0;">

                <div class="content">
                    <div class="item">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="40%"><b>Phòng ban:</b></td>
                                    <td width="60%"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>



<?php echo $__env->make('user-employees.user.noticeBirthday', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('user-employees.user.noticeCheckEmployee', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('user-employees.user.noticeCheckBusiness', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>