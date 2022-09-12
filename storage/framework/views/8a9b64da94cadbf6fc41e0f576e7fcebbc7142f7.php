<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/style.css'), false); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row pt-2">
    <div class="col-lg-4">
        <div class="panel panel-order-day">
            <!-- <div class="panel-heading">
                <b>Thống kê đơn hàng trong ngày</b>
            </div>
            <div class="panel-body">
                <div class="p-2 clearfix border-white"><span class="heading-count">Số đơn hàng hôm nay: </span><span class="h3 number-count"><?php echo e($ordersOnDay->count(), false); ?></span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng chưa xử lý: </span><span class="h3 number-count"><?php echo e($orders->where('status', '1')->count(), false); ?></span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng cần hóa đơn VAT: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng giao nhanh: </span><span class="h3 number-count"><?php echo e($orders->where('ship_total', 25000)->count(), false); ?></span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng đang vận chuyển: </span><span class="h3 number-count"><?php echo e($orders->where('status', '2')->count(), false); ?></span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng đã hủy: </span><span class="h3 number-count"><?php echo e($orders->where('status', '4')->count(), false); ?></span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng đã hoàn tất: </span><span class="h3 number-count"><?php echo e($orders->where('status', '3')->count(), false); ?></span></div>
                <div class="p-2 clearfix"><span class="heading-count">Tổng doanh thu trong ngày: </span><span class="h3 number-count"><?php echo e(number_format($sum_subtotal), false); ?> VNĐ</span></div>
            </div> -->
            <table style="width:100%" class="table-dashboard">
                <thead>
                    <tr>
                        <th colspan="2" class="table-heading">Thống kê đơn hàng trong ngày</th>
                    </tr>
                </thead>
                <tbody style="padding: 15px;">
                    <tr>
                        <td class="heading-count">Số đơn hàng hôm nay:</td>
                        <td class="number-count"><b><?php echo e($ordersOnDay->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng chưa xử lý:</td>
                        <td class="number-count"><b><?php echo e($ordersOnDay->where('status', '1')->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng cần hóa đơn VAT:</td>
                        <td class="number-count"><b><?php echo e($ordersOnDay->where('note','==',"Cần xuất hóa đơn VAT")->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng giao nhanh:</td>
                        <td class="number-count"><b><?php echo e($ordersOnDay->where('ship_total', 25000)->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng đang vận chuyển:</td>
                        <td class="number-count"><b><?php echo e($ordersOnDay->where('status', '2')->count(), false); ?></b></td>
                    </tr>

                    <tr>
                        <td class="heading-count">Đơn hàng đã hủy:</td>
                        <td class="number-count"><b><?php echo e($ordersOnDay->where('status', '4')->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng đã hoàn tất:</td>
                        <td class="number-count"><b><?php echo e($ordersOnDay->where('status', '3')->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Tổng doanh thu trong ngày:</td>
                        <td class="number-count"><b><?php echo e(number_format($sum_subtotal), false); ?></b> <strong style="font-size: 12px; font-weight: normal;">VNĐ</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-order-week">
            <!-- <div class="panel-heading">
                <b>Thống kê đơn hàng trong tuần</b>
            </div>
            <div class="panel-body">
                <div class="p-2 clearfix"><span class="heading-count">Số đơn hàng tuần này: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng chưa xử lý: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng cần hóa đơn VAT: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng giao nhanh: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng đang vận chuyển: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng đã hủy: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng đã hoàn tất: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Tổng doanh thu trong tuần: </span><span class="h3 number-count">0 VNĐ</span></div>
            </div> -->
            <table style="width:100%" class="table-dashboard">
                <thead>
                    <tr>
                        <th colspan="2" class="table-heading">Thống kê đơn hàng trong tuần</th>
                    </tr>
                </thead>
                <tbody style="padding: 15px;">
                    <tr>
                        <td class="heading-count">Số đơn hàng tuần này:</td>
                        <td class="number-count"><b><?php echo e($orderOnWeek->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng chưa xử lý:</td>
                        <td class="number-count"><b><?php echo e($orderOnWeek->where('status', '1')->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng cần hóa đơn VAT:</td>
                        <td class="number-count"><b><?php echo e($orderOnWeek->where('note','==',"Cần xuất hóa đơn VAT")->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng giao nhanh:</td>
                        <td class="number-count"><b><?php echo e($orderOnWeek->where('ship_total', 25000)->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng đang vận chuyển:</td>
                        <td class="number-count"><b><?php echo e($orderOnWeek->where('status', '2')->count(), false); ?></b></td>
                    </tr>

                    <tr>
                        <td class="heading-count">Đơn hàng đã hủy:</td>
                        <td class="number-count"><b><?php echo e($orderOnWeek->where('status', '4')->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng đã hoàn tất:</td>
                        <td class="number-count"><b><?php echo e($orderOnWeek->where('status', '3')->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Tổng doanh thu trong tuần:</td>
                        <td class="number-count"><b><?php echo e(number_format($sum_subtotal_week), false); ?></b> <strong style="font-size: 12px; font-weight: normal;">VNĐ</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-order-month">
            <!-- <div class="panel-heading">
                <b>Thống kê đơn hàng trong tháng</b>
            </div>
            <div class="panel-body">
                <div class="p-2 clearfix"><span class="heading-count">Số đơn hàng tháng này: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng chưa xử lý: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng cần hóa đơn VAT: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng giao nhanh: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng đang vận chuyển: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng đã hủy: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Đơn hàng đã hoàn tất: </span><span class="h3 number-count">0</span></div>
                <div class="p-2 clearfix"><span class="heading-count">Tổng doanh thu trong tháng: </span><span class="h3 number-count">0 VNĐ</span></div>
            </div> -->
            <table style="width:100%" class="table-dashboard">
                <thead>
                    <tr>
                        <th colspan="2" class="table-heading">Thống kê đơn hàng trong tháng</th>
                    </tr>
                </thead>
                <tbody style="padding: 15px;">
                    <tr>
                        <td class="heading-count">Số đơn hàng tháng này:</td>
                        <td class="number-count"><b><?php echo e($orderOnMonthYear->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng chưa xử lý:</td>
                        <td class="number-count"><b><?php echo e($orderOnMonthYear->where('status', '1')->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng cần hóa đơn VAT:</td>
                        <td class="number-count"><b><?php echo e($orderOnMonthYear->where('note','==',"Cần xuất hóa đơn VAT")->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng giao nhanh:</td>
                        <td class="number-count"><b><?php echo e($orderOnMonthYear->where('ship_total', 25000)->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng đang vận chuyển:</td>
                        <td class="number-count"><b><?php echo e($orderOnMonthYear->where('status', '2')->count(), false); ?></b></td>
                    </tr>

                    <tr>
                        <td class="heading-count">Đơn hàng đã hủy:</td>
                        <td class="number-count"><b><?php echo e($orderOnMonthYear->where('status', '4')->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng đã hoàn tất:</td>
                        <td class="number-count"><b><?php echo e($orderOnMonthYear->where('status', '3')->count(), false); ?></b></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Tổng doanh thu tháng này:</td>
                        <td class="number-count"><b><?php echo e(number_format($sum_subtotal_month), false); ?></b> <strong style="font-size: 12px; font-weight: normal;">VNĐ</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row" style="padding: 25px 0;">
    <div class="col-lg-12">
        <div id="chartdiv" style="width: 100%; height: 500px"></div>
    </div>
</div>

<div class="row pt-2">
    <div class="col-lg-4">
        <div class="panel panel-first-column">
            <table style="width:100%" class="table-dashboard">
                <thead>
                    <tr>
                        <th colspan="2" class="table-heading clearfix">Thống kê sản phẩm <i class="fas fa-boxes"></i></th>
                    </tr>
                </thead>
                <tbody style="padding: 15px;">
                    <tr>
                        <td class="heading-count">Số sản phẩm đang bật bán:</td>
                        <td class="number-count"><?php echo e($productBuying->where('quantity','>', 0)->count(), false); ?></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Số sản phẩm hiện tại đã hết hàng:</td>
                        <td class="number-count"><?php echo e($productSoldOut->where('warehouse_id', 2)->count(), false); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-second-column">
            <table style="width:100%" class="table-dashboard">
                <thead>
                    <tr>
                        <th colspan="2" class="table-heading clearfix">Thống kê tồn kho <i class="fas fa-cubes"></i></th>
                    </tr>
                </thead>
                <tbody style="padding: 15px;">
                    <tr>
                        <td class="heading-count">Tổng số lượng tồn kho:</td>
                        <td class="number-count"><?php echo e($sum_getQuantity_RVin, false); ?> / <?php echo e($sum_getQuantity_KhoTong, false); ?></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Tổng giá trị hàng tồn:</td>
                        <td class="number-count"><?php echo e(number_format($sum_TotalInventaro_RVin), false); ?> / <?php echo e(number_format($sum_TotalInventaro_KhoTong), false); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-third-column">
            <table style="width:100%" class="table-dashboard">
                <thead>
                    <tr>
                        <th colspan="2" class="table-heading clearfix">Đánh giá/ nhận xét và Hỏi/ đáp chưa xử lý<i class="fas fa-bell"></i></th>
                    </tr>
                </thead>
                <tbody style="padding: 15px;">
                    <tr>
                        <td class="heading-count">Đánh giá/ nhận xét: <span class="number-count"><?php echo e($comments->count(), false); ?></span> - Trả lời: <span class="number-count"><?php echo e($answer_comments->count(), false); ?></span></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Hỏi: <span class="number-count"><?php echo e($questions->count(), false); ?></span> - Trả lời: <span class="number-count"><?php echo e($answer_questions->count(), false); ?></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row pt-2">
	<div class="col-lg-4">
        <div class="panel panel-first-column">
            <table style="width:100%" class="table-dashboard">
                <thead>
                    <tr>
                        <th colspan="2" class="table-heading clearfix">Thống kê nhập hàng <i class="fas fa-file-import"></i></th>
                    </tr>
                </thead>
                <tbody style="padding: 15px;">
                    <tr>
                        <td class="heading-count">Số đơn hàng nhập kho hôm nay:</td>
                        <td class="number-count"><?php echo e($importOnDay->count(), false); ?></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng nhập kho chưa xử lý:</td>
                        <td class="number-count"><?php echo e($import->where('status', 'MOI_TAO')->count(), false); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-second-column">
            <table style="width:100%" class="table-dashboard">
                <thead>
                    <tr>
                        <th colspan="2" class="table-heading clearfix">Thống kê xuất hàng <i class="fas fa-file-export"></i></th>
                    </tr>
                </thead>
                <tbody style="padding: 15px;">
                    <tr>
                        <td class="heading-count">Đơn hàng xuất kho hôm nay:</td>
                        <td class="number-count"><?php echo e($exportOnDay->count(), false); ?></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng xuất kho chưa xử lý:</td>
                        <td class="number-count"><?php echo e($export->where('status', 'MOI_TAO')->count(), false); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-third-column">
            <table style="width:100%" class="table-dashboard">
                <thead>
                    <tr>
                        <th colspan="2" class="table-heading clearfix">Thông báo chuyển kho <i class="fas fa-sync-alt"></i></th>
                    </tr>
                </thead>
                <tbody style="padding: 15px;">
                    <tr>
                        <td class="heading-count">Đơn hàng chuyển kho hôm nay:</td>
                        <td class="number-count"><?php echo e($importOnDay->count(), false); ?></td>
                    </tr>
                    <tr>
                        <td class="heading-count">Đơn hàng chuyển kho chưa xử lý:</td>
                        <td class="number-count"><?php echo e($transfer->where('status', 'MOI_TAO')->count(), false); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('dashboard.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>