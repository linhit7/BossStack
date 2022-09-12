@extends('layouts.master')

@section('head')

<style type="text/css">
    #changepassword .form-group .row{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    #changepassword .form-group .row .item:nth-child(2n-1){
        align-self: center;
    }

    @media only screen and (max-width: 768px){
        #changepassword .form-group .row .item label{
            margin-bottom: 0;
        }
    }
</style>

@endsection

@section('content')

@if(isset($infor))
<div class="alert {{$alert}}">
    {{ $infor }}
</div>
@endif
@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<div class="row">
    <form role="form" action="{{ route('customers-updateSecurityCustomer') }}?continue=true" method="post" id="customer-form">
        {{ csrf_field() }}
        <input type='hidden' name='typereport' value=''>
        <input type='hidden' name='customer_id' value='{{ $customer_id }}'>                

        <div class="col-md-12">
            <div class="box box-primary">

                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-primary" style="line-height: 2"><font size='3'><b>Đổi mật khẩu đăng nhập</b></font></p>
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
                            <div class="col-md-2">
                                Mật khẩu:
                            </div>
                            <div class="col-md-5">
                                <b>********</b>
                            </div>
                            <div class="col-md-2">
                                <a href="#changepassword" aria-expanded="false" data-toggle="collapse"><font color='#FFA500'><b>[<i>Đổi mật khẩu</i>]</b></font></a>
                            </div>
                        </div>

                        <div class="collapse mt-4" id="changepassword">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7 col-xs-12 item">
                                        <br><br><p class="text-primary" style="line-height: 2"><font size='3'><b>Thông tin mật khẩu thay đổi:</b></font></p>
                                        <font size='2' color='#808080'><i>#Khuyến cáo: nên tạo ra mật khẩu trong đó có kết hợp các chữ cái kí tự thường và kí tự viết hoa và chữ số, chiều dài tối thiểu {{$minimumpasswordlength}} kí tự.</i></font>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-xs-5 item">
                                        Mật khẩu cũ:
                                    </div>
                                    <div class="col-md-4 col-xs-7 item">
                                        <input type="password" class="form-control" name="oldpassword" value="">
                                        @if($errors->has('oldpassword'))<span class="text-danger">{{ $errors->first('oldpassword') }}</span>@endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-xs-5 item">
                                        Mật khẩu mới:
                                    </div>
                                    <div class="col-md-4 col-xs-7 item">
                                        <input type="password" class="form-control" name="newpassword" value="">
                                        @if($errors->has('newpassword'))<span class="text-danger">{{ $errors->first('newpassword') }}</span>@endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-xs-5 item">
                                        Nhập lại mật khẩu mới:
                                    </div>
                                    <div class="col-md-4 col-xs-7 item">
                                        <input type="password" class="form-control" name="confirmnewpassword" value="">
                                        @if($errors->has('confirmnewpassword'))<span class="text-danger">{{ $errors->first('confirmnewpassword') }}</span>@endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success">Đổi mật khẩu</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            
            <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.customer.partials.script')
@endsection
