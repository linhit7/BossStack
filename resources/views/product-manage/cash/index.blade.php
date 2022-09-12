@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">

<style type="text/css">
    .function-wrap{
        display: flex;
        flex-wrap: nowrap;
        flex-direction: row;
        justify-content: space-between;
    }

    .function-wrap .form-group:first-child{
        flex-basis: calc(40% - 5px);
    }

    .function-wrap .form-group:last-child{
        flex-basis: calc(60% - 5px);
    }

    @media only screen and (max-width: 1440px){
        .function-wrap{
            flex-wrap: wrap;
        }

        .function-wrap .form-group:first-child{
            flex-basis: 100%;
        }

        .function-wrap .form-group:last-child{
            flex-basis: 100%;
        }
    }

    @media only screen and (min-width: 1025px) and (max-width: 1440px){
        #chart2 .c3-chart-arcs text,
        #chart3 .c3-chart-arcs text,
        #chart5 .c3-chart-arcs text,
        #chart6 .c3-chart-arcs text{
            display: none;
        }
    }

    @media only screen and (max-width: 768px){
        h2{
            font-size: 21px;
        }

        #chart5 .c3-chart-arcs text,
        #chart6 .c3-chart-arcs text{
            display: none;
        }
    }
</style>
@endsection
@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<form role="form" action="{{ route('cash-index') }}" method="get" id="frm" name="frm">
{{ csrf_field() }}
<input type='hidden' name='typereport' value=''>
<input type="hidden" name="currentDate" value="{{ $currentDate }}" >

