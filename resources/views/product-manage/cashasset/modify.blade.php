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

    .box-body .form-group .row .item{
        align-self: center;
    }

</style>

@endsection

@section('content')

@if(isset($infor))
<div class="alert alert-success">
    {{ $infor }}
</div>
@endif

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('cashassets-update', ['id' => $model->id]) }}?continue=true" method="post" name="frm" id="frm">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">ĐIỀU CHỈNH GIÁ TRỊ TÀI SẢN - NỢ</h3>
                </div>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type='hidden' name='typereport' value=''>
                <input type='hidden' name='customer_id' value='{{ $customer_id }}'>                
                <input type='hidden' name='assetstatustype' value='{{ $model->assetstatustype }}'>                
                <input type='hidden' name='cashaccount_id' value='{{ $cashaccount_id }}'>
                <input type='hidden' name='cashaccount_amount' value='{{ $cashaccount_amount }}'>                

                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Ngày <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2 col-xs-8 item">
                                <input type='text' class="form-control" name="assetdate" id='assetdate' value="{{ ConvertSQLDate($model->assetdate) }}"/>
                                @if($errors->has('assetdate'))<span class="text-danger">{{ $errors->first('assetdate') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Tài sản <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-8 item">
                                <input type='text' class="form-control" name="assetname" id='assetname' value="{{ $model->assetname }}"/>
                                @if($errors->has('assetname'))<span class="text-danger">{{ $errors->first('assetname') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Loại <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-8 item">
                                <select class="form-control select2" name="assettype">
                                    <option value=""></option>
                                    @foreach($assettypes as $item)
                                        @if($item->id == $model->assettype)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                    
                                @if($errors->has('assettype'))<span class="text-danger">{{ $errors->first('assettype') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Chi tiết :</label>
                            </div>
                            <div class="col-md-4 col-xs-8 item">
                                <select class="form-control select2" name="assettypedetail">
                                    <option value=""></option>
                                    @foreach($assettypedetails as $item)
                                        @if($item->id == $model->assettypedetail)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                    
                                @if($errors->has('assettypedetail'))<span class="text-danger">{{ $errors->first('assettypedetail') }}</span>@endif
                            </div>
                        </div>
                    </div>
                                                            
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Số tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2 col-xs-8 item">
                                <input type="text" class="form-control" name="amount" value="{{ formatNumber($model->amount, 1, 0, 0) }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('amount'))<span class="text-danger">{{ $errors->first('amount') }}</span>@endif
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-12">
                                <label>Ghi chú: </label>
                            </div>
                            <div class="col-md-5 col-xs-12">
                                <textarea class="form-control" name="description" rows="2">{{ $model->description }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            <button class="btn btn-success btn-bg-blue" style="width: 15%;" onclick="processReports('frm', 'store')">Lưu</button>
            <br><hr>
            <a href="{{ route('cashassets-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashasset.partials.script')
@endsection


