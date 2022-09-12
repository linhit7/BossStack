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
                                    <td width="60%"><?php echo e($detai_employee->birthday, false); ?></td>
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
                        <div class="col-md-7"><h3 class="title"><b><i class="fa fa-briefcase"></i> THÔNG TIN CÔNG VIỆC</b></h3></div>
                        <div class="col-md-5">
                            <div class="dropdown menu-employee">
                              <button type="button" class="btn btn-primary dropdown-toggle clearfix" data-toggle="dropdown">
                                <span>Quá trình nhân sự</span><i class="fa fa-sort-desc"></i>
                              </button>
                                <?php
                                    $parameter =  $detai_employee->id;
                                    $parameter= Crypt::encrypt($parameter);
                                ?>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(route('payrolls-index', [ 'parameter' => $parameter ]), false); ?>" data-name="">Lương công việc</a>
                                <a class="dropdown-item" href="<?php echo e(route('insurances-index', [ 'parameter' => $parameter ]), false); ?>" data-name="">Bảo hiểm xã hội</a>
                                <a class="dropdown-item" href="<?php echo e(route('laborcontracts-index', [ 'parameter' => $parameter ]), false); ?>" data-name="">Hợp đồng lao động</a>
                                <a class="dropdown-item" href="<?php echo e(route('familyrlships-index', [ 'parameter' => $parameter ]), false); ?>" data-name="">Quan hệ nhân thân</a>                                
                                <a class="dropdown-item" href="<?php echo e(route('experiences-index', [ 'parameter' => $parameter ]), false); ?>" data-name="">Kinh nghiệm làm việc</a>                                
                                <a class="dropdown-item" href="<?php echo e(route('educations-index', [ 'parameter' => $parameter ]), false); ?>" data-name="">Các khóa đào tạo</a>                                
                                <a class="dropdown-item" href="<?php echo e(route('historyworks-index', [ 'parameter' => $parameter ]), false); ?>" data-name="">Quá trình công tác</a>                                
                                <a class="dropdown-item" href="<?php echo e(route('disciplines-index', [ 'parameter' => $parameter ]), false); ?>" data-name="">Khen thưởng/kỷ luật</a>                                
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr style="margin: 10px 0 10px 0;">

                <div class="content">
                    <div class="item">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="40%"><b>Trạng thái:</b></td>
                                    <?php if($detai_employee->status == 1): ?>
                                        <td width="60%"><span class="alert alert-success"><b>Đang làm việc</b></span></td>
                                    <?php elseif($detai_employee->status == 2): ?>
                                        <td width="60%"><span class="alert alert-success"><b>Thử việc</b></span></td>
                                    <?php elseif($detai_employee->status == 3): ?>
                                        <td width="60%"><span class="alert alert-success"><b>Thực tập</b></span></td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Phòng ban:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->department_name, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Bộ phận:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->division_name, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Chức vụ:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->position_name, false); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="item">
                        <h5><b>Thông tin hợp đồng</b></h5>
                        <hr style="margin: 0 0 10px 0;">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="40%"><b>Ngày kí hợp đồng:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->laborcontractfromdate == NUll ? "" : date("d/m/Y", strtotime($detai_employee->laborcontractfromdate)), false); ?> - <?php echo e($detai_employee->laborcontracttodate == NUll ? " " : date("d/m/Y", strtotime($detai_employee->laborcontracttodate)), false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Loại hợp đồng:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->laborcontractlabortype, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Ngày vào làm:</b></td>
                                    <td width="60%"><?php echo e(date("d/m/Y", strtotime($detai_employee->begin_workday)), false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Ngày làm chính thức:</b></td>
                                    <td width="60%"><?php echo e(date("d/m/Y", strtotime($detai_employee->begin_official_workday)), false); ?> - <?php echo e((Carbon\Carbon::now()->year) - (substr($detai_employee->begin_official_workday, 0, 4)), false); ?>/<?php echo e((Carbon\Carbon::now()->month) - (substr($detai_employee->begin_official_workday, 5, 2)), false); ?> (Năm/Tháng)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="item">
                        <h5><b>Thông tin nghỉ phép</b></h5>
                        <hr style="margin: 0 0 10px 0;">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="40%"><b>Số phép theo quy định:</b></td>
                                    <td width="60%">
                                    <?php echo e(formatNumber($detai_employee->permission_curryear, 1, 2, 1), false); ?>

                                    <b> - Phép tồn:</b> <?php echo e(formatNumber($detai_employee->permission_lastyear, 1, 2, 1), false); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Số phép đã nghỉ:</b></td>
                                    <td width="60%">
                                    <?php echo e(formatNumber($detai_employee->permission_leave, 1, 2, 1), false); ?>

                                    <b> - Còn lại:</b> <?php echo e(formatNumber($detai_employee->permission_left, 1, 2, 1), false); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="item">
                        <h5><b>Thông tin trình độ</b></h5>
                        <hr style="margin: 0 0 10px 0;">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="40%"><b>Trường đào tạo:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->educationschoolname, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Hệ đào tạo:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->educationmajor, false); ?></td>
                                </tr>
                                 <tr>
                                    <td width="40%"><b>Ngành học:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->educationdescription, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Trình độ:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->educationlevel, false); ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 10px;">

    <div class="col-md-3"></div>

    <div class="col-md-4">
        <div class="employee-center">
            <div class="employee-personal">
                <div class="head-title">
                    <div class="row">
                        <div class="col-md-8"><h3 class="title"><b><i class="fa fa-address-card"></i> THÔNG TIN THÊM</b></h3></div>
                        <div class="col-md-4"></div>
                    </div>
                </div>

                <hr style="margin: 10px 0 10px 0;">

                <div class="content">
                    <div class="item">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="40%"><b>Email cá nhân:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->email, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Chiều cao:</b></td>
                                    <td width="60%"></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Cân nặng:</b></td>
                                    <td width="60%"></td>
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
                        <div class="col-md-7"><h3 class="title"><b><i class="fa fa-briefcase"></i> CÁC QUÁ TRÌNH GẦN ĐÂY</b></h3></div>
                    </div>
                </div>

                <hr style="margin: 10px 0 10px 0;">

                <div class="content">
                    <div class="item">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="40%"><b>Thay đổi vị trí công việc: </b></td>
                                    <td width="60%"><?php echo e($detai_employee->historyworkfromdate == NUll ? "" : date("d/m/Y", strtotime($detai_employee->historyworkfromdate)), false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Số quyết định:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->historyworkdescription, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Chức vụ:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->historyworkposition_name, false); ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><b>Phòng ban:</b></td>
                                    <td width="60%"><?php echo e($detai_employee->historyworkdepartment_name, false); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>