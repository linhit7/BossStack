<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('bower_components/select2/dist/css/select2.min.css'), false); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/all.css'), false); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('product-manage.warehouse.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách kho hàng
                    <small>(Hiển thị <?php echo e($filter['limit'], false); ?> dòng / trang) </small>
                </h3>
                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <a href="<?php echo e(route('warehouses-add'), false); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-download" aria-hidden="true"></i> Xuất danh sách
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('warehouses-export'), false); ?>"><i class="fas fa-download" aria-hidden="true"></i> Xuất tất cả</a></li>
                                <li><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> Xuất tác giả đã chọn</a></li>
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
                                <li><a href="<?php echo e(route('warehouses-index', filter_data($filter, 'limit', 10)), false); ?>">10 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('warehouses-index', filter_data($filter, 'limit', 25)), false); ?>">25 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('warehouses-index', filter_data($filter, 'limit', 50)), false); ?>">50 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('warehouses-index', filter_data($filter, 'limit', 100)), false); ?>">100 dòng / trang</a></li>
                            </ul>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sort" aria-hidden="true"></i> Sắp xếp
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('warehouses-index', filter_data($filter, 'orderBy', 'id')), false); ?>">Mã tác giả</a></li>
                                <li><a href="<?php echo e(route('warehouses-index', filter_data($filter, 'orderBy', 'name')), false); ?>">Họ và tên</a></li>
                                <li><a href="<?php echo e(route('warehouses-index', filter_data($filter, 'orderBy', 'created_at')), false); ?>">Ngày tạo</a></li>
                                <li><a href="<?php echo e(route('warehouses-index', filter_data($filter, 'orderBy', 'updated_at')), false); ?>">Ngày chỉnh sửa</a></li>
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
                                <li><a href="<?php echo e(route('warehouses-index', filter_data($filter, 'sortedBy', 'asc')), false); ?>"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Tăng dần</a></li>
                                <li><a href="<?php echo e(route('warehouses-index', filter_data($filter, 'sortedBy', 'desc')), false); ?>"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Giảm dần</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="1%">
                                <label>
                                    <input type="checkbox" class="minimal checkbox-all" value="1">
                                </label>
                            </th>
                            <th class="text-nowrap" width="1%">#</th>
                            <th class="text-nowrap" width="15%">Tên kho</th>
                            <th class="text-nowrap">Địa chỉ</th>
                            <th class="text-nowrap">Số điện thoại</th>
                            <th class="text-nowrap">Lệ phí</th>
                            <th class="text-nowrap">Lợi nhuận</th>
                            <th class="text-nowrap">Ngày khởi tạo</th>
                            <th class="text-nowrap">Ngày chỉnh sửa</th>
                            <th >
                                <span class="lbl-action">Chức năng</span>
                                <button class="btn btn-danger btn-xs btn-block hide btn-delete-selected">Xóa <span class="lbl-selected-rows-count">0</span> tác giả</button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($collections->count() === 0): ?>
                        <tr>
                            <td colspan="7"><b>Không có dữ liệu!!!</b></td>
                        </tr>
                        <?php endif; ?>
                        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td width="1%">
                                <label>
                                    <input type="checkbox" class="minimal checkbox-item" data-id="<?php echo e($warehouse->id, false); ?>">
                                </label>
                            </td>
                            <td width="2%"><?php echo e($warehouse->id, false); ?></td>
                            <td width="15%"><?php echo e($warehouse->name, false); ?></td>
                            <td width="25%"><?php echo e($warehouse->address, false); ?></td>
                            <td><?php echo e($warehouse->phone, false); ?></td>
                            <td><?php echo e($warehouse->fee_percent, false); ?></td>
                            <td><?php echo e($warehouse->profit_percent, false); ?></td>
                            <td><?php echo e($warehouse->created_at, false); ?></td>
                            <td><?php echo e($warehouse->updated_at, false); ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Thao tác <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?php echo e(route('warehouses-edit', ['id' => $warehouse->id]), false); ?>"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i> Chỉnh sửa</a></li>
                                        <li>
                                            <a href="javascript:void(0)" data-id="<?php echo e($warehouse->id, false); ?>" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                            <form name="form-delete-<?php echo e($warehouse->id, false); ?>" method="post" action="<?php echo e(route('warehouses-delete', ['id'=> $warehouse->id]), false); ?>">
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
<?php echo $__env->make('product-manage.warehouse.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>