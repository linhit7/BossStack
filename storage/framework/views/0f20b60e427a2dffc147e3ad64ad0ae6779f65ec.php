<div class="box box-default">
    <form role="form" action="<?php echo e(route('monthinsurances-process'), false); ?>"  method="post" id="frmsearch">
    <?php echo e(csrf_field(), false); ?> 
    <input type='hidden' name='typereport' value=''>
        <div class="box-header with-border">
            <h3 class="box-title">Chọn tháng/năm cần tính bảo hiểm xã hội</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-2">
                    <label>Tháng <small class="text-danger text"> (*)</small>:</label>
                    <select id="month" class="form-control" name="month">
                        <?php for($i = 1; $i <= 12; $i++): ?>
                            <?php if($month == $i): ?>
                                <option value="<?php echo e($i, false); ?>" selected><?php echo e($i, false); ?></option>        
                            <?php else: ?>
                                <option value="<?php echo e($i, false); ?>"><?php echo e($i, false); ?></option>                            
                            <?php endif; ?>                                
                        <?php endfor; ?>                        
                    </select>
                </div>
                <div class="col-xs-2">
                    <label>Năm <small class="text-danger text"> (*)</small>:</label>
                    <select id="year" class="form-control" name="year">
                        <?php for($i = $year-3; $i <= $year+3; $i++): ?>
                            <?php if($year == $i): ?>
                                <option value="<?php echo e($i, false); ?>" selected><?php echo e($i, false); ?></option>        
                            <?php else: ?>
                                <option value="<?php echo e($i, false); ?>"><?php echo e($i, false); ?></option>                            
                            <?php endif; ?>                                
                        <?php endfor; ?>                        
                    </select>
                </div>
            </div>
        </div>
        <div class="box-footer text-left">
            <button class="btn btn-primary btn-create" onclick="processReports('frmsearch', 'add')">Tạo mới</button>
            <button class="btn btn-primary btn-search" onclick="processReports('frmsearch', 'view')">Xem bảng tính đã lưu</button>
        </div>
    </form>
</div>

