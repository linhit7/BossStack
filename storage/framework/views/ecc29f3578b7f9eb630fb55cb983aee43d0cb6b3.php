<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('bower_components/select2/dist/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/all.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<?php if(session()->has('errors')): ?>
    <?php echo $__env->make('layouts.partials.messages.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('user-employees.user.user_account.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách
                    <small>(Hiển thị <?php echo e($filter['limit']); ?> dòng / trang) </small>
                </h3>
                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#getFormAdd"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</button>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-download" aria-hidden="true"></i> Xuất danh sách
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('users-export')); ?>"><i class="fa fa-file-text-o" aria-hidden="true"></i> Xuất tất cả</a></li>
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
                                <li><a href="<?php echo e(route('users-index', filter_data($filter, 'limit', 10))); ?>">10 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('users-index', filter_data($filter, 'limit', 25))); ?>">25 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('users-index', filter_data($filter, 'limit', 50))); ?>">50 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('users-index', filter_data($filter, 'limit', 100))); ?>">100 dòng / trang</a></li>
                            </ul>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sort" aria-hidden="true"></i> Sắp xếp
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('users-index', filter_data($filter, 'orderBy', 'id'))); ?>">Mã người dùng</a></li>
                                <li><a href="<?php echo e(route('users-index', filter_data($filter, 'orderBy', 'name'))); ?>">Tên</a></li>
                                <li><a href="<?php echo e(route('users-index', filter_data($filter, 'orderBy', 'email'))); ?>">Email</a></li>
                                <li><a href="<?php echo e(route('users-index', filter_data($filter, 'orderBy', 'created_at'))); ?>">Ngày tạo</a></li>
                                <li><a href="<?php echo e(route('users-index', filter_data($filter, 'orderBy', 'updated_at'))); ?>">Ngày chỉnh sửa</a></li>
                            </ul>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if($filter['sortedBy'] == 'asc' || empty($filter['sortedBy'])): ?>
                                    <i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Tăng dần
                                <?php else: ?>
                                    <i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Giảm dần
                                <?php endif; ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('users-index', filter_data($filter, 'sortedBy', 'asc'))); ?>"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Tăng dần</a></li>
                                <li><a href="<?php echo e(route('users-index', filter_data($filter, 'sortedBy', 'desc'))); ?>"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Giảm dần</a></li>
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
                                    <input type="checkbox" class="minimal checkbox-all">
                                </label>
                            </th>
                            <th>#</th>
                            <th class="text-nowrap">Tên</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Quyền truy cập</th>
                            <th class="text-nowrap">Ngày khởi tạo</th>
                            <th class="text-nowrap">Ngày chỉnh sửa</th>
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
                            $i = 1
                        ?>
                        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" class="minimal checkbox-item">
                                    </label>
                                </td>
                                <td><?php echo e($i); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->role); ?></td>
                                <td><?php echo e($user->created_at); ?></td>
                                <td><?php echo e($user->updated_at); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Thao tác <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="<?php echo e(route('users-edit', ['id' => $user->id])); ?>"><i class="fas fa-pencil-alt"></i> Chỉnh sửa</a></li>
                                            <li>
                                                <a href="javascript:void(0)" data-id="<?php echo e($user->id); ?>" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                                <form name="form-delete-<?php echo e($user->id); ?>" method="post" action="<?php echo e(route('users-delete', ['id'=> $user->id])); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('delete')); ?>

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
                <?php echo e($collections->links()); ?>

            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
<?php echo $__env->make('user-employees.user.user_account.add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(function() {
        $('.btn-delete').click(function(){
            var id = $(this).data('id');
            if(confirm('Bạn có muốn xóa không?')){
                document.forms['form-delete-'+ id].submit();
            }
        });

        <?php if(!empty($filter['searchFields'])): ?>
        $('#searchFields').val('<?php echo e($filter['searchFields']); ?>').trigger('change');
        <?php endif; ?>
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>