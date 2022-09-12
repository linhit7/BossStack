@extends('layouts.master')

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('cashplans-updateManage', ['id' => $model->id]) }}?continue=true" method="post" id="contract-form">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">THÔNG TIN MỤC TIÊU</h3><br><br>
                    <h4 class="box-title"><font color='#000080'>Chỉnh sửa</font></h4>
                </div>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type='hidden' name='typereport' value=''>
                <input type='hidden' name='customer_id' value='{{ $customer_id }}'>                
                <input type="hidden" name="currentamountunittype" id="currentamountunittype" value="1">
                <input type="hidden" name="requireamountunittype" id="requireamountunittype" value="1">

                <div class="box-body">

                    <div class="form-group">
                        <div class="row" style="display: flex;">
                            <div class="col-md-3" style="align-self: center;">
                                <label>MỤC TIÊU <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" name="plantype" id="plantype">
                                    @foreach($plantypes as $key=>$value)
                                        @if($key == $model->plantype)
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                
                            </div>  
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Chi tiết <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="planname" value="{{ $model->planname }}">
                                @if($errors->has('planname'))<span class="text-danger">{{ $errors->first('planname') }}</span>@endif
                            </div>
                            <div class="col-md-1">
                                <label>Ngày lập<small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input type='text' class="form-control" name="plandate" id='plandate' value="{{ $model->plandate == "" ? "" : ConvertSQLDate($model->plandate) }}"/>
                                @if($errors->has('plandate'))<span class="text-danger">{{ $errors->first('plandate') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    
                                        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Số tuổi hiện tại <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" class="form-control" name="currentage" value="{{ $model->currentage }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('currentage'))<span class="text-danger">{{ $errors->first('currentage') }}</span>@endif
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Số tuổi đạt được mục tiêu tài chính <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" value="{{ $model->planage == "" ? 50 : $model->planage }}" class="form-control" name="planage" id="planage">
                            </div>                            
                            <div class="col-md-1">
                                <font size="3"> tuổi</font>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Liên kết ví tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
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

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Vốn đầu tư hiện tại <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" value="{{ $model->currentamount == "" ? 0 :formatNumber($model->currentamount, 1, 0, 0) }}" class="form-control" name="currentamount" id="currentamount">
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Mục tiêu <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" min="0" max="1000" step=".5" value="{{ $model->requireamount == "" ? 0 : formatNumber($model->requireamount, 1, 0, 0) }}" class="form-control" name="requireamount" id="requireamount">
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Số tiền tích lũy hiện tại:</label>
                            </div>
                            <div class="col-md-3" style="text-align: right;">
                                <font size="3" color='red'><b><span id="totalcurrentamountlabel"></span> VNĐ</b></font>
                                <input type='hidden' name='totalcurrentamount' id='totalcurrentamount' value='{{ $model->totalcurrentamount }}'>                
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row" style="display: flex;">
                            <div class="col-md-6" style="text-align: left; align-self: center;">
                                <font size="3" color='red'><b><span id="checkamountlabel"></span></b></font>
                            </div>
                        </div>
                    </div>
                    
                    <hr>

                    <div class="form-group">
                        <div class="row">

                        </div>
                    </div>
                    
                </div>
            </div>

            <button class="btn btn-success" style="width: 15%;" onclick="processReports('frm', 'update')">Chỉnh sửa</button>
            <br><hr>
            <a href="{{ route('cashplans-manage', ['customer_id'=>$customer_id]) }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashplan.partials.script')
@endsection
