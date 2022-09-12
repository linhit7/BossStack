<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('company-manage.employee.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách nhân viên</h3>
                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <a href="<?php echo e(route('employees-add'), false); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                        <a class="btn btn-default" href="#"><i class="fa fa-download"></i> Xuất tất cả</a>
                    </div>
                    <div class="btn-group btn-group-sm">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i> Hiển thị
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('employees-index', filter_data($filter, 'limit', 10)), false); ?>">10 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('employees-index', filter_data($filter, 'limit', 25)), false); ?>">25 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('employees-index', filter_data($filter, 'limit', 50)), false); ?>">50 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('employees-index', filter_data($filter, 'limit', 100)), false); ?>">100 dòng / trang</a></li>
                            </ul>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sort" aria-hidden="true"></i> Sắp xếp
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="">Mã nhân viên</a></li>
                                <li><a href="">Tên nhân viên</a></li>
                                <li><a href="">Phòng ban</a></li>
                                <li><a href="">Bộ phận</a></li>
                            </ul>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <?php if($filter['sortedBy'] == 'asc' || empty($filter['sortedBy'])): ?> -->
                                <i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Tăng dần
                                <!-- <?php else: ?> -->
                                <i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Giảm dần
                                <!-- <?php endif; ?> -->
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('employees-index', filter_data($filter, 'sortedBy', 'asc')), false); ?>"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Tăng dần</a></li>
                                <li><a href="<?php echo e(route('employees-index', filter_data($filter, 'sortedBy', 'desc')), false); ?>"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Giảm dần</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="1%">
                                <label>
                                    <input type="checkbox" class="minimal checkbox-all" value="1">
                                </label>
                            </th>
                            <th class="text-nowrap" width="1%">STT</th>
                            <th class="text-nowrap" width="5%">Mã NV</th>
                            <th class="text-nowrap" width="16%">Tên nhân viên</th>
                            <th class="text-nowrap">Phòng ban</th>
                            <th class="text-nowrap">Bộ phận</th>
                            <th class="text-nowrap">Chức vụ</th>
                            <th class="text-nowrap" width="8%">Giới tính</th>
                            <th class="text-nowrap" width="8%">Ngày sinh</th>
                            <th class="text-nowrap">Ngày làm<br>chính thức</th>
                            <th class="text-nowrap">Hình thức</th>
                            <th width="8%">
                                <span class="lbl-action">Chức năng</span>
                                <button class="btn btn-danger btn-xs btn-block hide btn-delete-selected">Xóa <span class="lbl-selected-rows-count">0</span> nhân viên</button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($collections->count() === 0): ?>
                            <tr>
                                <td colspan="8"><b>Không có dữ liệu!!!</b></td>
                            </tr>
                        <?php endif; ?>

                        <?php
                        $i = 1
                        ?>
                        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <label>
                                    <input type="checkbox" class="check_employee minimal checkbox-item" value="<?php echo e($employee->id, false); ?>">
                                </label>
                            </td>
                            <td><?php echo e($i, false); ?></td>
                            <td><?php echo e($employee->id_staff, false); ?></td>
                            <td><?php echo e($employee->fullname, false); ?></td>
                            <td><?php echo e($employee->department_id == NULL ? "" : $employee->department()->first()->name, false); ?></td>
                            <td><?php echo e($employee->division_id == NULL ? "" : $employee->division()->first()->name, false); ?></td>
                            <td><?php echo e($employee->position_id == NULL ? "" : $employee->position()->first()->name, false); ?></td>
                            <td>
                                <?php if($employee->gender == 0): ?>
                                    Nữ
                                <?php elseif($employee->gender == 1): ?>
                                    Nam
                                <?php else: ?>
                                    Khác
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(date("d/m/Y", strtotime($employee->birthday)), false); ?></td>
                            <td><?php echo e(date("d/m/Y", strtotime($employee->begin_official_workday)), false); ?></td>
                            <td>
                                <?php if($employee->status == 1): ?>
                                    Chính thức
                                <?php elseif($employee->status == 2): ?>
                                    Thử việc
                                <?php elseif($employee->status == 3): ?>
                                    Thực tập
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <?php
                                        $parameter =  $employee->id;
                                        $parameter= Crypt::encrypt($parameter);
                                    ?>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?php echo e(route('employees-detail', ['id' => $parameter]), false); ?>"><i class="fa fa-info-circle" aria-hidden="true"></i> Chi tiết</a></li>
                                        <li><a href="<?php echo e(route('employees-edit', ['id' => $parameter]), false); ?>"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i> Chỉnh sửa nội dung</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#employeepermissiondays"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i> Đăng ký ngày nghỉ</a></li>
                                        <li>
                                            <a href="javascript:void(0)" data-id="<?php echo e($employee->id, false); ?>" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                            <form name="form-delete-<?php echo e($employee->id, false); ?>" method="post" action="<?php echo e(route('employees-delete', ['id' => $employee->id ]), false); ?>">
                                                <?php echo e(csrf_field(), false); ?>

                                                <?php echo e(method_field('delete'), false); ?>

                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $i++
                        ?>

                        <?php echo $__env->make('company-manage.employee.partials.employee_permission_days', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix text-right">
                <?php echo e($collections->links(), false); ?>

            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('company-manage.employee.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>