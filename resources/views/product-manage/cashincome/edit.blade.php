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
    @if(isset($checkError) and $checkError == 1)
        @include('layouts.partials.messages.warning')
    @else
        @include('layouts.partials.messages.infor')    
    @endif
@endif

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('cashincomes-update', ['id' => $model->id]) }}?continue=true" method="post" id="frm" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">CHỈNH SỬA THÔNG TIN {{ mb_strtoupper($incomestatustypes[$model->incomestatustype]) }}</h3>
                </div>
                <div class="box-header with-border">
                    <font style="font-size:10pt;color='#000'">Thông tin các khoản thu nhập/chi phí và các khoản nợ cá nhân. Để xem lại thông tin chi tiết các khoản vui lòng xem <a href="{{ route('cashincomes-index') }}" style="color: #FFA500;"><b>tại đây</b></a>.</font>
                </div>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type='hidden' name='typereport' value=''>
                <input type='hidden' name='incomestatustype' value='{{ $incomestatustype }}'>
                <input type='hidden' name='cashaccount_id' value='{{ $cashaccount_id }}'>
                <input type='hidden' name='cashaccount_amount' value='{{ $cashaccount_amount }}'>                
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Ngày giao dịch<small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4">
                                <input type='text' class="form-control" name="incomedate" id='incomedate' value="{{ ConvertSQLDate($model->incomedate) }}"/>
                                @if($errors->has('incomedate'))<span class="text-danger">{{ $errors->first('incomedate') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5 item">
                                <label>Ví tiền:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item" style="text-align: left;">
                                {{ $cashaccount_name . " [ " . $cashaccountno . " ]"  }}
                            </div>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5 item">
                                <label>Số dư khả dụng:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item" style="text-align: right;">
                                <font style="font-size: 17px;font-weight:normal">{!! formatNumberColor($cashaccount_amount, 1, 0, 1) !!}</font>
                            </div>                            
                        </div>
                    </div>
                    <hr>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-4 item">
                                <label>Loại <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-5 item">
                                <select class="form-control select2" name="incometype" onChange="processSubmitOpenWindow('frm', 'edit', '_top', '{{ route('cashincomes-update', ['id' => $model->id]) }}', '1')">
                                    <option value=""></option>
                                    @foreach($incometypes as $item)
                                        @if($item->id == $incometype)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                    
                                @if($errors->has('incometype'))<span class="text-danger">{{ $errors->first('incometype') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-4 item">
                                <label>Chi tiết :</label>
                            </div>
                            <div class="col-md-4 col-xs-8 item">
                                <select class="form-control select2" name="incometypedetail" onChange="processSubmitOpenWindow('frm', 'edit', '_top', '{{ route('cashincomes-update', ['id' => $model->id]) }}', '1')">
                                    <option value=""></option>
                                    @foreach($incometypedetails as $item)
                                        @if($item->id == $incometypedetail)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                    
                                @if($errors->has('incometypedetail'))<span class="text-danger">{{ $errors->first('incometypedetail') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    @if($incometypedetaillevels->count() > 0)
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-4 item">
                                <label>Phân loại :</label>
                            </div>
                            <div class="col-md-4 col-xs-8 item">
                                <select class="form-control select2" name="incometypedetaillevel">
                                    <option value=""></option>
                                    @foreach($incometypedetaillevels as $item)
                                        @if($item->id == $incometypedetaillevel)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                    
                                @if($errors->has('incometypedetaillevel'))<span class="text-danger">{{ $errors->first('incometypedetaillevel') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5 item">
                                <label>Nội dung :</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                <select class="form-control select2" name="cashassetid">
                                    <option value=""></option>
                                    @foreach($cashassets as $item)
                                        @if($item->id == $model->cashasset_id)
                                            <option value="{{ $item->id }}" selected>{{ $item->assetname }} - Số tiền còn phải thanh toán: {{ formatNumber($item->remainamount, 1, 0, 1) }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->assetname }} - Số tiền còn phải thanh toán: {{ formatNumber($item->remainamount, 1, 0, 1) }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                    
                                @if($errors->has('cashassetid'))<span class="text-danger">{{ $errors->first('cashassetid') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Số tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="amount" value="{{ formatNumber($model->amount, 1, 0, 0) }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('amount'))<span class="text-danger">{{ $errors->first('amount') }}</span>@endif
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Ghi chú: </label>
                            </div>
                            <div class="col-md-4">
                                <textarea class="form-control" name="description" rows="2">{{ $model->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-12 item">
                                <label>Hóa đơn, chứng từ kèm theo :</label>
                            </div>
                            <div class="col-md-7 col-xs-12 item">
                                <input type="hidden" name="document" value="{{ $model->document }}">
                                <div class="box-body">
                                    <input type="file" name="fImages" style="width: 100%">
                                    <p class="text-danger" style="margin-top: 10px;"><u>Lưu ý:</u> gửi kèm các hóa đơn, chứng từ ... kèm theo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <button class="btn btn-success" style="width: 15%;" onclick="processReports('frm', 'update')">Lưu</button>
            <br><hr>
            <a href="{{ route('cashincomes-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashincome.partials.script')
@endsection
