@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection
@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<h1 class="title" style="color: #fff;">{{ $title->heading }}  - THEO SẢN PHẨM</h1>

<div class="status">
    <b class="alert alert-warning">Quản lý dòng tiền cá nhân: {{ $totalContractCashFlow }}</b>        
    <b class="alert alert-success">Đầu tư: {{ $totalContractInvest }}</b>        
    <b class="alert alert-danger">Tiết kiệm: {{ $totalContractSaving }}</b> 
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">     

            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Thống kê dữ liệu sản phẩm khách hàng đăng kí</h3>
                        </div>
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

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Thống kê sản phẩm</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tổng số khách hàng:</label>
                                    </div>
                                    <div class="col-md-6">
                                        {{ $totalCustomer }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Mới tháng này:</label>
                                    </div>
                                    <div class="col-md-6">
                                        {{ $totalNewCustomer }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>KH kết thúc HĐ tháng này:</label>
                                    </div>
                                    <div class="col-md-6">
                                        {{ $totalFinishContractCustomer }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Cao điểm:</label>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                </div>
                                <br>  
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Phân loại sản phẩm</label>
                                    </div>                            
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nhiều nhất:</label>
                                    </div>
                                    <div class="col-md-6">
                                        {{ $fundtype[$smaxType] }} ({{ $maxTotalContract }})
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Thấp nhất:</label>
                                    </div>
                                    <div class="col-md-6">
                                        {{ $fundtype[$sminType] }} ({{ $minTotalContract }})
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="box-body no-padding">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;" class="text-nowrap" width="20%">Sản phẩm</th>
                                            <th style="text-align: center;" class="text-nowrap" width="20%">Số lượng</th>
                                            <th style="text-align: center;" class="text-nowrap" width="15%">Đăng ký mới <br> tháng này</th>
                                            <th style="text-align: center;" class="text-nowrap" width="25%">Gói SP Cao nhất</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: left;">Dòng tiền cá nhân</td>
                                            <td style="text-align: center;">{{ $totalContractCashFlow }}</td>
                                            <td style="text-align: center;">{{ $totalContractCashFlowMonth }}</td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;">Đầu tư</td>
                                            <td style="text-align: center;">{{ $totalContractInvest }}</td>
                                            <td style="text-align: center;">{{ $totalContractInvestMonth }}</td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;">Tiết kiệm</td>
                                            <td style="text-align: center;">{{ $totalContractSaving }}</td>
                                            <td style="text-align: center;">{{ $totalContractSavingMonth }}</td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <label>Thống kê gói sản phẩm</label>
                            <div id="chart2"></div>
                        </div>

                        <div class="col-md-4 text-center">
                            <label>Tổng tiền đầu tư</label>
                            <div id="chart3"></div>
                        </div>

                        <div class="col-md-4 text-center">
                            <label>Tổng tiền tiết kiệm</label>
                            <div id="chart4"></div>
                        </div>
                    </div>
                </div>
                                
            </div>

        </div>
        <!-- /.box -->
    </div>
</div>

<a href="#" style="width: 8%;"><i class="fa fa-arrow-left"></i> Quay lại</a>




@endsection

@section('scripts')
@include('product-manage.statistic.partials.script_product')
@endsection

