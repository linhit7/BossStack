<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="route" content="{{ request()->route()->getName() }}">

    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/style_fund.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
</head>

<body style="font-family: 'Roboto', sans-serif !important;">

    @if(session()->has('success'))
        @include('layouts.partials.messages.success')
    @endif


    <div id="header-fund">

        <!-- Menu -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo-fund">
                            <a href="http://103.101.162.242/public/funds/public/"><img src="{{ asset('img/lam-w.png') }}"></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="menu-fund">
                            <ul>
                                <li><a href="#">Về chúng tôi</a></li>
                                <li><a href="#">Sản phẩm</a></li>
                                <li><a href="#">Dịch vụ hỗ trợ</a></li>
                                <li><a href="#">Tuyển dụng</a></li>
                                <li><a href="#">Liên hệ</a></li>
                                <li class="sign-in"><a href="{{ route('login') }}">Đăng nhập</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Menu -->

        <!-- Register -->
        <div class="register">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card-group">
                            <div class="card card-left">
                                <img class="card-img" src="{{ asset('img/signup-hinh.jpg') }}" alt="">
                            </div>
                            <div class="card card-right">
                                <div class="card-body">
                                    <form role="form" action="{{ route('customers-addCustomer') }}?continue=true" method="post" id="customer-form">
                                        <div class="box box-primary">
                                            <div class="box-header text-center">
                                                <img src="{{ asset('img/lam.png') }}" alt="" width="20%">
                                            </div>
                                            {{ csrf_field() }}
                                            <div class="box-body">
                                                <div class="form-group text-center">
                                                    <h3>ĐỔI MẬT KHẨU</h3>
                                                </div>
                                                <input type="text" hidden="true" name="id" value="{{ $idUser }}">
                                                <div class="form-group">
                                                    <label>Họ & tên <small class="text-danger text"> (*)</small>:</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $userCustomer->name }}" readonly="">
                                                </div>

                                                <div class="form-group">
                                                    <label>Email <small class="text-danger text"> (*)</small>:</label>
                                                    <input type="text" class="form-control" name="email" value="{{ $userCustomer->email }}" readonly="">
                                                    @if($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span>@endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Mật khẩu <small class="text-danger text"> (*)</small>:</label>
                                                    <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
                                                    @if($errors->has('password'))<span class="text-danger">{{ $errors->first('password') }}</span>@endif
                                                </div>

                                                <div class="form-group">
                                                    <label>Nhập lại mật khẩu <small class="text-danger text"> (*)</small>:</label>
                                                    <input id="re_password" type="password" class="form-control" name="re_password" value="{{ old('password') }}">
                                                </div>
                                            </div>
                                            <div class="alert-info mt-3" style="font-size: 12px"><span id="message"></span></div>
                                        </div>
                                        <button type="button" class="btn btn-success btn-register"><b>LƯU</b></button>   
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Register -->
    </div>
    <script>
    	$(function(){
    		$('.btn-register').click(function() {
		        var password = $('#password').val();
		        var re_password = $('#re_password').val();

		        $.get('{{ route('customers-updateChangePass',['id' => $idUser]) }}', {password: password, re_password: re_password }, function(data) {
		            $('#message').text(data.msg);
		        })
		    });
    	});
	</script> 
</body>
</html>