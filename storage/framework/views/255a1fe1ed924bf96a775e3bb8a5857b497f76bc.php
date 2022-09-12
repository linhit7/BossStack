<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<div class="row">
    <form role="form" action="<?php echo e(route('employees-store'), false); ?>?continue=true" method="post" id="employee-form" enctype="multipart/form-data">
        <?php echo e(csrf_field(), false); ?>

        <div class="col-md-10" style="padding-right: 5px;">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tạo mới nhân viên</h3>
                </div>
                <div class="box-body">

                    <div class="row">
                        <div class="col-lg-2"><b>Tài khoản:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control select2" name="user_id">
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
                                <input type="text" class="form-control" placeholder="Tên nhân viên" name="fullname">
                                <?php if($errors->has('fullname')): ?><span class="help-block"><?php echo e($errors->first('fullname'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Mã số thuế:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('personaltaxcode')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="Mã số thuế cá nhân" name="personaltaxcode" style="width: 55%;">
                                <?php if($errors->has('personaltaxcode')): ?><span class="help-block"><?php echo e($errors->first('personaltaxcode'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Giới tính:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group" style="width: 40%;">
                                <select class="form-control select2" name="gender">
                                    <option>Chọn</option>
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Khác</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>CMND/CCCD:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('id_No')) ? ' has-error' : '', false); ?>">
                                <input type="number" class="form-control" placeholder="Chứng minh nhân dân" name="id_No" style="width: 55%;">
                                <?php if($errors->has('id_No')): ?><span class="help-block"><?php echo e($errors->first('id_No'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Ngày sinh:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('birthday')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="birthday" style="width: 55%;">
                                <?php if($errors->has('birthday')): ?><span class="help-block"><?php echo e($errors->first('birthday'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Ngày cấp:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('identycarddate')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="identycarddate" style="width: 55%;">
                                <?php if($errors->has('identycarddate')): ?><span class="help-block"><?php echo e($errors->first('identycarddate'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Quê quán:</b></div>
                        <div class="col-lg-4">
                            <select class="form-control select2" name="hometown_id" style="width: 40%;">
                                <option>Chọn</option>
                                <?php $__currentLoopData = $cityprovinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityprovince): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cityprovince->id, false); ?>"><?php echo e($cityprovince->name, false); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-lg-2"><b>Nơi cấp:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('identycardplace_issue')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="Nơi cấp" name="identycardplace_issue" style="width: 55%;">
                                <?php if($errors->has('identycardplace_issue')): ?><span class="help-block"><?php echo e($errors->first('identycardplace_issue'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Dân tộc:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('people')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="Dân tộc" name="people" style="width: 40%;">
                                <?php if($errors->has('people')): ?><span class="help-block"><?php echo e($errors->first('people'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Ngày vào công ty:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('begin_workdate')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="begin_workdate" style="width: 55%;">
                                <?php if($errors->has('begin_workdate')): ?><span class="help-block"><?php echo e($errors->first('begin_workdate'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b style="letter-spacing: -.2px;">Địa chỉ thường trú:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('address')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="Địa chỉ thường trú" name="address">
                                <?php if($errors->has('address')): ?><span class="help-block"><?php echo e($errors->first('address'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b style="letter-spacing: -.9px;">Ngày làm chính thức:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('begin_official_workday')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="begin_official_workday" style="width: 55%;">
                                <?php if($errors->has('begin_official_workday')): ?><span class="help-block"><?php echo e($errors->first('begin_official_workday'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Địa chỉ tạm trú:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('temporaryaddress')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="Địa chỉ tạm trú" name="temporaryaddress">
                                <?php if($errors->has('temporaryaddress')): ?><span class="help-block"><?php echo e($errors->first('temporaryaddress'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Phòng ban:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control select2" name="department_id">
                                    <option>Chọn</option>
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
                                <input type="number" class="form-control" placeholder="Số điện thoại" name="phone"  style="width: 55%;">
                                <?php if($errors->has('phone')): ?><span class="help-block"><?php echo e($errors->first('phone'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Bộ phận:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control select2" name="division_id">
                                    <option>Chọn</option>
                                    <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($division->id, false); ?>"><?php echo e($division->name, false); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <option value="0">
                                        Không có
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Số cố định:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('phone_other')) ? ' has-error' : '', false); ?>">
                                <input type="number" class="form-control" placeholder="Số cố định" name="phone_other" style="width: 55%;">
                                <?php if($errors->has('phone_other')): ?><span class="help-block"><?php echo e($errors->first('phone_other'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Chức vụ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control select2" name="position_id">
                                    <option>Chọn</option>
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
                                <input type="text" class="form-control" placeholder="Email" name="email">
                                <?php if($errors->has('email')): ?><span class="help-block"><?php echo e($errors->first('email'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Hình thức:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group" style="width: 55%;">
                                <select class="form-control select2" name="status">
                                    <option>Chọn</option>
                                    <option value="1">Chính thức</option>
                                    <option value="2">Thử việc</option>
                                    <option value="3">Thực tập</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Email nội bộ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('localmail')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="Email nội bộ" name="localmail">
                                <?php if($errors->has('localmail')): ?><span class="help-block"><?php echo e($errors->first('localmail'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Số tài khoản:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('account_No')) ? ' has-error' : '', false); ?>">
                                <input type="number" class="form-control" placeholder="Số tài khoản ngân hàng" name="account_No" style="width: 55%;">
                                <?php if($errors->has('account_No')): ?><span class="help-block"><?php echo e($errors->first('account_No'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Hôn nhân:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('maritalstatus')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="Tình trạng gia đình" name="maritalstatus" style="width: 40%;">
                                <?php if($errors->has('maritalstatus')): ?><span class="help-block"><?php echo e($errors->first('maritalstatus'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Tên ngân hàng:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('bankname')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" placeholder="Tên ngân hàng" name="bankname">
                                <?php if($errors->has('bankname')): ?><span class="help-block"><?php echo e($errors->first('bankname'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b>Trình độ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group" style="width: 40%;">
                                <select class="form-control select2" name="level_id">
                                    <option>Chọn</option>
                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($level->id, false); ?>"><?php echo e($level->name, false); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Ngày kí HĐLĐ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('beginlabordate')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="beginlabordate" style="width: 55%;">
                                <?php if($errors->has('beginlabordate')): ?><span class="help-block"><?php echo e($errors->first('beginlabordate'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b style="letter-spacing: -.9px;">Thời hạn nâng lương:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group" style="width: 40%;">
                                <select class="form-control select2" name="salaryyear">
                                    <option>Chọn</option>
                                    <option value="1">1 năm</option>
                                    <option value="2">2 năm</option>
                                    <option value="3">3 năm</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2"><b style="letter-spacing: -.9px;">Ngày kết thúc HĐLĐ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('finishworkdate')) ? ' has-error' : '', false); ?>">
                                <input type="date" class="form-control" name="finishworkdate" style="width: 55%;">
                                <?php if($errors->has('finishworkdate')): ?><span class="help-block"><?php echo e($errors->first('finishworkdate'), false); ?></span><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"><b style="letter-spacing: -.9px;">Trích thuế TNCN:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group<?php echo e(($errors->has('salaryincome')) ? ' has-error' : '', false); ?>">
                                <input type="text" class="form-control" name="salaryincome" style="width: 40%; display: inline-block;"> <span>(%)</span>
                                <?php if($errors->has('salaryincome')): ?><span class="help-block"><?php echo e($errors->first('salaryincome'), false); ?></span><?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-2"><b>Hiển thị:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group" style="width: 55%;">
                                <select class="form-control select2" name="print">
                                    <option>Chọn</option>
                                    <option value="1">Bảng lương</option>
                                    <option value="2">Chấm công</option>
                                    <option value="3">Tất cả</option>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="col-lg-2"><b>Thanh lý HĐLĐ:</b></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control select2" name="finish">
                                    <option>Chọn</option>
                                    <option value="1">Có</option>
                                    <option value="0">Không</option>
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
                    <input type="file" class="file_image_add" name="fImages" data-file_types="jpg|JPG">
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

        var _URL = window.URL || window.webkitURL;

        $('.file_image_add').change(function(e) {
            
            var numb = this.files[0].size/1024/1024;
            var resultid = $(this).val().split(".");
            var gettypeup  = resultid [resultid.length-1];
            var filetype = $(this).attr('data-file_types');
            var allowedfiles = filetype.replace(/\|/g,', ');
            var filesize = 2;
            var onlist = $(this).attr('data-file_types').indexOf(gettypeup) > -1;
            var checkinputfile = $(this).attr('type');
            var numb_fix = numb.toFixed(2);
            var fileName = $(this).val().split( "\\" ).pop();

            if(onlist && numb_fix <= filesize){
                
                confirm('Upload file successful');
                
            } else {
                if(numb_fix >= filesize && onlist){
                    $(this).val('');
                    confirm('Added file is too big \(' + numb_fix + ' MB\) - max file size '+ filesize +' MB');
                } else if(numb_fix < filesize && !onlist || !onlist) {
                    $(this).val('');
                    confirm('An not allowed file format has been added \('+ gettypeup +') - allowed formats: ' + allowedfiles);
                } 
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>