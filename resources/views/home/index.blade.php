<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BossStack Coaching</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="route" content="{{ request()->route()->getName() }}">

    <link rel="icon" type="image/png" href="{{ asset('img/fiinves-f-logo-tab.png') }}" sizes="32x32" />

    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/style_fund.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    @laravelPWA
    <!-- Carousel CSS -->

    @yield('head')
    
</head>

<body>
    
    <div id="header-fund">

        <!-- Menu -->

        @include('home.menu')

        <!-- End Menu -->

        <!-- Banner -->
        <div class="banner-home-fund">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="banner-home-fund-left">
                            <div class="align-self-center">
                                <!-- <img src="{{ asset('img/text-1-w.png') }}"> -->
                                <h1>BossStack Coaching</h1>
                                <h4 style="color: #fff; font-size: 23px; font-weight: bold;">TƯ VẤN CHUYỂN ĐỔI SỐ TÀI CHÍNH</h4>
                                <p>Xây dựng Chiến lược Quản lý tài chính và Kế hoạch <br/>Gia tăng Lợi nhuận lâu dài ngay bây giờ!</p>
                                <div class="button-banner">
                                    <!-- <a class="btn btn-primary btn-banner" href="{{ route('personalcash') }}">Tìm hiểu ngay</a> -->
                                    <a class="btn btn-primary btn-banner" href="{{ route('contact') }}">Liên Hệ BossStack</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-12 mt-5 mt-sm-0">
                        <img src="{{ asset('img/home-banner-right.png') }}" width="100%">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->

    </div>

    <div id="main-fund">

        <!-- Về LAMs -->
        <section class="element-section element-bg-16 element-about-lams">
            <div class="container">

                <div class="about-lams-1">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="box-1 mb-4 mb-sm-0 clearfix">
                                <div class="box-left align-self-center">
                                    <img src="{{ asset('img/icon-1.png') }}">
                                </div>
                                <div class="box-right align-self-center">
                                    <h1>Xác định <br>bức tranh <br>tài chính doanh nghiệp</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="box-2 mb-4 mb-sm-0 clearfix">
                                <div class="box-left align-self-center">
                                    <img src="{{ asset('img/icon-2.png') }}">
                                </div>
                                <div class="box-right align-self-center">
                                    <h1>Kiểm toán vốn <br>mở rộng <br>sản xuất kinh doanh</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="box-3 mb-4 mb-sm-0 clearfix">
                                <div class="box-left align-self-center">
                                    <img src="{{ asset('img/icon-3.png') }}">
                                </div>
                                <div class="box-right align-self-center">
                                    <h1>Kiểm soát <br>dòng vốn <br>đầu tư chủ sở hữu</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-lams-2">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="logo mb-4">
                                <!-- <img src="{{ asset('img/text-3.png') }}"> -->
                                <h2>Về BossStack Coaching</h2>
                            </div>
                            <p>Được thành lập năm 2015, <b>BossStack</b> là một trong những công ty uy tín trong việc cung cấp các giải pháp cố vấn và công nghệ hỗ trợ khách hàng quản lý và gia tăng dòng tiền cá nhân và doanh nghiệp. Với đội ngũ lãnh đạo, nhân viên có kinh nghiệm sâu sắc và chuyên môn cao trong lĩnh vực quản lý tài chính, công nghệ, <b>BossStack</b> đã phát triển hệ thống <b>“BossStack Coaching”</b>, một giải pháp giúp doanh nghiệp và cá nhân kiểm soát tình hình tài chính của hệ thống, tách bạch các dòng tiền và tăng trưởng bền vững.</p>
                            <!-- <a href="{{ route('about-us') }}">Tìm hiểu thêm <i class="fa fa-arrow-right"></i></a> -->
                        </div>
                        <!-- <div class="col-md-6">
                            <img src="{{ asset('img/about-lams.jpg') }}" width="100%">
                        </div> -->
                    </div>
                </div>
                
            </div>
        </section>
        <!-- End Về LAMs -->

        <!-- TẠI SAO BẠN NÊN CHỌN CHÚNG TÔI? -->
        <section class="element-section element-why-choose-us">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-12">
                        <img class="mb-5 mb-sm-0" src="{{ asset('img/why-choose-us.png') }}" width="100%">
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="why-choose-us-right">
                            <!-- <img src="{{ asset('img/text-2.png') }}"> -->
                            <h3>Tại sao doanh nghiệp cần BossStack Coaching?</h3>
                            <h4>Khó khăn trong quản lý dòng tiền của doanh nghiệp</h4>
                            <ul style="margin-bottom: 20px;">
                                <li>
                                    <span class="icon"><img src="{{ asset('img/icon-4.png') }}"></span>
                                    <span class="text align-self-center">Không quản lý được nguồn vốn</span>
                                </li>
                                <li>
                                    <span class="icon"><img src="{{ asset('img/icon-4.png') }}"></span>
                                    <span class="text align-self-center">Chủ doanh nghiệp thường không thể tách dòng tiền cá nhân của mình ra khỏi doanh nghiệp</span>
                                </li>
                                <li>
                                    <span class="icon"><img src="{{ asset('img/icon-4.png') }}"></span>
                                    <span class="text align-self-center">Thiếu vốn để mở rộng sản xuất kinh doanh</span>
                                </li>
                                <li>
                                    <span class="icon"><img src="{{ asset('img/icon-4.png') }}"></span>
                                    <span class="text align-self-center">Thiếu công cụ quản lý dòng tiền</span>
                                </li>
                            </ul>
                            <h4>Khó Khăn trong Vận Hành và Kiểm soát Thất Thoát</h4>
                            <ul>
                                <li>
                                    <span class="icon"><img src="{{ asset('img/icon-4.png') }}"></span>
                                    <span class="text align-self-center">Thiếu bộ công cụ vận hành hoạt động kinh doanh </span>
                                </li>
                                <li>
                                    <span class="icon"><img src="{{ asset('img/icon-4.png') }}"></span>
                                    <span class="text align-self-center">Thiếu quy trình đánh giá và xây dựng kế hoạch chiến lược</span>
                                </li>
                                <li>
                                    <span class="icon"><img src="{{ asset('img/icon-4.png') }}"></span>
                                    <span class="text align-self-center" style="letter-spacing: -0.5px;">Đối mặt với thất thoát: nhân công, nguyên vật liệu, hàng hoá...</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End TẠI SAO BẠN NÊN CHỌN CHÚNG TÔI? -->

        <!-- Ưu điểm của hệ thống -->
        <section class="element-section element-bg-1 element-advantages position-relative">
            <div class="element-advantages-img"></div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h3>BossStack Coaching mang lại lợi ích gì?</h3>
                        <h4>Sở hữu công cụ kiểm soát các “Business”</h4>
                        <ul style="margin-bottom: 20px;">
                            <li>
                                <span class="icon"><img src="{{ asset('img/icon-4-blue.png') }}"></span>
                                <span class="text">Phân tích dòng tiền </span>
                            </li>
                            <li>
                                <span class="icon"><img src="{{ asset('img/icon-4-blue.png') }}"></span>
                                <span class="text">Tính toán tài sản ròng</span>
                            </li>
                            <li>
                                <span class="icon"><img src="{{ asset('img/icon-4-blue.png') }}"></span>
                                <span class="text">Theo dõi các khoản mục đầu tư</span>
                            </li>
                        </ul>
                        <h4>Khóa đào tạo xử lý dòng tiền</h4>
                        <ul>
                            <li>
                                <span class="icon"><img src="{{ asset('img/icon-4-blue.png') }}"></span>
                                <span class="text" style="letter-spacing: -0.5px;">Dự báo, phân tích và lập kế hoạch tài chính cho doanh nghiệp</span>
                            </li>
                            <li>
                                <span class="icon"><img src="{{ asset('img/icon-4-blue.png') }}"></span>
                                <span class="text">Kiểm soát các khoản nợ phải thu và nợ phải trả</span>
                            </li>
                            <li>
                                <span class="icon"><img src="{{ asset('img/icon-4-blue.png') }}"></span>
                                <span class="text">Sử dụng các công cụ giúp dự báo dòng tiền</span>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="bg-advantages">
                            <img src="{{ asset('img/advantages-system.png') }}">
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- End Ưu điểm của hệ thống -->

        <!-- Bảng giá phần mềm -->
        <section class="element-section element-price-list">
            <div class="container">
                <h2 class="title">Ứng dụng BossStack dành cho CÁ NHÂN </h2>
                @include('home.package')
            </div>
        </section>
        <!-- End Bảng giá phần mềm -->

        <!-- Liên hệ
        <section class="element-section element-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact">
                            <h1>BẠN CẦN HỖ TRỢ?</h1>
                            <p>Hãy liên hệ với chúng tôi để nhận được tư vấn sử dụng dịch vụ và gia tăng dòng tiền cá nhân.</p>
                            <a href="{{ route('contact') }}" class="btn btn-primary btn-contact">Liên hệ</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        End Liên hệ -->

        <!-- Nhận xét -->
        <section class="element-section element-review">
            <div class="container">

                <h1 class="text-center mb-5"><font size="6">ĐÁNH GIÁ SẢN PHẨM</font></h1>
                
                <div class="carousel-review">
                    <div class="owl-carousel owl-theme carousel-review-items">
                        <div class="item">
                            <div class="avatar mb-3">
                                <img src="{{ asset('img/user-2.jpg') }}">
                            </div>
                            <div class="name mb-2">Nguyễn Đỗ Cẩm Bình</div>
                            <div class="subject mb-2">Trưởng phòng kinh doanh, Công ty BĐS Him Lam</div>
                            <div class="content">
                                <p>Tôi từng nghĩ các ứng dụng quản lý tiền có thể chỉ là là một công cụ nhưng BossStack Coaching đã cho tôi cách nhìn khác. Đây thật sự là một phần mềm có thể tính toán từng đồng tiền nhỏ cho đến số tiền lớn, mà tính toán thủ công sẽ không khả thi. Nó trở thành một người bạn đáng tin cậy khi giữ gìn và phát triển tiền bạc của tôi tốt hơn. Tôi chú ý nhất đến phần tính số tiền còn thiếu hụt cho kỳ hưu trí. Về dòng tiền, tôi thiết lập các mục tiêu tài chính chi tiết, quản lý thu chi hằng ngày, quản lý tài sản và nợ, phân tích và theo dõi tiến độ thực hiện các kế hoạch dòng tiền, và điểm đặc biệt là các gợi ý đầu tư dài hạn phù hợp.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="avatar mb-3">
                                <img src="{{ asset('img/user-1.jpg') }}">
                            </div>
                            <div class="name mb-2">Lê Hoài Ân, CFA</div>
                            <div class="subject mb-2">Tác giả cuốn sách bán chạy #1: 20 Năm Lịch Sử Thị Trường Chứng Khoán Việt Nam</div>
                            <div class="content">
                                <p>Ứng dụng BossStack Coaching là công cụ giúp cụ thể hóa những ý tưởng và phương pháp quản lý được trình bày trong các sách tài chính cá nhân. Với BossStack Coaching, bạn sẽ có thể theo dõi và kiểm soát được các mục tiêu tài chính đã đề ra để từng bước đạt được mục tiêu tự do tài chính. Ngoài ra, bạn có thể sử dụng ứng dụng như một công cụ để quản lý toàn bộ các khoản đầu tư của mình trên thị trường chứng khoán một cách chi tiết cụ thể từng lệnh giao dịch. Các kiến thức đầu tư cũng là một trong những ưu điểm của BossStack Coaching mà bạn nên sử dụng. </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="avatar mb-3">
                                <img src="{{ asset('img/user.jpg') }}">
                            </div>
                            <div class="name mb-2">Huỳnh Thu Ái</div>
                            <div class="subject mb-2">Nhà cố vấn - Đào Tạo Quản Lý Hệ Thống Doanh Nghiệp AMS</div>
                            <div class="content">
                                <p>Sau một thời gian sử dụng BossStack Coaching, tôi đã xem đây như là một công cụ để thực hiện lên kế hoạch phân bổ tài sản đến phân bổ các dòng tiền lợi nhuận và các ví mục tiêu tài chính khác nhau. Đồng thời, theo dõi phân tích và đánh giá tiến độ thực hiện cũng là một trong những tính năng giúp tôi dễ dàng quản lý toàn bộ danh mục đầu tư của mình. Tôi nói với nhiều người rằng, tôi kiếm được nhiều tiền hơn nữa khi dùng BossStack Coaching. Đơn giản vì nếu các nguồn tiền được phân bổ hợp lý, tiền được sử dụng đúng. Và trong từng mục thu chi, từng mục tiêu tài chính, tôi có thể thấy chúng được tối ưu chưa. Sẽ có hai điều mà tôi phải thực hiện cùng lúc, một là cần phải kiếm thêm tiền để đổ thêm vào các mục tiêu, hai là tôi phải cắt giảm đi những chi phí ẩn hay chi phí không cần thiết mà trước đây mình không để ý đến. Mọi thứ điều nằm trong tầm kiểm soát, như thế tôi có được an toàn tài chính.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Nhận xét -->

    </div>

    @include('home.footer')

    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

    <script src="{{ asset('js/commons.js') }}"></script>

    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> --}}

    <script src="{{ asset('js/libs/bootstrap3-typeahead.min.js') }}"></script>      
    <script src="{{ asset('js/libs/bootstrap-multiselect.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/libs/bootstrap-multiselect.css') }}" />

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Carousel JS -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- Carousel JS -->

    <!-- Fund JS -->
    <script src="{{ asset('js/fund.js') }}"></script>
    <!-- Fund JS -->

    @yield('scripts')



<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60504f44067c2605c0b8c7c8/1f0srb9eh';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>

</html>