<?php $__env->startSection('content'); ?>
<?php if(session()->has('success')): ?>
    <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('product-manage.contract.partials.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">DANH SÁCH</h3>
                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <a href="<?php echo e(route('contracts-add')); ?>" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;" class="text-nowrap" width="1%">STT</th>
                            <th style="text-align: center;" class="text-nowrap" width="15%">TÊN KHÁCH HÀNG</th>
                            <th style="text-align: center;" class="text-nowrap">TUỔI</th>
                            <th style="text-align: center;" class="text-nowrap">EMAIL</th>
                            <th style="text-align: center;" class="text-nowrap">ĐIỆN THOẠI</th>
                            <th style="text-align: center;" class="text-nowrap">NGÀY KÝ HĐ</th>
                            <th style="text-align: center;" class="text-nowrap">MÃ HỢP ĐỒNG</th>
                            <th style="text-align: center;" class="text-nowrap">HỢP ĐỒNG SẢN PHẨM</th>
                            <th style="text-align: center;" class="text-nowrap">HẠN HỢP ĐỒNG</th>
                            <th style="text-align: center;" width="10%">CHỨC NĂNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($collections->count() === 0): ?>
                        <tr>
                            <td colspan="7"><b>Không có dữ liệu!!!</b></td>
                        </tr>
                        <?php endif; ?>
                        <?php
                            $i = 1
                        ?>                        
                        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="table-contract">
                                <td style="text-align: center;" class="text-nowrap"><?php echo e($i++); ?></td>
                                <td style="text-align: left;" class="text-nowrap"><?php echo e($contract->fullname); ?></td>
                                <td style="text-align: center;" class="text-nowrap"><?php echo e((Carbon\Carbon::now()->year) - (substr($contract->birthday, 0, 4))); ?></td>
                                <td style="text-align: left;" class="text-nowrap"><?php echo e($contract->email); ?></td>
                                <td style="text-align: left;" class="text-nowrap"><?php echo e($contract->phone); ?></td>
                                <td style="text-align: center;" class="text-nowrap"><?php echo e($contract->contractdate == null ? "" : ConvertSQLDate($contract->contractdate)); ?></td>
                                <td style="text-align: left;" class="text-nowrap"><?php echo e($contract->contractno); ?></td>
                                <td style="text-align: left;" class="text-nowrap">
                                    <?php if($contract->personalcashflow == 1): ?>
                                        <li><?php echo e($fundtype[0]); ?></li>        
                                    <?php endif; ?> 
                                    <?php if($contract->invest == 1): ?>
                                        <li><?php echo e($fundtype[1]); ?></li>        
                                    <?php endif; ?> 
                                    <?php if($contract->saving == 1): ?>
                                        <li><?php echo e($fundtype[2]); ?></li>        
                                    <?php endif; ?> 
                                </td>
                                <td style="text-align: center;" class="text-nowrap">
                                    <?php if($contract->contractstatustype == 1): ?>
                                        <b class="alert-warning"><?php echo e(mb_strtoupper($contractstatustype[$contract->contractstatustype])); ?></b>        
                                    <?php elseif($contract->contractstatustype == 2): ?>
                                        <b class="alert-success"><?php echo e(mb_strtoupper($contractstatustype[$contract->contractstatustype])); ?></b>        
                                    <?php else: ?> 
                                        <b class="alert-danger"><?php echo e(mb_strtoupper($contractstatustype[$contract->contractstatustype])); ?></b>        
                                    <?php endif; ?> 
                                </td>
                                <td style="text-align: center;" class="text-nowrap">
                                    <a href="<?php echo e(route('contracts-edit',['id'=> $contract->id])); ?>" title='Sửa'><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i></a> 
                                    <a href="javascript:void(0)" data-id="<?php echo e($contract->id); ?>" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <form name="form-delete-<?php echo e($contract->id); ?>" method="post" action="<?php echo e(route('contracts-delete', ['id' => $contract->id ])); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('delete')); ?>

                                        </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix text-right">
                <?php echo e($collections->links()); ?>

            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('product-manage.contract.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>