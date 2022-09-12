<div class="box box-default">
    <form action="{{ route('customers-groups-index') }}">
        <div class="box-header with-border">
            <h3 class="box-title">Tìm kiếm</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <input type="text" class="form-control" name="search" value="{{ $filter['search'] }}">
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tùy chọn</label>
                        <select id="searchFields" class="form-control select2" name="searchFields" data-minimum-results-for-search="Infinity">
                            <option value="name;code">Tất cả</option>
                            <option value="name">Tên nhóm</option>
                            <option value="code">Mã code</option>
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
            <a href="{{ route('customers-groups-index') }}" class="btn btn-default">Xóa form</a>
        </div>
    </form>
</div>