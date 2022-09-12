@extends('home.layout')

@section('content')

	<section class="element-section element-bg-1 saving-1">
		<div class="container">
			
			<div class="row">
				<div class="col-md-4 col-12 mb-4 mb-sm-0">
					<div class="saving-1-item text-center">
						<div class="icon mb-4">
							<img src="{{ asset('img/saving-1.png') }}" width="20%">
						</div>
						<div class="text text-justify">
							<font size="3" color="#1a1f53"><b>Quản lý ví tiền.</b> Chức năng quản lý ví tiền của hệ thống sẽ giúp bạn quản lý dòng tiền chi tiêu một cách chặt chẽ, để từ đó loại bỏ những chi phí không cần thiết, đồng thời cùng lúc để quản lý nhiều mục tiêu tài chính của mình.</font>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-12 mb-4 mb-sm-0">
					<div class="saving-1-item text-center">
						<div class="icon mb-4">
							<img src="{{ asset('img/saving-2.png') }}" width="20%">
						</div>
						<div class="text text-justify">
							<font size="3" color="#1a1f53"><b>Thao tác đơn giản.</b> Hệ thống Dòng tiền cá nhân được phát triển với giao diện thân thiện cho khách hàng dễ dàng nhập các thông tin cần thiết để phân tích dữ liệu tài chính cá nhân một cách chi tiết rõ ràng.</font> 
						</div>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<div class="saving-1-item text-center">
						<div class="icon mb-4">
							<img src="{{ asset('img/saving-3.png') }}" width="20%">
						</div>
						<div class="text text-justify">
							<font size="3" color="#1a1f53"><b>Tiết kiệm để bù đắp số tiền còn thiếu.</b> <b>LAMIANS</b> sẽ phân tích dòng tiền hiện tại chi tiết nhằm giúp bạn có được cái nhìn tổng thể về tài sản nợ/có, về mục tiêu tài chính, về số tiền thiếu hụt cần bù đắp.</font>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="element-section element-price-list saving-2 position-relative">
		<div class="saving-2-img"></div>

		<div class="container">
			
			<div class="row">
				<div class="col-md-5 col-12">
					<h1 class="text-center text-sm-right mb-5"><font size="6" color="#fff">TƯƠNG LAI TƯƠI ĐẸP TỪ NHỮNG ĐỒNG TIỀN NHỎ NHẤT!</font></h1>
					<p class="text-justify mb-0" style="color: #fff;">Việc nâng cao dòng tiền cá nhân của bạn xuất phát từ những đồng tiền nhỏ nhất. Và thao tác đơn giản nhất mà bất kì ai cũng có thể thực hiện đó chính là tiết kiệm. Bằng cách trích một phần nhỏ thu nhập để gửi tiết kiệm, bạn có thể hóa chúng thành những quỹ tiền “ngủ quên” tăng lên theo thời gian, nhưng chúng chính là những bước gạch đầu tiên để xây dựng một tương tai tài chính vững chắc.</p>
				</div>
			</div>

		</div>
	</section>

	<section class="element-section element-bg-13 saving-3">
		<div class="container">
			
			<div class="row d-flex">
				<div class="col-md-5 col-12">
					<img src="https://fiinves.vn/public/img/saving-5.png" width="100%">
				</div>
				<div class="col-md-7 col-12 align-self-center">
					<div class="saving-3-right">
						<div class="text text-justify">
							<h1 class="mb-3"><font size="6">CÁC NGÂN HÀNG ĐÁNG TIN CẬY</font></h1>
							<p>Hệ thống Dòng tiền cá nhân cung cấp cho người dùng nhiều thông tin bổ ích về các gói tiết kiệm với kỳ hạn và lãi suất khác nhau từ nhiều ngân hàng uy tín. Chức năng này đem lại cho bạn quyền kiểm soát hơn trong việc lựa chọn gói tiết kiệm phù hợp nhất với mình.</p>
						</div>

						<div class="carousel-saving">
							<div class="owl-carousel owl-theme carousel-items">
		                        <div class="item"><img class="" src="{{ asset('img/bank_1.png') }}" alt=""></div>
		                        <div class="item"><img class="" src="{{ asset('img/bank_2.png') }}" alt=""></div>
		                        <div class="item"><img class="" src="{{ asset('img/bank_3.png') }}" alt=""></div>
		                        <div class="item"><img class="" src="{{ asset('img/bank_4.png') }}" alt=""></div>
		                        <div class="item"><img class="" src="{{ asset('img/bank_5.png') }}" alt=""></div>
		                        <div class="item"><img class="" src="{{ asset('img/bank_1.png') }}" alt=""></div>
		                        <div class="item"><img class="" src="{{ asset('img/bank_2.png') }}" alt=""></div>
		                        <div class="item"><img class="" src="{{ asset('img/bank_3.png') }}" alt=""></div>
		                        <div class="item"><img class="" src="{{ asset('img/bank_4.png') }}" alt=""></div>
		                        <div class="item"><img class="" src="{{ asset('img/bank_5.png') }}" alt=""></div>
		                    </div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

@endsection

@section('scripts')
	@include('home.partials.script')
@endsection