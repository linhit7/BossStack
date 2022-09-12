@extends('layouts.master')

@section('content')

@if(isset($infor))
<div class="alert {{$alert}}">
    {{ $infor }}
</div>
@endif
@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('contracts-updateContract', ['id' => $model->id]) }}?continue=true" method="post" id="contract-form">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">THÔNG TIN DỊCH VỤ</h3><br><br>
                    <h4 class="box-title"><font color='#000080'>Chỉnh sửa</font></h4>
                </div>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type='hidden' name='typereport' value=''>
                <div class="box-body">
                    <div class="form-group">
                        <label><h5><u>THÔNG TIN DỊCH VỤ:</u></h5></label>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Mã đơn hàng <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                {{ $model->contractno }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Gói dịch vụ <small class="text-danger text"> (*)</small>:</label>
                            </div>
                        </div> 
                    </div>

                    @if($model->payment == null or $model->payment == '0')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <p>
                                        <input type="radio" tabindex="4" id="chk_month" name="service_product_id" value="{{ $serviceproduct[0]->id }}" {{ $model->service_product_id==$serviceproduct[0]->id ? 'checked="checked"' : '' }}>
                                        <font size="2" color="#000000">Hằng {{ $serviceproduct[0]->name }} <br> <font color="red">{{ formatNumber($serviceproduct[0]->price, 1, 0, 0) }} đồng/{{ mb_strtolower($serviceproduct[0]->name) }}</font></font>
                                    </p>
                                </div>
                                <div class="col-md-2 text-center">
                                    <p>
                                        <input type="radio" tabindex="4" id="chk_precious" name="service_product_id" value="{{ $serviceproduct[1]->id }}" {{ $model->service_product_id==$serviceproduct[1]->id ? 'checked="checked"' : '' }}>
                                        <font size="2" color="#000000">Hằng {{ $serviceproduct[1]->name }} <br> <font color="red">{{ formatNumber($serviceproduct[1]->price, 1, 0, 0) }} đồng/{{ mb_strtolower($serviceproduct[1]->name) }}</font></font>
                                     </p>
                                </div>
                                <div class="col-md-2 text-center">
                                    <p>
                                        <input type="radio" tabindex="4" id="chk_year" name="service_product_id" value="{{ $serviceproduct[2]->id }}" {{ $model->service_product_id==$serviceproduct[2]->id ? 'checked="checked"' : '' }}>
                                        <font size="2" color="#000000">Hằng {{ $serviceproduct[2]->name }} <br> <font color="red">{{ formatNumber($serviceproduct[2]->price, 1, 0, 0) }} đồng/{{ mb_strtolower($serviceproduct[2]->name) }}</font></font>
                                    </p>
                                </div>
                            </div> 
                            @if($errors->has('service_product_id'))<span class="text-danger">{{ $errors->first('service_product_id') }}</span>@endif
                        </div> 
                    @elseif($model->payment == '1')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <b><font size="2" color="#000000">Hằng {{ $model->service_product_name }} <font color="red">{{ formatNumber($model->service_product_price, 1, 0, 0) }} đồng/{{ mb_strtolower($model->service_product_name) }}</font></font></b><br><br>
                                    <input type="hidden" name="service_product_id" value="{{ $model->service_product_id }}">
                                </div>
                            </div> 
                        </div> 
                    @endif                                    

                    <div class="form-group">
                        <div class="row" style="display: flex;">
                            <div class="col-md-2" style="align-self: center;">
                                <label>Ngày bắt đầu <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input type='text' class="form-control" name="contractdate" id='contractdate' value="{{ ConvertSQLDate($model->contractdate) }}"/>
                                @if($errors->has('contractdate'))<span class="text-danger">{{ $errors->first('contractdate') }}</span>@endif
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

            <button class="btn btn-success" style="width: 15%;" onclick="processReports('frm', 'updateContract')">Lưu</button>
            <br><hr>
            <a href="{{ route('contracts-listContractQueue') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.contract.partials.script')
@endsection
