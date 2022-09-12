@extends('layouts.master')

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('cashplans-update', ['id' => $model->id]) }}?continue=true" method="post" id="contract-form">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <br><font size="4" color='#000'><b>PHÂN TÍCH TÀI CHÍNH</b></font><br>
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
                            <div class="col-md-3">
                                <label>MỤC TIÊU <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <b>{{ mb_strtoupper($plantypes[$model->plantype]) }}</b>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Chi tiết <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                {{ $model->planname }}
                            </div>
                            <div class="col-md-1">
                                <label>Ngày lập<small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input disabled type="text" class="form-control" name="plandate" id='plandate' value="{{ $model->plandate == "" ? "" : ConvertSQLDate($model->plandate) }}">
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
                                {{ $model->currentage }}
                                <input type="hidden" class="form-control" name="currentage" value="{{ $model->currentage }}">
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Số tuổi đạt được mục tiêu tài chính <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input disabled type="text" value="{{ $model->planage == "" ? 50 : $model->planage }}" class="form-control" name="planage" id="planage" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('planage'))<span class="text-danger">{{ $errors->first('planage') }}</span>@endif
                            </div>                            
                            <div class="col-md-1">
                                <font size="3"> tuổi</font>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Liên kết ví tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <select disabled class="form-control select2" name="accountno" id="accountno">                        
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
                            <div class="col-md-2">
                                <input disabled type="text" value="{{ $model->currentamount == "" ? 0 : formatNumber($model->currentamount, 1, 0, 0) }}" class="form-control" name="currentamount" id="currentamount" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('currentamount'))<span class="text-danger">{{ $errors->first('currentamount') }}</span>@endif
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Mục tiêu <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input disabled type="text" value="{{ $model->requireamount == "" ? 0 : formatNumber($model->requireamount, 1, 0, 0) }}" class="form-control" name="requireamount" id="requireamount" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('requireamount'))<span class="text-danger">{{ $errors->first('requireamount') }}</span>@endif
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Số tiền tích lũy hiện tại:</label>
                            </div>
                            <div class="col-md-2" style="text-align: right;">
                                <font size="3" color='red'><b><span id="totalcurrentamountlabel"></span> </b></font>
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

                    <div class="form-group">
                        <div class="row">         
                            <div class="box-header">
                                <ul class="nav nav-pills">
                                    <li class="active">
                                        <a data-toggle="pill" class="hash-tab" href="#rptchart"><b>BIỂU ĐỒ</b></a>
                                    </li>
                                    <li>
                                        <a data-toggle="pill" class="hash-tab" href="#schedulemonth"><b>LỊCH TRÌNH TÍCH LŨY THÁNG</b></a>
                                    </li>
                                    <li>
                                        <a data-toggle="pill" class="hash-tab" href="#scheduleyear"><b>LỊCH TRÌNH TÍCH LŨY NĂM</b></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="box-body">            
                                <div class="tab-content">
                                    <div id="rptchart" class="tab-pane fade in active">
                                         <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <font size="2">&nbsp;&nbsp;&nbsp;Để đạt được mục tiêu tài chính <b>{{ formatNumber($model->requireamount, 1, 2, 0) }} </b>, bạn cần tích lũy <b>{{ formatNumber($savingamountplan/12, 1, 0, 1) }} đồng/tháng </b> trong <b>{{ $timeplan }} năm</b></font><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10 text-left">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<font color="#000">Đơn vị tính: 1000 VNĐ</font><br><br>
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
                                                <div class="col-md-8">
                                                    <font size="2">&nbsp;&nbsp;&nbsp;Để đạt được mục tiêu tài chính <b>{{ formatNumber($model->requireamount, 1, 0, 0) }} </b>, cần tích lũy <b>{{ formatNumber($savingamountplan/12, 1, 0, 1) }} đồng/tháng </b> trong <b>{{ $timeplan }} năm</b></font><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <font size="2">&nbsp;&nbsp;&nbsp;Số tiền tích lũy đầu kỳ <b>{{ formatNumber($model->totalcurrentamount, 1, 0, 0) }} VNĐ</b></font>
                                                </div>
                                            </div>
                                        </div>                    
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8 text-center">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;" class="text-nowrap" width="10%">STT</th>
                                                                <th style="text-align: center;" class="text-nowrap" width="25%">THÁNG</th>
                                                                <th style="text-align: center;" class="text-nowrap">TIỀN TÍCH LŨY MỖI THÁNG</th>
                                                                <th style="text-align: center;" class="text-nowrap">SỐ DƯ CUỐI KỲ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i = 1;
                                                                $savingamountplanmonth = $savingamountplan/12;
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
                                                                    <td style="text-align: rigth;" class="text-nowrap">{{ formatNumber($savingamountplanmonth, 1, 0, 0) }}</td>
                                                                    <td style="text-align: right;" class="text-nowrap">{{ formatNumber($totalsavingamountplan, 1, 0, 0) }}</td>
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
                                                <div class="col-md-8">
                                                    <font size="2">&nbsp;&nbsp;&nbsp;Để đạt được mục tiêu tài chính <b>{{ formatNumber($model->requireamount, 1, 0, 0) }} </b>, cần tích lũy <b>{{ formatNumber($savingamountplan/12, 1, 0, 1) }} đồng/tháng </b> trong <b>{{ $timeplan }} năm</b></font><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <font size="2">&nbsp;&nbsp;&nbsp;Số tiền tích lũy đầu kỳ <b>{{ formatNumber($model->totalcurrentamount, 1, 0, 0) }} VNĐ</b></font>
                                                </div>
                                            </div>
                                        </div>                    
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8 text-center">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;" class="text-nowrap" width="10%">STT</th>
                                                                <th style="text-align: center;" class="text-nowrap" width="25%">TUỔI</th>
                                                                <th style="text-align: center;" class="text-nowrap">TIỀN TÍCH LŨY MỖI NĂM</th>
                                                                <th style="text-align: center;" class="text-nowrap">SỐ DƯ CUỐI KỲ</th>
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
                                                                    <td style="text-align: rigth;" class="text-nowrap">{{ formatNumber($savingamountplan, 1, 0, 0) }}</td>
                                                                    <td style="text-align: right;" class="text-nowrap">{{ formatNumber($totalsavingamountplan, 1, 0, 0) }}</td>
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
                                <font size="4" color='#000'><b>HỖ TRỢ</b></font>
                            </div>
                        </div>
                    </div>                    

                    
                    <div class="form-group">
                        <font size="2" style="text-align: justify;"><b>Nếu bạn cần tư vấn để gia tăng thu nhập và hoàn thành mục tiêu tài chính, xin hãy liên hệ với chúng tôi để nhận được những lời khuyên tốt nhất. Hoặc bạn cũng có thể chọn sử dụng các gói sản phẩm khác của chúng tôi để gia tăng dòng tiền cá nhân:</b></font>
                    </div>
                    
                    <div class="help">
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2" style="text-align: center;">
                                <div class="icon">
                                    <img src="{{ asset('img/icon-10.png') }}">
                                </div>
                                <div class="name"><font size="3"><b>HỖ TRỢ TƯ VẤN</b></font></div>
                            </div>
                            <div class="col-md-2" style="text-align: center;">
                                <div class="icon">
                                    <img src="{{ asset('img/icon-11.png') }}">
                                </div>
                                <div class="name"><font size="3"><b>ĐẦU TƯ</b></font></div>
                            </div>
                            <div class="col-md-2" style="text-align: center;">
                                <div class="icon">
                                    <img src="{{ asset('img/icon-12.png') }}">
                                </div>
                                <div class="name"><font size="3"><b>TIẾT KIỆM</b></font></div>
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    
                </div>
            </div>

            <a href="{{ route('cashplans-manage', ['customer_id'=>$customer_id]) }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashplan.partials.script')
@include('product-manage.cashplan.partials.script_customer')
@endsection