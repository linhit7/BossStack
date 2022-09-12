@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection
@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif


<form role="form" action="{{ route('statistic-customer') }}" name="frm">
<input type='hidden' name='typereport' value=''>

<div class="status">
    <b class="alert alert-warning">Tổng số khách hàng: {{ $totalCustomer }}</b>        
    <b class="alert alert-success">Khách hàng mới: {{ $totalNewCustomer }}</b>        
    <b class="alert alert-danger">Thông tin chờ xử lý: {{ $totalWaitCustomer }}</b> 
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">                   
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-10">
                            <h3>Thống kê dữ liệu khách hàng đăng ký</h3>
                        </div>
<!--                        <div class="col-md-2">
                            <select class="form-control select2" name="searchperiodtype" onchange='document.frm.submit();'>
                                <option value=""></option>
                                @foreach($periodtypes as $key=>$value)
                                    @if($key == $searchperiodtype)
                                        <option value="{{ $key }}" selected>{{ $value }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                    @endif
                                @endforeach
                            </select>
                        </div> -->
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>

                <hr>

                <h3>Phân loại khách hàng</h3>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Tổng số khách hàng:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>{{ $totalCustomer }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Mới tháng này:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>{{ $totalNewCustomer }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>KH kết thúc HĐ tháng này:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>{{ $totalFinishContractCustomer }}</label>
                                    </div>
                                </div>
                            </div>

                            <label>Đối tượng khách hàng</label>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Nhiều nhất:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>{{ $customertype[$typeMaxCustomer->customertype] }} ({{ $typeMaxCustomer->countcustomer }})</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Thấp nhất:</label>
                                    </div>
                                    <div class="col-md-5">
                                        @if($typeMinCustomer != null)
                                            <label>{{ $customertype[$typeMinCustomer->customertype] }} ({{ $typeMinCustomer->countcustomer }})</label>                                        
                                        @else
                                            <label></label>        
                                        @endif                                         
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Độ tuổi nhiều nhất:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>18 - 40</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 text-center">
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>   

                <hr>
                
                <div class="form-group">
                    <div class="info-customer">
                        <p><b>Lọc danh sách theo:</b></p>
                        <select class="form-control select2" name="searchcustomertype" onchange='document.frm.submit();'>
                            <option value=""></option>
                            @foreach($customertype as $key=>$value)
                                @if($key == $searchcustomertype)
                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                @else
                                    <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center;" class="text-nowrap" width="1%">STT</th>
                                <th style="text-align: center;" class="text-nowrap" width="15%">TÊN KHÁCH HÀNG</th>
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
                    
                    <div class="box-footer clearfix text-right">
                        {{ $listcustomertype->links() }}
                    </div>
                </div>                

            </div>
        </div>
        <!-- /.box -->
    </div>
</div>

<a  href="#" style="width: 8%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   

</form>


@endsection

@section('scripts')
@include('product-manage.statistic.partials.script_customer')
@endsection

