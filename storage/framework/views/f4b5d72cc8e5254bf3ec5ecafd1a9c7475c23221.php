<?php $__env->startSection('content'); ?>
<style type="text/css">
	.alert{
		padding: 15px;
	    margin-bottom: 20px;
	    border: 1px solid transparent;
	    border-radius: 4px;
	    font-size: 15px;
	}
</style>
<?php if(session()->has('success')): ?>
<div class="alert alert-success">
    Thông tin hỗ trợ của bạn đã được gửi đi, <span style="font-weight: bold">BSPF</span> sẽ tiếp nhận và giải đáp thông tin!. Cảm ơn bạn đã quan tâm đến sản phẩm của <span style="font-weight: bold">BSPF</span>.
</div>
<?php endif; ?>
	<section class="element-section element-bg-1 element-tutorial">
		<div class="container">
			
			<div class="tutorial d-flex pb-5">
				<div class="row">
					<div class="col-md-8 align-self-center">
						<div class="tutorial-left">
							<h1 class="mb-4"><font size="6" color="#1a1f53">HƯỚNG DẪN</font></h1>
							<div class="text text-justify">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
								<p>Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="tutorial-right">
							<img src="<?php echo e(asset('img/support-1.png')); ?>" width="100%">
						</div>
					</div>
				</div>
			</div>

			<div class="tutorial-accordion">
				<div id="accordion">

				  <div class="card mb-3">
				    <div class="card-header" id="headingOne">
				      <h5 class="mb-0">
				        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          <font color="#1a1f53"><b>Đăng ký tài khoản & cài đặt hệ thống</b></font>
				        </button>
				      </h5>
				    </div>
				    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
				      <div class="card-body text-justify">
				        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
				      </div>
				    </div>
				  </div>

				  <div class="card mb-3">
				    <div class="card-header" id="headingTwo">
				      <h5 class="mb-0">
				        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          <font color="#1a1f53"><b>Đăng nhập thông tin cần thiết</b></font>
				        </button>
				      </h5>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      <div class="card-body text-justify">
				        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
				      </div>
				    </div>
				  </div>

				  <div class="card mb-3">
				    <div class="card-header" id="headingThree">
				      <h5 class="mb-0">
				        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          <font color="#1a1f53"><b>Sử dụng quản lý Dòng tiền cá nhân</b></font>
				        </button>
				      </h5>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
				      <div class="card-body text-justify">
				        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
				      </div>
				    </div>
				  </div>

				  <div class="card mb-3">
				    <div class="card-header" id="headingFour">
				      <h5 class="mb-0">
				        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
				          <font color="#1a1f53"><b>Hướng dẫn chọn gói đầu tư & tiết kiệm</b></font>
				        </button>
				      </h5>
				    </div>
				    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
				      <div class="card-body text-justify">
				        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
				      </div>
				    </div>
				  </div>

				</div>
			</div>

		</div>
	</section>

	<section class="element-section element-bg-support element-useful-info">
		<div class="container">

			<h1 class="mb-5"><font size="6" color="#fff">THÔNG TIN HỮU ÍCH</font></h1>

			<div class="row mb-5">
				<div class="col-md-4">
					<div class="useful-info-item">
						<a href="#">
							<span class="icon">
								<img src="<?php echo e(asset('img/support-5.png')); ?>" width="100%">
							</span>
							<span class="text">KHÁI NIỆM ĐẦU TƯ</span>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="useful-info-item">
						<a href="#">
							<span class="icon">
								<img src="<?php echo e(asset('img/support-7.png')); ?>" width="100%">
							</span>
							<span class="text">TẠI SAO BẠN NÊN ĐẦU TƯ</span>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="useful-info-item">
						<a href="#">
							<span class="icon">
								<img src="<?php echo e(asset('img/support-2.png')); ?>" width="100%">
							</span>
							<span class="text">GÓI ĐẦU TƯ</span>
						</a>
					</div>
				</div>
			</div>

			<div class="row mb-5">
				<div class="col-md-4">
					<div class="useful-info-item">
						<a href="#">
							<span class="icon">
								<img src="<?php echo e(asset('img/support-6.png')); ?>" width="100%">
							</span>
							<span class="text">KẾ HOẠCH TÀI CHÍNH TƯƠNG LAI</span>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="useful-info-item">
						<a href="#">
							<span class="icon">
								<img src="<?php echo e(asset('img/support-3.png')); ?>" width="100%">
							</span>
							<span class="text">PHƯƠNG THỨC TIẾT KIỆM</span>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="useful-info-item">
						<a href="#">
							<span class="icon">
								<img src="<?php echo e(asset('img/support-4.png')); ?>" width="100%">
							</span>
							<span class="text">THAM KHẢO THÊM</span>
						</a>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="element-section element-bg-1 element-form-support">
		<div class="container">

			<h1 class="mb-5"><font size="6" color="#1a1f53">HỖ TRỢ TƯ VẤN</font></h1>

			<div class="form-support-text mb-3">
				<p>Nếu khách hàng có nhu cầu tư vấn gia tăng dòng tiền cá nhân, xin vui lòng liên hệ vói chúng tôi qua các thông tin sau đây.</p>
				<ul>
					<li><b>Địa chỉ:</b> L4-42.OT05 (Officetel) , Tòa Landmark 4 Vinhomes Central Park, Số 720A Điện Biên Phủ, Phường 22, Quận Bình Thạnh, TP.HCM</li>
					<li><b>Số điện thoại:</b> 028.3636.4405 – 08.4966.4005 (Zalo/Viper/Skype)</li>
					<li><b>Email:</b> info@lamians.com</li>
				</ul>
			</div>

			<div class="form-support">
				<p class="mb-4">Hoặc gửi thông tin cho chúng tôi để chúng tôi chủ động liên hệ đặt hẹn tư vấn cho bạn:</p>

				<form action="<?php echo e(route('advisorys-submit', ['type' => 0])); ?>" method="post">
					<?php echo csrf_field(); ?>
					<div class="row mb-4">
						<div class="col-md-4">
							<input type="text" class="form-control" name="fullname" placeholder="Họ tên" required="">
						</div>
						<div class="col-md-4">
							<input type="email" class="form-control" name="email" placeholder="Email" required="">
						</div>
						<div class="col-md-4">
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
							<textarea class="form-control" rows="10" name="contentadvisory" placeholder="Thông điệp của bạn..." required=""></textarea>
						</div>
					</div>

					<button type="submit" class="btn btn-send">Gửi tin nhắn</button>
				</form>
			</div>

		</div>
	</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>