@extends('layouts.master')

@section('head')

<style type="text/css">
    .content-wrapper .content-header > h1 {
        font-size: 21px;
    }
    
    .box-body .form-group .row{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .box-body .form-group .row .item:nth-child(2n-1){
        align-self: center;
        margin-bottom: 10px;
    }

    @media only screen and (max-width: 768px){
        .box-body .form-group{
            margin-bottom: 0;
        }

        .box-body .form-group .row .item:nth-child(2n+2){
            margin-bottom: 15px;
        }

        .box-body .form-group .row .item label{
            margin-bottom: 0;
        }

        .box-body .form-group:last-child .row .item label{
            margin-bottom: 5px;
        }
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
    <form role="form" action="{{ route('cashassets-store') }}?continue=true" method="post" id="frm" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">THÊM MỚI {{ mb_strtoupper($assetstatustypes[$assetstatustype]) }}</h3>
                </div>
                <div class="box-header with-border">
                    <font style="font-size:10pt;color='#000'">Nhập thông tin chi tiết các tài sản - nợ của khách hàng. Để xem lại thông tin chi tiết các tài sản - nợ vui lòng xem <a href="{{ route('cashassets-index') }}">tại đây</a>.</font>
                </div>

                {{ csrf_field() }}
                <input type='hidden' name='typereport' value=''>
                <input type='hidden' name='customer_id' value='{{ $customer_id }}'>                
                <input type='hidden' name='assetstatustype' value='{{ $assetstatustype }}'>                
                <input type='hidden' name='cashaccount_id' value='{{ $cashaccount_id }}'>
                <input type='hidden' name='cashaccount_amount' value='{{ $cashaccount_amount }}'>                
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Ngày <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2 col-xs-8 item">
                                <input type='text' class="form-control" name="assetdate" id='assetdate' value="{{ old('assetdate') == "" ? $assetdate : old('assetdate') }}"/>
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
                                <input type='text' class="form-control" name="assetname" id='assetname' value="{{ old('assetname') == "" ? $assetname : old('assetname') }}"/>
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
                                <select class="form-control select2" name="assettype" onChange="processSubmitOpenWindow('frm', 'view', '_top', '{{ route('cashassets-process', ['assetstatustype' => $assetstatustype]) }}', '1')">
                                    <option value=""></option>
                                    @foreach($assettypes as $item)
                                        @if($item->id == $assettype or $item->id == old('assettype'))
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
                                        @if($item->id == $assettypedetail or $item->id == old('assettypedetail'))
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
                                <input type="text" class="form-control" name="amount" value="{{ old('amount') == "" ? $amount : old('amount') }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('amount'))<span class="text-danger">{{ $errors->first('amount') }}</span>@endif
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-12 item">
                                <label>Ghi chú: </label>
                            </div>
                            <div class="col-md-5 col-xs-12 item">
                                <textarea class="form-control" name="description" rows="2">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-12 item">
                                <label>Hóa đơn, chứng từ kèm theo :</label>
                            </div>
                            <div class="col-md-7 col-xs-12 item">
                                <div class="box-body">
                                    <input type="file" name="fImages" style="width: 100%">
                                    <p class="text-danger" style="margin-top: 10px;"><u>Lưu ý:</u> gửi kèm các hóa đơn, chứng từ ... kèm theo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
            
            <button class="btn btn-success btn-bg-blue" style="width: 15%;" onclick="processSubmitOpenWindow('frm', 'add', '_top', '{{ route('cashassets-store') }}?continue=true', '1')">Lưu</button>
            <br><hr>
            <a href="{{ route('cashassets-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashasset.partials.script')
@endsection


