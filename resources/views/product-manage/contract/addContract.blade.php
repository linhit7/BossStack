@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">

<style type="text/css">
    .box-body .row{
        width: 70%;
        margin: 0 auto;
    }

    @media only screen and (min-width: 1025px) and (max-width: 1200px){
        .box-body .row{
            width: 100%;
        }
    }

    @media only screen and (max-width: 768px){
        .card-price-list{
            width: 100%;
            margin-bottom: 15px;
        }

        .button-function a{
            width: 35%;
        }
    }

    @media only screen and (min-width: 320px) and (max-width: 425px){
        .box-body .row{
            width: 100%;
        }
    }

</style>
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('contracts-addProduct') }}?continue=true" method="post" id="frm">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-home" aria-hidden="true"></i> / {{ $title->sub_heading }}</h3>
                </div>

                {{ csrf_field() }}
                <input type='hidden' name='typereport' value=''>

                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="panel panel-default card-price-list">
                                <div class="panel-heading">
                                    <p class="name"><b>Gói Standard Cá nhân</b></p>
                                    <p class="percent"><span>99.000</span><br>đồng/tháng</p>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>Dùng Gói Mở tài khoản Miễn phí ++</li>
                                        <li>Thiết lập ví tài chính</li>
                                        <li>Thiết lập ví đầu tư</li>
                                        <li>Quản lý và phát triển Dòng tiền cá nhân</li>
                                        <li>Giảm 50% khi đăng ký mua gói 12 tháng</li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <select class="form-control" name="producttypes_1">
                                        <option value="0">Chọn gói thời gian</option>
                                        @foreach($producttypes as $key=>$value)
                                            @if($key > 0)
                                                @if($key == old('producttypes_1'))
                                                    <option value="{{ $key }}" selected>{{ $value['month'] }} tháng (giảm {{ $value['discount'] }}%)</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $value['month'] }} tháng (giảm {{ $value['discount'] }}%)</option>      
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                    <a onclick="processReports('frm', '1')" class="btn btn-primary btn-buy">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12" style="display: none;">
                            <div class="panel panel-default card-price-list">
                                <div class="panel-heading">
                                    <p class="name"><b>Gói Doanh nghiệp</b></p>
                                    <p class="percent"><span>99.000</span><br>đồng/tháng/user</p>
                                    <!-- <p class="discount">
                                        <span><small>715.000</small></span>
                                        <span><small style="padding-left: 10px;"><font color="red"><b>-30%</b></font></small></span>
                                    </p> -->
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>Dùng Gói Mở tài khoản Miễn phí ++</li>
                                        <li>Sử dụng các tính năng Gói Cá nhân ++</li>
                                        <li>Thực hiện coaching doanh nghiệp (4 giờ)</li>
                                        <li>Tặng 3 user VIP cho Doanh nghiệp đăng ký từ 100+ user</li>
                                        <li>Giảm 50% khi đăng ký mua gói 12 tháng</li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <select class="form-control" name="producttypes_2">
                                        <option value="0">Chọn gói thời gian</option>
                                        @foreach($producttypes as $key=>$value)
                                            @if($key > 0)
                                                @if($key == old('producttypes_2'))
                                                    <option value="{{ $key }}" selected>{{ $value['month'] }} tháng (giảm {{ $value['discount'] }}%)</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $value['month'] }} tháng (giảm {{ $value['discount'] }}%)</option>      
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                    <a onclick="processReports('frm', '2')" class="btn btn-primary btn-buy">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="panel panel-default card-price-list">
                                <div class="panel-heading">
                                    <p class="name"><b>Gói VIP Cá nhân</b></p>
                                    <p class="percent"><span>999.000</span><br>đồng/tháng</p>
                                    <!-- <p class="discount">
                                        <span><small>8.580.000</small></span>
                                        <span><small style="padding-left: 10px;"><font color="red"><b>-43%</b></font></small></span>
                                    </p> -->
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>Dùng Gói Mở tài khoản Miễn phí ++</li>
                                        <li>Sử dụng các tính năng Gói Cá nhân ++</li>
                                        <li>Thiết lập nhiều Ví đầu tư</li>
                                        <li>Nhận định chứng khoán dài hạn</li>
                                        <li>Giảm 50% khi đăng ký mua gói 12 tháng</li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <select class="form-control" name="producttypes_3">
                                        <option value="0">Chọn gói thời gian</option>
                                        @foreach($producttypes as $key=>$value)
                                            @if($key > 0)
                                                @if($key == old('producttypes_3'))
                                                    <option value="{{ $key }}" selected>{{ $value['month'] }} tháng (giảm {{ $value['discount'] }}%)</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $value['month'] }} tháng (giảm {{ $value['discount'] }}%)</option>      
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                    <a onclick="processReports('frm', '3')" class="btn btn-primary btn-buy">Mua ngay</a>
                                </div>
                            </div>
                        </div>

                    </div>  
                    
                </div>
            </div> 

            <div class="button-function clearfix">
                <a class="btn btn-default clearfix" href="{{ route('dashboard') }}">
                    <span class="icon"><i class="fa fa-arrow-left"></i></span>
                    <span class="text">Quay lại</span>
                </a>
            </div>  
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.contract.partials.script')
@endsection


