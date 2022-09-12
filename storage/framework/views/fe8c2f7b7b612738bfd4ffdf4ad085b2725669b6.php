<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(asset('dist/img/icon-rb.jpg')); ?>" class="img-circle" alt="<?php echo e(Auth::user() == null ? "" : Auth::user()->name); ?>">
            </div>
            <div class="pull-left info">
                <p><?php echo e(Auth::user() == null ? "" : Auth::user()->name); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">

            <?php if(isset($leftmenu) and count($leftmenu) != 0): ?>
                <?php $__currentLoopData = $leftmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="header header-system"><?php echo e($module['name']); ?></li>
    
                    <?php $__currentLoopData = $module['applicationfunctiongroups']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $functiongroups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="<?php echo e($functiongroups['image']); ?>"></i><span><?php echo e($functiongroups['name']); ?></span>

                                <?php if(isset($functiongroups['functionassignment']) and count($functiongroups['functionassignment']) != 0): ?>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                <?php endif; ?>
                            </a>
        
                            <ul class="treeview-menu">
                            <?php $__currentLoopData = $functiongroups['functionassignment']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $functionassignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route($functionassignment['filename'])); ?>"><i class="<?php echo e($functionassignment['image']); ?>"></i><?php echo e($functionassignment['name']); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            <?php endif; ?>

            <li class="header header-system">HỆ THỐNG</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i><span>Quản lý user</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('users-index')); ?>" data-name="users-index|users-add|users-edit"><i class="fa fa-users"></i>User</a></li>
                </ul>
            </li>

            <li class="list-menu"><a href="<?php echo e(route('applicationroles-index')); ?>"><i class="fa fa-bars"></i><span>Quản lý role truy cập</span></a></li>
            <li class="list-menu"><a href="<?php echo e(route('applicationmodules-index')); ?>"><i class="fa fa-bars"></i><span>Quản lý module truy cập</span></a></li>
            <li class="list-menu"><a href="<?php echo e(route('applicationresources-index')); ?>"><i class="fa fa-bars"></i><span>Quản lý trang truy cập</span></a></li>



        </ul>
    </section>
<!-- /.sidebar -->
</aside>