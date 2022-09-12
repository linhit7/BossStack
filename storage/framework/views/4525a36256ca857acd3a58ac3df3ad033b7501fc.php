<aside class="main-sidebar" style="padding-top: 0;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel clearfix">
            <div class="user-panel-avt">
                <div class="image">
                    <img src="https://rbooks.vn/public/rbooks-vn-management/public/dist/img/icon-rb.jpg" class="img-circle" alt="<?php echo e(Auth::user() == null ? "" : Auth::user()->name); ?>">
                </div>
            </div>
            <div class="user-panel-info">
                <div class="info">
                    <p><?php echo e(Auth::user() == null ? "" : Auth::user()->name); ?></p>
                </div>
                <div class="sign-out">
                    <a class="btn btn-default btn-flat" href="<?php echo e(route('logout')); ?>"
                        onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                        "> Đăng xuất</i>
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">

            <?php if(isset($leftmenu) and count($leftmenu) != 0): ?>
                <?php $__currentLoopData = $leftmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="header header-system"><?php echo e($module['name']); ?></li>
    
                    <?php $__currentLoopData = $module['applicationfunctiongroups']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $functiongroups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="treeview">
                            <?php if(isset($functiongroups['filename']) and $functiongroups['filename'] != ''): ?>
                                <li class="list-menu"><a href="<?php echo e(route($functiongroups['filename'])); ?>"><i class="<?php echo e($functiongroups['image']); ?>"></i><?php echo e($functiongroups['name']); ?></a></li>
                            <?php else: ?>
                                <a href="#">
                                    <i class="<?php echo e($functiongroups['image']); ?>"></i><span><?php echo e($functiongroups['name']); ?></span>
                                    <?php if(isset($functiongroups['functionassignment']) and count($functiongroups['functionassignment']) != 0): ?>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>
                                    
                            <ul class="treeview-menu">
                            <?php $__currentLoopData = $functiongroups['functionassignment']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $functionassignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route($functionassignment['filename'])); ?>"><i class="<?php echo e($functionassignment['image']); ?>"></i><?php echo e($functionassignment['name']); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </ul>
    </section>
<!-- /.sidebar -->
</aside>