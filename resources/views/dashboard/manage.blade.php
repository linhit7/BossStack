@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/style_admin.css') }}">

<style type="text/css">
    .text-nowrap{
        white-space: nowrap !important;
    }
</style>
@endsection


@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<form role="form" action="{{ route('dashboard-manage') }}" method="get" name="frm">
{{ csrf_field() }}
<input type='hidden' name='typereport' value=''>
<input type='hidden' name='searchdate' value='{{$searchdate}}'>

<div class="status">
    <span class="alert alert-warning">
        <b>Tổng khách hàng: {{ $totalCustomer }}</b>
    </span>      
    <span class="alert alert-success">
        <b>Khách hàng mới: {{ $totalNewCustomer }}</b>
    </span>   
    <span class="alert alert-danger">
        <b>Thông tin chờ xử lý: {{ $totalWaitCustomer }}</b>
    </span>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="box">                   
            <div class="box-body">
            	<div class="form-group">
                    <div class="row" style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                        <div class="col-md-8" style="align-self: center;">
                            <h3>Thống kê dữ liệu khách hàng đăng ký</h3>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control select2" name="periodtype" id="periodtype" onchange='document.frm.submit();'>
                                @foreach($periodtypes as $key=>$value)
                                    @if($key == $periodtype)
                                        <option value="{{ $key }}" selected>{{ $value }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $value }}</option>       
                                    @endif
                                @endforeach
                            </select>                  
                        </div>  
                    </div>
            		<div id="rptcustomer"></div>
            	</div>
            </div>
        </div>
	</div>
	<div class="col-md-6">
		<div class="box">                   
            <div class="box-body">
            	<div class="form-group">
                    <div class="row" style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                        <div class="col-md-8" style="align-self: center;">
                            <h3>Thống kê gói sản phẩm đăng ký</h3>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control select2" name="productperiodtype" id="productperiodtype" onchange='document.frm.submit();'>
                                @foreach($periodtypes as $key=>$value)
                                    @if($key != 'd')
                                        @if($key == $productperiodtype)
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>                  
                        </div>  
                    </div>
            		<div id="rptproduct"></div>
            	</div>
            </div>
        </div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box">                   
            <div class="box-body">
                <div class="quick-search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm nhanh" name="quick_search" value="{{ $searchvalue}}">
                        <button class="btn btn-primary btn-search"><i class="fas fa-search"></i></button>
                    </div>
                </div>

                <div style="overflow: auto;">
                    <table class="table table-hover" style="margin-bottom: 0;">
                        <thead>
                            <tr>
                                <th style="text-align: center;" class="text-nowrap" width="1%">STT</th>
                                <th style="text-align: center;" class="text-nowrap" width="20%">TÊN KHÁCH HÀNG</th>
                                <th style="text-align: center;" class="text-nowrap">TUỔI</th>
                                <th style="text-align: center;" class="text-nowrap">EMAIL</th>
                                <th style="text-align: center;" class="text-nowrap">ĐIỆN THOẠI</th>
                                <th style="text-align: center;" class="text-nowrap">ĐĂNG KÝ</th>
                                <th style="text-align: center;" class="text-nowrap">ĐỐI TƯỢNG</th>
                                <th style="text-align: center;" class="text-nowrap">SỐ DƯ TK(VND)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($listcustomertype->count() === 0)
                                <tr>
                                    <td colspan="7"><b>Không có dữ liệu!!!</b></td>
                                </tr>
                            @endif
                            @php
                                $i = 1
                            @endphp                        
                            @foreach($listcustomertype as $customer)
                                <tr class="table-customer">
                                    <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                    <td style="text-align: left;" class="text-nowrap">{{ $customer->fullname }}</td>
                                    <td style="text-align: center;" class="text-nowrap">{{ (Carbon\Carbon::now()->year) - (substr($customer->birthday, 0, 4)) }}</td>
                                    <td style="text-align: left;" class="text-nowrap">{{ $customer->email }}</td>
                                    <td style="text-align: left;" class="text-nowrap">{{ $customer->phone }}</td>
                                    <td style="text-align: center;" class="text-nowrap">{{ $customer->created_at == null ? "" : ConvertSQLDate($customer->created_at) }}</td>
                                    <td style="text-align: center;" class="text-nowrap">{{ $customertype[$customer->customertype] }}</td>
                                    <td style="text-align: right;" class="text-nowrap">{{ formatNumber(0, 1, 0, 0) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('usercustomers-index') }}" style="display: block; margin-top: 10px; text-align: right;" target="blank">Danh sách chi tiết khách hàng &gt;&gt;</a>
            </div>
        </div>
	</div>
	<!-- <div class="col-md-5">
		<div class="box">                   
            <div class="box-body">
            	<div class="form-group">
            		<h3 style="margin-bottom: 20px;">Tổng tiền đầu tư</h3>
            		<div id="chart3"></div>
            	</div>
            </div>
        </div>
	</div> -->
</div>

</form>
@endsection

@section('scripts')
@include('dashboard.partials.script_manage')
@endsection