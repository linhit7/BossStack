<form action="<?php echo e(route('warehouses-imports-index'), false); ?>">
    <div class="box-header with-border">
        <h3 class="box-title">Tìm kiếm</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Từ khóa</label>
                    <input type="text" class="form-control" value="<?php echo e($filter['search'], false); ?>" name="search">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Tùy chọn tìm kiếm</label>
                    <select class="form-control select2" id="searchFields" data-minimum-results-for-search="Infinity" name="searchFields">
                        <option value="id:like;id:like;note:like">Tất cả</option>
                        <option value="id:like">Mã phiếu nhập hàng</option>
                        <option value="id:like">Nhà cung cấp</option>
                        <option value="note:like">Ghi chú</option>
                    </select>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Ngày nhập hàng</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Tình trạng</label>
                    <select class="form-control select2" data-minimum-results-for-search="Infinity" name="filter_status" id="filter_status">
                        <option value="">Chọn</option>
                        <option value="XAC_NHAN">Xác nhận</option>
                        <option value="NHAP_HANG">Nhập hàng</option>
                        <option value="THANH_TOAN">Thanh toán</option>
                        <option value="MOI_TAO">Mới tạo</option>
                        <option value="HUY">Hủy</option>
                    </select>
                </div>
                <!-- /.form-group -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-right">
        <button class="btn btn-primary btn-search">Tìm kiếm</button>
        <a class="btn btn-default" href="<?php echo e(route('warehouses-imports-index'), false); ?>">Xóa form</a>
    </div>
</form>