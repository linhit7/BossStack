@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection
@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<div class="row">
    <div class="col-xs-12">
        <div class="box box-saving box-customer">    

            <div class="box-body">
                <p><font size="3">Sổ tiết kiệm của tôi:</font></p>

                <div class="my-saving">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="tools-utilities">
                                <h4>Công cụ & tiện ích</h4>
                                <ul>
                                    <li>
                                        <img src="{{ asset('img/tools_utilities_5.png') }}">
                                        <a href="#">Tài khoản của tôi</a>
                                    </li>
                                    <li>
                                        <img src="{{ asset('img/tools_utilities_3.png') }}">
                                        <a href="#">Giao dịch</a>
                                    </li>
                                    <li>
                                        <img src="{{ asset('img/tools_utilities_6.png') }}">
                                        <a href="#">Tỉ giá</a>
                                    </li>
                                    <li>
                                        <img src="{{ asset('img/tools_utilities_4.png') }}">
                                        <a href="#">Lãi suất</a>
                                    </li>
                                    <li>
                                        <img src="{{ asset('img/tools_utilities_1.png') }}">
                                        <a href="#">Biểu phí & biểu mẫu</a>
                                    </li>
                                    <li>
                                        <img src="{{ asset('img/tools_utilities_2.png') }}">
                                        <a href="#">Công cụ tính toán</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="history-compare">
                                <div class="row">

                                    <div class="col-md-5 border-right">
                                        <div class="transaction-history"> 

                                            <h4>Lịch sử giao dịch</h4>
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <th><b>Số dư</b></th>
                                                        <td style="color: #1eb40f; text-align: right;"><b>500,000 VND</b></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <hr>
                                            
                                            <p><font size="3">5 giao dịch gần nhất:</font></p>
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <th><b>17/12/2019</b></th>
                                                        <td style="color: #ff423e; text-align: right;"><b>- 500,000 VND</b></td>
                                                    </tr>

                                                    <tr>
                                                        <th><b>18/12/2019</b></th>
                                                        <td style="color: #1eb40f; text-align: right;"><b>+ 500,000 VND</b></td>
                                                    </tr>

                                                    <tr>
                                                        <th><b>18/12/2019</b></th>
                                                        <td style="color: #1eb40f; text-align: right;"><b>+ 500,000 VND</b></td>
                                                    </tr>

                                                    <tr>
                                                        <th><b>18/12/2019</b></th>
                                                        <td style="color: #1eb40f; text-align: right;"><b>+ 500,000 VND</b></td>
                                                    </tr>

                                                    <tr>
                                                        <th><b>18/12/2019</b></th>
                                                        <td style="color: #1eb40f; text-align: right;"><b>+ 500,000 VND</b></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="col-md-7"></div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
                <hr>

                <p><font size="3">Các gói tiết kiệm:</font></p>

                <div class="saving-packages">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="saving-packages-item">
                                <span class="icon">
                                    <img src="{{ asset('img/saving_packages_1.png') }}">
                                </span>
                                <span class="text">
                                    <h3>TIẾT KIỆM CÓ KỲ HẠN</h3>
                                    <p><font size="4"><b>Lãi suất</b></font> <font size="6" color="#1eb40f"><b>8%</b></font></p>
                                    <a href="#"><font size="3" color="#ff9300"><b>Tìm hiểu thêm</b> <i class="fas fa-chevron-right"></i></font></a>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="saving-packages-item">
                                <span class="icon">
                                    <img src="{{ asset('img/saving_packages_2.png') }}">
                                </span>
                                <span class="text">
                                    <h3>TIẾT KIỆM KHÔNG KỲ HẠN</h3>
                                    <p><font size="4"><b>Lãi suất</b></font> <font size="6" color="#1eb40f"><b>8%</b></font></p>
                                    <a href="#"><font size="3" color="#ff9300"><b>Tìm hiểu thêm</b> <i class="fas fa-chevron-right"></i></font></a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="saving-packages-item">
                                <span class="icon">
                                    <img src="{{ asset('img/saving_packages_3.png') }}">
                                </span>
                                <span class="text">
                                    <h3>TIẾT KIỆM CÓ KỲ HẠN NGÀY</h3>
                                    <p><font size="4"><b>Lãi suất</b></font> <font size="6" color="#1eb40f"><b>8%</b></font></p>
                                    <a href="#"><font size="3" color="#ff9300"><b>Tìm hiểu thêm</b> <i class="fas fa-chevron-right"></i></font></a>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="saving-packages-item">
                                <span class="icon">
                                    <img src="{{ asset('img/saving_packages_4.png') }}">
                                </span>
                                <span class="text">
                                    <h3>TIẾT KIỆM TÍCH TÀI</h3>
                                    <p><font size="4"><b>Lãi suất</b></font> <font size="6" color="#1eb40f"><b>8%</b></font></p>
                                    <a href="#"><font size="3" color="#ff9300"><b>Tìm hiểu thêm</b> <i class="fas fa-chevron-right"></i></font></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <p><font size="3">Liên kết các ngân hàng:</font></p>

                <div class="bank-link">
                    <div class="owl-carousel owl-theme bank-link-carousel">
                        <div class="item"><img class="" src="{{ asset('img/bank_1.png') }}" alt=""></div>
                        <div class="item"><img class="" src="{{ asset('img/bank_2.png') }}" alt=""></div>
                        <div class="item"><img class="" src="{{ asset('img/bank_3.png') }}" alt=""></div>
                        <div class="item"><img class="" src="{{ asset('img/bank_4.png') }}" alt=""></div>
                        <div class="item"><img class="" src="{{ asset('img/bank_5.png') }}" alt=""></div>
                        <div class="item"><img class="" src="{{ asset('img/bank_1.png') }}" alt=""></div>
                        <div class="item"><img class="" src="{{ asset('img/bank_2.png') }}" alt=""></div>
                        <div class="item"><img class="" src="{{ asset('img/bank_3.png') }}" alt=""></div>
                        <div class="item"><img class="" src="{{ asset('img/bank_4.png') }}" alt=""></div>
                        <div class="item"><img class="" src="{{ asset('img/bank_5.png') }}" alt=""></div>
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

