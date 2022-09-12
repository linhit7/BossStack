<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">

<style type="text/css">
    .reset-date{
        display: inline-block;
        vertical-align: middle;
        position: relative;
    }

    .reset-date > input{
        float: left;
        width: 60%;
        margin-right: 2%;
        height: 30px;
    }

    .reset-date > a{
        width: 38%;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('company-manage.emplperday.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('company-manage.emplperday.add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách quản lý phép
                    <small>(Hiển thị <?php echo e($filter['limit'], false); ?> dòng / trang) </small>
                </h3>
                <div class="box-tools">
                    <!-- <div class="reset-date btn-group btn-group-sm clearfix">
                        <input type="date" class="form-control" name="resetdate">
                        <a href="#" class="btn btn-default">Tính lại tháng</a>
                    </div> -->
                    <div class="btn-group btn-group-sm">
                        <div class="btn-group btn-group-sm">
                            <a href="#"  data-toggle="modal" data-target="#getFormAdd" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                            <a class="btn btn-default" href="#"><i class="fa fa-download"></i> Xuất tất cả</a>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-download" aria-hidden="true"></i> Xuất danh sách
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> Xuất tất cả</a></li>
                                <li><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> Xuất đã chọn</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="btn-group btn-group-sm">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i> Hiển thị
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('emplperdays-index', filter_data($filter, 'limit', 10)), false); ?>">10 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('emplperdays-index', filter_data($filter, 'limit', 25)), false); ?>">25 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('emplperdays-index', filter_data($filter, 'limit', 50)), false); ?>">50 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('emplperdays-index', filter_data($filter, 'limit', 100)), false); ?>">100 dòng / trang</a></li>
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
                                    <input type="checkbox" class="minimal checkbox-item">
                                </label>
                            </th>
                            <th width="2.5%">STT</th>
                            <th class="text-nowrap">Mã nhân viên</th>
                            <th class="text-nowrap" width="10%">Họ tên</th>
                            <th class="text-nowrap">Ngày chính thức</th>
                            <th class="text-nowrap">Năm</th>
                            <th class="text-nowrap">Phép tồn năm trước</th>
                            <th class="text-nowrap">Phép được hưởng</th>
                            <?php for($i = 1; $i <= 12; $i++): ?>
                                <th class="text-nowrap"><?php echo e($i, false); ?></th>
                            <?php endfor; ?>
                            <th class="text-nowrap">Phép đã nghỉ</th>
                            <th class="text-nowrap">Phép còn lại</th>
                            <th class="text-nowrap">
                                <span class="lbl-action">Chức năng</span>
                                <button class="btn btn-danger btn-xs btn-block hide btn-delete-selected">Xóa <span class="lbl-selected-rows-count">0</span> đã chọn</button>
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
                            $i = 1;
                        ?>
                        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emplperday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<tr>
                                <td>
                                    <label>
                                        <input type="checkbox" class="minimal checkbox-item">
                                    </label>
                                </td>
                                <td><?php echo e($i, false); ?></td>
                                <td><?php echo e($emplperday->employee()->first()->id_staff, false); ?></td>
                                <td><?php echo e($emplperday->employee()->first()->fullname, false); ?></td>
                                <td><?php echo e(date("d-m-Y", strtotime($emplperday->employee()->first()->begin_official_workday)), false); ?></td>
                                <td><?php echo e($emplperday->year, false); ?></td>
                                <td><?php echo e($emplperday->permission_lastyear, false); ?></td>
                                <td><?php echo e($emplperday->permission_curryear, false); ?></td>
                                <?php $__currentLoopData = $emplperday->listcheckemplInYear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td><?php echo e($value, false); ?></td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <td><?php echo e($emplperday->permission_leave, false); ?></td>
                                <td><?php echo e($emplperday->permission_left, false); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="<?php echo e(route('emplperdays-edit', ['id' => $emplperday->id]), false); ?>"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i> Chỉnh sửa nội dung</a></li>
                                            <li>
                                                <a href="javascript:void(0)" data-id="" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                                <form name="form-delete" method="post" action="">
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
<script>
    $(function() {
        $('.btn-delete').click(function(){
            var id = $(this).data('id');
            swal({
                title: "Bạn có chắc không?",
                text: "Nội dung xóa sẽ được đưa vào thùng rác",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((value) => {
                console.log(value);
                if(value) {
                    document.forms['form-delete-'+id].submit();
                }
            });
        });

        <?php if(!empty($filter['searchFields'])): ?>
        $('#searchFields').val('<?php echo e($filter['searchFields'], false); ?>').trigger('change');
        <?php endif; ?>

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>