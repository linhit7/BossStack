<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHẦN MỀM FIINVES</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="route" content="{{ request()->route()->getName() }}">

    <link rel="icon" type="image/png" href="{{ asset('img/fiinves-f-logo-tab.png') }}" sizes="32x32" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Bootstrap CSS -->

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Fontawesome CSS -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/style_fund.css') }}">

    <!-- Font Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <!-- Font Family -->

    <!-- Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!-- Carousel CSS -->

    @yield('head')

</head>

<body>
    
    <div id="header-fund">
        
        <!-- Menu -->
        @include('home.menu')
        <!-- End Menu -->

        <!-- Banner -->
        <div class="banner-default-fund">
            <div class="container">

                @if($errorCode == '-1') <!-- Đăng ký thông tin khách hàng bị lỗi -->
                    <div class="message-success text-center">
                        <h1 class="mb-5">
                            <font size="5" color="#1a1f53">
                                THÔNG TIN ĐĂNG KÝ BỊ LỖI !
                            </font>
                        </h1>

                        <p class="mb-5"><b>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Vui lòng nhập lại thông tin đăng ký mới.</b></p>

                        <a class="btn btn-primary" href="{{ route('customers-register', ['service_product_id' => 1]) }}">Quay về trang đăng ký</a>
                    </div>
                @elseif($errorCode == '1') <!-- Đăng ký thông tin khách hàng thành công -->
                    <div class="message-success text-center">
                        <h1 class="mb-5">
                            <font size="5" color="#1a1f53">
                                CHÚC MỪNG BẠN ĐÃ ĐĂNG KÝ THÔNG TIN THÀNH CÔNG !
                            </font>
                        </h1>

                        <p class="mb-4"><b>Mời bạn kiểm tra email để tiếp tục sử dụng dịch vụ.</b></p>

                        <p class="mb-5"><b>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Chúc bạn một ngày vui!</b></p>

                        <a class="btn btn-primary" href="https://fiinves.vn/public/">Quay về trang chủ</a>
                    </div>
                @elseif($errorCode == '2') <!-- Kich hoạt mã ưu đãi -->
                    <div class="message-success text-center">
                        <h1 class="mb-5">
                            <font size="5" color="#1a1f53">
                                {{ ($infor) }}
                            </font>
                        </h1>

                        <p class="mb-5"><b>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Chúc bạn một ngày vui!</b></p>

                        <a class="btn btn-primary" href="https://fiinves.vn/public/">Quay về trang chủ</a>
                    </div>
                @elseif($errorCode == '0') <!-- Đăng ký thông tin khách hàng thành công, thanh toán qua vi momo thành công -->
                    <div class="message-success text-center">
                        <h1 class="mb-5">
                            <font size="5" color="#1a1f53">
                                {{ mb_strtoupper($infor) }}
                            </font>
                        </h1>

                        <p class="mb-4"><b>Mời bạn kiểm tra email để hoàn thành thủ tục đăng ký.</b></p>

                        <p class="mb-5"><b>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Chúc bạn một ngày vui!</b></p>

                        <a class="btn btn-primary" href="https://fiinves.vn/public/">Quay về trang chủ</a>
                    </div>                
                @else <!-- Đăng ký thông tin khách hàng thành công, thanh toán qua vi momo bị lỗi -->
                    <div class="message-success text-center">
                        <h1 class="mb-5">
                            <font size="5" color="#1a1f53">
                                {{ mb_strtoupper($infor) }}
                            </font>
                        </h1>

                        <p class="mb-4"><b>Mời bạn kiểm tra email để hoàn thành thủ tục đăng ký.</b></p>

                        <p class="mb-5"><b>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Chúc bạn một ngày vui!</b></p>

                        <a class="btn btn-primary" href="https://fiinves.vn/public/">Quay về trang chủ</a>
                    </div>                
                @endif

            </div>
        </div>
        <!-- End Banner -->

    </div>

    @include('home.footer')

    <!-- Jquery Script -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Jquery Script -->

    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- Bootstrap Script -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Bootstrap Script -->

    <!-- Carousel JS -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- Carousel JS -->

    <!-- Fund JS -->
    <script src="{{ asset('js/fund.js') }}"></script>
    <!-- Fund JS -->
    
    @yield('scripts')

</body>

</html>