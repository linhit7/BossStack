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
    <form role="form" action="{{ route('cashplans-update', ['id' => $model->id]) }}?continue=true" method="post" id="frm" name="frm" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">THÔNG TIN MỤC TIÊU</h3><br><br>
                    <h4 class="box-title"><font color='#000080'>Chỉnh sửa</font></h4>
                </div>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type='hidden' name='typereport' value=''>
                <input type='hidden' name='customer_id' value='{{ $model->customer_id }}'>                
                <input type="hidden" name="currentamountunittype" id="currentamountunittype" value="1">
                <input type="hidden" name="requireamountunittype" id="requireamountunittype" value="1">

                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-xs-5 item">
                                <label>MỤC TIÊU <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                <select class="form-control select2" name="plantype" id="plantype">
                                    @foreach($plantypes as $key=>$value)
                                        @if($key == $model->plantype)
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            @if (Auth()->user()->service_product_id == 3)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @else
                                                @if ($key == 9 or $key == 13)
                                                    
                                                @else
                                                    <option value="{{ $key }}">{{ $value }}</option>                                                    
                                                @endif
                                            @endif                                                                  
                                        @endif
                                    @endforeach
                                </select>                                
                            </div>  
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-xs-5 item">
                                <label>Tên ví mục tiêu <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                <input type="text" class="form-control" name="planname" value="{{ $model->planname }}" disabled>
                                @if($errors->has('planname'))<span class="text-danger">{{ $errors->first('planname') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-xs-5 item">
                                <label>Chi tiết <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                <input type="text" class="form-control" name="description" value="{{ $model->description }}">
                                @if($errors->has('description'))<span class="text-danger">{{ $errors->first('description') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-xs-5 item">
                                <label>Ngày lập<small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                <input type='text' class="form-control" name="plandate" id='plandate' value="{{ $model->plandate == "" ? "" : ConvertSQLDate($model->plandate) }}"/>
                                @if($errors->has('plandate'))<span class="text-danger">{{ $errors->first('plandate') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-xs-5 item">
                                <label>Tuổi hiện tại <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                <input type="text" class="form-control" name="currentage" id="currentage" value="{{ $model->currentage }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('currentage'))<span class="text-danger">{{ $errors->first('currentage') }}</span>@endif
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-xs-5 item">
                                <label>Tuổi hoàn thành mục tiêu <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                <input type="text" class="form-control" value="{{ $model->planage == "" ? 50 : $model->planage }}" name="planage" id="planage"  onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('planage'))<span class="text-danger">{{ $errors->first('planage') }}</span>@endif
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group" style="display: none;">
                        <div class="row">
                            <div class="col-md-4 col-xs-5 item">
                                <label>Liên kết ví tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                <select class="form-control select2" name="accountno" id="accountno">                        
                                    <option value="0_0"></option>
                                    @foreach($listaccounts as $item)
                                        @if( $item->id == $model->accountno )
                                            <option value="{{ $item->id . '_' . $item->amount }}" selected>{{'Tài khoản '. $item->accountno . ' - Số dư: ' . formatNumber($item->amount, 1, 0, 0) }}</option>
                                        @else
                                            <option value="{{ $item->id . '_' . $item->amount }}">{{'Tài khoản '. $item->accountno . ' - Số dư:  ' . formatNumber($item->amount, 1, 0, 0) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="display: none;">
                        <div class="row">
                            <div class="col-md-4 col-xs-5 item">
                                <label>Vốn đầu tư hiện tại <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                <input type="text" class="form-control" value="{{ $model->currentamount == "" ? 0 : formatNumber($model->currentamount, 1, 0, 0) }}" name="currentamount" id="currentamount"  onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('currentamount'))<span class="text-danger">{{ $errors->first('currentamount') }}</span>@endif
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-xs-5 item">
                                <label>Số tiền mục tiêu <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                <input type="text" class="form-control" value="{{ $model->requireamount == "" ? 0 : formatNumber($model->requireamount, 1, 0, 0) }}" name="requireamount" id="requireamount"  onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('requireamount'))<span class="text-danger">{{ $errors->first('requireamount') }}</span>@endif
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-xs-5 item">
                               <label>Ngày dự kiến hoàn thành :</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                <input type='text' class="form-control" name="finishdate" id='finishdate' value="{{ $model->finishdate == "" ? "" : ConvertSQLDate($model->finishdate) }}"/>
                                @if($errors->has('finishdate'))<span class="text-danger">{{ $errors->first('finishdate') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="display: none;">
                        <div class="row">
                            <div class="col-md-4 col-xs-5 item">
                                <label>Số tiền tích lũy hiện tại:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item" style="text-align: right; align-self: center;">
                                <font size="3" color='red'><b><span id="totalcurrentamountlabel"></span> VNĐ</b></font>
                                <input type='hidden' name='totalcurrentamount' id='totalcurrentamount' value='{{ $model->totalcurrentamount }}'>                
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="display: none;">
                        <div class="row">
                            <div class="col-md-6" style="text-align: left;">
                                <font size="3" color='red'><b><span id="checkamountlabel"></span></b></font>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-xs-12 item">
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

            <button class="btn btn-success btn-bg-blue" onclick="processReports('frm', 'update')">Chỉnh sửa</button>
            <br><hr>
            <a href="{{ route('cashplans-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashplan.partials.script')
@endsection
