@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/style_admin.css') }}">
@endsection
@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<form role="form" action="{{ route('cash-manage') }}" method="get" name="frm">
{{ csrf_field() }}
<input type='hidden' name='typereport' value=''>
<input type='hidden' name='searchdate' value='{{$searchdate}}'>

<div class="status">
    <b class="alert alert-warning">Tổng số khách hàng: {{ $totalCustomer }}</b>        
    <b class="alert alert-success">Khách hàng mới: {{ $totalNewCustomer }}</b>        
    <b class="alert alert-danger">Thông tin chờ xử lý: {{ $totalWaitCustomer }}</b> 
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-cashs">
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9 col-xs-8">
                            <h3>Thống kê dữ liệu khách hàng đăng ký</h3>
                        </div>
                        <div class="col-md-3 col-xs-4">
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
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="rptcustomer"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Tìm kiếm nhanh</h3>
                        </div>
                    </div>
                </div>
                @include('product-manage.cash.partials.search-form')
                <div class="form-group">
                    <div style="overflow: auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" class="text-nowrap" width="1%">STT</th>
                                    <th style="text-align: center;" class="text-nowrap" width="15%">TÊN KHÁCH HÀNG</th>
                                    <th style="text-align: center;" class="text-nowrap">TUỔI</th>
                                    <th style="text-align: center;" class="text-nowrap">EMAIL</th>
                                    <th style="text-align: center;" class="text-nowrap">ĐIỆN THOẠI</th>
                                    <th style="text-align: center;" class="text-nowrap">NGÀY ĐĂNG KÝ</th>
                                    <th style="text-align: center;" class="text-nowrap">GÓI DỊCH VỤ</th>
                                    <th style="text-align: center;" class="text-nowrap">KẾ HOẠCH TÀI CHÍNH</th>
                                    <th style="text-align: center;" class="text-nowrap">SỐ DƯ TK(VND)</th>
                                    <th style="text-align: center;" class="text-nowrap">HOẠT ĐỘNG LẦN CUỐI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($listcustomertype->count() === 0)
                                <tr>
                                    <td colspan="7"><b>Không có dữ liệu!!!</b></td>
                                </tr>
                                @endif
                                @php
                                    $i = 1;
                                @endphp                        
                                @foreach($listcustomertype as $customer)
                                    <tr class="table-customer">
                                        <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                        <td style="text-align: left;" class="text-nowrap">{{ $customer->fullname }}</td>
                                        <td style="text-align: center;" class="text-nowrap">{{ (Carbon\Carbon::now()->year) - (substr($customer->birthday, 0, 4)) }}</td>
                                        <td style="text-align: left;" class="text-nowrap">{{ $customer->email }}</td>
                                        <td style="text-align: left;" class="text-nowrap">{{ $customer->phone }}</td>
                                        <td style="text-align: center;" class="text-nowrap">{{ $customer->contractdate == null ? "" : ConvertSQLDate($customer->contractdate) }}</td>
                                        <td style="text-align: center;" class="text-nowrap"></td>
                                        <td style="text-align: left;" class="text-nowrap">
                                            <!-- <ul>
                                                <li><b>Nghỉ hưu</b></li>
                                                <li><b>Mua nhà</b></li>
                                            </ul> -->
                                            <a class="detail" href="{{ route('cashplans-manage',['customer_id'=> Crypt::encrypt($customer->customer_id)]) }}">Chi tiết &gt;&gt;</a>
                                        </td>
                                        <td style="text-align: right;" class="text-nowrap"><b style="color: green;">{{ formatNumber(0, 1, 0, 0) }}</b></td>
                                        <td style="text-align: center;" class="text-nowrap">{{ $customer->last_login_at == null ? "" : ConvertSQLDate($customer->last_login_at, 1) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="box-footer clearfix text-right">
                        {{ $listcustomertype->appends(array('email'=>$email,'fullname'=>$fullname,'fromdate'=>$fromdate, 'todate'=>$todate, 'periodtype'=>$periodtype))->render('product-manage.cash.partials.pagination') }}
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
@include('product-manage.cash.partials.script_manage')
@endsection

