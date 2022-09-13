@extends('home.layout')

@section('content')
<style type="text/css">
	.alert{
		padding: 15px;
	    margin-bottom: 20px;
	    border: 1px solid transparent;
	    border-radius: 4px;
	    font-size: 15px;
	}
</style>

@if(session()->has('success'))
<div class="alert alert-success">
    Thông tin hỗ trợ của bạn đã được gửi đi, <span style="font-weight: bold">LAMIANS</span> sẽ tiếp nhận và giải đáp thông tin!. Cảm ơn bạn đã quan tâm đến sản phẩm của <span style="font-weight: bold">LAMIANS</span>.
</div>
@endif

	<section class="element-section element-bg-1 element-tutorial">
		<div class="container">
			
			<div class="tutorial pb-5">
				<div class="row d-flex">
					<div class="col-md-8 col-12 align-self-center">
						<div class="tutorial-left">
							<h1 class="mb-4"><font size="8" color="#1a1f53">HƯỚNG DẪN</font></h1>
						</div>
					</div>

					<div class="col-md-4 col-12">
						<div class="tutorial-right">
							<img src="{{ asset('img/support-1.png') }}" width="100%">
						</div>
					</div>
				</div>
			</div>

			<div class="tutorial-navTab">

				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">Đăng ký tài khoản</a>
						<a class="nav-item nav-link" id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">Đăng nhập</a>
						<a class="nav-item nav-link" id="nav-3-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">Sử dụng quản lý Dòng tiền cá nhân</a>
						<a class="nav-item nav-link" id="nav-4-tab" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4" aria-selected="false">Vấn đề sự cố với hệ thống Dòng tiền cá nhân</a>
					</div>
				</nav>

				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
						<p>Với BossStack, bạn có thể sử dụng hệ thống trên giao diện web truy cập dễ dàng ở bất cứ đâu mà không cần cài đặt. Hiện tại, BossStack hoạt động ổn định và tốt nhất trên các trình duyệt Web phiên bản như sau: Google Chrome 56++, Mozilla Firefox 50++.</p>

						<h4><b>Bước 1: Đăng ký thông tin</b></h4>

						<div class="ml-3">
							<p>Để bắt đầu sử dụng dịch vụ của chúng tôi, bạn có thể đăng ký tài khoản thông qua trang <a target="_blank" href="https://bossstack.vn/login">Đăng nhập BossStack</a> / <a target="_blank" href="https://bossstack.vn/registerCustomer">Đăng ký BossStack</a>.</p>

							<p>Bạn nhập các thông tin yêu cầu, chọn dịch vụ sản phẩm mình muốn sử dụng và nhấn “Đăng ký”. Ngoài các thông tin có dấu * là các thông tin bắt buộc phải điền, bạn có thể điền đầy đủ các thông tin khác để chúng tôi có thể hỗ trợ bạn tốt nhất.</p>

							<img src="{{ asset('img/advisory-1.jpg') }}">
						</div>

						<h4><b>Bước 2: Thanh toán</b></h4>

						<div class="ml-3">
							<p>Bạn sẽ được chuyển tới trang Thanh toán cho gói dịch vụ sản phẩm, hãy kiểm tra các thông tin đã đăng ký, chọn hình thức thanh toán và nhấn xác nhận <b>“Thanh toán”</b>.</p>

							<img src="{{ asset('img/advisory-2.jpg') }}">

							<p>Cách tiến hành thanh toán mà bạn có thể chọn 1 hình thức thanh toán phù hợp và thuận tiện với mình bao gồm:</p>

							<ul>
								<li><b>Thanh toán trực tiếp tại văn phòng công ty</b>, nhân viên của chúng tôi sẽ nhanh chóng liên hệ với bạn để hỗ trợ giao dịch sau khi bạn hoàn tất xác nhận.</li>
								<li><b>Chuyển khoản ngân hàng</b> vào tài khoản của chúng tôi sau khi hoàn tất xác nhận <b>“Thanh toán”</b>, hãy lưu ý và đảm bảo những thông tin cần thiết theo hướng dẫn của chúng tôi.</li>
								<li><b>Thanh toán qua Momo:</b> Bạn có thể tải ứng dụng Momo, đăng ký tài khoản và sử dụng tài khoản Momo để thực hiện thanh toán. Sau khi nhấn xác nhận “Thanh toán”, bạn sẽ được chuyển đến trang thanh toán của Momo. Mở ứng dụng Momo trên điện thoại và quét mã QR để thực hiện thanh toán theo hướng dẫn.</li>
							</ul>
						</div>

						<div class="img-momo">
							<span class="img-momo-item">
								<img src="{{ asset('img/advisory-3.jpg') }}" style="width: 100%">
							</span>
							<span class="img-momo-item">
								<img src="{{ asset('img/advisory-4.jpg') }}" style="width: 100%">
							</span>
							<span class="img-momo-item">
								<img src="{{ asset('img/advisory-5.jpg') }}" style="width: 100%">
							</span>
							<span class="img-momo-item">
								<img src="{{ asset('img/advisory-6.jpg') }}" style="width: 100%">
							</span>
						</div>

						<h4><b>Bước 3: Email xác nhận hoàn tất đăng ký thành công</b></h4>
							
						<div class="ml-3">
							<p>Ngay sau khi hoàn tất đăng ký, email thông tin đăng nhập và kích hoạt tài khoản sẽ được gửi tới địa chỉ email đã đăng ký đối với quý khách đã thanh toán online thành công.</p>

							<p>Đối với hình thức thanh toán khác và cũng như đối với đăng ký thanh toán lỗi, chúng tôi sẽ gửi email xác nhận bạn đăng ký và hỗ trợ thực hiện giao dịch. Ngay sau khi hồ sơ đăng ký của bạn được tiếp nhận và kiểm tra hợp lệ, trong vòng 24h, kể từ lúc nhận được yêu cầu đăng ký, chúng tôi sẽ liên hệ theo số điện thoại bạn đã đăng ký để xác nhận yêu cầu.</p>
						</div>

						<img src="{{ asset('img/advisory-10.jpg') }}">

						<p><b>Bạn có thể nhờ hỗ trợ đăng ký tài khoản bằng cách liên hệ trực tiếp thông qua hotline 0918.905.500 của chúng tôi.</b></p>
					</div>

					<div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
						<p>Sau khi nhận được email kích hoạt tài khoản hoàn tất đăng ký của chúng tôi, bạn có thể vào trang <a target="_blank" href="https://bossstack.vn/login">Đăng nhập</a> tài khoản của mình để bắt đầu sử dụng hệ thống.</p>

						<img src="{{ asset('img/advisory-8.jpg') }}">

						<p>Sau khi đăng nhập, bạn có thể bắt đầu sử dụng ứng dụng hệ thống trong trang tài khoản của mình.</p>

						<p>Với khách hàng gặp vấn đề với mật khẩu đăng nhập, bạn có thể nhấp vào <b>Quên mật khẩu</b>, điền số điện thoại hoặc email đã đăng ký tài khoản rồi thực hiện <b>Lấy lại mật khẩu</b>. Sau đó vui lòng mở email xác nhận của chúng tôi gửi đến để <b>Tạo mật khẩu</b> đăng nhập mới.</p>
						
						<img src="{{ asset('img/advisory-7.jpg') }}">

						<p>Chúng tôi đảm bảo độ bảo mật của hệ thống để chắc chắn rằng toàn bộ thông tin bạn cung cấp không bị rò rỉ mà đem lại hậu quả không mong muốn.</p>
					</div>

					<div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">
						<p>Bạn có thể bắt đầu hình thành khả năng và nâng cao năng lực quản lý tình hình tài chính cá nhân của riêng mình một cách dễ dàng và hiệu quả thông qua việc ứng dụng đơn giản các chức năng của hệ thống chúng tôi vào cuộc sống thường ngày của bạn.</p>

						<h4><b>Quản lý ví tiền, tài khoản hoặc quỹ tiền cá nhân của bạn</b></h4>

						<p>Tạo, sở hữu và quản lý nhiều ví tiền cùng lúc giúp phục vụ cho nhiều mục đích khác nhau, như ví tiền sử dụng chi tiêu sinh hoạt hằng tháng, tài khoản ngân hàng, tín dụng, quỹ tiền tiết kiệm cho bản thân ...và nâng cao khả năng kiểm soát tài chính.</p>

						<p>Hướng dẫn thêm ví tiền/tài khoản:</p>

						<ul>
							<li>Bạn tạo mới ví tiền/tài khoản của mình trong trang <b>“Quản lý dòng tiền thu chi”</b> bằng cách nhấn vào nút <b>“Thêm ví tiền”</b> trên giao diện.</li>
							<li>Nhập thông tin ví tiền/tài khoản: tên ví tiền/tài khoản, ngày mở, số tiền, có thể ghi chú mục đích sử dụng.</li>
							<li>Nhấn <b>“Lưu”</b> để hoàn tất.</li>
						</ul>

						<p>Hệ thống sẽ hiển thị ví tiền/tài khoản đã tạo trên giao diện, bạn có thể tạo nhiều ví tiền/tài khoản và lựa chọn trong danh sách các tài khoản do mình quản lý.</p>

						<p>Bạn cũng có thể linh hoạt điều chỉnh ví tiền/tài khoản bằng cách nhấn vào nút “Chỉnh sửa” ví tiền/tài khoản cần cập nhật lại thông tin.</p>

						<p>Để xóa ví tiền/tài khoản ra khỏi danh sách, chọn mục cần xóa và nhấn vào nút “Xóa”.</p>

						<h4><b>Quản lý dòng tiền thu chi</b></h4>

						<p>Bạn chỉ cần nhập liệu số tiền thu chi của mình qua từng ngày, việc đó cũng có thể giúp hình thành thói quen theo dõi tình hình tài chính, kiểm soát thu chi của bản thân.</p>

						<ul style="list-style-type: none;">
							<li class="mb-2">
								<h5><b>Thêm mục thu nhập</b></h5>
								Ghi nhận lại thu nhập trong ngày bằng cách nhấn vào nút “Thêm thu nhập” trên giao diện  => Nhập thông tin: ngày, danh mục loại thu nhập, chi tiết, số tiền, ví tiền/tài khoản giao dịch, ghi chú thông tin liên quan  => Nhấn “Lưu” để hoàn tất.
							</li>
							<li class="mb-2">
								<h5><b>Thêm mục chi tiêu</b></h5>
								Ghi nhận lại mục chi tiêu trong ngày bằng cách nhấn vào nút “Thêm chi phí” trên giao diện =>  Nhập thông tin: ngày, danh mục loại chi phí, chi tiết, số tiền, ví tiền/tài khoản giao dịch, ghi chú thông tin liên quan  => Nhấn “Lưu” để hoàn tất.
							</li>
							<li class="mb-2">
								<h5><b>Theo dõi các khoản nợ - cho vay</b></h5>
								Bạn cũng có thể ghi nhận lại và theo dõi tình hình các khoản nợ hoặc cho vay của mình bằng cách nhấn vào nút “Thêm khoản nợ”. Lựa chọn danh mục loại “Đi vay” hoặc “Cho vay” và nhập thông tin liên quan: ngày, chi tiết, số tiền, ghi chú => Nhấn “Lưu” để hoàn tất.<br>Hệ thống sẽ hiển thị các mục thu chi của bạn và tự động tính toán để đưa ra số dư tài sản của bạn và cũng hiển thị mục nợ - cho vay của bạn nếu có.
							</li>
							<li class="mb-2">
								<h5><b>Bảng quản lý thu chi cá nhân</b></h5>
								Bạn có thể xem lại thông tin chi tiết các khoản thu nhập - chi phí - khoản nợ - khoản cho vay trong tháng và thực hiện cập nhật lại thông tin khi cần.<br>Thực hiện điều chỉnh ví tiền/tài khoản đơn giản bằng cách nhấn vào nút “Chỉnh sửa” mục thông tin được chọn bên phải giao diện cần cập nhật lại thông tin.<br>Để xóa mục ra khỏi danh sách, nhấn vào nút “Xóa” ở mục thông tin cần xóa.
							</li>
						</ul>

						<h4><b>Báo cáo số liệu trực quan và phân tích thói quen chi tiêu của bản thân</b></h4>

						<p>Chức năng cho phép hệ thống sẽ tự động thực hiện tổng hợp thu chi để hoàn thành báo cáo với biểu đồ rõ ràng, trực quan về tình hình thu chi của bạn theo ngày, tháng, năm giúp bạn dễ dàng theo dõi. </p>

						<p>Hệ thống cũng tự động đưa ra bảng phân tích danh mục thu chi giúp bạn nhanh chóng xác định được danh mục chi tiêu, thói quen tiêu dùng của mình để điều chỉnh cho phù hợp.</p>

						<h4><b>Thiết lập mục tiêu và phân tích, lên kế hoạch tài chính tương lai cho bản thân.</b></h4>

						<p>Song song đó, hệ thống của chúng tôi có thể giúp bạn định hình kế hoạch tài chính tương lai của riêng bản thân chỉ với các bước đơn giản dễ thực hiện.</p>

						<p>Ở mục “Kế hoạch tài chính tương lai” trong trang <b>“Quản lý dòng tiền thu chi”</b> hoặc trang <b>“Mục tiêu tài chính”</b>, bạn nhấn chọn “Thêm mục tiêu”. Chỉ cần nhập thông tin mục tiêu của mình và nhấn “Phân tích”, hệ thống sẽ tự động tính toán hiệu quả để cho ra những bảng phân tích tài chính tương lai chính xác nhất.</p>

						<p>Các mục tiêu kế hoạch tài chính tương lai cũng sẽ được lưu và hiển thị trên giao diện, bạn có thể linh hoạt điều chỉnh mục tiêu của mình bằng cách nhấn “Chỉnh sửa mục tiêu”, cập nhật lại thông tin của mình.</p>

						<h4><b>Tổng quan</b></h4>

						<p>Trang chức năng <b>“Tổng quan”</b> với các tính năng tự động hiển thị thông tin, thống kê và báo cáo, giúp bạn có cái nhìn tổng quát, nhanh chóng nhất về tình hình dòng tiền cá nhân của bản thân theo thời gian ngày, tháng, năm.</p>
					</div>

					<div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">
						<p>Trong quá trình sử dụng hệ thống Dòng tiền cá nhân, nếu khách hàng có gặp bất kỳ sự cố nào hay có thắc mắc yêu cầu liên quan tới hệ thống và dịch vụ của chúng tôi, xin vui lòng liên hệ với chúng tôi ở phần <b>“Hỗ trợ tư vấn”</b> bên dưới hoặc qua trang <b>"Dịch vụ khách hàng 24/7 - Hỗ trợ"</b> trong trang Tài khoản khách hàng và nhập thông tin yêu cầu hỗ trợ.</p>

						<img src="{{ asset('img/advisory-9.jpg') }}">

						<p>Thông qua yêu cầu hỗ trợ của bạn, Trung Tâm Chăm Sóc Khách Hàng của chúng tôi sẽ liên hệ hỗ trợ quý khách thuận tiện, nhanh chóng, tiết kiệm thời gian.</p>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="element-section element-bg-support element-useful-info">
		<div class="container">

			<h1 class="mb-5"><font size="6" color="#fff">THÔNG TIN HỮU ÍCH</font></h1>

			<div class="row mb-0 mb-sm-5">
				<div class="col-md-4 col-12 mb-3 mb-sm-0">
					<div class="useful-info-item">
						<a href="{{ route('TheDefinitionOfInvesting') }}">
							<span class="icon">
								<img src="{{ asset('img/support-5.png') }}" width="100%">
							</span>
							<span class="text">KHÁI NIỆM ĐẦU TƯ</span>
						</a>
					</div>
				</div>
				<div class="col-md-4 col-12 mb-3 mb-sm-0">
					<div class="useful-info-item">
						<a href="{{ route('WhyYouShouldInvest') }}">
							<span class="icon">
								<img src="{{ asset('img/support-7.png') }}" width="100%">
							</span>
							<span class="text">TẠI SAO BẠN NÊN ĐẦU TƯ</span>
						</a>
					</div>
				</div>
				<div class="col-md-4 col-12 mb-3 mb-sm-0">
					<div class="useful-info-item">
						<a href="{{ route('EffectiveBudgeting') }}">
							<span class="icon">
								<img src="{{ asset('img/support-2.png') }}" width="100%">
							</span>
							<span class="text">QUẢN LÝ CHI TIÊU HIỆU QUẢ</span>
						</a>
					</div>
				</div>
			</div>

			<div class="row mb-0">
				<div class="col-md-4 col-12 mb-3 mb-sm-0">
					<div class="useful-info-item">
						<a href="{{ route('FinancialPlanning') }}">
							<span class="icon">
								<img src="{{ asset('img/support-6.png') }}" width="100%">
							</span>
							<span class="text">KẾ HOẠCH TÀI CHÍNH TƯƠNG LAI</span>
						</a>
					</div>
				</div>
				<div class="col-md-4 col-12 mb-3 mb-sm-0">
					<div class="useful-info-item">
						<a href="{{ route('SavingMethod') }}">
							<span class="icon">
								<img src="{{ asset('img/support-3.png') }}" width="100%">
							</span>
							<span class="text">PHƯƠNG THỨC TIẾT KIỆM</span>
						</a>
					</div>
				</div>
				<div class="col-md-4 col-12 mb-3 mb-sm-0">
					<div class="useful-info-item">
						<a href="{{ route('HowToGrowYourCashFlow') }}">
							<span class="icon">
								<img src="{{ asset('img/support-4.png') }}" width="100%">
							</span>
							<span class="text">TĂNG TRƯỞNG DÒNG TIỀN CÁ NHÂN</span>
						</a>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="element-section element-bg-1 element-form-support">
		<div class="container">

			<h1 class="mb-5"><font size="6" color="#2a5caa">HỖ TRỢ TƯ VẤN</font></h1>

			<div class="form-support-text mb-3">
				<p>Nếu khách hàng có nhu cầu tư vấn gia tăng dòng tiền cá nhân, xin vui lòng liên hệ:</p>
				<ul>
					<li><b>Công ty TNHH Lam Minh Anh</b></li>
					<li><b>Địa chỉ: </b>LM81 - 42.OT04 (Officetel), Tòa Landmark 81 Vinhomes Central Park, Số 720A Điện Biên Phủ, Phường 22, Quận Bình Thạnh, Tp Hồ Chí Minh</li>
					<li><b>Số điện thoại:</b> 0918.905.500 (Zalo/Viber/Skype)</li>
					<li><b>Email:</b> info@bossstack.vn</li>
				</ul>
			</div>

			<div class="form-support">
				<p class="mb-4">Hoặc vui lòng gửi thông tin cho chúng tôi:</p>

				<form action="{{ route('advisorys-submit', ['type' => 0]) }}" method="post">
					@csrf
					<div class="row mb-4">
						<div class="col-md-4 col-12 mb-4 mb-sm-0">
							<input type="text" class="form-control" name="fullname" placeholder="Họ tên" required="">
						</div>
						<div class="col-md-4 col-12 mb-4 mb-sm-0">
							<input type="email" class="form-control" name="email" placeholder="Email" required="">
						</div>
						<div class="col-md-4 col-12">
							<input type="text" class="form-control" name="phone" placeholder="Số điện thoại" required="">
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-12">
							<input type="text" class="form-control" name="titleadvisory" placeholder="Tiêu đề" required="">
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-12">
							<textarea class="form-control" rows="5" name="contentadvisory" placeholder="Thông điệp của bạn..." required=""></textarea>
						</div>
					</div>

					<button type="submit" class="btn btn-send">Gửi tin nhắn</button>
				</form>
			</div>

		</div>
	</section>

@endsection