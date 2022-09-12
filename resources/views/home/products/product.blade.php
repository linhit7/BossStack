@extends('home.layout')

@section('content')

	<div class="advantages-img"></div>	

	<section class="element-section element-bg-1 about-product-1">
		<div class="container">
			
			<div class="about-product-default">
				<div class="row">
					<div class="col-md-4 col-12">
						<div class="about-product-item">
							<img src="{{ asset('img/about-product-3.jpg') }}" width="100%">
							<div class="info">
								<h2 class="text-center mb-2">QUẢN LÝ DÒNG TIỀN CÁ NHÂN</h2>
								<p class="text-center">Vượt qua nỗi lo chi tiêu vượt tầm kiểm soát bằng phương pháp quản lý dòng tiền cá nhân đơn giản và hiệu quả nhất.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-12">
						<div class="about-product-item">
							<img src="{{ asset('img/about-product-5.jpg') }}" width="100%">
							<div class="info">
								<h2 class="text-center mb-2">TIẾT KIỆM</h2>
								<p class="text-center">Quản lý chi tiết thu chi hằng ngày, mỗi mục tiêu tài chính liên kết với một ví tiền để gia tăng dòng tiền cá nhân.</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 d-none">
						<div class="about-product-item">
							<img src="{{ asset('img/about-product-2.jpg') }}" width="100%">
							<div class="info">
								<h2 class="text-center mb-2">ĐẦU TƯ</h2>
								<p class="text-center">Gia tăng dòng thu nhập bằng các gói đầu tư đa dạng, phù hợp với nhiều mục tiêu tài chính cũng như mức chịu rủi ro khác nhau.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-12">
						<div class="about-product-item">
							<img src="{{ asset('img/about-product-4.jpg') }}" width="100%">
							<div class="info">
								<h2 class="text-center mb-2">ĐẦU TƯ</h2>
								<p class="text-center">Theo dõi các thông tin hữu ích nhằm hiểu hơn về thị trường chứng khoán cũng như có cái nhìn đúng đắn nhất về các Quỹ đầu tư.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="element-section element-bg-8 about-product-2">

		<div class="container">
			
			<div class="advantages mb-5">
				<div class="row">
					<div class="col-md-4 col-12">
						<div class="advantages-item text-center">
							<img src="{{ asset('img/about-product-7.png') }}" width="20%">
							<p class="pt-2 pb-2">Thiết lập kế hoạch tài chính tương lai với phân tích chi tiết.</p>
						</div>
					</div>
					<div class="col-md-4 col-12">
						<div class="advantages-item text-center">
							<img src="{{ asset('img/about-product-8.png') }}" width="20%">
							<p class="pt-2 pb-2">Biểu đồ chi tiết hỗ trợ bạn theo dõi cuộc sống tài chính của mình.</p>
						</div>
					</div>
					<div class="col-md-4 col-12">
						<div class="advantages-item text-center">
							<img src="{{ asset('img/about-product-6.png') }}" width="20%">
							<p class="pt-2 pb-2">Quản lý tổng thể các dòng tiền đầu tư riêng lẻ một cách chi tiết.</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="element-section element-bg-1 about-product-3 position-relative">
		<div class="bg-bottom-right"></div>

		<div class="container">

			<h1 class="text-center mb-3"><font size="6">CÁC GÓI PHÍ</font></h1>

			<p class="text-center mb-5">Tham khảo các gói phí của chúng tôi để giúp bạn tìm được giải pháp phù hợp nhất với bản thân</p>
			
			@include('home.package')

		</div>
	</section>

@endsection

@section('scripts')
	@include('home.partials.script')
@endsection