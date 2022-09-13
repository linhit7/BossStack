@extends('home.layout')

@section('head')
<style type="text/css">
    #main-fund{
    	background-color: #e8e8e8;
    }
</style>
@endsection

@section('content')

<div class="fiinves-coaching third">
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
            <h2 class="title mb-3">Coaching này dành cho những người dẫn đầu, doanh nhân:</h2>
            <div class="list">
                <div class="list-item">
                    <ul>
                        <li>
                            <span class="icon">
                                <img src="{{ asset('img/course-4.png') }}">
                            </span>
                            <span class="text">Dòng tiền phức tạp, chủ doanh nghiệp đầu tư, kinh doanh nhiều lĩnh vực.</span>
                        </li>

                        <li>
                            <span class="icon">
                                <img src="{{ asset('img/course-4.png') }}">
                            </span>
                            <span class="text">Người có thu nhập cao trên xxx/tháng nhưng chưa phân bổ được hợp lý.</span>
                        </li>

                        <li>
                            <span class="icon">
                                <img src="{{ asset('img/course-4.png') }}">
                            </span>
                            <span class="text">Dòng tiền đang âm và hiện đang có nhiều khoản nợ.</span>
                        </li>

                        <li>
                            <span class="icon">
                                <img src="{{ asset('img/course-4.png') }}">
                            </span>
                            <span class="text">Dòng tiền dương nhưng số tiền nhàn rỗi chưa thực sự tối ưu.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="element-section element-section-course course-about">
        <div class="container">
            <div class="wrap bg-gray">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="content">
                            <p class="highlight-text --italic"><b>Coaching này sẽ giúp bạn:</b></p>
                            <p>
                                <i class="fas fa-check"></i>Nghiên cứu phương pháp xử lý dòng tiền âm chuyển sang dòng tiền dương.<br>
                                <i class="fas fa-check"></i>Cơ cấu lại tài sản nợ và cùng nhau nhìn lại bức tranh đầu tư (nếu có).<br>
                                <i class="fas fa-check"></i>Thực hiện đầu tư cho lượng tiền nhàn rỗi có tỷ suất sinh lời cao hơn.<br>
                                <i class="fas fa-check"></i>Giữ tiền và bài toán an toàn hơn cho tài sản hiện tại.<br>
                                <i class="fas fa-check"></i>Xử lý đa dòng tiền một cách có kế hoạch để đảm bảo các mục tiêu tài chính.<br>
                            </p>
                            <p class="highlight-text --italic"><b>Bạn có:</b></p>
                            <p>
                                <i class="fas fa-check"></i>1 Buổi Coach 1:1 cùng nhau cơ cấu lại Danh mục Tài sản Nợ.<br>
                                <i class="fas fa-check"></i>1 Buổi Coach 1:1 xử lý Đa Dòng tiền và An toàn tài chính.<br>
                                <i class="fas fa-check"></i>1 Buổi Coach 1:1 về Tăng trưởng Dòng tiền Đầu tư.<br>
                                <i class="fas fa-check"></i>1 năm sử dụng miễn phí tài khoản BossStack gói VIP – Giải pháp tài chính cho dòng tiền của bạn với giá: <b>11.988.000 đồng</b>.<br>
                                <i class="fas fa-check"></i>1 chương trình làm sạch tài chính cơ bản và chuyên sâu.</br>
                                <i class="fas fa-check"></i>Nhận được danh mục đầu tư khuyến nghị hằng tháng trong 1 năm.</br>
                                <i class="fas fa-check"></i>Thiết lập danh mục đầu tư ban đầu.</br>
                                <i class="fas fa-check"></i>Đánh giá dòng tiền mỗi quý/lần.</br>
                            </p>
                            <p class="highlight-text">Hãy đến với khóa học <b>"Coaching 1:1 - Tăng Trưởng Đa Dòng Tiền"</b> tại BossStack!</p>
                            <p><i class="fas fa-check"></i>Khóa học "Coaching 1:1 - Tăng Trưởng Đa Dòng Tiền"  được chia sẻ bởi đội ngũ chuyên gia BossStack, được tổng hợp từ kiến thức chuyên môn và kinh nghiệm thực tiễn với phương pháp BossStack Money Pro, kiến thức nền tảng và nâng cao về tài chính đầu tư hiệu quả nhằm phát triển đa dòng tiền.</p>
                            <p><i class="fas fa-check"></i>Với coaching trực tiếp 1:1 cùng chuyên gia BossStack, kết hợp sử dụng ứng dụng giúp các BossStacker có thể thiết lập được toàn bộ mục tiêu tài chính, quản lý thu chi, phát triển danh mục tài sản thực, theo dõi tiến độ tất cả các dòng tiền hiện tại, phân bổ nguồn tiền một cách hợp lý, thực hiện đầu tư và xử lý các vấn đề khác về Tiền một cách có hệ thống.</p>
                            <p class="highlight-text">Vậy còn chờ gì nữa, trở thành thành viên BossStacker ngay hôm nay với khóa học <b>"Coaching 1:1 - Tăng Trưởng Đa Dòng Tiền"</b> tại BossStack thôi!</p>
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
                            <input type='hidden' name='course' value='6'>
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