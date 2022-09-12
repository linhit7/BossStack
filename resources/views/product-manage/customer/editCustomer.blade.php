@extends('layouts.master')

@section('head')

<style type="text/css">
    .personal-info-wrap .form-group .row{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .personal-info-wrap .form-group .row .item:nth-child(2n-1){
        align-self: center;
    }

    .personal-info-wrap .form-group .row .item:nth-child(3){
        text-align: right;
    }

    #customer-form .btn-success.update{
        width: 15%;
    }

    @media only screen and (max-width: 768px){
        .personal-info-wrap .form-group,
        .personal-info-wrap .form-group .row .item label{
            margin-bottom: 0;
        }

        .personal-info-wrap .form-group .row .item:nth-child(3){
            text-align: left;
        }

        .personal-info-wrap .form-group .row .item:nth-child(2n-1){
            margin-top: -15px;
        }

        .personal-info-wrap .form-group .row .item:nth-child(2n+2){
            margin-bottom: 15px;
        }

        .personal-info-wrap .form-group:last-child .row .item{
            margin-top: auto;
            align-self: normal;
        }

        .relationship .box-body{
            max-height: 300px;
            overflow: auto;
        }

        .relationship .box-body .table-relationship{
            width: 1000px;
        }

        .relationship .box-body .table-relationship tbody tr td{
            white-space: nowrap !important;
        }

        #customer-form .btn-success.update{
            width: 30%;
        }
    }
</style>

