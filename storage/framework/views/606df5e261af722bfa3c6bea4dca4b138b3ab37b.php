<div class="modal fade" id="getBirthday" role="dialog">
    <div class="modal-dialog getNotice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Danh sách sinh nhật</h4>
            </div>
            <div class="modal-body">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã nhân viên</th>
                            <th>Họ và tên</th>
                            <th>Chức vụ</th>
                            <th>Phòng ban</th>
                            <th>Ngày sinh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1
                        ?>
                        <?php $__currentLoopData = $birthdayInMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $birthday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="text-align: right;"><?php echo e($i, false); ?></td>
                                <td style="text-align: center;"><?php echo e($birthday->id_staff, false); ?></td>
                                <td style="text-align: left;"><?php echo e($birthday->fullname, false); ?></td>
                                <td style="text-align: left;"><?php echo e($birthday->position() == NULL ? "" : $birthday->position()->first()->name, false); ?></td>
                                <td style="text-align: left;"><?php echo e($birthday->department() == NULL ? "" : $birthday->department()->first()->name, false); ?></td>
                                <td style="text-align: center;"><?php echo e(date("d-m-Y", strtotime($birthday->birthday)), false); ?></td>
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