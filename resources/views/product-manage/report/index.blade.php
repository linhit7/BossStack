@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">

<style type="text/css">

	.box-coaching .cash-analysis .row{
		display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-wrap: wrap;
	    flex-wrap: wrap;
	}

	.box-coaching .cash-analysis .row div{
		margin-bottom: 10px;
	}

	@media only screen and (max-width: 768px){
	    .box.box-coaching .coaching-form .form-group{
	    	margin-bottom: 0;
	    }

	    .box.box-coaching .coaching-form input,
		.box.box-coaching .coaching-form textarea{
	    	margin-bottom: 15px;
	    }
	}

</style>
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

@if(isset($infor))
    @include('layouts.partials.messages.infor')
@endif



<div class="row">
    <div class="col-xs-12">
        <div class="box box-coaching">
        	<br>
			<div class="cash-analysis" style="display: none;">
                <div class="row">
                    <div class="col-md-2 col-xs-12" style="align-self: center;">
                       <label style="color: #2d3194; margin-bottom: 0;">Thời gian từ:</label>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <input type='text' class="form-control" name="fromDate" id='fromDate' value="{{ old('fromDate') == "" ? $fromDate : old('fromDate') }}"/>
                    </div>
                    <div class="col-md-1 col-xs-12" style="align-self: center;">
                        <label style="color: #2d3194; margin-bottom: 0;">đến:</label>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <input type='text' class="form-control" name="toDate" id='toDate' value="{{ old('toDate') == "" ? $toDate : old('toDate') }}"/>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <button class="btn btn-primary btn-search" style="width: 100%; background-color: #ff7f0e; border: 1px solid #ff7f0e;">Yêu cầu phân tích</button>
                    </div>
                </div>
        	</div>
        	<br>
        	<div class="coaching-form">
				<p style="text-align: justify;"><font size="3">Tham gia chương trình <b>Coaching</b> 1:1 nhằm xây dựng và gia tăng dòng tiền của bạn, vui lòng gửi thông tin cho chúng tôi:</font></p>
                <form role="form" action="{{ route('report-store') }}?continue=true" method="post" id="frm">
                {{ csrf_field() }}
                <input type='hidden' name='course' value='4'>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4 col-xs-12">
								<input class="form-control" type="text" name="fullname" placeholder="Họ tên" value="{{ old('fullname') }}">
                                @if($errors->has('fullname'))<span class="text-danger">{{ $errors->first('fullname') }}</span>@endif
							</div>
							<div class="col-md-4 col-xs-12">
								<input class="form-control" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                                @if($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span>@endif
							</div>
							<div class="col-md-4 col-xs-12">
								<input class="form-control" type="text" name="phone" placeholder="Số điện thoại" value="{{ old('phone') }}">
                                @if($errors->has('phone'))<span class="text-danger">{{ $errors->first('phone') }}</span>@endif
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<input class="form-control" type="text" name="address" placeholder="Địa chỉ" value="{{ old('address') }}">
                                @if($errors->has('address'))<span class="text-danger">{{ $errors->first('address') }}</span>@endif
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<input class="form-control" type="text" name="title" placeholder="Tiêu đề"  value="{{ old('title') }}">
                                @if($errors->has('title'))<span class="text-danger">{{ $errors->first('title') }}</span>@endif
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<textarea class="form-control" rows="10" name="content" placeholder="Thông điệp của bạn.....">{{ old('content') }}</textarea>
                                @if($errors->has('content'))<span class="text-danger">{{ $errors->first('content') }}</span>@endif
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-send">Gửi yêu cầu</button>
				</form>
			</div>
        	<br>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@include('product-manage.report.partials.script')
@endsection

