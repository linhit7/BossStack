@extends('home.layout')

@section('content')

	<section class="element-section element-bg-14 predict-index-1 clearfix position-relative">
		<div class="predict-index-img"></div>

		<div class="container">
			
			<div class="predict-index-1-text">
				<h1 class="mb-4 text-center text-sm-left"><font size="6">MỘT CÁI NHÌN SÂU SẮC VÀO THỊ TRƯỜNG TÀI CHÍNH</font></h1>

				<p class="text-justify">Một trong những yếu tố quan trọng khi đầu tư chính là nắm bắt được xu hướng cũng như những thông tin biến chuyển quan trọng của thị trường tài chính. Tại <b>LAMIANS</b>, chúng tôi thường xuyên cung cấp những tin tức thị trường nổi bật mà bạn cần nắm bắt khi đầu tư. Ngoài ra, chúng tôi cũng sẽ cung cấp các thông tin về các sản phẩm tốt nhất của các Quỹ đầu tư tại thị trường Việt Nam.</p>
			</div>

		</div>
	</section>

	<section class="element-section element-bg-15 predict-index-2">
		<div class="container">
			
			<div class="row d-flex">
				<div class="col-md-7 col-12 mb-4 mb-sm-0 align-self-center">
					<div class="item mb-5">
						<span class="icon">
							<img src="{{ asset('img/predict-index-4.png') }}" width="100%">
						</span>
						<span class="text text-justify"><b>Đầy đủ và nhanh chóng.</b> Chúng tôi cung cấp những tin tức thị trường tài chính đầy đủ, kịp thời nhất nhằm hỗ trợ việc đầu tư của khách hàng.</span>
					</div>

					<div class="item mb-5">
						<span class="icon">
							<img src="{{ asset('img/predict-index-5.png') }}" width="100%">
						</span>
						<span class="text text-justify"><b>Dễ nhìn, dễ đọc.</b> Tin tức và thông tin thị trường tài chính được chúng tôi thiết kế với suy nghĩ muốn đem lại giao diện thân thiện nhất với người dùng.</span>
					</div>

					<div class="item">
						<span class="icon">
							<img src="{{ asset('img/predict-index-3.png') }}" width="100%">
						</span>
						<span class="text text-justify"><b>Thông tin mang tính xác thực cao.</b> Những thông tin chúng tôi cung cấp cho khách hàng đều có nguồn gốc chính thống và được chọn lựa kỹ lưỡng bởi dàn nhân viên kinh nghiệm cao trong ngành tài chính.</span>
					</div>
				</div>
				<div class="col-md-5 col-12">
					<img src="{{ asset('img/predict-index-2.png') }}" width="100%">
				</div>
			</div>

		</div>
	</section>

	<section class="element-section element-bg-1 predict-index-3 position-relative">
		<div class="predict-index-3-default">
			<div class="container">
				
				<div class="row">
					<div class="col-md-12" style="z-index: 2;">
						<h1 class="mb-4 text-center"><font size="6">NẮM BẮT THÔNG TIN TÀI CHÍNH ĐỂ PHỤC VỤ ĐẦU TƯ</font></h1>

						<p class="text-justify">Cho dù khách hàng lựa chọn danh mục đầu tư nào, khi chọn sử dụng dịch vụ nhận thông tin về đầu tư, bạn sẽ được cung cấp đầy đủ nhất những tin tức chính xác trong thị trường tài chính. Đội ngũ nhân viên nhiều năm kinh nghiệm của <b>LAMIANS</b> luôn hỗ trợ khách hàng những thông tin được chọn lọc rõ ràng, chặt chẽ, nhằm đem lại cho bạn góc nhìn sắc nét và xuyên thấu nhất về Quỹ đầu tư và thị trường chứng khoán.</p>
					</div>
				</div>

			</div>
		</div>

		<div class="bg-bottom-right"></div>
	</section>

@endsection

@section('scripts')
	@include('home.partials.script')
@endsection