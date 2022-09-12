<div class="box box-default">
    <form action="{{ route('coupons-index') }}" method="GET">
    {{ csrf_field() }}
        <div class="box-header with-border">
            <h3 class="box-title">Tìm kiếm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    <label>Mã giảm giá:</label>
                    <input type="text" class="form-control" name="searchValue" value="{{ $searchValue }}">
                </div>
                <div class="col-md-4">
                    <label>Tình trạng:</label>
                    <select class="form-control select" name="searchField">                        
                        @foreach($couponstatus as $key=>$value)
                            @if( $key == $searchField )
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-right">
            <button class="btn btn-primary btn-search">Tìm kiếm</button>
            <a href="{{ route('coupons-index') }}" class="btn btn-default">Xóa form</a>
        </div>
    </form>
</div>