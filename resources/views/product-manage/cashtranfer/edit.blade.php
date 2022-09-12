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
                    <h4 class="box-title"><font color='#000080'>Chỉnh sửa</font></h4>
                </div>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type='hidden' name='typereport' value=''>
                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Tên ví tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="accountno" value="">
                                @if($errors->has('accountno'))<span class="text-danger">{{ $errors->first('accountno') }}</span>@endif
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
