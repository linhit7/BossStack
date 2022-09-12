@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection
@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="" method="post" id="careers-form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tạo mới tin tuyển dụng</h3>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <label>Tên công việc</label>
                        <input type="text" class="form-control" placeholder="Tên công việc" name="name" required="">
                        @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                    </div>

                    <div class="form-group">
                        <label>Thời gian làm việc</label>
                        <select class="form-control select2" name="work_time" required="">
                            <option>Chọn thời gian làm việc</option>
                            <option value="">Full-time</option>
                            <option value="">Part-time</option>
                        </select>
                    </div>

                   <div class="form-group">
                        <label>Phòng ban</label>
                        <select class="form-control select2" name="department" required="">
                            <option>Chọn phòng ban</option>
                            <option value="">Thiết kế</option>
                            <option value="">Công nghệ</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Chức vụ</label>
                        <select class="form-control select2" name="position" required="">
                            <option>Chọn chức vụ</option>
                            <option value="">Nhân viên</option>
                            <option value="">Leader</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Lương</label>
                        <select class="form-control select2" name="salary" required="">
                            <option>Chọn mức lương</option>
                            <option value="">Thỏa thuận</option>
                            <option value="">5 triệu - 8 triệu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Địa điểm</label>
                        <select class="form-control select2" name="address" required="">
                            <option>Chọn địa điểm</option>
                            <option value="">Hồ Chí Minh</option>
                            <option value="">Hà Nội</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kinh nghiệm</label>
                        <select class="form-control select2" name="experience" required="">
                            <option>Chọn kinh nghiệm</option>
                            <option value="">Không yêu cầu kinh nghiệm</option>
                            <option value="">1 năm</option>
                            <option value="">2 năm</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Bằng cấp</label>
                        <select class="form-control select2" name="diploma" required="">
                            <option>Chọn bằng cấp</option>
                            <option value="">Cao đẳng</option>
                            <option value="">Đại học</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mô tả công việc</label>
                        <textarea class="form-control" id="description" name="description" rows="10" placeholder="Nhập mô tả công việc" required=""></textarea>
                        @if($errors->has('description'))<span class="help-block">{{ $errors->first('description') }}</span>@endif
                    </div>

                    <div class="form-group">
                        <label>Yêu cầu công việc</label>
                        <textarea class="form-control" id="recruitment" name="recruitment" placeholder="Nhập yêu cầu công việc" rows="10" required=""></textarea>
                        @if($errors->has('recruitment'))<span class="help-block">{{ $errors->first('recruitment') }}</span>@endif
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chức năng</h3>
                </div>
                <div class="box-body">
                    <button type="submit" class="btn btn-primary btn-save" tabindex="9">Lưu</button>
                    <a href="#" class="btn btn-default btn-cancel" tabindex="10">Trở về</a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('operation-manage.career.partials.script')

<script>
    $(function() {
        $('.btn-save').click(function() {
            $('#careers-form').submit();
        });

        $('#chk-continue').on('ifChecked', function() {
            $('#careers-form').attr('action', '');
        });

        $('#chk-continue').on('ifUnchecked', function() {
            $('#careers-form').attr('action', '');
        });

       

    });
</script>
@endsection
