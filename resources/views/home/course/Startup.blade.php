@extends('home.layout')

@section('head')
<style type="text/css">
    #main-fund{
    	background-color: #e8e8e8;
    }
</style>
@endsection

@section('content')

<div class="startup">
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
        
	<section class="element-section element-section-course course-intro">
		<div class="container">
			<div class="wrap">
				<div class="row align-items-center justify-content-center">
					<div class="col-md-4 col-12">
						<div class="item">
							<div class="image">
								<img src="{{ asset('img/icon-course-intro-1.png') }}">
							</div>
							<p class="desc">Đánh giá tình trạng tài chính</p>
						</div>

						<div class="item">
							<div class="image">
								<img src="{{ asset('img/icon-course-intro-2.png') }}">
							</div>
							<p class="desc">Cung cấp hệ thống vận hành</p>
						</div>

						<div class="item">
							<div class="image">
								<img src="{{ asset('img/icon-course-intro-3.png') }}">
							</div>
							<p class="desc">Công cụ kiểm soát dòng tiền</p>
						</div>
					</div>
					<div class="col-md-4 col-12 text-center">
						<img class="img-fluid" src="{{ asset('img/course-intro-1.png') }}" alt="">
					</div>
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
							<li><a href="#">Ứng dụng BossStack Coaching</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<section class="element-section element-section-course courser-image-bg course-experience">
		<div class="container">
			<div class="wrap">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="title">Start-Up sẽ nhận được gì?</h2>
						<div class="list">
							<div class="row">
								<div class="col-md-6 col-12">
									<div class="list-item">
										<ul>
											<li>
												<span class="icon">
													<img src="{{ asset('img/icon-4.png') }}">
												</span>
												<span class="text">Thiết lập các báo cáo tài chính quan trọng</span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/icon-4.png') }}">
												</span>
												<span class="text">Quản trị quỹ thời gian hợp lý nhằm nâng cao hiệu quả sản xuất và kết quả kinh doanh nhanh chóng</span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/icon-4.png') }}">
												</span>
												<span class="text">Giúp chủ doanh nghiệp bổ sung thêm kiến thức, kinh nghiệm về  hoạt động quản trị</span>
											</li>
										</ul>
									</div>
								</div>

								<div class="col-md-6 col-12">
									<div class="list-item">
										<ul>
											<li>
												<span class="icon">
													<img src="{{ asset('img/icon-4.png') }}">
												</span>
												<span class="text">Kiểm soát tốt dòng tiền chủ sở hữu</span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/icon-4.png') }}">
												</span>
												<span class="text">Xác định giá trị doanh nghiệp chuẩn bị cho các vòng gọi vốn tiếp theo</span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/icon-4.png') }}">
												</span>
												<span class="text"> Xây dựng mục tiêu dài hạn nhằm phát triển doanh nghiệp bền vững (tầm nhìn, sứ mệnh, văn hóa công ty, mục tiêu kinh doanh)</span>
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
	</section>

	<section class="element-section element-section-course course-about">
		<div class="container">
			<div class="wrap bg-gray">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="title">CÁC GIAI ĐOẠN DỰ ÁN COACHING</h2>
						<div class="content">
							<!-- <p class="highlight-text --italic"><b>Có phải bạn là:</b></p>
							<p>
								<i class="fas fa-check"></i>Bạn đang 20 tuổi, lo lắng không biết liệu khi ra trường có thể tìm được một công việc phù hợp đủ để trang trải cuộc sống hay không?<br>
								<i class="fas fa-check"></i>Bạn đang trong độ tuổi 30, có một công việc ổn định nhưng phải suy nghĩ về vấn đề kết hôn, nuôi con, mua nhà ở ngoại ô hay thuê nhà trong thành phố?<br>
								<i class="fas fa-check"></i>Bạn đã 40 tuổi, vẫn còn đang phân vân có nên tham gia đầu tư? Đầu tư gì? Khoản nợ vay mua nhà chưa trả hết, làm thế nào để kiếm được đủ số tiền để nhanh chóng trả hết nợ?<br>
								<i class="fas fa-check"></i>Và ở độ tuổi 50, bạn lại không an tâm vì có thể tiền lương hưu của mình chẳng thấm thía vào đâu trước tốc độ gia tăng lạm phát?
							</p>
							<p class="highlight-text --italic"><b>hay bạn đang muốn:</b></p> -->
							<ul>
								<li>
									<span class="icon">
										<img src="{{ asset('img/course-4.png') }}">
									</span>
									<span class="text">Giai đoạn 1: Xác định Mục Tiêu Dự Án</span>
								</li>

								<li>
									<span class="icon">
										<img src="{{ asset('img/course-4.png') }}">
									</span>
									<span class="text">Giai đoạn 2: Xây dựng Phạm vi Trong và Ngoài Dự Án</span>
								</li>

								<li>
									<span class="icon">
										<img src="{{ asset('img/course-4.png') }}">
									</span>
									<span class="text">Giai đoạn 3: Thiết kế Dự Án</span>
								</li>

								<li>
									<span class="icon">
										<img src="{{ asset('img/course-4.png') }}">
									</span>
									<span class="text">Giai đoạn 4: Phát triển Linh Hoạt</span>
								</li>

								<li>
									<span class="icon">
										<img src="{{ asset('img/course-4.png') }}">
									</span>
									<span class="text">Giai đoạn 5: Tích hợp Giải pháp Hệ Thống</span>
								</li>

								<li>
									<span class="icon">
										<img src="{{ asset('img/course-4.png') }}">
									</span>
									<span class="text">Giai đoạn 6: Triển khai Dự Án</span>
								</li>

								<li>
									<span class="icon">
										<img src="{{ asset('img/course-4.png') }}">
									</span>
									<span class="text">Giai đoạn 7: Hỗ trợ Sau Dự Án</span>
								</li>
							</ul>
							<!-- <p class="highlight-text">Hãy đến với khóa học <b>"COACHING VỀ TIỀN"</b> tại BossStack Coaching!</p>
							<p><i class="fas fa-check"></i>Khóa học "Coaching về Tiền" được chia sẻ bởi đội ngũ chuyên gia BossStack Coaching, được tổng hợp từ kiến thức chuyên môn và kinh nghiệm thực tiễn với phương pháp BossStack Coaching Money Pro, kiến thức nền tảng về tài chính cá nhân vô cùng hiệu quả và phù hợp cho người mới.</p>
							<p><i class="fas fa-check"></i>Với nội dung ngắn gọn, dễ hiểu, kết hợp lý thuyết và bài tập thực hành giúp các BossStacker có thể nắm bắt những kiến thức cơ bản tài chính cá nhân, thay đổi tư duy về Tiền một cách tích cực, sắp xếp một đời sống tài chính an toàn và hướng đến một cuộc sống tự do như mong muốn.</p>
							<p class="highlight-text">Vậy còn chờ gì nữa, trở thành thành viên BossStacker ngay hôm nay với khóa học <b>"COACHING VỀ TIỀN"</b> tại BossStack Coaching thôi!</p> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="element-section element-section-course course-content d-none">
		<div class="container">
			<div class="wrap bg-gray">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="title">Nội dung bài học</h2>
						<div class="catalog">
							<table class="table">
					        	<tbody>
					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 1: Bắt đầu từ những câu chuyện
						        		</td>
					        			<!-- <td>Học thử</td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 2: Chữa lành nỗi ám ảnh về tiền
						        		</td>
					        			<!-- <td>Học thử</td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 3: Xác định tình trạng tài chính hiện tại
						        		</td>
					        			<!-- <td></td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 4: Cắt giảm chi phí và bịt lỗ hổng chi tiêu
						        		</td>
					        			<!-- <td></td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 5: Xác định nợ xấu nợ tốt, và xử lý nợ
						        		</td>
					        			<!-- <td></td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 6: Dòng tiền cá nhân, những điều cần biết
						        		</td>
					        			<!-- <td></td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 7: Sơ đồ tiền, hiểu để thiết lập lối sống FIRE
						        		</td>
					        			<!-- <td></td>
					        			<td>02:46</td> -->
					        		</tr>
					        	</tbody>
					        </table>
					        
							<!-- <div class="accordion">
								<div class="card">
								    <div class="card-header" id="headingOne">
								      <h2 class="mb-0">
								        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								        	<img src="{{ asset('img/course-5.png') }}">
								        	Phần 1: Kiến thức nền tảng
								        </button>
								      </h2>
								    </div>

								    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
								      <div class="card-body">
								        <table class="table">
								        	<tbody>
								        		<tr>
								        			<td>
								        				<a href="#">
								        					<img src="{{ asset('img/course-6.png') }}">
								        				</a>
									        			Bài 1: Bắt đầu từ những câu chuyện
									        		</td>
								        			<td>Học thử</td>
								        			<td>02:46</td>
								        		</tr>

								        		<tr>
								        			<td>
								        				<a href="#">
								        					<img src="{{ asset('img/course-6.png') }}">
								        				</a>
									        			Bài 2: Chữa lành nỗi ám ảnh về tiền
									        		</td>
								        			<td>Học thử</td>
								        			<td>02:46</td>
								        		</tr>

								        		<tr>
								        			<td>
								        				<a href="#">
								        					<img src="{{ asset('img/course-6.png') }}">
								        				</a>
									        			Bài 3: Xác định tình trạng tài chính hiện tại
									        		</td>
								        			<td></td>
								        			<td>02:46</td>
								        		</tr>

								        		<tr>
								        			<td>
								        				<a href="#">
								        					<img src="{{ asset('img/course-6.png') }}">
								        				</a>
									        			Bài 4: Cắt giảm chi phí và bịt lỗ hổng chi tiêu
									        		</td>
								        			<td></td>
								        			<td>02:46</td>
								        		</tr>

								        		<tr>
								        			<td>
								        				<a href="#">
								        					<img src="{{ asset('img/course-6.png') }}">
								        				</a>
									        			Bài 5: Xác định nợ xấu nợ tốt, và xử lý nợ
									        		</td>
								        			<td></td>
								        			<td>02:46</td>
								        		</tr>

								        		<tr>
								        			<td>
								        				<a href="#">
								        					<img src="{{ asset('img/course-6.png') }}">
								        				</a>
									        			Bài 6: Dòng tiền cá nhân, những điều cần biết
									        		</td>
								        			<td></td>
								        			<td>02:46</td>
								        		</tr>

								        		<tr>
								        			<td>
								        				<a href="#">
								        					<img src="{{ asset('img/course-6.png') }}">
								        				</a>
									        			Bài 7: Sơ đồ tiền, hiểu để thiết lập lối sống FIRE
									        		</td>
								        			<td></td>
								        			<td>02:46</td>
								        		</tr>
								        	</tbody>
								        </table>
								      </div>
								    </div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="element-section element-price-list element-section-course course-form">
		<div class="container">
			<div class="wrap">
				<div class="row">
					<div class="col-md-12 col-12">
						<div class="course-form-title">
							<h1 class="title"><b>ĐĂNG KÝ CHỈ TRONG 30 GIÂY</b></h1>
							<h4 class="subtitle">Hãy để BossStack giúp <span><b>"Chẩn đoán"</b></span> và <span><b>"Giải quyết"</b></span> khó khăn của bạn</h4>
						</div>

						<form role="form" action="{{ route('coaching-store') }}?continue=true" method="post" id="frm">
							{{ csrf_field() }}
							<input type='hidden' name='course' value='1'>
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

							<button type="submit" class="btn btn-primary course-register">Đăng ký BossStack</button>
						</form>

						<p class="course-form-note">Hoặc vui lòng liên hệ Hotline: 0918 905 500 để nhận nhiều quà tặng ưu đãi.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="element-section element-section-course course-qr d-none">
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