@extends('layouts.master')

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('contracts-update', ['id' => $model->id]) }}?continue=true" method="post" id="contract-form">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">THÔNG TIN DỊCH VỤ</h3><br><br>
                    <h4 class="box-title"><font color='#000080'>Chỉnh sửa</font></h4>
                </div>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type='hidden' name='typereport' value=''>
                <input type='hidden' name='customer_id' value='{{ $model->customer_id }}'>
                <input type='hidden' name='service_product_id' value='{{ $model->service_product_id }}'>                
                <div class="box-body">
                    <div class="form-group">
                        <label><h5><u>THÔNG TIN DỊCH VỤ:</u></h5></label>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Khách hàng:</label>
                            </div>
                            <div class="col-md-2">
                                {{ $model->customer()->first()->fullname }}    
                            </div>
                            <div class="col-md-1"></div>                            
                            <div class="col-md-2">
                                <label>Email:</label>
                            </div>
                            <div class="col-md-2">
                                {{ $model->customer()->first()->email }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Email đăng nhập:</label>
                            </div>
                            <div class="col-md-5">
                                {{ $model->customer()->first()->userCustomer()->first() == null ? 'Khách hàng mới chưa có tài khoản đăng nhập trên hệ thống !!!' : $model->customer()->first()->userCustomer()->first()->email }}
                            </div>

                        </div>
                    </div>

                    <br>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Mã đơn hàng <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="contractno" value="{{ $model->contractno }}">
                                @if($errors->has('contractno'))<span class="text-danger">{{ $errors->first('contractno') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Ngày bắt đầu <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input type='text' class="form-control" name="contractdate" id='contractdate' value="{{ ConvertSQLDate($model->contractdate) }}"/>
                                @if($errors->has('contractdate'))<span class="text-danger">{{ $errors->first('contractdate') }}</span>@endif
                            </div>
                            <div class="col-md-1"></div>                            
                            <div class="col-md-2">
                                <label>Ngày kết thúc <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input type='text' class="form-control" name="lastcontractdate" id='lastcontractdate' value="{{ ConvertSQLDate($model->lastcontractdate) }}"/>
                                @if($errors->has('lastcontractdate'))<span class="text-danger">{{ $errors->first('lastcontractdate') }}</span>@endif
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                &nbsp;&nbsp;&nbsp;&nbsp;<label><h5><u>GÓI DỊCH VỤ:</u></h5></label>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="40%"><b>Dịch vụ</b></th>
                                            <th class="text-center" width="15%"><b>Thời hạn (tháng)</b></th>
                                            <th class="text-center" width="15%"><b>Giảm giá (%)</b></th>                                                
                                            <th class="text-center" width="30%"><b>Số tiền thanh toán (đồng)</b></th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        <tr>
                                            <td><b>{{ $model->service_product_name }}</b> <br> Giá: {{ formatNumber($model->service_product_price, 1, 0, 0) }} đồng/tháng</td>
                                            <td class="text-center">{{ $model->term }}</td>
                                            <td class="text-center">{{ $model->discount }}</td>
                                            <td class="text-right">{{ formatNumber($model->amount, 1, 0, 0) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" colspan="3"><b>THÀNH TIỀN</b></td>
                                            <td class="text-right">{{ formatNumber($model->amount, 1, 0, 0) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div> 
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                &nbsp;&nbsp;&nbsp;&nbsp;<label>Ghi chú: </label>
                            </div>
                            <div class="col-md-7">
                                <textarea class="form-control" name="description" rows="1">{{ $model->description }}</textarea>
                            </div>
                        </div>
                    </div>
                                       
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                &nbsp;&nbsp;&nbsp;&nbsp;<label><h5><u>THÔNG TIN PHÊ DUYỆT:</u></h5></label>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                &nbsp;&nbsp;&nbsp;&nbsp;<label>Thanh toán :</label>
                            </div>
                            <div class="col-md-2 text-left">
                                <p>
                                    <input type="radio" tabindex="4" id="chk_payment" name="payment" value="0" {{ ($model->payment==null or $model->payment=='0') ? 'checked="checked"' : '' }}>
                                    <font size="2" color="#000000">{{ $paymenttype[0] }}</font>
                                </p>
                            </div>
                            <div class="col-md-2 text-left">
                                <p>
                                    <input type="radio" tabindex="4" id="chk_payment" name="payment" value="1" {{ $model->payment=='1' ? 'checked="checked"' : '' }}>
                                    <font size="2" color="#000000">{{ $paymenttype[1] }}</font>
                                 </p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                &nbsp;&nbsp;&nbsp;&nbsp;<label>Tình trạng dịch vụ:</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" name="contractstatustype">
                                    @foreach($contractstatustype as $key=>$value)
                                        @if($key == $model->contractstatustype)
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('contractstatustype'))<span class="text-danger">{{ $errors->first('contractstatustype') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                &nbsp;&nbsp;&nbsp;&nbsp;<label>Trạng thái duyệt:</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" name="approvestatustype">
                                    <option value=""></option>
                                    @foreach($approvestatustype as $key=>$value)
                                        @if($key == $model->approvestatustype)
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('statustype'))<span class="text-danger">{{ $errors->first('statustype') }}</span>@endif
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2 text-left">
                                <label>Ngày duyệt :</label>
                            </div>
                            <div class="col-md-2">
                                <input type='text' class="form-control" name="approved_at" id='approved_at' value="{{ ConvertSQLDate($model->approved_at) }}"/>
                                @if($errors->has('approved_at'))<span class="text-danger">{{ $errors->first('approved_at') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                &nbsp;&nbsp;&nbsp;&nbsp;<label>Kiểm soát phê duyệt :</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" name="approved_user_id">                        
                                    <option value=""></option>
                                    @foreach($approvedusers as $item)
                                        @if( $item->id == $model->approved_user_id )
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2 text-left">
                                <label>Nhân viên kinh doanh:</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" name="officer_user_id">                        
                                    <option value=""></option>
                                    @foreach($users as $item)
                                        @if( $item->id == $model->officer_user_id )
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1"><br></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <font size='3' color='#000000'>&nbsp;&nbsp;&nbsp;&nbsp;<b><u>Ghi chú:</u></font></b><br>
                                <font size='2' color='#000000'>&nbsp;- Nhấn nút <font color='#ff0000'><b>Lưu</b></font> hệ thống sẽ lưu thông tin dịch vụ vào hệ thống.</font><br>
                                <font size='2' color='#000000'>&nbsp;- Nhấn nút <font color='#ff0000'><b>Lưu & cập nhật tài khoản</b></font> hệ thống sẽ lưu và cập nhật thời hạn sử dụng mới tài khoản của khách hàng vào hệ thống.</font>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1"><br></div>
                        </div>
                    </div>
                                                              
                </div>
            </div>

            &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success" style="width: 10%;" onclick="processReports('frm', 'update')">Lưu</button>
            &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success" style="width: 20%;" onclick="processReports('frm', 'updateChageAccount')">Lưu & cập nhật tài khoản</button>

            <br><hr>
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('contracts-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.contract.partials.script')
@endsection
