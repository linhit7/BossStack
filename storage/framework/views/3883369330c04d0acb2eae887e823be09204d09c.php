<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('bower_components/select2/dist/css/select2.min.css'), false); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/all.css'), false); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<div class="box box-default">
<?php echo $__env->make('product-manage.import.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách phiếu nhập hàng
                    <small>(Hiển thị <?php echo e($filter['limit'], false); ?> dòng / trang) </small>
                </h3>
                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <a href="<?php echo e(route('warehouses-imports-add'), false); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-download" aria-hidden="true"></i> Xuất danh sách
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('warehouses-imports-export-all'), false); ?>"><i class="fas fa-download" aria-hidden="true"></i> Xuất tất cả</a></li>
                                <!-- <li><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> Xuất tác giả đã chọn</a></li> -->
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
                                <li><a href="<?php echo e(route('warehouses-imports-index', filter_data($filter, 'limit', 10)), false); ?>">10 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('warehouses-imports-index', filter_data($filter, 'limit', 25)), false); ?>">25 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('warehouses-imports-index', filter_data($filter, 'limit', 50)), false); ?>">50 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('warehouses-imports-index', filter_data($filter, 'limit', 100)), false); ?>">100 dòng / trang</a></li>
                            </ul>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sort" aria-hidden="true"></i> Sắp xếp
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('warehouses-imports-index', filter_data($filter, 'orderBy', 'id')), false); ?>">Mã tác giả</a></li>
                                <li><a href="<?php echo e(route('warehouses-imports-index', filter_data($filter, 'orderBy', 'name')), false); ?>">Họ và tên</a></li>
                                <li><a href="<?php echo e(route('warehouses-imports-index', filter_data($filter, 'orderBy', 'created_at')), false); ?>">Ngày tạo</a></li>
                                <li><a href="<?php echo e(route('warehouses-imports-index', filter_data($filter, 'orderBy', 'updated_at')), false); ?>">Ngày chỉnh sửa</a></li>
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
                                <li><a href="<?php echo e(route('warehouses-imports-index', filter_data($filter, 'sortedBy', 'asc')), false); ?>"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Tăng dần</a></li>
                                <li><a href="<?php echo e(route('warehouses-imports-index', filter_data($filter, 'sortedBy', 'desc')), false); ?>"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Giảm dần</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="1%">
                                <label>
                                    <input type="checkbox" class="minimal checkbox-all">
                                </label>
                            </th>
                            <th class="text-nowrap">Mã phiếu nhập</th>
                            <th class="text-nowrap">Mã nhập kho</th>
                            <th class="text-nowrap">Nhà cung cấp</th>
                            <th class="text-nowrap">Tổng tiền</th>
                            <th class="text-nowrap">Trạng thái</th>
                            <th class="text-nowrap">Ghi chú</th>
                            <th class="text-nowrap">Ngày lập phiếu</th>
                            <th>
                                <span class="lbl-action">Chức năng</span>
                                <button class="btn btn-danger btn-xs btn-block hide btn-delete-selected">Xóa <span class="lbl-selected-rows-count">0</span> phiếu nhập</button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($collections->count() === 0): ?>
                        <tr>
                            <td colspan="9"><b>Không có dữ liệu!!!</b></td>
                        </tr>
                        <?php endif; ?>
                        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $import): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" class="minimal checkbox-item">
                                    </label>
                                </td>
                                <td><?php echo e($import->import_code, false); ?></td>
                                <td><?php echo e($import->warehouse_import_code, false); ?></td>
                                <td><?php echo e($import->suppliers->name, false); ?></td>
                                <td>
                                    <ul>
                                        <li><b>Chưa chiết khấu: </b> <?php echo e(number_format($import->sub_total), false); ?> VNĐ</li>
                                        <li><b>Đã chiết khấu: </b> <?php echo e(number_format($import->total), false); ?> VNĐ</li>
                                    </ul>
                                </td>
                                <td>
                                    <?php switch($status = $import->status):
                                        case ('XAC_NHAN'): ?>
                                            <span class="alert-dismissable">Xác nhận</span>
                                            <?php break; ?>;
                                        <?php case ('NHAP_HANG'): ?>
                                            <span class="alert-info">Nhập hàng</span>
                                            <?php break; ?>;
                                        <?php case ('THANH_TOAN'): ?>
                                            <span class="alert-success">Thanh toán</span>
                                            <?php break; ?>;
                                        <?php case ('MOI_TAO'): ?>
                                            <span class="alert-warning">Mới tạo</span>
                                            <?php break; ?>;
                                        <?php default: ?>
                                            <span class="alert-danger">Hủy</span>
                                            <?php break; ?>;
                                    <?php endswitch; ?>
                                </td>
                                <td><?php echo e($import->note, false); ?></td>
                                <td><?php echo e($import->created_at, false); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Thao tác <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="<?php echo e(route('warehouses-imports-edit', ['id' => $import->id]), false); ?>"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i> Chỉnh sửa</a></li>
                                            <li>
                                                <a href="<?php echo e(route('warehouses-imports-print', ['id' => $import->id]), false); ?>"><i class="fa fa-print"></i> In đơn</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('warehouses-imports-export', ['id' => $import->id]), false); ?>"><i class="fa fa-download" aria-hidden="true"></i> Xuất dữ liệu</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-id="<?php echo e($import->id, false); ?>" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                                <form name="form-delete-<?php echo e($import->id, false); ?>" method="post" action="<?php echo e(route('warehouses-imports-delete', ['id' => $import->id ]), false); ?>">
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
<?php echo $__env->make('product-manage.import.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>