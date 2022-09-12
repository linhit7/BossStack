<?php $__env->startSection('content'); ?>

<?php if(isset($infor)): ?>
<p align='left'>
<font size=6 color='#ff0000'>
<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
</font>
<font size=4 color='#000'><b><?php echo e($infor); ?></b></font>
</p> 

<?php endif; ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>