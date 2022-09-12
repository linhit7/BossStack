<div class="box box-default">
    <form action="">
        <div class="box-header with-border">
            <h3 class="box-title">Tìm kiếm nhanh</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <input type="text" name="search" class="form-control" value="<?php echo e($filter['search']); ?>">
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tùy chọn tìm kiếm</label>
                        <select name="searchFields" id="searchFields" class="form-control" data-minimum-results-for-search="Infinity">
                            <option value="fullname;email">Tất cả</option>
                            <option value="fullname">Tên</option>
                            <option value="email">Email</option>
                        </select>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Mức độ quan trọng</label>
                        <select id="level" class="form-control select2" data-minimum-results-for-search="Infinity" name="level">
                            <option value="1">Gấp</option>
                            <option value="2">Không gấp</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Hoàn thành</label>
                        <select id="filter_status" class="form-control select2" data-minimum-results-for-search="Infinity" name="filter_status">
                            <option value="">Chọn</option>
                            <option value="1">Đã hoàn thành</option>
                            <option value="0">Chờ xử lý</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-right">
            <button class="btn btn-primary btn-search">Tìm kiếm</button>
            <a href="<?php echo e(route('advisorys-index')); ?>" class="btn btn-default">Xóa form</a>
        </div>
    </form>
</div>