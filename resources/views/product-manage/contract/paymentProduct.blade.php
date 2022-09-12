@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('contracts-processPaymentMomo') }}?continue=true" method="post" id="frm">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-home" aria-hidden="true"></i> / {{ $title->sub_heading }}</h3>
                </div>
                {{ csrf_field() }}
                <input type='hidden' name='typereport' value=''>
                <input type='hidden' name='cid' value='{{$id}}'>
                <div class="box-body">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="panel panel-default panel-info-account">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Thông tin tài khoản</h3>

                                    <a href="{{ route('customers-editCustomer') }}" class="text-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <b>Chỉnh sửa</b></a>
                                </div>

                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Họ và tên:</b>
                                            </div>
                                            <div class="col-md-7">
                                                <p class="text-primary">{{ $customer->fullname }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Địa chỉ email:</b>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="text-primary">{{ $customer->email }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Địa chỉ liên hệ:</b>
                                            </div>
                                            <div class="col-md-7">
                                                <p class="text-primary">{{ $customer->address }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Điện thoại:</b>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="text-primary">{{ $customer->phone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-8">
                            <div class="panel panel-default panel-order">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Thông tin đơn hàng</h3> 
                                </div>

                                <div class="panel-body">
                                    <table class="table table-hover" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="40%"><b>Dịch vụ</b></th>
                                                <th class="text-center" width="15%"><b>Thời hạn (tháng)</b></th>
                                                <th class="text-center" width="15%"><b>Giảm giá (%)</b></th>                                                
                                                <th class="text-center" width="30%"><b>Số tiền thanh toán (đồng)</b></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td><b>{{ $service_product_name }}</b> <br> Giá: {{ formatNumber($service_product_price, 1, 0, 0) }} đồng/tháng</td>
                                                <td class="text-center">{{ $producttypes_numtime }}</td>
                                                <td class="text-center">{{ $producttypes_discount }}</td>
                                                <td class="text-right">{{ formatNumber($producttypes_amount, 1, 0, 0) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="3"><b>THÀNH TIỀN</b></td>
                                                <td class="text-right">{{ formatNumber($producttypes_amount, 1, 0, 0) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>    

                    <hr>                

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default panel-payments">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Chọn hình thức thanh toán</h3>
                                </div>

                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="title-check">
                                            <label>
                                                <input type="radio" name="ord_payment_method" value="0" checked="checked">
                                               <font color="#1a1f53"><b>TRỰC TIẾP TẠI VĂN PHÒNG</b></font>
                                            </label>
                                        </div>
                                        <div class="content">
                                            <h3><font color="#1a1f53">Công ty TNHH Lam Minh Anh</font></h3>
                                            <p><b>Địa chỉ:</b> LM81-42.OT04 (Officetel), Tòa Landmark 81 Vinhomes Central Park, Số 720A Điện Biên Phủ, Phường 22, Quận Bình Thạnh, Tp Hồ Chí Minh</p>
                                            <p><b>Điện thoại: </b>0918.905.500 (Zalo/Viber/Skype)</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="title-check">
                                            <label>
                                                <input type="radio" name="ord_payment_method" value="1">
                                                <font color="#1a1f53"><b>CHUYỂN KHOẢN NGÂN HÀNG</b></font>
                                            </label>
                                        </div>

                                        <div class="content">
                                            <p><b>Bước 1: Thông tin tài khoản</b></p>
                                            <p>Bạn vui lòng nhấn nút thanh toán sau khi xác nhận phương thức thanh toán qua chuyển khoản ngân hàng. Hệ thống sẽ gửi đến email của bạn hướng dẫn chi tiết để bạn tiến hành thanh toán.</p>

                                            <p><b>Bước 2:</b></p>
                                            <p>Bạn hãy chuyển tiền vào tài khoản ngân hàng khi được cung cấp thông tin ở bước 1. Bạn lưu ý ghi rõ thông tin dịch vụ như Tên dịch vụ/ Mã đơn hàng/ Mã hợp đồng trong nội dung chuyển tiền.</p> 
                                            <p>Ví dụ: “Đăng ký dịch vụ Tháng”, “Thanh toán đơn hàng ORD123456”</p> 
                                            <p>(Nếu chuyển qua ATM bạn chụp ảnh biên lai chuyển tiền và gửi email về info@bossstack.vn cùng với thông tin dịch vụ).</p>

                                            <p><b>Bước 3:</b></p>
                                            <p>Nhận được số tiền chuyển khoản, hệ thống BossStack sẽ kích hoạt dịch vụ và gửi thông tin quản trị qua email cho bạn. Trường hợp bạn chưa nhận được thông tin trong vòng 24h, bạn vui lòng gọi số hotline 0918.905.500 hoặc email đến info@bossstack.vn để được hỗ trợ.</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="title-check" tab_open="pay_visa">
                                            <label>
                                                <input type="radio" name="ord_payment_method" value="2">
                                                <font color="#1a1f53"><b>THANH TOÁN QUA MOMO</b></font>
                                            </label>
                                        </div>

                                        <div class="content">
                                            <div class="content text-center">
                                                <a href="#">
                                                    <img src="{{ asset('img/qr-momo.jpg') }}" width="50%">
                                                </a>
                                                <p style="display: none;">Thanh toán trực tuyến qua MOMO (<a target="_blank" href="https://momo.vn/tin-tuc/tin-tuc-su-kien/huong-dan-su-dung-hinh-thuc-thanh-toan-quet-ma-va-ma-thanh-toan-673">Xem hướng dẫn</a>)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>                    

                    
                </div>
            </div>

            <div class="button-function clearfix">
                <a class="btn btn-default clearfix" href="{{ route('contracts-addProduct', ['service_product_id' => $service_product_id]) }}">
                    <span class="icon"><i class="fa fa-arrow-left"></i></span>
                    <span class="text">Quay lại</span>
                </a>
                <button class="btn btn-success clearfix" onclick="processReports('frm', 'process')">
                    <span class="text">Thanh toán</span>
                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                </button>
            </div>  
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.contract.partials.script')
@endsection


