<div class="header-top-mobile">

    <nav class="menu-mobile" role="navigation">
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menuToggle-item">

                <!-- <li><a href="{{ route('about-us') }}">Về chúng tôi</a></li> -->
                <!-- <li><a href="{{ route('personalcash') }}">Ứng Dụng BossStack</a></li> -->
                <li class="menu">
                    <a href="#" onclick="return false;">Coaching cá nhân</a>
                    <ul class="menu-item">
                        <li><a href="{{ route('cash-flow-handling') }}">Xử Lý Dòng Tiền</a></li>
                        <li><a href="{{ route('money-begets-money') }}">Tiền Đẻ Ra Tiền</a></li>
                        <li><a href="{{ route('multi-cash-growth') }}">Tăng Trưởng Đa Dòng Tiền</a></li>
                    </ul>
                </li>
                <li class="menu">
                    <a href="#" onclick="return false;">Coaching doanh nghiệp</a>
                    <ul class="menu-item">
                        <li><a href="{{ route('bossstack-startup') }}">BossStack - Start-up</a></li>
                        <li><a href="{{ route('bossstack-smes') }}">BossStack - SMEs</a></li>
                        <li><a href="{{ route('bossstack-bigcorp') }}">BossStack - Big Corporations/Holdings</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('advisory') }}">Hướng dẫn cá nhân</a></li>
                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                <!-- <li class="select-language">
                    <form action="">
                        <div class="form-group">
                            <select class="form-control">
                                <option>Chọn ngôn ngữ</option>
                                <option>Vietnamese</option>
                                <option>English</option>
                            </select>
                        </div>
                    </form>
                </li> -->
            </ul>
        </div>
    </nav>

    <div class="logo-mobile">
        <a href="https://bossstack.vn/">
            <img src="{{ asset('img/logo-bossstack.png') }}">
        </a>
    </div>

    <div class="user-mobile">
        <a class="sign-in" href="{{ route('login') }}">
            <span><b>Đăng nhập</b></span>
        </a>

        <a class="registration" href="#">
            <span><b>Đăng kí</b></span>
        </a>

        <div class="user d-none">
            <a href="#">
                <span class="name">Đỗ Trùng Dương</span>
                <span class="avatar">
                    <img src="https://bossstack.vn/public/img/user-avt.png">
                </span>
            </a>
        </div>
    </div>

</div>


<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-xl-2">
                <div class="logo-fund">
                    <a href="https://bossstack.vn/"><img src="{{ asset('img/logo-bossstack.png') }}"></a>
                </div>
            </div>

            <div class="col-lg-7 col-xl-8">
                <div class="menu-fund">
                    <ul>
                        <!-- <li><a href="{{ route('about-us') }}">Về chúng tôi</a></li>
                        <li><a href="{{ route('personalcash') }}">Ứng Dụng <span>BossStack</span></a></li> -->
                        
                        <li class="menu">
                            <a href="#" onclick="return false;">Coaching cá nhân</a>
                            <ul class="menu-item">
                                <li><a href="{{ route('cash-flow-handling') }}">Xử Lý Dòng Tiền</a></li>
                                <li><a href="{{ route('money-begets-money') }}">Tiền Đẻ Ra Tiền</a></li>
                                <li><a href="{{ route('multi-cash-growth') }}">Tăng Trưởng Đa Dòng Tiền</a></li>
                            </ul>
                        </li>
                        <li class="menu">
                            <a href="#" onclick="return false;">Coaching doanh nghiệp</a>
                            <ul class="menu-item">
                                <li><a href="{{ route('bossstack-startup') }}">BossStack - Start-up</a></li>
                                <li><a href="{{ route('bossstack-smes') }}">BossStack - SMEs</a></li>
                                <li><a href="{{ route('bossstack-bigcorp') }}">BossStack - Big Corporations/Holdings</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('advisory') }}">Hướng dẫn cá nhân</a></li>
                        <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-xl-2">
                <ul class="language">
                    <li class="sign-in">
                        <a href="{{ route('login') }}" style="color: #2D5DA9; font-weight: bold;">Đăng nhập</a>
                    </li>
                    <li class="sign-in" style="padding: 12px 0px;">
                        <a href="{{ route('customers-register') }}" style="color: #fff; font-weight: bold; padding: 8px 13px; display: inline-block;background-color: #2D5DA9; border-radius: 5px;">Đăng ký</a>
                    </li>
                    <!-- <li class="select-language">
                        <form action="">
                            <div class="form-group">
                                <select class="form-control">
                                    <option>Chọn ngôn ngữ</option>
                                    <option>Vietnamese</option>
                                    <option>English</option>
                                </select>
                            </div>
                        </form>
                    </li> -->
                    <!-- <li>
                        <a href="#">
                            <img src="{{ asset('img/vietnam.png') }}">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('img/english.png') }}">
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</div>


