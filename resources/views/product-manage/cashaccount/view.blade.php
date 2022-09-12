@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('cashaccounts-detailAccount') }}" method="post" id="frm" name="frm">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title"><font color='#000080'>Chi tiết ví tiền</font></h4>
                </div>
                {{ csrf_field() }}
                <input type='hidden' name='typereport' value=''>
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-4 item">
                                <label>Ví tiền :</label>
                            </div>
                            <div class="col-md-5 col-xs-8 item">
                                <select class="form-control select2" name="cashaccount" id="cashaccount">
                                    <option value=""></option>
                                    @foreach($listaccounts as $item)
                                        @if($item->id == $cashaccount or $item->id == old('cashaccount'))
                                            <option value="{{ $item->id }}" selected>{{ $item->accountno . " - " . $item->accountname }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->accountno . " - " . $item->accountname }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                    
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Số tiền hiện tại:</label>
                            </div>
                            <div class="col-md-5" style="text-align: right;">
                                {!! formatNumberColor($model->amount, 1, 0, 1) !!} 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Ngày mở :</label>
                            </div>
                            <div class="col-md-5" style="text-align: right;">
                                {{ ConvertSQLDate($model->accountdate) }}
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="filter-date">
                            <div class="items">
                                <label>Thời gian từ:</label>
                            </div>
                            <div class="items">
                                <input type='text' class="form-control" name="fromDate" id='fromDate' value="{{ old('fromDate') == "" ? $fromDate : old('fromDate') }}"/>
                            </div>
                            <div class="items">
                                <label style="color: #2d3194; text-align: center;">đến:</label>
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

                        <div class="row" style="display: none;">
                            <div class="col-md-4 col-xs-12">
                                <label>Thời gian từ :</label>
                                <input type='text' class="form-control" name="fromDate" id='fromDate' value="{{ old('fromDate') == "" ? $fromDate : old('fromDate') }}"/>                    
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <label>đến :</label>
                                <input type='text' class="form-control" name="toDate" id='toDate' value="{{ old('toDate') == "" ? $toDate : old('toDate') }}"/>                    
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <label></label><br>
                                <button class="btn btn-primary btn-search btn-bg-blue" style="width: 45%;">Tìm kiếm</button>
                            </div>                
                        </div>
                    </div>
                                                            
                    <div class="form-group">
                        <div class="row">         
                            <div class="box-header">
                                <ul class="nav nav-pills">
                                    <li class="active">
                                        <a data-toggle="pill" class="hash-tab" href="#rptall"><b>Tất cả</b></a>
                                    </li>
                                    <li>
                                        <a data-toggle="pill" class="hash-tab" href="#rptincome"><b>Tiền vào</b></a>
                                    </li>
                                    <li>
                                        <a data-toggle="pill" class="hash-tab" href="#rptexpense"><b>Tiền ra</b></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="box-body">            
                                <div class="tab-content">
                                    <div id="rptall" class="tab-pane fade in active">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-7 text-center">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            @foreach($listCashTransaction as $item)
                                                                @php
                                                                    $indent = ''; $bgcolor = '';
                                                                    if($item->incomestatustype == 0 or ($item->incomestatustype == 2 and $item->incometype == 0)){
                                                                        $bgcolor = '#1eb40f';
                                                                        $indent = '+';
                                                                    }else{
                                                                        $bgcolor = '#ff423e';
                                                                        $indent = '-';
                                                                    }                                                                     
                                                                @endphp                        
                                                                <tr>
                                                                    <td style="text-align: left;">{{ ConvertSQLDate($item->transactiondate) }} <br> {{ $item->content }}</td>
                                                                    <td style="text-align: right;" class="text-nowrap"><br><font style="color: {{ $bgcolor }}">{{ $indent }} {{ formatNumber($item->amount, 1, 0, 1) }}</font></td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>

                                    <div id="rptincome" class="tab-pane fade">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-7 text-center">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            @foreach($listCashTransactionIncome as $item)
                                                                @php
                                                                    $indent = ''; $bgcolor = '';
                                                                    if($item->incomestatustype == 0  or ($item->incomestatustype == 2 and $item->incometype == 0)){
                                                                        $bgcolor = '#1eb40f';
                                                                        $indent = '+';
                                                                    }else{
                                                                        $bgcolor = '#ff423e';
                                                                        $indent = '-';
                                                                    }                                                                     
                                                                @endphp                        
                                                                <tr>
                                                                    <td style="text-align: left;">{{ ConvertSQLDate($item->transactiondate) }} <br> {{ $item->content }}</td>
                                                                    <td style="text-align: right;" class="text-nowrap"><br><font style="font-style: bold; color: {{ $bgcolor }}">{{ $indent }} {{ formatNumber($item->amount, 1, 0, 1) }}</font></td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>

                                    <div id="rptexpense" class="tab-pane fade">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-7 text-center">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            @foreach($listCashTransactionExpense as $item)
                                                                @php
                                                                    $indent = ''; $bgcolor = '';
                                                                    if($item->incomestatustype == 0  or ($item->incomestatustype == 2 and $item->incometype == 0)){
                                                                        $bgcolor = '#1eb40f';
                                                                        $indent = '+';
                                                                    }else{
                                                                        $bgcolor = '#ff423e';
                                                                        $indent = '-';
                                                                    }                                                                     
                                                                @endphp                        
                                                                <tr>
                                                                    <td style="text-align: left;">{{ ConvertSQLDate($item->transactiondate) }} <br> {{ $item->content }}</td>
                                                                    <td style="text-align: right;" class="text-nowrap"><br><font style="font-style: bold; color: {{ $bgcolor }}">{{ $indent }} {{ formatNumber($item->amount, 1, 0, 1) }}</font></td>
                                                                </tr>
                                                            @endforeach
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

                </div>
            </div>

            <a href="{{ route('cashaccounts-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashaccount.partials.script')
@endsection
