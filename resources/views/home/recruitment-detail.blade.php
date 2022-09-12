@extends('home.layout')

@section('content')

	<section class="element-section element-bg-1 element-recruitment-detail">

		<div class="bg-bottom-right"></div>

		<div class="container">
			
			<div class="info-recruitment mb-5">
				<div class="row mb-3">
					<div class="col-md-4">
						<div class="info-recruitment-item">
							<span class="icon">
								<img src="{{ asset('img/recruitment-01.png') }}">
							</span>
							<span class="text">PHÒNG BAN: Thiết kế</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info-recruitment-item">
							<span class="icon">
								<img src="{{ asset('img/recruitment-02.png') }}">
							</span>
							<span class="text">CHỨC VỤ: Nhân viên</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info-recruitment-item">
							<span class="icon">
								<img src="{{ asset('img/recruitment-03.png') }}">
							</span>
							<span class="text">LƯƠNG: Thỏa thuận</span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="info-recruitment-item">
							<span class="icon">
								<img src="{{ asset('img/recruitment-04.png') }}">
							</span>
							<span class="text">ĐỊA ĐIỂM: Hồ Chí Minh</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info-recruitment-item">
							<span class="icon">
								<img src="{{ asset('img/recruitment-05.png') }}">
							</span>
							<span class="text">KINH NGHIỆM: 2 năm</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="info-recruitment-item">
							<span class="icon">
								<img src="{{ asset('img/recruitment-06.png') }}">
							</span>
							<span class="text">BẰNG CẤP: Kỹ sư</span>
						</div>
					</div>
				</div>
			</div>

			<h1 class="mb-3"><font size="5">MÔ TẢ CÔNG VIỆC</font></h1>

			<div class="description mb-5 text-justify">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
			</div>

			<h1 class="mb-3"><font size="5">YÊU CẦU CÔNG VIỆC</font></h1>

			<div class="description mb-5 text-justify">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
			</div>

			<div class="form-recruitment">
				<form action="">
					<div class="row mb-4">
						<div class="col-md-4">
							<input type="text" class="form-control" name="name" placeholder="Họ tên*" required="">
						</div>
						<div class="col-md-4">
							<input type="text" class="form-control" name="phone" placeholder="Số điện thoại*" required="">
						</div>
						<div class="col-md-4">
							<input type="email" class="form-control" name="email" placeholder="Email*" required="">
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-12">
							<input type="text" class="form-control" name="address" placeholder="Địa chỉ">
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-12">
							<font size="3" color="#1a1f53" style="display: inline-block;"><b>Gửi CV của bạn:</b></font>
							<input type="file" class="form-control-file" id="exampleFormControlFile1" name="cv" required="">
						</div>
					</div>

					<button type="submit" class="btn btn-recruitment-detail">Ứng tuyển</button>
				</form>
			</div>
			
		</div>

	</section>

@endsection

@section('scripts')
	@include('home.partials.script')
@endsection