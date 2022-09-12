<div class="box box-default">
    <form action="<?php echo e(route('checkemployees-index'), false); ?>">
        <div class="box-header with-border">
            <h3 class="box-title">Tìm kiếm</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
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
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-right">
            <button class="btn btn-primary btn-search">Tìm kiếm</button>
            <a href="<?php echo e(route('checkemployees-index'), false); ?>" class="btn btn-default">Xóa form</a>
        </div>
    </form>
</div>