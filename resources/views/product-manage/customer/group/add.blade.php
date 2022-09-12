@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection
@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tạo mới nhóm khách hàng</h3>
            </div>
            <form role="form" action="{{ route('customers-groups-store') }}?continue=true" method="post" id="customers-groups-form">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group{{ ($errors->has('name')) ? ' has-error' : '' }}">
                        <label>Tên nhóm</label>
                        <input type="text" class="form-control" placeholder="Tên nhóm khách hàng" name="name">
                        @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <label>Mã nhóm</label>
                        <input type="text" class="form-control" placeholder="Mã nhóm khách hàng" name="code">
                        @if($errors->has('code'))<span class="help-block">{{ $errors->first('code') }}</span>@endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Chức năng</h3>
            </div>
            <div class="box-body">
                <button type="submit" class="btn btn-primary btn-save" tabindex="9">Lưu</button>
                <a href="{{ route('customers-groups-index') }}" class="btn btn-default btn-cancel" tabindex="10">Trở về</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script>
    $(function() {
        $('.btn-save').click(function() {
            $('#customers-groups-form').submit();
        });

        $('#chk-continue').on('ifChecked', function() {
            $('#customers-groups-form').attr('action', '{{ route('customers-groups-store') }}?continue=true');
        });

        $('#chk-continue').on('ifUnchecked', function() {
            $('#customers-groups-form').attr('action', '{{ route('customers-groups-store') }}');
        });
    });
</script>
@endsection
