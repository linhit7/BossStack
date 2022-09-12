@extends('home.layout')

@section('content')

	<section class="element-section element-bg-17 cash-personal-1 position-relative">
		
		<div class="cash-personal-img d-none"></div>

		<div class="container">
			
			<div class="row d-flex">
				<div class="col-md-7 text-justify align-self-center">
					<h1 class="mb-4"><font size="6">GIỚI THIỆU</font></h1>
					<p>Phần mềm quản lý <b>Dòng Tiền Cá Nhân</b> được phát triển bởi <b>Công ty TNHH Lam Minh Anh</b> nhằm mục đích cải thiện quá trình kiểm soát dòng tiền của khách hàng. Với mục tiêu giảm thiểu khó khăn trong việc quản lý thu chi thường nhật, hệ thống được thiết kế với giao diện thân thiện với người dùng, kèm theo các tính năng báo cáo thông qua đồ thị, bảng biểu đơn giản giúp bạn nắm được tình hình chi tiêu của mình.</p>
					<p>Việc kiểm soát đời sống tài chính trở nên dễ dàng hơn khi bạn không còn phải lo lắng đến những nguồn chi phí ngoài mong muốn. Không những thế, phần mềm quản lý <b>Dòng Tiền Cá Nhân</b> đi kèm với chức năng thiết lập kế hoạch tài chính tương lai đầy đa dạng, với các công cụ tính toán giúp bạn định hướng tốt hơn trên con đường xây dựng một tương lai thành công cho bản thân.</p>
				</div>
			</div>

		</div>

	</section>

	<section class="element-section element-bg-12 cash-personal-2"></section>

	<section class="element-section element-about-bg cash-personal-4">
		<div class="container">
			
			<div class="cash-personal-4-default position-relative">
				<div class="cash-personal-img d-none"></div>

				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="mb-4"><font size="6" color="#fff">KHÔNG GIÀU KHÔNG GIỎI NHƯNG VẪN TỰ DO TÀI CHÍNH</font></h1>

						<p class="mb-0">Xây dựng một tương lai vững chắc và cuộc sống tốt đẹp ngay từ bây giờ với chức năng thiết lập kế hoạch tài chính tương lai của phần mềm quản lý <b>Dòng Tiền Cá Nhân</b>. Cùng với những bảng phân tích chi tiết, hệ thống giúp bạn có được nền tảng vững chắc để thực hiện kế hoạch tài chính tương lai và hoàn thành ước mơ riêng của mình.</p>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="element-section element-bg-13 cash-personal-3">
		<div class="container">
			
			<div class="row mb-0 mb-sm-5">
				<div class="col-md-6 col-12 mb-3 mb-sm-0">
					<div class="cash-personal-3-item">
						<div class="icon">
							<img src="{{ asset('img/cash-personal-2.png') }}">
						</div>
						<div class="text">
							<ul>
								<li>Thiết kế thân thiện với người dùng</li>
								<li>Giao diện đơn giản, dễ quan sát</li>
								<li>Hệ thống tính toán tự động</li>
								<li>Công tác ghi chép, nhập liệu đơn giản</li>
								<li>Báo cáo chi tiết thông qua đồ thị, bảng biểu</li>
								<li>Minh bạch kết quả hoạt động</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12 mb-3 mb-sm-0">
					<div class="cash-personal-3-item">
						<div class="icon">
							<img src="{{ asset('img/cash-personal-3.png') }}">
						</div>
						<div class="text">
							<ul>
								<li>Vượt qua nỗi lo chi tiêu ngoài tầm kiểm soát</li>
								<li>Thao tác nhập liệu đơn giản, giúp khách hàng linh hoạt thay đổi thông số khi phát sinh những hoạt động chi tiêu</li>
								<li>Theo dõi dễ dàng các khoản thu nhập, chi phí, nợ,…</li>
								<li>Kiểm soát chặt chẽ nhờ báo cáo theo khung thời gian</li>
								<li>Tính toán nhanh chóng, chính xác sự cân bằng hay mất cân đối thu chi</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-12 mb-3 mb-sm-0">
					<div class="cash-personal-3-item">
						<div class="icon">
							<img src="{{ asset('img/cash-personal-4.png') }}">
						</div>
						<div class="text">
							<ul>
								<li>Báo cáo rõ ràng, hiệu quả</li>
								<li>Đa dạng phương thức báo cáo: danh sách, bảng thống kê, biểu đồ</li>
								<li>Linh hoạt tùy chọn thời gian báo cáo theo: ngày, tháng, năm,…</li>
								<li>Hiển thị chi tiết, sinh động, theo dõi thuận tiện</li>
								<li>Thống kê rõ ràng, dễ truy vấn</li>
								<li>Kết quả chính xác, dễ dàng lưu trữ và kiểm soát</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<div class="cash-personal-3-item">
						<div class="icon">
							<img src="{{ asset('img/cash-personal-5.png') }}">
						</div>
						<div class="text">
							<ul>
								<li>Ví tiền linh hoạt, nâng cao khả năng kiểm soát tài chính</li>
								<li>Khả năng sở hữu và quản lý nhiều ví tiền cùng lúc</li>
								<li>Linh hoạt chọn thay đổi giữa các ví tiền để quản lý chỉ bằng một thao tác và trên một giao diện chức năng duy nhất</li>
								<li>Dễ dàng phân loại nhiều dòng tiền, giúp phục vụ nhiều mục tiêu</li>
								<li>Hệ thống truy xuất dễ dàng giúp nâng cao khả năng kiểm soát</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- Bảng giá phần mềm -->
    <section class="element-section element-price-list">
        <div class="container">
            @include('home.package')
        </div>
    </section>
    <!-- End Bảng giá phần mềm -->

	<section class="element-section element-cash-personal cash-personal-5">
		<div class="container">
			
			<h1 class="mb-4 text-center"><font size="6">THỰC HIỆN ƯỚC MƠ TÀI CHÍNH NGAY TỪ LÚC NÀY!</font></h1>

			<p class="text-justify"><b>Thiết lập nhiều kế hoạch tài chính để hoàn thành ước mơ tài chính.</b> Tại <b>BossStack</b>, chúng tôi hiểu nhu cầu cuộc sống của khách hàng không chỉ bị giới hạn ở một mục tiêu. Cho dù là mong muốn tiết kiệm đủ tiền để nghỉ hưu, mua nhà, tổ chức đám cưới, hay tạo điều kiện để con cái đi du học, hệ thống Dòng tiền cá nhân cho phép bạn thiết lập nhiều kế hoạch với các bảng phân tích đầy đủ, rõ ràng.</p>
			<p class="text-justify"><b>Bảng phân tích rõ ràng, đầy đủ.</b> Được lập trình bằng những phép toán phức tạp nhưng chính xác, hệ thống Dòng tiền cá nhân sẽ dựa vào những thông số bạn nhập vào như số tiền tích lũy hiện thời, mục tiêu và số tiền mục tiêu để cung cấp cho bạn một bảng phân tích rõ ràng. Trong bảng này, người dùng sẽ nắm được số tiền mình còn thiếu, cũng như bạn cần tiết kiệm bao nhiêu tiền trong khoản thời gian ra sao. Thông tin tóm tắt này sẽ giúp bạn định hình được hướng đi cần thiết để hoàn thành ước mơ tài chính của mình.</p>

		</div>
	</section>

@endsection

@section('scripts')
	@include('home.partials.script')
@endsection