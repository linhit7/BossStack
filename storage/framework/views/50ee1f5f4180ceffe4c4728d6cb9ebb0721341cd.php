<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/style.css'), false); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<div class="row">
    <?php
        $parameter =  $employee->id;
        $parameter= Crypt::encrypt($parameter);
    ?>
    <form role="form" action="<?php echo e(route('employees-update', ['id' => $parameter]), false); ?>?continue=true" method="post" id="employee-form" enctype="multipart/form-data">
        <?php echo e(csrf_field(), false); ?>

        <?php echo e(method_field('put'), false); ?>

        <div class="col-md-10" style="padding-right: 5px;">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chỉnh sửa nhân viên</h3>
                </div>
                <div class="box-body">

                    <div class="row">
                        <div class="col-lg-2"><b>Tài khoản:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control select2" name="user_id">
                                    <option value="<?php echo e($employee->user_id == NULL ? "" : $employee->user_id, false); ?>"><?php echo e($employee->user == NULL ? "" : $employee->user->name, false); ?></option>
                                    <option>Chọn tài khoản</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id, false); ?>"><?php echo e($user->name, false); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Tên nhân viên:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('fullname')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="<?php echo e($employee->fullname, false); ?>" name="fullname" value="<?php echo e($employee->fullname, false); ?>">
                                <?php if($errors->has('fullname')): ?><span class="help-block"><?php echo e($errors->first('fullname'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Mã số thuế:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('personaltaxcode')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="<?php echo e($employee->personaltaxcode, false); ?>" name="personaltaxcode" value="<?php echo e($employee->personaltaxcode, false); ?>" style="width: 55%;">
                                <?php if($errors->has('personaltaxcode')): ?><span class="help-block"><?php echo e($errors->first('personaltaxcode'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Giới tính:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group" style="width: 40%;">
                                <select class="form-control select2" name="gender">
                                    <?php if($employee->gender == 1): ?>
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                        <option value="2">Khác</option>
                                    <?php elseif($employee->gender == 0): ?>
                                        <option value="0">Nữ</option>
                                        <option value="1">Nam</option>
                                        <option value="2">Khác</option>
                                    <?php else: ?>
                                        <option value="2">Khác</option>
                                        <option value="0">Nữ</option>
                                        <option value="1">Nam</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>CMND/CCCD:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('id_No')) ? ' has-error' : '', false); ?>">
                                <input type="number" class="form-control" placeholder="<?php echo e($employee->id_No, false); ?>" name="id_No" value="<?php echo e($employee->id_No, false); ?>" style="width: 55%;">
                                <?php if($errors->has('id_No')): ?><span class="help-block"><?php echo e($errors->first('id_No'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Ngày sinh:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('birthday')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="birthday" value="<?php echo e($employee->birthday, false); ?>" style="width: 55%;">
                                <?php if($errors->has('birthday')): ?><span class="help-block"><?php echo e($errors->first('birthday'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Ngày cấp:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('identycarddate')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="identycarddate" value="<?php echo e($employee->identycarddate, false); ?>" style="width: 55%;">
                                <?php if($errors->has('identycarddate')): ?><span class="help-block"><?php echo e($errors->first('identycarddate'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Quê quán:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group" style="width: 40%;">
                                <select class="form-control select2" name="hometown_id">
                                    <option value="<?php echo e($employee->hometown_id, false); ?>"><?php echo e($employee->hometown_id == NULL ? "" : $employee->cityprovince()->first()->name, false); ?></option>
                                    <?php $__currentLoopData = $cityprovinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityprovince): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cityprovince->id, false); ?>"><?php echo e($cityprovince->name, false); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Nơi cấp:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('identycardplace_issue')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="<?php echo e($employee->identycardplace_issue, false); ?>" name="identycardplace_issue" value="<?php echo e($employee->identycardplace_issue, false); ?>" style="width: 55%;">
                                <?php if($errors->has('identycardplace_issue')): ?><span class="help-block"><?php echo e($errors->first('identycardplace_issue'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Dân tộc:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('people')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="<?php echo e($employee->people, false); ?>" name="people" value="<?php echo e($employee->people, false); ?>" style="width: 40%;">
                                <?php if($errors->has('people')): ?><span class="help-block"><?php echo e($errors->first('people'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Ngày vào công ty:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('begin_workdate')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="begin_workdate" value="<?php echo e($employee->begin_workday, false); ?>" style="width: 55%;">
                                <?php if($errors->has('begin_workdate')): ?><span class="help-block"><?php echo e($errors->first('begin_workdate'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b style="letter-spacing: -.2px;">Địa chỉ thường trú:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('address')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="<?php echo e($employee->address, false); ?>" name="address" value="<?php echo e($employee->address, false); ?>">
                                <?php if($errors->has('address')): ?><span class="help-block"><?php echo e($errors->first('address'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b style="letter-spacing: -.9px;">Ngày làm chính thức:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('begin_official_workday')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="begin_official_workday" value="<?php echo e($employee->begin_official_workday, false); ?>" style="width: 55%;">
                                <?php if($errors->has('begin_official_workday')): ?><span class="help-block"><?php echo e($errors->first('begin_official_workday'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Địa chỉ tạm trú:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('temporaryaddress')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="<?php echo e($employee->temporaryaddress, false); ?>" name="temporaryaddress" value="<?php echo e($employee->temporaryaddress, false); ?>">
                                <?php if($errors->has('temporaryaddress')): ?><span class="help-block"><?php echo e($errors->first('temporaryaddress'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Phòng ban:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control select2" name="department_id">
                                    <option value="<?php echo e($employee->department_id, false); ?>"><?php echo e($employee->department_id == NULL ? "" : $employee->department()->first()->name, false); ?> </option>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($department->id, false); ?>"><?php echo e($department->name, false); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Số điện thoại:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('phone')) ? ' has-error' : '', false); ?>">
                                <input type="number" class="form-control" placeholder="<?php echo e($employee->phone, false); ?>" name="phone" value="<?php echo e($employee->phone, false); ?>" style="width: 55%;">
                                <?php if($errors->has('phone')): ?><span class="help-block"><?php echo e($errors->first('phone'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Bộ phận:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control select2" name="division_id">
                                    <?php if($employee->division_id != 0): ?>
                                        <option value="<?php echo e($employee->division_id, false); ?>"><?php echo e($employee->division_id == NULL ? "" : $employee->division()->first()->name, false); ?></option>
                                        <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($division->id, false); ?>"><?php echo e($division->name, false); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <option value="0">
                                        Không có
                                    </option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Số cố định:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('phone_other')) ? ' has-error' : '', false); ?>">
                                <input type="number" class="form-control" placeholder="<?php echo e($employee->phone_other, false); ?>" name="phone_other" value="<?php echo e($employee->phone_other, false); ?>" style="width: 55%;">
                                <?php if($errors->has('phone_other')): ?><span class="help-block"><?php echo e($errors->first('phone_other'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Chức vụ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control select2" name="position_id">
                                    <option value="<?php echo e($employee->position_id, false); ?>"><?php echo e($employee->position_id == NULL ? "" : $employee->position()->first()->name, false); ?></option>
                                    <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($position->id, false); ?>"><?php echo e($position->name, false); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Email:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('email')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="<?php echo e($employee->email, false); ?>" name="email" value="<?php echo e($employee->email, false); ?>">
                                <?php if($errors->has('email')): ?><span class="help-block"><?php echo e($errors->first('email'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Hình thức:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group" style="width: 55%;">
                                <select class="form-control select2" name="status">
                                    <?php if($employee->status == 1): ?>
                                        <option value="1">Chính thức</option>
                                        <option value="2">Thử việc</option>
                                        <option value="3">Thực tập</option>
                                    <?php elseif($employee->status == 2): ?>
                                        <option value="2">Thử việc</option>
                                        <option value="1">Chính thức</option>
                                        <option value="3">Thực tập</option>
                                    <?php else: ?>
                                        <option value="3">Thực tập</option>
                                        <option value="1">Chính thức</option>
                                        <option value="2">Thử việc</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Email nội bộ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('localmail')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="<?php echo e($employee->localmail, false); ?>" name="localmail" value="<?php echo e($employee->localmail, false); ?>">
                                <?php if($errors->has('localmail')): ?><span class="help-block"><?php echo e($errors->first('localmail'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Số tài khoản:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('account_No')) ? ' has-error' : '', false); ?>">
                                <input type="number" class="form-control" placeholder="<?php echo e($employee->account_No, false); ?>" name="account_No" value="<?php echo e($employee->account_No, false); ?>" style="width: 55%;">
                                <?php if($errors->has('account_No')): ?><span class="help-block"><?php echo e($errors->first('account_No'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Hôn nhân:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('maritalstatus')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="<?php echo e($employee->maritalstatus, false); ?>" name="maritalstatus" value="<?php echo e($employee->maritalstatus, false); ?>" style="width: 40%;">
                                <?php if($errors->has('maritalstatus')): ?><span class="help-block"><?php echo e($errors->first('maritalstatus'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Tên ngân hàng:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('bankname')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="<?php echo e($employee->bankname, false); ?>" name="bankname" value="<?php echo e($employee->bankname, false); ?>">
                                <?php if($errors->has('bankname')): ?><span class="help-block"><?php echo e($errors->first('bankname'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Trình độ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group" style="width: 40%;">
                                <select class="form-control select2" name="level_id">
                                    <option value="<?php echo e($employee->level_id, false); ?>"><?php echo e($employee->level_id == NULL ? "" : $employee->level()->first()->name, false); ?></option>
                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($level->id, false); ?>"><?php echo e($level->name, false); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Ngày kí HĐLĐ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('beginlabordate')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="beginlabordate" value="<?php echo e($employee->beginlabordate, false); ?>" style="width: 55%;">
                                <?php if($errors->has('beginlabordate')): ?><span class="help-block"><?php echo e($errors->first('beginlabordate'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b style="letter-spacing: -.9px;">Thời hạn nâng lương:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group" style="width: 40%;">
                                <select class="form-control select2" name="salaryyear">
                                    <?php if($employee->salaryyear == 1): ?>
                                        <option value="1">1 năm</option>
                                        <option value="2">2 năm</option>
                                        <option value="3">3 năm</option>
                                    <?php elseif($employee->salaryyear == 2): ?>
                                        <option value="2">2 năm</option>
                                        <option value="1">1 năm</option>
                                        <option value="3">3 năm</option>
                                    <?php else: ?>
                                        <option value="3">3 năm</option>
                                        <option value="1">1 năm</option>
                                        <option value="2">2 năm</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2"><b style="letter-spacing: -.9px;">Ngày kết thúc HĐLĐ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('finishworkdate')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="finishworkdate" value="<?php echo e($employee->finishworkdate, false); ?>" style="width: 55%;">
                                <?php if($errors->has('finishworkdate')): ?><span class="help-block"><?php echo e($errors->first('finishworkdate'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b style="letter-spacing: -.9px;">Trích thuế TNCN:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('salaryincome')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="<?php echo e($employee->salaryincome, false); ?> trích thuế TNCN" name="salaryincome" value="<?php echo e($employee->salaryincome, false); ?>" style="width: 40%; display: inline-block;"> <span>(%)</span>
                                <?php if($errors->has('salaryincome')): ?><span class="help-block"><?php echo e($errors->first('salaryincome'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Hiển thị:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control select2" name="print">
                                    <?php if($employee->print == 1): ?>
                                        <option value="1">Bảng lương</option>
                                        <option value="2">Chấm công</option>
                                        <option value="3">Bảng lương - Chấm công</option>
                                    <?php elseif($employee->print == 2): ?>
                                        <option value="2">Chấm công</option>
                                        <option value="1">Bảng lương</option>
                                        <option value="3">Bảng lương - Chấm công</option>
                                    <?php else: ?>
                                        <option value="3">Bảng lương - Chấm công</option>
                                        <option value="1">Bảng lương</option>
                                        <option value="2">Chấm công</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="col-lg-2"><b>Thanh lý HĐLĐ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control select2" name="finish">
                                    <?php if($employee->finish == 1): ?>
                                        <option value="1">Có</option>
                                        <option value="0">Không</option>
                                    <?php else: ?>
                                        <option value="0">Không</option>
                                        <option value="1">Có</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div> -->
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-2" style="padding-left: 5px;">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chức năng</h3>
                </div>
                <div class="box-body">
                    <button type="submit" class="btn btn-primary btn-save" tabindex="9" style="width: 49%;">Lưu</button>
                    <a href="<?php echo e(route('employees-index'), false); ?>" class="btn btn-default btn-cancel" tabindex="10" style="width: 49%;">Trở về</a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Hình ảnh avatar</h3>
                </div>
                <div class="box-body">
                	<div class="avatar-demo">
                		<img src="<?php echo e(asset(empty($employee->avatar) ? RBOOKS_NO_IMAGE_URL : $employee->avatar), false); ?>" class="img-circle" width="100%" height="100%" type="file" name="be_image" value="<?php echo e($employee->avatar, false); ?>">
                	</div>
                    <input type="file" name="fImages" style="width: 100%">
                    <p class="text-danger" style="margin-top: 10px;">Lưu ý: Tải hình ảnh có kích thước 500 x 500 (px) và dung lượng hình dưới 2MB</p>
                </div>
            </div>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('plugins/input-mask/jquery.inputmask.js'), false); ?>"></script>
<script src="<?php echo e(asset('plugins/input-mask/jquery.inputmask.date.extensions.js'), false); ?>"></script>
<script>
    $(function() {
        $('.btn-save').click(function() {
            $('#employee-form').submit();
        });

        $('#birthday').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });

        $('#chk-continue').on('ifChecked', function() {
            $('#employee-form').attr('action', '<?php echo e(route('employees-store'), false); ?>?continue=true');
        });

        $('#chk-continue').on('ifUnchecked', function() {
            $('#employee-form').attr('action', '<?php echo e(route('employees-store'), false); ?>');
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>