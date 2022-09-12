@extends('home.layout')

@section('head')
<style type="text/css">
    #main-fund{
    	background-color: #e8e8e8;
    }
</style>
@endsection

@section('content')

<div class="bigcorp">
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
				<div class="row align-items-center justify-content-center"">
					<div class="col-md-4 col-12">
						<div class="item">
							<div class="image">
								<img src="{{ asset('img/icon-course-intro-7.png') }}">
							</div>
							<p class="desc">Kiểm soát thất thoát </p>
						</div>

						<div class="item">
							<div class="image">
								<img src="{{ asset('img/icon-course-intro-8.png') }}">
							</div>
							<p class="desc">Tối ưu hóa chi phí </p>
						</div>

						<div class="item">
							<div class="image">
								<img src="{{ asset('img/icon-course-intro-9.png') }}">
							</div>
							<p class="desc">Tự động hóa quy trình quản lý </p>
						</div>
					</div>
					<div class="col-md-4 col-12 text-center">
						<img class="img-fluid" src="{{ asset('img/course-intro-3.png') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="element-section element-section-course courser-image-bg course-experience">
		<div class="container">
			<div class="wrap">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="title">Big Corporations/Holdings sẽ nhận được gì?</h2>
						<div class="list">
							<div class="row">
								<div class="col-md-6 col-12">
									<div class="list-item">
										<ul>
											<li>
												<span class="icon">
													<img src="{{ asset('img/icon-4.png') }}">
												</span>
												<span class="text">Hoàn thiện sơ đồ tổ chức, phòng ban và quy trình làm việc chuẩn </span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/icon-4.png') }}">
												</span>
												<span class="text">Xây dựng chiến lược tài chính </span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/icon-4.png') }}">
												</span>
												<span class="text">Hỗ trợ doanh nghiệp áp dụng hoàn toàn công nghệ vào quy trình quản lý và vận hành </span>
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
												<span class="text">Thiết lập các đòn bẩy nhằm tối đa hóa lợi nhuận cho doanh nghiệp</span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/icon-4.png') }}">
												</span>
												<span class="text">Xây dựng quy trình kiểm soát đầu vào tránh thất thoát cho doanh nghiệp </span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/icon-4.png') }}">
												</span>
												<span class="text">Tối ưu hoá chi phí và gia tăng chất lượng dữ liệu hệ thống</span>
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
							<!-- <div class="row mb-3">
								<div class="col-md-6 col-12">
									<p class="highlight-text --italic"><b>Có phải bạn là:</b></p>

									<ul>
										<li>
											<span class="icon">
												<img src="{{ asset('img/course-4.png') }}">
											</span>
											<span class="text">Bạn là người có chuyên môn tốt, công việc ổn định nhưng đang lo lắng về việc mua nhà, mua xe hay khởi nghiệp?</span>
										</li>

										<li>
											<span class="icon">
												<img src="{{ asset('img/course-4.png') }}">
											</span>
											<span class="text">Bạn kinh doanh tự do, nhưng việc quản lý tiền bạc cần chi tiết và mất nhiều thời gian và bạn cần thời gian để thực hiện các kế hoạch khác của mình.</span>
										</li>

										<li>
											<span class="icon">
												<img src="{{ asset('img/course-4.png') }}">
											</span>
											<span class="text">Bạn là nhà đầu tư, nhưng chưa có hệ thống hoạch định các dòng tiền sao cho khớp với các mục tiêu tài chính cho bản thân và gia đình.</span>
										</li>

										<li>
											<span class="icon">
												<img src="{{ asset('img/course-4.png') }}">
											</span>
											<span class="text">Bạn là chủ doanh nghiệp, dòng tiền gia đình, doanh nghiệp, đầu tư cá nhân... đang phức tạp, và bạn muốn có một hệ thống phân rõ ràng từng mục nhỏ để theo sát tiến độ theo tính chất đặc thù dòng tiền của bạn.</span>
										</li>
									</ul>
								</div>

								<div class="col-md-6 col-12">
									<p class="highlight-text --italic"><b>Hay bạn đang muốn:</b></p>
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
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 col-12">
									<p class="highlight-text">Hãy đến với khóa học <b>"BossStack Money Pro"</b> tại BossStack Coaching!</p>
									<p><i class="fas fa-check"></i>Khóa học "BossStack Money Pro"  được chia sẻ bởi đội ngũ chuyên gia BossStack Coaching, được tổng hợp từ kiến thức chuyên môn và kinh nghiệm thực tiễn với phương pháp BossStack Money Pro, kiến thức nền tảng về tài chính cá nhân vô cùng hiệu quả và phù hợp cho người mới.</p>
									<p><i class="fas fa-check"></i>Với nội dung ngắn gọn, dễ hiểu, kết hợp lý thuyết và bài tập thực hành giúp các BossStacker có thể nắm bắt những kiến thức cơ bản tài chính cá nhân, thay đổi tư duy về Tiền một cách tích cực, sắp xếp một đời sống tài chính an toàn và hướng đến một cuộc sống tự do như mong muốn.</p>
									<p class="highlight-text">Vậy còn chờ gì nữa, trở thành thành viên BossStacker ngay hôm nay với khóa học <b>"BossStack Money Pro"</b> tại BossStack Coaching thôi!</p>
								</div>
							</div> -->

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
						        			Bài 1: Định mức an toàn tài chính
						        		</td>
					        			<!-- <td>Học thử</td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 2: Gắn kết giữa mong muốn cuộc đời & tài chính
						        		</td>
					        			<!-- <td>Học thử</td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 3: Thiết lập tất cả mục tiêu tài chính trong sơ đồ tiền
						        		</td>
					        			<!-- <td></td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 4: Phân tích và phân bổ từng dòng tiền riêng biệt
						        		</td>
					        			<!-- <td></td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 5: Đầu tư và tạo ra các dòng tiền thặng dư
						        		</td>
					        			<!-- <td></td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 6: Dòng tiền và Kế hoạch hưu trí 
						        		</td>
					        			<!-- <td></td>
					        			<td>02:46</td> -->
					        		</tr>

					        		<tr>
					        			<td>
					        				<a href="#">
					        					<img src="{{ asset('img/course-6.png') }}">
					        				</a>
						        			Bài 7: Phương pháp BossStack Money Pro
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
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- <section class="element-section element-price-list saving-2 position-relative">
		<div class="saving-2-img"></div>

		<div class="container">
			
			<div class="row">
				<div class="col-md-5 col-12">
					<h1 class="text-center text-sm-right mb-5"><font size="6" color="#fff">TƯƠNG LAI TƯƠI ĐẸP TỪ NHỮNG ĐỒNG TIỀN NHỎ NHẤT!</font></h1>
					<p class="text-justify mb-0" style="color: #fff;">Xây dựng đời sống tài chính lành mạnh cho nhân viên của một doanh nghiệp là một hành động thiết thực. BossStack cung cấp nền tảng nhằm nâng cao dòng tiền cá nhân của đội ngũ Nhân sự Doanh nghiệp bằng việc thay đổi tư duy, thay đổi quan điểm từ những đồng tiền nhỏ nhất. Và thao tác đơn giản nhất mà bất kì ai cũng có thể thực hiện đó chính là tiết kiệm. Bằng cách trích một phần nhỏ thu nhập để gửi tiết kiệm, bạn có thể hóa chúng thành những quỹ tiền “ngủ quên” tăng lên theo thời gian, nhưng chúng chính là những bước gạch đầu tiên để xây dựng một tương tai tài chính vững chắc.</p>
				</div>
			</div>

		</div>
	</section> -->

	<!-- <section class="element-section element-section-course course-experience">
		<div class="container">
			<div class="wrap bg-gray">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="title">Doanh nghiệp sẽ nhận được gì?</h2>
						<div class="list">
							<div class="row align-items-center">
								<div class="col-md-4 col-12">
									<div class="course-img">
										<img src="{{ asset('img/course-8.png') }}">
									</div>
								</div>

								<div class="col-md-8 col-12">
									<div class="list-item">
										<ul>
											<li>
												<span class="icon">
													<img src="{{ asset('img/course-4.png') }}">
												</span>
												<span class="text">Sở hữu user có những tính năng ưu việt về Tài chính Đầu tư.</span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/course-4.png') }}">
												</span>
												<span class="text">BossStack thực hiện tổ chức khoá Coaching về Tiền miễn phí (4 giờ) với số lượng tham gia không giới hạn.</span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/course-4.png') }}">
												</span>
												<span class="text">Tặng 3 user VIP cho Doanh nghiệp đăng ký từ 100+ user.</span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/course-4.png') }}">
												</span>
												<span class="text">Giảm 50% khi đăng ký mua gói 12 tháng cho các user thành viên.</span>
											</li>

											<li>
												<span class="icon">
													<img src="{{ asset('img/course-4.png') }}">
												</span>
												<span class="text">Tư vấn và hỗ trợ hướng dẫn sử dụng ứng dụng BossStack.</span>
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
							<h4 class="subtitle">Hãy để BossStack giúp <span><b>"Chẩn đoán"</b></span> và <span><b>"Giải quyết"</b></span> khó khăn của bạn</h4>
						</div>
						<form role="form" action="{{ route('coaching-store') }}?continue=true" method="post" id="frm">
						{{ csrf_field() }}
							<input type='hidden' name='course' value='3'>
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