@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection
@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<div class="status">
    <b class="alert alert-warning">Tổng số khách hàng: 300</b>        
    <b class="alert alert-success">Khách hàng mới: 5</b>        
    <b class="alert alert-danger">Thông tin chờ xử lý: 10</b>   
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-saving">      

            <div class="box-body">
                <div class="row">
                    <div class="col-md-7">
                        <h3>Thống kê tổng tiền tiết kiệm</h3>
                        <div class="form-group">
                            <div id="chart1"></div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <p class="title-list-bank"><b>Danh sách ngân hàng liên kết & tổng tiền tiết kiệm</b></p>
                        <div class="list-bank">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <th width="25%">Sacombank</th>
                                        <td width="25%" colspan="2" style="text-align: center;">-</td>
                                        <td width="25%" style="text-align: right;">200 tỷ</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Sacombank</th>
                                        <td width="25%" colspan="2" style="text-align: center;">-</td>
                                        <td width="25%" style="text-align: right;">200 tỷ</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Sacombank</th>
                                        <td width="25%" colspan="2" style="text-align: center;">-</td>
                                        <td width="25%" style="text-align: right;">200 tỷ</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Sacombank</th>
                                        <td width="25%" colspan="2" style="text-align: center;">-</td>
                                        <td width="25%" style="text-align: right;">200 tỷ</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Sacombank</th>
                                        <td width="25%" colspan="2" style="text-align: center;">-</td>
                                        <td width="25%" style="text-align: right;">200 tỷ</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Sacombank</th>
                                        <td width="25%" colspan="2" style="text-align: center;">-</td>
                                        <td width="25%" style="text-align: right;">200 tỷ</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Sacombank</th>
                                        <td width="25%" colspan="2" style="text-align: center;">-</td>
                                        <td width="25%" style="text-align: right;">200 tỷ</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Sacombank</th>
                                        <td width="25%" colspan="2" style="text-align: center;">-</td>
                                        <td width="25%" style="text-align: right;">200 tỷ</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Sacombank</th>
                                        <td width="25%" colspan="2" style="text-align: center;">-</td>
                                        <td width="25%" style="text-align: right;">200 tỷ</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Sacombank</th>
                                        <td width="25%" colspan="2" style="text-align: center;">-</td>
                                        <td width="25%" style="text-align: right;">200 tỷ</td>
                                    </tr>
                                </tbody>
                            </table>
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
                @include('product-manage.saving.partials.search-form')
                <div class="form-group">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center;" class="text-nowrap" width="15%">TÊN KHÁCH HÀNG</th>
                                <th style="text-align: center;" class="text-nowrap">TUỔI</th>
                                <th style="text-align: center;" class="text-nowrap">EMAIL</th>
                                <th style="text-align: center;" class="text-nowrap">ĐIỆN THOẠI</th>
                                <th style="text-align: center;" class="text-nowrap">NGÀY ĐĂNG KÝ</th>
                                <th style="text-align: center;" class="text-nowrap">GÓI DỊCH VỤ</th>
                                <th style="text-align: center;" class="text-nowrap">TÀI KHOẢN TIẾT KIỆM</th>
                                <th style="text-align: center;" class="text-nowrap">SỐ DƯ TK(VND)</th>
                                <th style="text-align: center;" class="text-nowrap">HOẠT ĐỘNG LẦN CUỐI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: left;" class="text-nowrap">Nguyễn Văn A</td>
                                <td style="text-align: center;" class="text-nowrap">24</td>
                                <td style="text-align: center;" class="text-nowrap">a@lamians.com</td>
                                <td style="text-align: center;" class="text-nowrap">0123456789</td>
                                <td style="text-align: center;" class="text-nowrap">01/01/2020</td>
                                <td style="text-align: center;" class="text-nowrap">Gói dịch vụ 1</td>
                                <td style="text-align: left;" class="text-nowrap">
                                    <ul>
                                        <li><b>TK có kỳ hạn</b></li>
                                        <li><b>TK tích tài</b></li>
                                    </ul>
                                    <a class="detail" href="#">&gt; Chi tiết</a>
                                </td>
                                <td style="text-align: right;" class="text-nowrap"><b style="color: green;">+10.000.000</b></td>
                                <td style="text-align: center;" class="text-nowrap">16/01/2020</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="box-footer clearfix text-right">
                        
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>




@endsection

@section('scripts')
@include('product-manage.saving.partials.script')
@endsection

