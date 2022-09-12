<div class="box box-search">
    <div class="box-body">
        <div class="row">
            <div class="col-md-3">
                <a class="btn btn-primary btn-detail" href="{{ route('usercustomers-index') }}">Danh sách chi tiết khách hàng</a>
            </div>
            
            <div class="col-md-5">
                <div class="quick-search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm nhanh" name="quick_search" value="{{ $searchvalue}}">
                        <button class="btn btn-primary btn-search"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>