<form action="" id="formAnswer" method="post">
	<?php echo csrf_field(); ?>
	<div class="modal fade" id="answerEmail" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Trả lời khách hàng</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
	                    <label>Tiêu đề</label>
	                    <input type="text" class="form-control" name="title" value="" placeholder="Nhập tiêu đề">
	                </div>
	                <div class="form-group">
	                    <label>Nội dung</label>
	                    <textarea class="form-control" name="content" rows="5" placeholder="Nhập nội dung"></textarea>
	                </div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-send">Gửi</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>

		</div>
	</div>
</form>

<!-- <form action="">
	<div class="modal fade" id="answerWebsite" role="dialog">
		<div class="modal-dialog">

			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Trả lời khách hàng</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
	                    <label>Tiêu đề</label>
	                    <input type="text" class="form-control" name="subject" value="" placeholder="Nhập tiêu đề">
	                </div>
	                <div class="form-group">
	                    <label>Nội dung</label>
	                    <textarea class="form-control" name="content" rows="5" placeholder="Nhập nội dung"></textarea>
	                </div>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-primary btn-send" data-dismiss="modal">Gửi</a>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>

		</div>
	</div>
</form> -->