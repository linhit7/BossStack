<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách khen thưởng / kỷ luật</h3>
                <div class="box-tools">
                    <a href="<?php echo e(route('disciplines-add', ['employeeid' => $employeeid]), false); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                </div>
            </div>

            <div class="box-body">
                <div class="about-employees">
                    <div class="about about-1 clearfix">
                        <div class="about-item">
                            <span>Nhân viên:</span>
                            <span><b>[<?php echo e($employee->id_staff, false); ?>] <?php echo e($employee->fullname, false); ?></b></span>
                        </div>
                        <div class="about-item">
                            <span>Ngày làm chính thức:</span>
                            <span>
                                <b>
                                    <?php echo e(date("d/m/Y", strtotime($employee->begin_official_workday)), false); ?>

                                </b>
                            </span>
                        </div>
                    </div>
                    <div class="about about-2">
                        <div class="about-item">
                            <span>Chức vụ:</span>
                            <span><b><?php echo e($employee->position()->first() == NULL ? "" : $employee->position()->first()->name, false); ?></b></span>
                        </div>
                    </div>
                    <div class="about about-3">
                        <div class="about-item">
                            <span>Phòng ban:</span>
                            <span><b><?php echo e($employee->department()->first() == Null ? "" : $employee->department()->first()->name, false); ?></b></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align: center;">STT</th>
                            <th width="8%" style="text-align: center;">Ngày</th>
                            <th width="10%" style="text-align: center;">Loại</th>
                            <th width="12%" style="text-align: center;">Số quyết định</th>
                            <th width="20%" style="text-align: center;">Nội dung</th>
                            <th width="15%" style="text-align: center;">Hình thức</th>
                            <th width="20%" style="text-align: center;">Mô tả</th>
                            <th style="text-align: center;">Chức năng</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if($collections->count() === 0): ?>
                            <tr>
                                <td colspan="8"><b>Không có dữ liệu</b></td>
                            </tr>
                        <?php endif; ?>
                        <?php
                            $i = 1
                        ?>
                        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="text-align: center;"><?php echo e($i++, false); ?></td>
                                <td style="text-align: center;"><?php echo e($model->fromdate == null ? "" : date("d/m/Y", strtotime($model->fromdate)), false); ?></td>
                                <td style="text-align: left;"><?php echo e($disciplinetype[$model->checktype_id], false); ?></td>
                                <td style="text-align: left;"><?php echo e($model->disciplinenumber, false); ?></td>
                                <td style="text-align: left;"><?php echo e($model->contentdiscipline, false); ?></td>
                                <td style="text-align: left;"><?php echo e($model->formdiscipline, false); ?></td>
                                <td style="text-align: left;"><?php echo e($model->description, false); ?></td>
                                <td style="text-align: center;">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Thao tác <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="<?php echo e(route('disciplines-edit', ['employeeid' => $employeeid, 'id'=> $model->id]), false); ?>"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i> Chỉnh sửa</a></li>
                                            <li><a href="javascript:void(0)" data-id="<?php echo e($model->id, false); ?>" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                                <form style="margin: 0;" name="form-delete-<?php echo e($model->id, false); ?>" method="post" action="<?php echo e(route('disciplines-delete', ['employeeid' => $employeeid, 'id' => $model->id]), false); ?>">
                                                    <?php echo e(csrf_field(), false); ?>

                                                    <?php echo e(method_field('delete'), false); ?>

                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<div>
    <a href="<?php echo e(route('employees-detail', ['id' => $employeeid]), false); ?>" class="btn btn-default btn-cancel" style="width: 8%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('user-employees.discipline.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>