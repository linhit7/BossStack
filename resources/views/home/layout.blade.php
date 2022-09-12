<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BossStack Coaching</title>

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
    @laravelPWA
</head>

<body>
	
	<div id="header-fund">
		
		<!-- Menu -->
        @include('home.menu')
        <!-- End Menu -->

		<!-- Banner -->
        <div class="banner-default-fund">
            <div class="container"></div>
        </div>
        <!-- End Banner -->

	</div>

	<div id="main-fund">
		@yield('content')
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

    <script>
        
        var url = window.location.href;

        if(url == "https://bossstack.vn/about-us" || url == "https://bossstack.vn/public/about-us"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Về Chúng Tôi</font></h1>" );

        }else if(url == "https://bossstack.vn/advisory" || url == "https://bossstack.vn/public/advisory"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Hướng Dẫn Cá Nhân</font></h1>" );

        }else if(url == "https://bossstack.vn/contact" || url == "https://bossstack.vn/public/contact"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Liên Hệ</font></h1>" );

        }else if(url == "https://bossstack.vn/TheDefinitionOfInvesting" || url == "https://bossstack.vn/public/TheDefinitionOfInvesting"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Khái Niệm Đầu Tư</font></h1>" );

        }else if(url == "https://bossstack.vn/WhyYouShouldInvest" || url == "https://bossstack.vn/public/WhyYouShouldInvest"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Tại Sao Bạn Nên Đầu Tư</font></h1>" );

        }else if(url == "https://bossstack.vn/EffectiveBudgeting" || url == "https://bossstack.vn/public/EffectiveBudgeting"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Quản Lý Chi Tiêu Hiệu Quả</font></h1>" );

        }else if(url == "https://bossstack.vn/FinancialPlanning" || url == "https://bossstack.vn/public/FinancialPlanning"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Kế Hoạch Tài Chính Tương Lai</font></h1>" );

        }else if(url == "https://bossstack.vn/SavingMethod" || url == "https://bossstack.vn/public/SavingMethod"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Phương Thức Tiết Kiệm</font></h1>" );

        }else if(url == "https://bossstack.vn/HowToGrowYourCashFlow" || url == "https://bossstack.vn/public/HowToGrowYourCashFlow"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Tăng Trưởng Dòng Tiền Cá Nhân</font></h1>" );

        }else if(url == "https://bossstack.vn/customers/addCustomer?continue=true" || url == "https://bossstack.vn/public/customers/addCustomer?continue=true"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Phương Thức Thanh Toán</font></h1>" );
        }else if(url == "https://bossstack.vn/bossstack-startup" || url == "https://bossstack.vn/public/bossstack-startup"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>BossStack - Start-Up</font></h1>" );
        }else if(url == "https://bossstack.vn/bossstack-smes" || url == "https://bossstack.vn/public/bossstack-smes"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>BossStack - SMEs</font></h1>" );
        }else if(url == "https://bossstack.vn/bossstack-bigcorp" || url == "https://bossstack.vn/public/bossstack-bigcorp"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>BossStack - Big Corporations/Holdings</font></h1>" );
        }else if(url == "https://bossstack.vn/cash-flow-handling" || url == "https://bossstack.vn/public/cash-flow-handling"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Xử Lý Dòng Tiền</font></h1>" );
        }else if(url == "https://bossstack.vn/money-begets-money" || url == "https://bossstack.vn/public/money-begets-money"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Tiền Đẻ Ra Tiền</font></h1>" );
        }else if(url == "https://bossstack.vn/multi-cash-growth" || url == "https://bossstack.vn/public/multi-cash-growth"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>Tăng Trưởng Đa Dòng Tiền</font></h1>" );
        }

    </script>
	
	@yield('scripts')

</body>

</html>