<div class="row">
    <div class="col-xs-12">
        <div class="box box-cashs box-customer">

            <div class="box-body">
                <div class="function-wrap">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="btn-function">
                                    <a class="btn btn-success tranfer-wallet" href="{{ route('cashtranfers-add') }}"><i class="fa fa-refresh" aria-hidden="true"></i> CHUYỂN TIỀN</a>
                                    <a class="btn btn-primary btn-income" href="{{ route('cashincomes-process', ['incomestatustype' => 0]) }}"><i class="fa fa-plus" aria-hidden="true"></i> THU NHẬP</a>
                                    <a class="btn btn-success btn-expense" href="{{ route('cashincomes-process', ['incomestatustype' => 1]) }}"><i class="fa fa-plus" aria-hidden="true"></i> CHI PHÍ</a>
                                </div>
                            </div>
                        </div>       
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="filter-date">
                                        <div class="items">
                                            <label>Thời gian từ:</label>
                                        </div>
                                        <div class="items">
                                            <input type='text' class="form-control" name="fromDate" id='fromDate' value="{{ old('fromDate') == "" ? $fromDate : old('fromDate') }}"/>
                                        </div>
                                        <div class="items">
                                            <label>đến:</label>
                                        </div>
                                        <div class="items">
                                            <input type='text' class="form-control" name="toDate" id='toDate' value="{{ old('toDate') == "" ? $toDate : old('toDate') }}"/>
                                        </div>
                                        <div class="items">
                                            <button class="btn btn-primary btn-search" style="background-color: #ff7f0e; border: 1px solid #ff7f0e;">
                                                <span class="text">Tìm kiếm</span>
                                                <span class="icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                            </button>
                                        </div>
                                    </div>
                            </div>
                        </div>       
                    </div>
                </div>
                

                <div class="expense-manage">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="list">
                                <div class="current-balance">
                                    <table width="100%">
                                        <tbody>                                        
                                            <tr>
                                                <th><b>Ví tổng</b></th>
                                                <td style="color: #1eb40f"><b>{!! formatNumberColor($accountno_primary->amount, 1, 0, 1) !!}</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr style="border-top: 1px solid #a6a6a6;">
                                <div class="form-group spendingList">
                                    <table width="100%">
                                        <tbody>
                                            @php
                                                $total_income = 0; $total_expense = 0; $total_bank = 0;
                                                $indent = '';
                                                $bgcolor = '';
                                            @endphp  
                                            @foreach($listincomes as $cashincome)
                                                @php

                                                    $inden = $cashincome->incomestatustype;//0: thu, 1: chi phí
                                                    if($cashincome->incomestatustype == 0){
                                                        $total_income += $cashincome->amount;
                                                    }elseif($cashincome->incomestatustype == 1){
                                                        $total_expense += $cashincome->amount;
                                                    } 
                                                @endphp    
                                                <tr>
                                                    <td style="text-align: left;padding: 5px" class="text-nowrap">{{ ConvertSQLDate($cashincome->transactiondate) }} <br> {{ $cashincome->content }}</td>
                                                    <td style="text-align: right;" class="text-nowrap">{!! formatNumberColorCustom($cashincome->amount, 1, 0, 1, $inden) !!}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="report">
                                <h3 class="text-center">BÁO CÁO NGÀY <font style="color: #ff0000">{{ $currentDate }}</font></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="text-center"><b>THU NHẬP</b></h4>
                                         <div id="chart2"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-center"><b>CHI PHÍ</b></h4>
                                        <div id="chart3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="position: relative;">
                    <h2>THEO DÕI THU CHI</h2>
                    <a href="{{ route('cashincomes-index') }}" style="position: absolute; right: 0; top: 50%; transform: translateY(-50%);" target="blank">Xem chi tiết &gt;&gt;</a>
                </div>
                
                <div class="report-month">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="report-month-left">
                                <h3 class="text-center">BÁO CÁO THÁNG <font style="color: #ff0000">{{ substr($currentDate, 3) }}</font></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="text-center"><b>THU NHẬP</b></h4>
                                        <div id="chart5"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-center"><b>CHI PHÍ</b></h4>
                                        <div id="chart6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="report-month-right">
                                <div class="form-group">
                                    <h6>Thu nhập cao nhất</h6>
                                    <table width="100%">
                                        <tbody>
                                            @php
                                                $i = 0;
                                                $bgcolor = '#1eb40f';
                                                $indent = '+';
                                            @endphp  
                                            @foreach($incomesmonth as $item)
                                                <tr>
                                                    <th><b>{{ $item['incometypename'] }}</b></th>
                                                    <td style="text-align: right;" class="text-nowrap">
                                                       <font style="font-style: bold; color: {{ $bgcolor }}"><b>{{ $indent }} {{ formatNumber($item['amount'], 1, 0, 0) }}</b></font>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                    if ($i == 2){
                                                    	break;
                                                    }
                                                @endphp                                                 
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <h6>Chi phí cao nhất</h6>
                                    <table width="100%">
                                        <tbody>
                                            @php
                                                $i = 0;
                                                $bgcolor = '#ff423e';
                                                $indent = '-';
                                            @endphp  
                                            @foreach($expensesmonth as $item)
                                                <tr>
                                                    <th><b>{{ $item['incometypename'] }}</b></th>
                                                    <td style="text-align: right;" class="text-nowrap">
                                                       <font style="font-style: bold; color: {{ $bgcolor }}"><b>{{ $indent }} {{ formatNumber($item['amount'], 1, 0, 0) }}</b></font>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                    if ($i == 2){
                                                        break;
                                                    }
                                                @endphp 
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 style="padding: 20px 0;">VÍ MỤC TIÊU CỦA BẠN</h2>

                <div class="financial-planning">
                    <div class="row">
                        <div class="col-md-12" style="text-align: right;">
                            <font size='2' color='#ff0000'>(ĐVT: VND)&nbsp;&nbsp;</font>
                        </div>
                    </div>

                    <div class="financial-planning-list">
                        <div class="wrap">
                            <div class="financial-planning-item">
                                <a class="btn btn-default add-objective" href="{{ route('cashplans-add') }}" title="">
                                    <i class="fas fa-plus-circle"></i> 
                                    <p><b>THÊM VÍ MỤC TIÊU</b></p>
                                </a>
                            </div>

                            @php
                                $i = 0;
                            @endphp  
                            @foreach($listcashplans as $item)
                                <div class="financial-planning-item">
                                    <h3><b>VÍ {{ mb_strtoupper($plantypes[$item->plantype]) }}</b></h3>
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <th><b>Số tuổi mục tiêu</b></th>
                                                <td class="text-right"><b><font color='red'>{{ $item->planage }}</font> TUỔI</b></td>
                                            </tr>
                                            <tr>
                                                <th><b>Số tiền mục tiêu</b></th>
                                                <td class="text-right"><b><font color='red'>{{ formatNumber($item->requireamount * $item->requireamountunittype, 1, 0, 0) }}</font></b></td>
                                            </tr>
                                            <tr>
                                                <th><b>Vốn hiện tại</b></th>
                                                <td class="text-right"><b><font color='#1eb40f'>{{ formatNumber($item->totalcurrentamount, 1, 0, 0) }}</font></b></td>
                                            </tr>
                                            <tr>
                                                <th><b>Số tiền còn thiếu</b></th>
                                                <td class="text-right"><b><font color='#ff423e'>{{ formatNumber(($item->requireamount*intval($item->requireamountunittype) - $item->totalcurrentamount), 1, 0, 0) }}</font></b></td>
                                            </tr>
                                            <tr>
                                                <th><b>Thời gian hoàn thiện</b></th>
                                                <td class="text-right"><b><font color='red'>{{ $item->planage - $item->currentage }}</font>&nbsp; NĂM</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="financial-planning-btn">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <a class="btn btn-primary btn-income" href="{{ route('cashplans-edit',['id'=> $item->id]) }}"><b>CHỈNH SỬA</b></a>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <a class="btn btn-primary btn-analytical" href="{{ route('cashplans-analysis',['id'=> $item->id]) }}"><b>PHÂN TÍCH</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $i++;
                                    if ($i == 100){
                                        break;
                                    }
                                @endphp                                                 
                            @endforeach
                        </div>
                    </div>
                    
                </div>
                                                
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>

</form>
@endsection

@section('scripts')
@include('product-manage.cash.partials.script')
@endsection

