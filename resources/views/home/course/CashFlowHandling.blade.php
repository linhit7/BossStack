@extends('home.layout')

@section('head')
<style type="text/css">
    #main-fund{
    	background-color: #e8e8e8;
    }
</style>
@endsection

@section('content')

<div class="fiinves-coaching first">
@if(isset($infor))
    <section class="element-section element-section-course course-intro">
        <div class="container">
            <div class="wrap bg-gray">
                <div class="row">
                    <font size="4" color="#ff0000">
                        {{ $infor }}
                    </font>
                </div>
            </div>
        </div>
    </section>
@endif
    <section class="element-section element-section-course element-bg-14 predict-index-1 clearfix position-relative course-preface course-experience course-pdx-135">
        <div class="predict-index-img"></div>

        <div class="container">
            <h2 class="title mb-3">Coaching này dành cho bạn:</h2>
            <div class="list">
                <div class="list-item">
                    <ul>
                        <li>
                            <span class="icon">
                                <img src="{{ asset('img/course-4.png') }}">
                            </span>
                            <span class="text"> Chưa biết cách vạch rõ hướng đi tài chính cuộc đời.</span>
                        </li>

                        <li>
                            <span class="icon">
                                <img src="{{ asset('img/course-4.png') }}">
                            </span>
                            <span class="text">Làm thế nào để có một công việc bằng đam mê sau khi ra trường.</span>
                        </li>

                        <li>
                            <span class="icon">
                                <img src="{{ asset('img/course-4.png') }}">
                            </span>
                            <span class="text">Chưa biết cách xử lý thu nhập, trả nợ, tiết kiệm lập quỹ dự phòng hiệu quả.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="element-section element-section-course course-menu">
        <div class="container">
            <div class="wrap">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <ul>
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Nội dung khóa học</a></li>
                            <li><a href="#">Ứng dụng Fiinves</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <section class="element-section element-section-course courser-image-bg course-experience">
        <div class="container">
            <div class="wrap">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="title">Coaching này sẽ giúp bạn:</h2>
                        <div class="list">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="list-item">
                                        <ul>
                                            <li>
                                                <span class="icon">
                                                    <img src="{{ asset('img/course-4.png') }}">
                                                </span>
                                                <span class="text">Có cái nhìn rõ ràng về bức tranh tài chính cuộc đời.</span>
                                            </li>

                                            <li>
                                                <span class="icon">
                                                    <img src="{{ asset('img/course-4.png') }}">
                                                </span>
                                                <span class="text">Phát triển chuyên môn đam mê thật thật giỏi để xây dựng một công thức kiếm tiền.</span>
                                            </li>

                                            <li>
                                                <span class="icon">
                                                    <img src="{{ asset('img/course-4.png') }}">
                                                </span>
                                                <span class="text">Hiện rõ con đường, cách thức để bạn xây dựng Quỹ hưu trí, tiến tới việc Nghỉ hưu sớm.</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="element-section element-section-course course-about">
        <div class="container">
            <div class="wrap bg-gray">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <!-- <h2 class="title">Giới thiệu khóa học</h2> -->
                        <div class="content">
                            <p class="highlight-text --italic"><b>Coaching này sẽ giúp bạn:</b></p>
                            <p>
                                <i class="fas fa-check"></i>Có cái nhìn rõ ràng về bức tranh tài chính cuộc đời.<br>
                                <i class="fas fa-check"></i>Phát triển chuyên môn đam mê thật giỏi để xây dựng một công thức kiếm tiền.<br>
                                <i class="fas fa-check"></i>Hiện rõ con đường, cách thức để bạn xây dựng Quỹ hưu trí, tiến tới việc Nghỉ hưu sớm.<br>
                            </p>
                            <p class="highlight-text --italic"><b>Bạn có:</b></p>
                            <p>
                                <i class="fas fa-check"></i>1 Buổi Coach 1:1 cùng coach Chau Pham.<br>
                                <i class="fas fa-check"></i>1 năm sử dụng miễn phí tài khoản BossStack gói Cá nhân – Giải pháp tài chính cho dòng tiền của bạn với giá: <b>1.188.000 đồng</b>.<br>
                                <i class="fas fa-check"></i>1 chương trình làm sạch tài chính cơ bản và chuyên sâu.<br>
                            </p>
                            <p class="highlight-text">Hãy đến với khóa học <b>"Coaching 1:1 - Xử Lý Dòng Tiền"</b> tại BossStack!</p>
                            <p><i class="fas fa-check"></i>Khóa học "Coaching 1:1 - Xử Lý Dòng Tiền"  được chia sẻ bởi đội ngũ chuyên gia BossStack, được tổng hợp từ kiến thức chuyên môn và kinh nghiệm thực tiễn với phương pháp BossStack Money Pro, kiến thức nền tảng và nâng cao về tài chính đầu tư hiệu quả nhằm phát triển đa dòng tiền.</p>
                            <p><i class="fas fa-check"></i>Với coaching trực tiếp 1:1 cùng chuyên gia BossStack, kết hợp sử dụng ứng dụng giúp các BossStacker có thể thiết lập được toàn bộ mục tiêu tài chính, quản lý thu chi, phát triển danh mục tài sản thực, theo dõi tiến độ tất cả các dòng tiền hiện tại, phân bổ nguồn tiền một cách hợp lý, thực hiện đầu tư và xử lý các vấn đề khác về Tiền một cách có hệ thống.</p>
                            <p class="highlight-text">Vậy còn chờ gì nữa, trở thành thành viên BossStacker ngay hôm nay với khóa học <b>"Coaching 1:1 - Xử Lý Dòng Tiền"</b> tại BossStack thôi!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="element-section element-section-course course-content">
        <div class="container">
            <div class="wrap bg-gray">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="title">Nội dung bài học</h2>
                        <div class="catalog">
                            <div class="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <img src="{{ asset('img/course-5.png') }}">
                                            Phần 1: Kiến thức nền tảng
                                        </button>
                                      </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                                      <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="#">
                                                            <img src="{{ asset('img/course-6.png') }}">
                                                        </a>
                                                        Bài 1: Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                                    </td>
                                                    <td>Học thử</td>
                                                    <td>02:46</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                      </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <img src="{{ asset('img/course-5.png') }}">
                                            Phần 2: Kiến thức nền tảng
                                        </button>
                                      </h2>
                                    </div>

                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
                                      <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="#">
                                                            <img src="{{ asset('img/course-6.png') }}">
                                                        </a>
                                                        Bài 2: Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                                    </td>
                                                    <td>Học thử</td>
                                                    <td>02:46</td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="#">
                                                            <img src="{{ asset('img/course-6.png') }}">
                                                        </a>
                                                        Bài 3: Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                                    </td>
                                                    <td></td>
                                                    <td>02:46</td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="#">
                                                            <img src="{{ asset('img/course-6.png') }}">
                                                        </a>
                                                        Bài 4: Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                                    </td>
                                                    <td></td>
                                                    <td>02:46</td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="#">
                                                            <img src="{{ asset('img/course-6.png') }}">
                                                        </a>
                                                        Bài 5: Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                                    </td>
                                                    <td></td>
                                                    <td>02:46</td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="#">
                                                            <img src="{{ asset('img/course-6.png') }}">
                                                        </a>
                                                        Bài 6: Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                                    </td>
                                                    <td></td>
                                                    <td>02:46</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="element-section element-price-list element-section-course course-form">
        <div class="container">
            <div class="wrap">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="course-form-title">
                            <h1 class="title"><b>ĐĂNG KÝ CHỈ TRONG 30 GIÂY</b></h1>
                            <h4 class="subtitle">CHƯƠNG TRÌNH DÀNH RIÊNG CHO BẠN VÀ CHỈ BẠN</h4>
                        </div>
                        <form role="form" action="{{ route('coaching-store') }}?continue=true" method="post" id="frm">
                        {{ csrf_field() }}
                            <input type='hidden' name='course' value='4'>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="text" name="fullname" placeholder="Họ tên" value="{{ old('fullname') }}">
                                    @if($errors->has('fullname'))<span class="text-danger">{{ $errors->first('fullname') }}</span>@endif
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                                    @if($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span>@endif
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control" type="text" name="phone" placeholder="Số điện thoại" value="{{ old('phone') }}">
                                    @if($errors->has('phone'))<span class="text-danger">{{ $errors->first('phone') }}</span>@endif
                                </div>
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="text" name="title" placeholder="Tiêu đề"  value="{{ old('title') }}">
                                @if($errors->has('title'))<span class="text-danger">{{ $errors->first('title') }}</span>@endif
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="content" placeholder="Thông điệp của bạn.....">{{ old('content') }}</textarea>
                                @if($errors->has('content'))<span class="text-danger">{{ $errors->first('content') }}</span>@endif
                            </div>

                            <button type="submit" class="btn btn-primary course-register">ĐĂNG KÝ THAM GIA</button>
                        </form>

                        <p class="course-form-note">Hoặc vui lòng liên hệ Hotline: 0918 905 500 để nhận nhiều quà tặng ưu đãi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="element-section element-section-course course-qr">
        <div class="container">
            <div class="wrap">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="qr-code">
                            <img src="{{ asset('img/course-7.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
    @include('home.partials.script')
@endsection