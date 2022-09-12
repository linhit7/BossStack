@extends('layouts.master')

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('cashaccounts-update', ['id' => $model->id]) }}?continue=true" method="post" id="contract-form">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <!-- <h3 class="box-title">THÔNG TIN TÀI KHOẢN</h3><br><br> -->
                    <h4 class="box-title"><font color='#000080'>Chỉnh sửa</font></h4>
                </div>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type='hidden' name='typereport' value=''>
                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Ví tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="accountno" value="{{ $model->accountno }}">
                                @if($errors->has('accountno'))<span class="text-danger">{{ $errors->first('accountno') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Tên ví tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="accountname" value="{{ $model->accountname }}">
                                @if($errors->has('accountname'))<span class="text-danger">{{ $errors->first('accountname') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Ngày mở <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input type='text' class="form-control" name="accountdate" id='accountdate' value="{{ ConvertSQLDate($model->accountdate) }}"/>
                                @if($errors->has('accountdate'))<span class="text-danger">{{ $errors->first('accountdate') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Số tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="amount" value="{{ formatNumber($model->amount, 1, 0, 0) }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('amount'))<span class="text-danger">{{ $errors->first('amount') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Ghi chú: </label>
                            </div>
                            <div class="col-md-3">
                                <textarea class="form-control" name="description" rows="2">{{ $model->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">

                        </div>
                    </div>
                    
                </div>
            </div>

            <button class="btn btn-success btn-bg-blue" style="width: 15%;" onclick="processReports('frm', 'update')">Lưu</button>
            <br><hr>
            <a href="{{ route('cashaccounts-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashaccount.partials.script')
@endsection
