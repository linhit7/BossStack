<div class="box box-default">
    <form action="<?php echo e(route('products-index'), false); ?>">
        <div class="box-header with-border">
            <h3 class="box-title">Tìm kiếm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <input type="text" name="search" class="form-control" value="<?php echo e($filter['search'], false); ?>">
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Tùy chọn tìm kiếm</label>
                        <select name="searchFields" id="searchFields" class="form-control" data-minimum-results-for-search="Infinity">
                            <option value="name;id;sku;description">Tất cả</option>
                            <option value="name">Tên sản phẩm</option>
                            <option value="sku">SKU</option>
                            <option value="description">Mô tả</option>
                        </select>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control select2">
                            <option>Chọn danh mục</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id, false); ?>"><?php echo e($category->name, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Tình trạng</label>
                        <select class="form-control select2" data-minimum-results-for-search="Infinity" name="filter_status" id="filter_status">
                            <option value="">Chọn</option>
                            <option value="1">Bật</option>
                            <option value="0">Tắt</option>
                        </select>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Tồn kho</label>
                        <select class="form-control select2" data-minimum-results-for-search="Infinity">
                            <option>Chọn</option>
                            <option>Còn hàng</option>
                            <option>Hết hàng</option>
                        </select>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-right">
            <button class="btn btn-primary">Tìm kiếm</button>
            <a href="<?php echo e(route('products-index'), false); ?>" class="btn btn-default">Xóa form</a>
        </div>
    </form>
</div>