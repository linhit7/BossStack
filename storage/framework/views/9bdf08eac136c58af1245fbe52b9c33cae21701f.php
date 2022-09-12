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
                        <label>Theo email</label>
                        <input type="text" class="form-control" name="email" value="" placeholder="Nhập email khách hàng cần tìm...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Theo họ tên</label>
                        <input type="text" class="form-control" name="name" value="" placeholder="Nhập họ tên khách hàng cần tìm...">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Mức độ quan trọng</label>
                        <select id="level" class="form-control select2" data-minimum-results-for-search="Infinity" name="level">
                            <option value="">Gấp</option>
                            <option value="">Không gấp</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Hoàn thành</label>
                        <select id="finish" class="form-control select2" data-minimum-results-for-search="Infinity" name="finish">
                            <option value="">Tất cả</option>
                            <option value="">Đã hoàn thành</option>
                            <option value="">Chờ xử lý</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-right">
            <button class="btn btn-primary btn-search">Tìm kiếm</button>
            <a href="#" class="btn btn-default">Xóa form</a>
        </div>
    </form>
</div>