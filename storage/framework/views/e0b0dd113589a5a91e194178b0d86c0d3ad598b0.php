<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/products.css'), false); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(isset($infor)): ?>
<div class="alert alert-success">
    <?php echo e($infor, false); ?>

</div>
<?php endif; ?>

<?php echo $__env->make('company-manage.monthinsurance.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="note">
	<div class="row">
		<div class="col-md-12">
			<h4>
				<u>Ghi chú:</u><br>
				<small>- Chọn tháng/năm cần lập bảng tính bảo hiểm xã hội.</small><br>
				<small>- Nhấn nút <b>Tạo mới</b> để tạo mới bảng tính bảo hiểm xã hội, nếu bảng tính bảo hiểm xã hội đã được duyệt, bạn chỉ có thể <b>Xem lại bảng tính bảo hiểm xã hội đã lưu</b>.</small><br>
				<small>- Để duyệt/bỏ duyệt bảng tính bảo hiểm xã hội, nhấn nút <b>Xem bảng tính bảo hiểm xã hội đã lưu</b>, nhấn nút <b>Đồng ý duyệt</b>/<b>Bỏ duyệt</b> để duyệt bảng tính bảo hiểm xã hội.</small><br>
				<small>- Bảng tính bảo hiểm xã hội chỉ được <b>Xóa</b> hoặc <b>Tạo mới</b> lại khi bảng tính bảo hiểm xã hội chưa được duyệt.</small><br>
				<small>- Xuất file excel khi bảng tính bảo hiểm xã hội đã được lưu.</small><br>
			</h4>
		</div>
	</div>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>