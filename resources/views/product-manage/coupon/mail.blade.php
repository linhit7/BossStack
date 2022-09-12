@extends('layouts.master')

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('coupons-sendMail', ['id' => $model->id]) }}?continue=true" method="post" id="coupons-form">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ ('Gửi mail khách hàng mã khuyến mãi') }}</h3>
                </div>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type="hidden" name="quantitied" value="{{ $model->quantitied }}">
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5 item">
                                <label>Loại:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                @foreach($coupontypes as $key=>$value)
                                    @if( $key == $model->typecoupon )
                                        {{ $value }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ ($errors->has('key')) ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="col-md-3 col-xs-5 item">
                                <label>Mã giảm giá:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                {{ $model->key }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5 item">
                                <label>% giảm giá:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                {{ $model->percent }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5 item">
                                <label>Số lượng:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                {{ $model->quantity }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5 item">
                                <label>Số lượng chưa sử dụng:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                {{ $model->quantitied }}
                            </div>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5 item">
                                <label>Ghi chú:</label>
                            </div>
                            <div class="col-md-4 col-xs-7 item">
                                {{ $model->description }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5 item">
                                <label>Email nhận:</label>
                            </div>
                            <div class="col-md-8 col-xs-7 item">
                                <input type="text" class="form-control" name="email" value="" tabindex="1">
                                @if($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span>@endif                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ ('Chức năng') }}</h3>
                </div>
                <div class="box-body">
                    <button type="submit" class="btn btn-primary btn-save" tabindex="9">{{ ('Gửi mail') }}</button>
                    <a href="{{ route('coupons-index') }}" class="btn btn-default btn-cancel" tabindex="10">{{ ('Trở về') }}</a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script>
    $(function() {
        $('.btn-save').click(function() {
            $('#coupons-form').submit();
        });
    });
</script>
@endsection
