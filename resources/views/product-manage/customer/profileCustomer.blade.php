@extends('layouts.master')

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('customers-updateCustomer', ['id' => $model->id]) }}?continue=true" method="post" id="customer-form">
        <div class="col-md-12">
            <div class="box box-primary">

                {{ csrf_field() }}
                {{ method_field('put') }}

                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-primary" style="line-height: 2"><font size='3'><b>Thông tin tài khoản</b></font></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                Tên đầy đủ :
                            </div>
                            <div class="col-md-6">
                                <b>{{ $model->fullname }}</b>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                ID truy cập :
                            </div>
                            <div class="col-md-6">
                                <b>{{ $model->user()->first() == null ? '' : $model->user()->first()->email }}</b>
                                <br><font size='2' color='#808080'><i>ID truy cập là tài khoản dùng để đăng nhập vào các dịch vụ trên hệ thống.</i></font>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-primary" style="line-height: 2"><font size='3'><b>Email</b></font></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                Email:
                            </div>
                            <div class="col-md-6">
                                <b>{{ $model->user()->first() == null ? '' : $model->user()->first()->email }}</b>
                                <br><font size='2' color='#808080'><i>Địa chỉ email được sử dụng để đăng nhập và lấy lại thông tin mật khẩu khi bị mất, nhận tất cả các email thông báo, thông tin từ hệ thống..</i></font>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-primary" style="line-height: 2"><font size='3'><b>Quản lý thông tin cá nhân</b></font></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                Thông tin chi tiết khách hàng &nbsp;&nbsp;<a href="{{ route('customers-editCustomer') }}"><b><font color='#FFA500'>[<i>Sửa</i>]</font></b></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
            <a href="{{ route('dashboard') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.customer.partials.script')
@endsection
