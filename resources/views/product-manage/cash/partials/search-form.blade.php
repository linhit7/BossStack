<div class="box box-search">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Theo email:</label>
                        <input type="text" class="form-control" name="email" value="{{$email}}">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Theo họ tên:</label>
                        <input type="text" class="form-control" name="fullname" value="{{$fullname}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gói dịch vụ:</label>
                        <select class="form-control select2" name="selectproduct">
                            <option value="">Dịch vụ 1</option>
                            <option value="">Dịch vụ 2</option>
                            <option value="">Dịch vụ 3</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Ngày đăng ký:</label>
                                <input type="date" class="form-control" name="fromdate" value="{{$fromdate}}">
                            </div>
                            <div class="col-xs-6">
                                <label>&nbsp;&nbsp;đến:</label>
                                <input type="date" class="form-control" name="todate" value="{{$todate}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-left">
                <button class="btn btn-primary btn-search">Tìm kiếm</button>
            </div>
        </div>
</div>