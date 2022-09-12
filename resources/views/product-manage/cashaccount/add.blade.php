@extends('layouts.master')

@section('head')

<style type="text/css">
    .box-body .form-group .row{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .box-body .form-group .row .item:nth-child(2n-1){
        align-self: center;
    }

    @media only screen and (max-width: 768px){
        .box-body .form-group .row .item label{
            margin-bottom: 0;
        }
    }
</style>

@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('cashaccounts-store') }}?continue=true" method="post" id="frm">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">THÊM MỚI VÍ TIỀN</h3>
                </div>
                <div class="box-header with-border">
                    <font style="font-size:10pt;color='#000'">Thông tin ví tiền, số dư dùng để quản lý dòng tiền cá nhân. Để xem lại thông tin chi tiết các ví tiền vui lòng xem <a href="{{ route('cashaccounts-index') }}" style="color: #FFA500;"><b>tại đây</b></a>.</font>
                </div>
                {{ csrf_field() }}
                <input type='hidden' name='typereport' value=''>
                <input type='hidden' name='customer_id' value='{{ $customer_id }}'>                
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Ví tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3 col-xs-8 item">
                                <input type="text" class="form-control bg-color-input" name="accountno" value="{{ old('accountno') }}">
                                @if($errors->has('accountno'))<span class="text-danger">{{ $errors->first('accountno') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Tên ví tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3 col-xs-8 item">
                                <input type="text" class="form-control bg-color-input" name="accountname" value="{{ old('accountname') }}">
                                @if($errors->has('accountname'))<span class="text-danger">{{ $errors->first('accountname') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Ngày mở <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2 col-xs-8 item">
                                <input type='text' class="form-control" name="accountdate" id='accountdate' value="{{ old('accountdate') == "" ? $accountdate : old('accountdate') }}"/>
                                @if($errors->has('accountdate'))<span class="text-danger">{{ $errors->first('accountdate') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Số tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3 col-xs-8 item">
                                <input type="text" class="form-control" name="amount" value="{{ old('amount') }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('amount'))<span class="text-danger">{{ $errors->first('amount') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-12 item">
                                <label>Ghi chú: </label>
                            </div>
                            <div class="col-md-3 col-xs-12 item">
                                <textarea class="form-control" name="description" rows="2">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <button class="btn btn-success btn-bg-blue" style="width: 15%;" onclick="processReports('frm', 'store')">Lưu</button>
            <br><hr>
            <a href="{{ route('cash-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashaccount.partials.script')
@endsection


