<div class="modal fade" id="getCheckBusiness" role="dialog">
    <div class="modal-dialog getNotice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Danh sách công tác hôm nay và ngày mai</h4>
            </div>
            <div class="modal-body">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Mã nhân viên</th>
                            <th>Họ và tên</th>
                            <th>Chức vụ</th>
                            <th>Phòng ban</th>
                            <th>Công việc cụ thể</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $checkbusiInDay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $businessInDay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($businessInDay->employee()->first()->id_staff, false); ?></td>
                                <td><?php echo e($businessInDay->employee()->first()->fullname, false); ?></td>
                                <td><?php echo e($businessInDay->employee()->first()->position() != NULL ? $businessInDay->employee()->first()->position()->first()->name : "", false); ?></td>
                                <td><?php echo e($businessInDay->employee()->first()->department() != NULL ? $businessInDay->employee()->first()->department()->first()->name : "", false); ?></td>
                                <td><?php echo e($businessInDay->description, false); ?></td>
                                <td>
                                    <div class="date"><?php echo e(date("d-m-Y", strtotime($businessInDay->fromdate)), false); ?></div>
                                </td>
                                <td>
                                    <div class="date"><?php echo e(date("d-m-Y", strtotime($businessInDay->todate)), false); ?></div>
                                </td>
                                <?php if($businessInDay->fromdate <= Carbon\Carbon::now()): ?>
                                    <td>Hôm nay</td>
                                <?php else: ?>
                                    <td>Ngày mai</td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>