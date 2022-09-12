<div class="modal fade" id="getCheckEmployee" role="dialog">
    <div class="modal-dialog getNotice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Danh sách nghỉ phép hôm nay và ngày mai</h4>
            </div>
            <div class="modal-body">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Thời gian</th>
                            <th>Mã nhân viên</th>
                            <th>Họ và tên</th>
                            <th>Chức vụ</th>
                            <th>Phòng ban</th>
                            <th>Loại phép</th>
                            <th>Lý do nghỉ</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1
                        ?>
                        <?php $__currentLoopData = $checkemplInDay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeInDay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i, false); ?></td>
                                <?php if($employeeInDay->fromdate <= Carbon\Carbon::now()): ?>
                                    <td>Hôm nay</td>
                                <?php else: ?>
                                    <td>Ngày mai</td>
                                <?php endif; ?>
                                <td><?php echo e($employeeInDay->employee()->first()->id_staff, false); ?></td>
                                <td><?php echo e($employeeInDay->employee()->first()->fullname, false); ?></td>
                                <td><?php echo e($employeeInDay->employee()->first()->position() != NULL ? $employeeInDay->employee()->first()->position()->first()->name : "", false); ?></td>
                                <td><?php echo e($employeeInDay->employee()->first()->department() != NULL ? $employeeInDay->employee()->first()->department()->first()->name : "", false); ?></td>
                                <td><?php echo e($employeeInDay->checktype()->first()->description, false); ?></td>
                                <td><?php echo e($employeeInDay->description, false); ?></td>
                                <td>
                                    <div class="date"><?php echo e(date("d-m-Y", strtotime($employeeInDay->fromtime)), false); ?></div>
                                    <div class="time"><?php echo e($employeeInDay->fromtime, false); ?></div>
                                </td>
                                <td>
                                    <div class="date"><?php echo e(date("d-m-Y", strtotime($employeeInDay->todate)), false); ?></div>
                                    <div class="time"><?php echo e($employeeInDay->totime, false); ?></div>
                                </td>
                            </tr>
                            <?php
                                $i++
                            ?>
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