<div class="box box-primary">
    <form action="{{ route('cashincomes-list') }}" method="post" id="frm">
        {{ csrf_field() }}    
        <div class="box-header with-border">
            <h3 class="box-title">DANH SÁCH CÁC KHOẢN CHI PHÍ</h3>
        </div>
        <div class="box-body">
            <div class="filter-date">
                <div class="items">
                    <label>Thời gian từ:</label>
                </div>
                <div class="items">
                    <input type='text' class="form-control" name="fromDate" id='fromDate' value="{{ old('fromDate') == "" ? $fromDate : old('fromDate') }}"/>
                </div>
                <div class="items">
                    <label style="color: #2d3194; text-align: center;">đến:</label>
                </div>
                <div class="items">
                    <input type='text' class="form-control" name="toDate" id='toDate' value="{{ old('toDate') == "" ? $toDate : old('toDate') }}"/>
                </div>
                <div class="items">
                    <button class="btn btn-primary btn-search btn-bg-blue" style="background-color: #ff7f0e; border: 1px solid #ff7f0e;">
                        <span class="text">Lọc</span>
                        <span class="icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </button>
                </div>
            </div>
            
            <!--<div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Thời gian từ <small class="text-danger text"> (*)</small>:</label>
                    <input type='text' class="form-control" name="fromDate" id='fromDate' value="{{ old('fromDate') == "" ? $fromDate : old('fromDate') }}"/>                    
                </div>
                <div class="col-md-2 col-xs-12">
                    <label>đến <small class="text-danger text"> (*)</small>:</label>
                    <input type='text' class="form-control" name="toDate" id='toDate' value="{{ old('toDate') == "" ? $toDate : old('toDate') }}"/>                    
                </div>
                <div class="col-md-3 col-xs-12">
                    <button class="btn btn-primary btn-search btn-bg-blue" style="width: 45%;">Tìm kiếm</button>
                </div>                
            </div>
             /.row -->
        </div>

    </form>
</div>