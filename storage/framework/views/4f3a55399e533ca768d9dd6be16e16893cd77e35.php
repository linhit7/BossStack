<div class="box box-default">
    <form action="<?php echo e(route('warehouses-index'), false); ?>">
        <div class="box-header with-border">
            <h3 class="box-title">Tìm kiếm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <input type="text" class="form-control" name="search" value="<?php echo e($filter['search'], false); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tùy chọn</label>
                        <select id="searchFields" class="form-control select2" data-minimum-results-for-search="Infinity" name="searchFields">
                            <option value="name;address;phone">Tất cả</option>
                            <option value="name">Tên kho hàng</option>
                            <option value="address">Địa chỉ</option>
                            <option value="phone">Số điện thoại</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-right">
            <button class="btn btn-primary btn-search">Tìm kiếm</button>
            <a href="<?php echo e(route('warehouses-index'), false); ?>" class="btn btn-default">Xóa form</a>
        </div>
    </form>
</div>