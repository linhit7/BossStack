@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">

<style type="text/css">
    .box-body .financial-analysis .form-group .row,
    .help > div{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .help > div{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    .box-body .financial-analysis .form-group .row .item:nth-child(2n-1){
        align-self: center;
    }

    @media only screen and (max-width: 768px){
        .box-body .financial-analysis .form-group .row .item label{
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
    <form role="form" action="{{ route('cashplans-update', ['id' => $model->id]) }}?continue=true" method="post" id="frm" name="frm">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <br><font size="4" color='#2d3194'><b>PHÂN TÍCH TÀI CHÍNH</b></font><br>
                </div>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type='hidden' name='typereport' value=''>
                <input type='hidden' name='customer_id' value='{{ $model->customer_id }}'>                
                <input type="hidden" name="currentamountunittype" id="currentamountunittype" value="1">
                <input type="hidden" name="requireamountunittype" id="requireamountunittype" value="1">

                <div class="box-body">

                    <div class="financial-analysis">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-xs-5 item">
                                    <label>MỤC TIÊU <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-4 col-xs-7 item">
                                    <b>{{ mb_strtoupper($plantypes[$model->plantype]) }}</b>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-3 col-xs-5" style="align-self: center;">
                                    <label>Ví <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-4 col-xs-7">
                                    <input type="text" class="form-control" name="name" value="{{ $model->accountno }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="display: flex;">
                                <div class="col-md-3 col-xs-5" style="align-self: center;">
                                    <label>Tên ví mục tiêu <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-4 col-xs-7">
                                    <input type="text" class="form-control" name="name" value="{{ $model->planname }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-xs-5 item">
                                    <label>Chi tiết <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-4 col-xs-7 item">
                                    <input type="text" class="form-control" name="description" value="{{ $model->description }}">
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-xs-5 item">
                                    <label>Ngày lập<small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-4 col-xs-7 item">
                                    <input type="text" class="form-control" name="plandate" id='plandate' value="{{ $model->plandate == "" ? "" : ConvertSQLDate($model->plandate) }}">
                                    @if($errors->has('plandate'))<span class="text-danger">{{ $errors->first('plandate') }}</span>@endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-xs-5 item">
                                    <label>Tuổi hiện tại <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-4 col-xs-7 item">
                                    <input type="text" class="form-control" name="currentage" value="{{ $model->currentage }}">
                                </div>                            
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-xs-5 item">
                                    <label>Tuổi hoàn thành mục tiêu <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-4 col-xs-7 item">
                                    <input type="text" value="{{ $model->planage == "" ? 50 : $model->planage }}" class="form-control" name="planage" id="planage" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                    @if($errors->has('planage'))<span class="text-danger">{{ $errors->first('planage') }}</span>@endif
                                </div> 
                            </div>
                        </div>

                        <div class="form-group" style="display: none;">
                            <div class="row">
                                <div class="col-md-3 col-xs-5 item">
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
                                <div class="col-md-3 col-xs-5 item">
                                    <label>Vốn đầu tư hiện tại <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-4 col-xs-7 item">
                                    <input type="text" value="{{ $model->currentamount == "" ? 0 : formatNumber($model->currentamount, 1, 0, 0) }}" class="form-control" name="currentamount" id="currentamount" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                    @if($errors->has('currentamount'))<span class="text-danger">{{ $errors->first('currentamount') }}</span>@endif
                                </div>                            
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-xs-5 item">
                                    <label>Số tiền mục tiêu <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-4 col-xs-7 item">
                                    <input type="text" value="{{ $model->requireamount == "" ? 0 : formatNumber($model->requireamount, 1, 0, 0) }}" class="form-control" name="requireamount" id="requireamount" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                    @if($errors->has('requireamount'))<span class="text-danger">{{ $errors->first('requireamount') }}</span>@endif
                                </div>                            
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-xs-5 item">
                                    <label>Ngày dự kiến hoàn thành:</label>
                                </div>
                                <div class="col-md-4 col-xs-7 item">
                                    <input type="text" class="form-control" name="finishdate" id='finishdate' value="{{ $model->finishdate == "" ? "" : ConvertSQLDate($model->finishdate) }}">
                                    @if($errors->has('finishdate'))<span class="text-danger">{{ $errors->first('finishdate') }}</span>@endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="display: none;">
                            <div class="row">
                                <div class="col-md-3 col-xs-5 item">
                                    <label>Số tiền tích lũy hiện tại:</label>
                                </div>
                                <div class="col-md-4 col-xs-7 item" style="text-align: right;">
                                    <font size="3" color='red'><b><span id="totalcurrentamountlabel"></span></b></font>
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

                    </div>

                    <hr>
                                        
                    <div class="form-group">
                        <div class="row">         
                            <div class="box-header">
                                <ul class="nav nav-pills">
                                    <li class="active">
                                        <a data-toggle="pill" class="hash-tab" href="#rptchart"><b>BIỂU ĐỒ</b></a>
                                    </li>
                                    <li>
                                        <a data-toggle="pill" class="hash-tab" href="#schedulemonth"><b>KẾ HOẠCH TÍCH LŨY THÁNG</b></a>
                                    </li>
                                    <li>
                                        <a data-toggle="pill" class="hash-tab" href="#scheduleyear"><b>KẾ HOẠCH TÍCH LŨY NĂM</b></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="box-body">            
                                <div class="tab-content">
                                    <div id="rptchart" class="tab-pane fade in active">
                                         <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <font size="2">&nbsp;&nbsp;&nbsp;Để đạt được mục tiêu tài chính <b><font color="red">{{ formatNumber($model->requireamount, 1, 0, 0) }} VND</font> </b>, bạn cần tích lũy <b><font color="red">{{ formatNumber($savingamountplan/12, 1, 0, 1) }} VND/tháng</font> </b> trong <b><font color="red">{{ $timeplan }} Năm</font></b></font><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10 text-left">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<font color="#000">Đơn vị tính: VNĐ</font><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10 text-center">
                                                    <div id="chart"></div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>

                                    <div id="schedulemonth" class="tab-pane fade">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <font size="2">&nbsp;&nbsp;&nbsp;Để đạt được mục tiêu tài chính <b><font color="red">{{ formatNumber($model->requireamount, 1, 0, 0) }} VND</font> </b>, bạn cần tích lũy <b><font color="red">{{ formatNumber($savingamountplan/12, 1, 0, 1) }} VND/tháng </font></b> trong <b><font color="red">{{ $timeplan }} Năm</font></b></font><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <font size="2">&nbsp;&nbsp;&nbsp;Số tiền tích lũy đầu kỳ <b><font color="red">{{ formatNumber($model->totalcurrentamount, 1, 0, 0) }} VND</font></b></font>
                                                </div>
                                            </div>
                                        </div>                    
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8 text-center">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;" class="text-nowrap" width="5%">STT</th>
                                                                <th style="text-align: center;" class="text-nowrap" width="8%">THÁNG</th>
                                                                <th style="text-align: center;" class="text-nowrap" width="15%">TIỀN TÍCH LŨY MỖI THÁNG</th>
                                                                <th style="text-align: center;" class="text-nowrap" width="15%">SỐ DƯ CUỐI KỲ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i = 1;
                                                                $savingamountplanmonth = round($savingamountplan/12,0);
                                                                $totalsavingamountplan = $model->totalcurrentamount;
                                                                $plandate = ($model->plandate == "" ? getCurrentDate('d') : ConvertSQLDate($model->plandate)); 
                                                            @endphp                        
                                                            @for($item=1; $item <= $timeplan*12; $item++)
                                                                @php
                                                                    $totalsavingamountplan += $savingamountplanmonth; 
                                                                    $totalsavingamountplan = ($totalsavingamountplan>$requireamount ? $requireamount : $totalsavingamountplan);
                                                                    $planmonth = DateAdd ($plandate,'m',$item);
                                                                @endphp                        
                                                                <tr class="table-cashplan">
                                                                    <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                                                    <td style="text-align: center;" class="text-nowrap">{{ $planmonth }}</td>
                                                                    <td style="text-align: center;" class="text-nowrap">{{ formatNumber($savingamountplanmonth, 1, 0, 0) }}</td>
                                                                    <td style="text-align: center;" class="text-nowrap">{{ formatNumber($totalsavingamountplan, 1, 0, 0) }}</td>
                                                                </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>

                                    <div id="scheduleyear" class="tab-pane fade">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <font size="2">&nbsp;&nbsp;&nbsp;Để đạt được mục tiêu tài chính <b><font color="red">{{ formatNumber($model->requireamount, 1, 0, 0) }} VND</font> </b>, bạn cần tích lũy <b><font color="red">{{ formatNumber($savingamountplan/12, 1, 0, 1) }} VND/tháng</font> </b> trong <b><font color="red">{{ $timeplan }} Năm</font></b></font><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <font size="2">&nbsp;&nbsp;&nbsp;Số tiền tích lũy đầu kỳ <b><font color="red">{{ formatNumber($model->totalcurrentamount, 1, 0, 0) }} VND</font></b></font>
                                                </div>
                                            </div>
                                        </div>                    
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8 text-center">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;" class="text-nowrap" width="5%">STT</th>
                                                                <th style="text-align: center;" class="text-nowrap" width="8%">TUỔI</th>
                                                                <th style="text-align: center;" class="text-nowrap" width="15%">TIỀN TÍCH LŨY MỖI NĂM</th>
                                                                <th style="text-align: center;" class="text-nowrap" width="15%">SỐ DƯ CUỐI KỲ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i = 1;
                                                                $totalsavingamountplan = $model->totalcurrentamount; 
                                                            @endphp                        
                                                            @for($item=$model->currentage+1; $item <= $model->planage; $item++)
                                                                @php
                                                                    $totalsavingamountplan += $savingamountplan; 
                                                                    $totalsavingamountplan = ($totalsavingamountplan>$requireamount ? $requireamount : $totalsavingamountplan);
                                                                @endphp                        
                                                                <tr class="table-cashplan">
                                                                    <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                                                    <td style="text-align: center;" class="text-nowrap">{{ $item }}</td>
                                                                    <td style="text-align: center;" class="text-nowrap">{{ formatNumber($savingamountplan, 1, 0, 0) }}</td>
                                                                    <td style="text-align: center;" class="text-nowrap">{{ formatNumber($totalsavingamountplan, 1, 0, 0) }}</td>
                                                                </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    
                                </div>
                             </div>
                         </div>
                     </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <font size="4" color='#2d3194'><b>HỖ TRỢ</b></font>
                            </div>
                        </div>
                    </div>                    

                    
                    <div class="form-group">
                        <font size="2" style="text-align: justify;"><b>Nếu bạn cần tư vấn để gia tăng thu nhập và hoàn thành mục tiêu tài chính, xin hãy liên hệ với chúng tôi để nhận được những lời khuyên tốt nhất. Hotline: 0918.905.500 (Zalo/Viber/Skype) hoặc Email: info@fiinves.vn.</b></font>
                    </div>
                    
                    <div class="help">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4" style="text-align: center;">
                                <a href="https://fiinves.vn/public/advisorys/formAdvisory">
                                    <div class="icon" style="margin-bottom: 10px;">
                                        <img src="{{ asset('img/icon-10.png') }}">
                                    </div>
                                    <div class="name"><font size="3" color="#2d3194"><b>HỖ TRỢ TƯ VẤN</b></font></div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4" style="text-align: center;">
                                <a href="https://fiinves.vn/public/invests">
                                    <div class="icon" style="margin-bottom: 10px;">
                                        <img src="{{ asset('img/icon-11.png') }}">
                                    </div>
                                    <div class="name"><font size="3" color="#2d3194"><b>TIN TỨC ĐẦU TƯ</b></font></div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4" style="text-align: center;">
                                <a href="https://fiinves.vn/public/cashs/process">
                                    <div class="icon" style="margin-bottom: 10px;">
                                        <img src="{{ asset('img/icon-12.png') }}">
                                    </div>
                                    <div class="name"><font size="3" color="#2d3194"><b>DÒNG TIỀN CÁ NHÂN</b></font></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    
                </div>
            </div>

            <a href="{{ route('cashplans-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashplan.partials.script')
@include('product-manage.cashplan.partials.script_customer')
@endsection