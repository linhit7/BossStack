<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('product-manage.product.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách sản phẩm</h3>
                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <a href="<?php echo e(route('products-add'), false); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-download" aria-hidden="true"></i> Xuất danh sách
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('product-export'), false); ?>"><i class="fas fa-download" aria-hidden="true"></i> Xuất tất cả</a></li>
                                <li><a id="choices_products" href="#"><i class="fa fa-file-text" aria-hidden="true"></i> Xuất sản phẩm đã chọn</a></li>
                            </ul>
                        </div>
                        <div class="btn-group btn-group-sm">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i> Hiển thị
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'limit', 10)), false); ?>">10 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'limit', 25)), false); ?>">25 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'limit', 50)), false); ?>">50 dòng / trang</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'limit', 100)), false); ?>">100 dòng / trang</a></li>
                            </ul>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sort" aria-hidden="true"></i> Sắp xếp
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'orderBy', 'id')), false); ?>">Mã sách</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'orderBy', 'name')), false); ?>">Tên sản phẩm</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'orderBy', 'barcode')), false); ?>">Barcode</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'orderBy', 'sku')), false); ?>">Sku</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'orderBy', 'quantity')), false); ?>">Số lượng</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'orderBy', 'cover_price')), false); ?>">Giá bìa</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'orderBy', 'sale_price')), false); ?>">Giá bán</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'orderBy', 'promotion_price')), false); ?>">Giá khuyến mãi</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'orderBy', 'publishing_year')), false); ?>">Năm xuất bản</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'orderBy', 'status')), false); ?>">Trạng thái</a></li>
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
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'sortedBy', 'asc')), false); ?>"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Tăng dần</a></li>
                                <li><a href="<?php echo e(route('products-index', filter_data($filter, 'sortedBy', 'desc')), false); ?>"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Giảm dần</a></li>
                            </ul>
                        </div>
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
                                    <input type="checkbox" class="minimal checkbox-all" value="">
                                </label>
                            </th>
                            <th width="30%" colspan="2">Sản phẩm</th>
                            <th>Giá</th>
                            <th>Tồn kho</th>
                            <th>Tình trạng</th>
                            <th>Ngày chỉnh sửa</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($collections->count() === 0): ?>
                        <tr>
                            <td colspan="7"><b>Không có dữ liệu!!!</b></td>
                        </tr>
                        <?php endif; ?>
                        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td  width="1%">
                                <label>
                                    <input type="checkbox" class="check_product minimal checkbox-item" value="<?php echo e($product->id, false); ?>">
                                </label>
                            </td>
                            <td width="1%">
                                <img src="<?php echo e(asset(empty($product->images->last()) ? RBOOKS_NO_IMAGE_URL : $product->images->last()->path), false); ?>" class="product-thumbnail">
                            </td>
                            <style>
                                @-webkit-keyframes glowing {
                                  0% { color: black;  }
                                  50% { color: red;  }
                                  100% { color: black;  }
                                }

                                @-moz-keyframes glowing {
                                  0% { color: black;  }
                                  50% { color: red;  }
                                  100% { color: black;  }
                                }

                                @-o-keyframes glowing {
                                  0% { color: black; }
                                  50% { color: red; }
                                  100% { color: black;  }
                                }

                                @keyframes  glowing {
                                  0% { color: black;  }
                                  50% { color: red; }
                                  100% { color: black;  }
                                }

                                .warning {
                                  -webkit-animation: glowing 1000ms infinite;
                                  -moz-animation: glowing 1000ms infinite;
                                  -o-animation: glowing 1000ms infinite;
                                  animation: glowing 1000ms infinite;
                                }
                            </style>
                            <td>
                                <ul class="list-unstyled">
                                    <li><?php echo e($product->name, false); ?></li>
                                    <li class="text-muted">#<?php echo e($product->id, false); ?> - SKU: <?php echo e($product->barcode, false); ?></li>
                                    <li class="text-muted">
                                    <?php if(count($product->productwarehouses) == 0): ?>
                                        <a class="warning" style="font-weight: 700">
                                            Hiện tại trong kho chưa có sản phẩm.
                                        </a>
                                        <li>
                                            <a class="warning" style="font-weight: 700">
                                            Yêu cầu nhập thêm !
                                            </a>
                                        </li>
                                    <?php elseif(count($product->productwarehouses) > 0 && $product->productwarehouses[1]->quantity < 100): ?>
                                        <a class="warning" style="font-weight: 700">
                                            Kho chỉ còn: <?php echo e($product->productwarehouses[1]->quantity, false); ?> sản phẩm
                                        </a>
                                        <li>
                                            <a class="warning" style="font-weight: 700">
                                            Yêu cầu nhập thêm !
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <ul class="list-unstyled">
                                    <li><b>Giá:</b> <?php echo e(price_format($product->cover_price), false); ?></li>
                                    <li><b>Giá bán:</b> <?php echo e(price_format($product->sale_price), false); ?></li>
                                </ul>
                            </td>

                            <td>
                                <ul class="list-unstyled">
                                    <li>
                                        <b>
                                            Kho Tổng:
                                        </b>
                                    <?php echo e(( $product->productwarehouses->where('warehouse_id', '<>', 1)->sum('quantity') ), false); ?>

                                    </li>
                                    <?php $__currentLoopData = $product->productwarehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quantityWarehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <b>
                                            <?php echo e($product->warehouses->find($quantityWarehouse->warehouse_id)->name, false); ?>:
                                        </b>
                                        <?php echo e($quantityWarehouse->quantity, false); ?>

                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </td>
                            <td>
                                <label>
                                    <input type="checkbox" id="chk" data-id="<?php echo e($product->id, false); ?>" class="flat-red"<?php if($product->status === 1): ?> checked <?php endif; ?>>
                                </label>
                            </td>
                            <td><?php echo e($product->updated_at, false); ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Chi tiết</a></li>
                                        <li><a href="<?php echo e(route('products-edit', ['id' => $product->id]), false); ?>"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i> Chỉnh sửa nội dung</a></li>
                                        <li><a href="<?php echo e(route('frm-upload', ['id' => $product->id]), false); ?>"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i> Chỉnh sửa hình ảnh</a></li>
                                        <li>
                                            <a href="javascript:void(0)" data-id="<?php echo e($product->id, false); ?>" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                            <form name="form-delete-<?php echo e($product->id, false); ?>" method="post" action="<?php echo e(route('products-delete', ['id'=> $product->id]), false); ?>">
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
<?php echo $__env->make('product-manage.product.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>