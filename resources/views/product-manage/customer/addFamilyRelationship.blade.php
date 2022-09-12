@extends('layouts.master')

@section('head')

<style type="text/css">
    .box-body .form-group .row{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .box-body .form-group .row .item:nth-child(2n-1){
        align-self: center;
    }

    @media only screen and (max-width: 768px){
        .box-body .form-group .row .item label{
            margin-bottom: 0;
        }
    }
</style>

@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('customers-storeFamilyRelationship') }}" method="post" id="customer-form">
        <div class="col-md-12">
            <div class="box box-primary">
                {{ csrf_field() }}

                <div class="box-body">

                    <div class="personal-info-wrap">
                        
                        <p class="text-primary" style="line-height: 2"><font size='3'><b>Thông tin chi tiết</b></font></p>
                                
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Họ & tên <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-5 col-xs-7 item">
                                    <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}">
                                    @if($errors->has('fullname'))<span class="text-danger">{{ $errors->first('fullname') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Mối quan hệ <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-2 col-xs-7 item">
                                    <select class="form-control select2" name="relation">
                                        <option value=""></option>
                                        @foreach($relationshiptype as $key=>$value)
                                            @if($key == old('relation'))
                                                <option value="{{ $key }}" selected>{{ $value }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('relation'))<span class="text-danger">{{ $errors->first('relation') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Ngày sinh <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-2 col-xs-7 item">
                                    <input type='text' class="form-control" name="birthday" id='birthday' value="{{ ConvertSQLDate(old('birthday')) }}"/>
                                    @if($errors->has('birthday'))<span class="text-danger">{{ $errors->first('birthday') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Địa chỉ :</label>
                                </div>
                                <div class="col-md-5 col-xs-7 item">
                                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                    @if($errors->has('address'))<span class="text-danger">{{ $errors->first('address') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Điện thoại :</label>
                                </div>
                                <div class="col-md-3 col-xs-7 item">
                                    <input type="text" class="form-control" tabindex="5" name="phone" value="{{ old('phone') }}"> 
                                    @if($errors->has('phone'))<span class="text-danger">{{ $errors->first('phone') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Nghề nghiệp :</label>
                                </div>
                                <div class="col-md-5 col-xs-7 item">
                                    <input type="text" class="form-control" name="work" value="{{ old('work') }}">
                                    @if($errors->has('work'))<span class="text-danger">{{ $errors->first('work') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Người phụ thuộc :</label>
                                </div>
                                <div class="col-md-5 col-xs-7 item">
                                    <input type="checkbox" tabindex="4" name="dependent" value="1" id="chk-active" {{ old( 'dependent')==1 ? 'checked="checked"' : '' }}>
                                    @if($errors->has('dependent'))<span class="text-danger">{{ $errors->first('dependent') }}</span>@endif
                                </div>
                            </div>
                        </div>

                    </div>   
                </div>

            </div>
            
            <button type="submit" class="btn btn-success">Thêm mới</button>
            <br><hr>
            <a href="{{ route('customers-editCustomer') }}"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.customer.partials.script')
@endsection