@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('customers-updateCustomer', ['id' => $model->id]) }}?continue=true" method="post" id="customer-form" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="box box-primary">
                {{ csrf_field() }}
                {{ method_field('put') }}

                <div class="box-body">

                    <div class="personal-info-wrap">
                        
                        <p class="text-primary" style="line-height: 2"><font size='3'><b>I. Thông tin cá nhân</b></font></p>
                                
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Họ & tên <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-7 col-xs-7 item">
                                    <input type="text" class="form-control" name="fullname" value="{{ $model->fullname }}">
                                    @if($errors->has('fullname'))<span class="text-danger">{{ $errors->first('fullname') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Ngày sinh <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-3 col-xs-7 item">
                                    <input type='text' class="form-control" name="birthday" id='birthday' value="{{ ConvertSQLDate($model->birthday) }}"/>
                                    @if($errors->has('birthday'))<span class="text-danger">{{ $errors->first('birthday') }}</span>@endif
                                </div>
                                <div class="col-md-1 col-xs-5 item">
                                    <label>Giới tính <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-3 col-xs-7 item">
                                    <select class="form-control select2" name="gender">
                                        <option value=""></option>
                                        @foreach($gendertype as $key=>$value)
                                            @if($key == $model->gender)
                                                <option value="{{ $key }}" selected>{{ $value }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('gender'))<span class="text-danger">{{ $errors->first('gender') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Địa chỉ <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-7 col-xs-7 item">
                                    <input type="text" class="form-control" name="address" value="{{ $model->address }}">
                                    @if($errors->has('address'))<span class="text-danger">{{ $errors->first('address') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Điện thoại <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-3 col-xs-7 item">
                                    <input type="text" class="form-control" tabindex="5" name="phone" value="{{ $model->phone }}"> 
                                    @if($errors->has('phone'))<span class="text-danger">{{ $errors->first('phone') }}</span>@endif
                                </div>
                                <div class="col-md-1 col-xs-5 item">
                                    <label>Email <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-3 col-xs-7 item">
                                    <input type="text" class="form-control" readonly name="email" value="{{ $model->email }}">
                                    @if($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Người liên hệ khi cần:</label>
                                </div>
                                <div class="col-md-3 col-xs-7 item">
                                    <input type="text" class="form-control" tabindex="5" name="contactname" value="{{ $model->contactname }}"> 
                                    @if($errors->has('contactname'))<span class="text-danger">{{ $errors->first('contactname') }}</span>@endif
                                </div>
                                <div class="col-md-1 col-xs-5 item">
                                    <label>Điện thoại:</label>
                                </div>
                                <div class="col-md-3 col-xs-7 item">
                                    <input type="text" class="form-control" tabindex="5" name="contactphone" value="{{ $model->contactphone }}"> 
                                    @if($errors->has('contactphone'))<span class="text-danger">{{ $errors->first('contactphone') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-5 item">
                                    <label>Nhóm khách hàng <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-7 col-xs-7 item">
                                    <select class="form-control select2" name="customertype">
                                        <option value=""></option>
                                        @foreach($customertype as $key=>$value)
                                            @if($key == $model->customertype)
                                                <option value="{{ $key }}" selected>{{ $value }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('customertype'))<span class="text-danger">{{ $errors->first('customertype') }}</span>@endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-xs-12 item">
                                    <label>Ảnh đại diện <small class="text-danger text"> (*)</small>:</label>
                                </div>
                                <div class="col-md-7 col-xs-12 item">
                                    <input type="hidden" name="avatar" value="{{ $model->avatar }}">
                                    <div class="box-body">
                                        <div class="avatar-demo">
                                            <img src="{{ asset(empty($model->avatar) ? NO_IMAGE_URL : $model->avatar) }}" class="img-circle" width="100%" height="100%" type="file" name="be_image" value="{{ $model->avatar }}">
                                        </div>
                                        <input type="file" name="fImages" style="width: 100%">
                                        <p class="text-danger" style="margin-top: 10px;">{{ 'Lưu ý: Tải hình ảnh có kích thước 500 x 500 (px) và dung lượng hình dưới 2MB' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <p class="text-primary" style="line-height: 2"><font size='3'><b>II. Nguồn thông tin biết đến chương trình</b></font></p>
                    <div class="form-group">
                        <div class="row" style="display: flex;">
                            <div class="col-md-2 col-xs-5" style="align-self: center;">
                                <label>Facebook:</label>
                            </div>
                            <div class="col-md-7 col-xs-7">
                                <input type="text" class="form-control" name="introduction_facebook" value="{{ $model->introduction_facebook }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row" style="display: flex;">
                            <div class="col-md-2 col-xs-5" style="align-self: center;">
                                <label>Email:</label>
                            </div>
                            <div class="col-md-7 col-xs-7">
                                <input type="text" class="form-control" name="introduction_email" value="{{ $model->introduction_email }}">
                                @if($errors->has('introduction_email'))<span class="text-danger">{{ $errors->first('introduction_email') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row" style="display: flex;">
                            <div class="col-md-2 col-xs-5" style="align-self: center;">
                                <label>Giới thiệu:</label>
                            </div>
                            <div class="col-md-7 col-xs-7">
                                <input type="text" class="form-control" name="introduction_user" value="{{ $model->introduction_user }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row" style="display: flex;">
                            <div class="col-md-2 col-xs-5" style="align-self: center;">
                                <label>Khác:</label>
                            </div>
                            <div class="col-md-7 col-xs-7">
                                <input type="text" class="form-control" name="introduction_orther" value="{{ $model->introduction_orther }}">
                            </div>
                        </div>
                    </div>
                    
                    <p class="text-primary" style="line-height: 2"><font size='3'><b>III. Mối quan hệ</b></font></p>
                    <div class="form-group relationship">
                        <div class="row">
                            <div class="col-xs-12">
                                <div >
                                    <div class="box-header">
                                        <h3 class="box-title">&nbsp;</h3>
                                        <div class="box-tools" style="right: 0;">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('customers-addFamilyRelationship') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mối quan hệ</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table table-hover table-relationship">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;" class="text-nowrap" width="1%">STT</th>
                                                    <th style="text-align: center;" class="text-nowrap" width="15%">HỌ VÀ TÊN</th>
                                                    <th style="text-align: center;" class="text-nowrap">MỐI QUAN HỆ</th>
                                                    <th style="text-align: center;" class="text-nowrap">NGÀY SINH</th>
                                                    <th style="text-align: center;" class="text-nowrap">NGHỀ NGHIỆP</th>
                                                    <th style="text-align: center;" class="text-nowrap" width="10%">NGƯỜI PHỤ THUỘC</th>
                                                    <th style="text-align: center;" class="text-nowrap">NGÀY LẬP</th>
                                                    <th style="text-align: center;">CHỨC NĂNG</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($listFamilyRelationship->count() === 0)
                                                <tr>
                                                    <td colspan="7"><b>Không có dữ liệu !</b></td>
                                                </tr>
                                                @endif
                                                @php
                                                    $i = 1;
                                                @endphp                        
                                                <form name="form-delete-0" method="post" action="{{ route('customers-deleteFamilyRelationship', ['id' => 0 ]) }}"></form>

                                                @foreach($listFamilyRelationship as $item)

                                                <tr>
                                                    <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                                    <td style="text-align: left;" class="text-nowrap">{{ $item->fullname }}</td>
                                                    <td style="text-align: center;" class="text-nowrap">{{ $relationshiptype[$item->relation] }}</td>
                                                    <td style="text-align: center;" class="text-nowrap">{{ $item->birthday == null ? "" : ConvertSQLDate($item->birthday) }}</td>
                                                    <td style="text-align: center;" class="text-nowrap">{{ $item->work }}</td>
                                                    <td style="text-align: center;" class="text-nowrap">
                                                    @if($item->dependent == 1)
                                                        <img src="{{ asset('image/check.gif') }}">        
                                                    @endif                                                        
                                                    </td>
                                                    <td style="text-align: center;" class="text-nowrap">{{ $item->created_at == null ? "" : ConvertSQLDate($item->created_at) }}</td>
                                                    <td style="text-align: center;" class="text-nowrap">
                                                        <a style="color: #1b1464;" href="{{ route('customers-editFamilyRelationship',['id'=> $item->id]) }}" title='Sửa'><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i></a> 
                                                        <a style="color: #1b1464;" href="javascript:void(0)" data-id="{{ $item->id }}" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            <form name="form-delete-{{ $item->id }}" method="post" action="{{ route('customers-deleteFamilyRelationship', ['id' => $item->id ]) }}">
                                                                {{ csrf_field() }}
                                                                {{ method_field('delete') }}
                                                            </form>
                                                    </td>
                                                </tr>
                                                
                                                @endforeach                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                    </div>   
                    
                </div>

            </div>
            
            <button type="submit" class="btn btn-success update">Cập nhật</button>
            <br><hr>
            <a href="{{ route('dashboard') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>


                                                   
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.customer.partials.script')
@endsection
