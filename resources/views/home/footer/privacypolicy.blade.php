@extends('home.layout')

@section('content')

	<section class="element-section element-bg-1 element-privacy-policy">
		<div class="container">
		
			<div class="accordion" id="accordionPolicy">

			  <div class="card">
			    <div class="card-header" id="headingOne">
			      <h2 class="mb-0">
			        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			          <font color="#1a1f53"><b>Mục đích áp dụng</b></font>
			        </button>
			      </h2>
			    </div>

			    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionPolicy">
			      <div class="card-body">
			        Công ty TNHH Lamian Trading tôn trọng quyền riêng tư và cam kết bảo mật thông tin khách hàng. Chính sách bảo mật thông tin này nhằm đảm bảo an toàn thông tin liên quan đến các tổ chức, cá nhân đã tin tưởng cung cấp thông tin cho chúng tôi khi tham gia truy cập và/hoặc giao dịch trên website: http://dongtiencanhan.com/.
			      </div>
			    </div>
			  </div>

			  <div class="card">
			    <div class="card-header" id="headingTwo">
			      <h2 class="mb-0">
			        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          <font color="#1a1f53"><b>Quy định cụ thể</b></font>
			        </button>
			      </h2>
			    </div>

			    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionPolicy">
			      <div class="card-body">
			        <ul class="list">
			        	<li>
			        		Về việc thu thập thông tin
			        		<ul class="list-item">
			        			<li>Khi khách hàng thực hiện đăng ký mở tài khoản tại http://dongtiencanhan.com/, khách hàng sẽ cung cấp một số thông tin cần thiết (“Thông Tin Khách Hàng”) được sử dụng với những mục đích được nêu bên dưới.</li>

			        			<li>Khách hàng có trách nhiệm đảm bảo những thông tin khách hàng cung cấp là đầy đủ và chính xác, chúng tôi khuyến khích khách hàng luôn cập nhật thông tin để đảm bảo tính đầy đủ và chính xác. Công ty TNHH Lamian Trading không chịu trách nhiệm giải quyết bất kỳ tranh chấp nào nếu thông tin khách hàng cung cấp không chính xác, không được cập nhật hoặc giả mạo.</li>
			        		</ul>
			        	</li>

			        	<li>
			        		Về việc lưu giữ và bảo mật thông tin riêng
			        		<ul class="list-item">
			        			<li>Thông Tin Khách Hàng, cũng như các thông tin trao đổi giữa khách hàng và Công ty TNHH Lamian Trading, đều được lưu giữ và bảo mật bởi hệ thống của Công ty TNHH Lamian Trading.</li>

			        			<li>Chúng tôi lưu trữ thông tin khách hàng trong môi trường vận hành an toàn gồm các bên tham gia: nhân viên, đại diện, đối tác dịch vụ. Chúng tôi cam kết tuân thủ theo quy định của pháp luật về bảo mật thông tin.</li>

			        			<li>Khách hàng tuyệt đối không được có bất kỳ hành vi sử dụng công cụ, chương trình nào để can thiệp trái phép vào hệ thống hay làm thay đổi cấu trúc dữ liệu của Công ty TNHH Lamian Trading, cũng như bất kỳ hành vi nào khác nhằm phát tán, cổ vũ cho các hoạt động với mục đích can thiệp, phá hoại hay xâm nhập vào dữ liệu của hệ thống Công ty TNHH Lamian Trading, và các hành vi mà pháp luật Việt Nam nghiêm cấm. Trong trường hợp Công ty TNHH Lamian Trading phát hiện khách hàng có hành vi cố tình giả mạo, gian lận, phát tán các thông tin trái phép, ... Công ty TNHH Lamian Trading có quyền chuyển thông tin cá nhân của khách hàng cho các cơ quan có thẩm quyền để xử lý theo quy định pháp luật.</li>
			        		</ul>
			        	</li>

			        	<li>
			        		Về việc sử dụng Thông Tin Khách Hàng

			        		<p class="mb-0">Chúng tôi thu thập thông tin khách hàng để phục vụ cho các mục đích sau:</p>
			        		<ul class="list-item">
			        			<li>Đơn hàng: xử lý các vấn đề liên quan đến đơn hàng.</li>

			        			<li>Cung cấp các dịch vụ/tiện ích tiêu dùng, chăm sóc khách hàng dựa trên nhu cầu và các thói quen của khách hàng khi truy cập vào website.</li>

			        			<li>Phát hiện, ngăn chặn các hoạt động giả mạo, phá hoại tài khoản của khách hàng hoặc các hoạt động giả mạo nhận dạng của khách hàng trên website theo yêu cầu của pháp luật.</li>
			        		</ul>
			        	</li>

			        	<li>
			        		Thời gian lưu trữ

			        		<p class="mb-0">Thông Tin Khách hàng được bảo mật trên máy chủ của Công ty TNHH Lamian Trading. Chúng tôi sẽ lưu trữ thông tin cho đến khi khách hàng có yêu cầu hủy bỏ.</p>
			        	</li>

			        	<li>
			        		Không chia sẻ Thông Tin Khách Hàng

			        		<p class="mb-0">Công ty TNHH Lamian Trading không cung cấp Thông Tin Khách Hàng cho bất kỳ bên thứ ba nào trừ một số hoạt động cần thiết sau:</p>
			        		<ul class="list-item">
			        			<li>Trong trường hợp chúng tôi sử dụng dịch vụ cung cấp từ một bên thứ ba để đảm bảo các hoạt động trên trang điện tử của Công ty TNHH Lamian Trading. Khi đó, chúng tôi yêu cầu đối tác tuân thủ tất cả các luật lệ an ninh về bảo mật thông tin khách hàng.</li>

			        			<li>Yêu cầu pháp lý: trường hợp phải thực hiện theo yêu cầu của các cơ quan Nhà nước có thẩm quyền, hoặc theo quy định của pháp luật, hoặc khi việc cung cấp thông tin đó là cần thiết để Công ty TNHH Lamian Trading cung cấp dịch vụ/tiện ích cho khách hàng (ví dụ: cung cấp các thông tin giao nhận cần thiết cho việc thanh toán).</li>

			        			<li>Chuyển giao kinh doanh (nếu có): trong trường hợp mua bán, sáp nhập với công ty khác, người mua có quyền truy cập thông tin được chúng tôi lưu trữ.</li>
			        		</ul>
			        	</li>

			        	<li>
			        		Quyền của khách hàng

			        		<ul class="list-item">
			        			<li>Khách hàng có quyền cung cấp thông tin cá nhân cho chúng tôi và thay đổi hoặc hủy bỏ bất cứ lúc nào.</li>

			        			<li>Khách hàng có thể tự đăng nhập vào tài khoản để chỉnh sửa thông tin cá nhân hoặc yêu cầu chúng tôi hỗ trợ.</li>
			        		</ul>
			        	</li>

			        	<li>
			        		Thông tin liên hệ

			        		<p class="mb-0">Chúng tôi sẵn sàng giải đáp bất kỳ thắc mắc nào của khách hàng về chính sách của chúng tôi và hỗ trợ khách hàng quản lý thông tin cá nhân trên hệ thống. <br>Vui lòng liên hệ hotline: 028.3636.0440 / 0918.905.500 hoặc gửi Email đến địa chỉ: info@fiinves.vn</p>
			        	</li>
			        </ul>
			      </div>
			    </div>
			  </div>

			</div>

		</div>
	</section>

@endsection