@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection

@section('content')

@if(isset($infor) and $error == 1)
<div class="alert {{$alert}}">
    {{ $infor }}
</div>
@endif

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<div class="row">
    <form role="form" action="{{ route('retireplans-process') }}?continue=true" method="post" id="frm">
        <div class="col-md-12">
            <div class="box box-customer box-retireplan">
                {{ csrf_field() }}
                <input type='hidden' name='typereport' value=''>
                                
                <div class="box-body">

                    <div class="insertData">
                        <h3><b><font color="#2d3194">Mục nhập số liệu tính toán</font></b></h3>

                        <div class="info">Nhập thông tin để tính số tiền nghỉ hưu tương lai của bạn.</div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Tuổi hiện tại của bạn <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <input type="text" class="form-control" name="currentage" id="currentage" value="{{ ($currentage == null ? old('currentage') : formatNumber($currentage, 1, 0, 0)) }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                    <span class="properties">tuổi</span>
                                    @if($errors->has('currentage'))<span class="text-danger">{{ $errors->first('currentage') }}</span>@endif
                                </div>  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Tuổi nghỉ hưu dự kiến <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <input type="text" class="form-control" name="retirementage" id="retirementage" value="{{ ($retirementage == null ? old('retirementage') : formatNumber($retirementage, 1, 0, 0)) }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                    <span class="properties">tuổi</span>
                                    @if($errors->has('retirementage'))<span class="text-danger">{{ $errors->first('retirementage') }}</span>@endif
                                </div>  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Tuổi thọ dự kiến <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <input type="text" class="form-control" name="longevity" id="longevity" value="{{ ($longevity == null ? old('longevity') : formatNumber($longevity, 1, 0, 0)) }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                    <span class="properties">tuổi</span>
                                    @if($errors->has('longevity'))<span class="text-danger">{{ $errors->first('longevity') }}</span>@endif
                                </div>  
                            </div>
                        </div>
                                            
                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Thu nhập hiện tại (tháng) <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <input type="text" class="form-control" name="currentincome" id="currentincome" value="{{ ($currentincome == null ? old('currentincome') : formatNumber($currentincome, 1, 0, 0)) }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                    <span class="properties">đồng</span>
                                    @if($errors->has('currentincome'))<span class="text-danger">{{ $errors->first('currentincome') }}</span>@endif
                                </div>  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Chi phí hiện tại (tháng) <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <input type="text" class="form-control" name="currentcost" id="currentcost" value="{{ ($currentcost == null ? old('currentcost') : formatNumber($currentcost, 1, 0, 0)) }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                    <span class="properties">đồng</span>
                                    @if($errors->has('currentcost'))<span class="text-danger">{{ $errors->first('currentcost') }}</span>@endif
                                </div>  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Tiền đóng góp hưu trí (tháng) <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <input type="text" class="form-control" name="retirementsavings" id="retirementsavings" value="{{ ($retirementsavings == null ? old('retirementsavings') : formatNumber($retirementsavings, 1, 0, 0)) }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                    <span class="properties">đồng</span>
                                    @if($errors->has('retirementsavings'))<span class="text-danger">{{ $errors->first('retirementsavings') }}</span>@endif
                                </div>  
                            </div>
                        </div>

                        <div class="form-group" style="display: none;">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Tiền cho các mục tiêu tài chính khác (tháng):</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <span class="result" id="otherplanlabel">
                                    @if($otherplan > 0)
                                        {!! formatNumberColorCustom($otherplan, 1, 0, 1, 2) !!}
                                    @else
                                        {!! formatNumberColorCustom($otherplan, 1, 0, 1, 3) !!}
                                    @endif 
                                    </span>
                                    <span class="properties">đồng</span>
                                    <input type='hidden' name='otherplan' id='otherplan' value='{{ $otherplan }}'>
                                </div>  
                            </div>
                        </div>
                            
                        <button class="btn btn-success" style="background-color: #ff7f0e; border: 1px solid #ff7f0e;" onclick="processReports('frm', 'process')">Phân tích</button>
                    </div>

                    <hr>

                    <div class="exportData">
                        <h3><b><font color="#2d3194">Mục xuất số liệu tính toán</font></b></h3>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Số năm còn làm việc:</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <span class="result">{{ $workage_d }}</span>
                                    <span class="properties">năm</span>
                                </div>  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Số năm nghỉ hưu:</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <span class="result">{{ $retirementyear_e }}</span>
                                    <span class="properties">năm</span>
                                </div>  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Tổng số tiền đóng góp dự kiến cho kỳ hưu trí:</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <span class="result">{!! formatNumberColorCustom($retirementamount_j, 1, 0, 1, 2) !!}</span>
                                    <span class="properties">đồng</span>
                                </div>  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Tiền chi phí dự kiến để sống khi nghỉ hưu (tháng):</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <span class="result">{!! formatNumberColorCustom($expenseretirementamount_k, 1, 0, 1, 2) !!}</span>
                                    <span class="properties">đồng</span>
                                </div>  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Tổng số tiền sinh hoạt phí dự kiến chúng ta cần cho kỳ nghỉ hưu sẽ là:</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <span class="result">{!! formatNumberColorCustom($totalexpenseretirementamount_l, 1, 0, 1, 2) !!}</span>
                                    <span class="properties">đồng</span>
                                </div>  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-4 col-xs-5" style="align-self: center;">
                                    <label>Số tiền thiếu hụt khi nghỉ hưu:</label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-7" style="align-self: center;">
                                    <span class="result">
                                    @if($totalamount_m <= 0)
                                        {!! formatNumberColorCustom($totalamount_m, 1, 0, 1, 3) !!}
                                    @else
                                        {!! formatNumberColorCustom($totalamount_m, 1, 0, 0, 2) !!}
                                    @endif 
                                    </span>
                                    <span class="properties">đồng</span>
                                </div>  
                            </div>
                        </div>
                    </div>

                    @if(isset($infor) and $error == 2)
                    <div class="alert {{$alert}}" role="alert"><b>{{ $infor }}</b></div>
                    @endif
                </div>
            </div>
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.retireplan.partials.script')
@endsection


