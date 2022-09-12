<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(asset('dist/img/icon-rb.jpg'), false); ?>" class="img-circle" alt="<?php echo e(Auth::user()->name, false); ?>">
            </div>
            <div class="pull-left info">
                <p><?php echo e(Auth::user()->name, false); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Tìm nhanh...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <?php if(isset($leftmenu) and count($leftmenu) != 0): ?>
                <?php $__currentLoopData = $leftmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="header header-system"><?php echo e($module['name'], false); ?></li>
    
                    <?php $__currentLoopData = $module['applicationfunctiongroups']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $functiongroups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="<?php echo e($functiongroups['image'], false); ?>"></i><span><?php echo e($functiongroups['name'], false); ?></span>

                                <?php if(isset($functiongroups['functionassignment']) and count($functiongroups['functionassignment']) != 0): ?>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                <?php endif; ?>
                            </a>
        
                            <ul class="treeview-menu">
                            <?php $__currentLoopData = $functiongroups['functionassignment']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $functionassignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route($functionassignment['filename']), false); ?>"><i class="<?php echo e($functionassignment['image'], false); ?>"></i><?php echo e($functionassignment['name'], false); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            <?php endif; ?>


            <li class="header header-system">HỆ THỐNG BÁN HÀNG</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i><span>Quản lý kho hàng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('warehouses-index'), false); ?>" data-name="warehouses-index|warehouses-add|warehouses-edit"><i class="fa fa-archive"></i>Kho hàng</a></li>
                    <li><a href="<?php echo e(route('warehouses-imports-index'), false); ?>" data-name="warehouses-imports-index|warehouses-imports-add|warehouses-imports-edit"><i class="fa fa-arrow-circle-down"></i>Nhập hàng</a></li>
                    <li><a href="<?php echo e(route('warehouses-exports-index'), false); ?>" data-name="warehouses-exports-index|warehouses-exports-add|warehouses-exports-edit"><i class="fa fa-upload"></i>Xuất hàng</a></li>
                    <li><a href="<?php echo e(route('warehouses-transfers-index'), false); ?>" data-name="warehouses-transfers-index|warehouses-transfers-add|warehouses-transfers-edit"><i class="fa fa-refresh"></i>Quản lý chuyển kho</a></li>
                    <li><a href="#"><i class="fa fa-area-chart"></i>Báo cáo</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-cubes"></i><span>Quản lý sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('products-index'), false); ?>" data-name="products-index|products-add|products-edit"><i class="fa fa-archive"></i>Sản phẩm</a></li>
                    <li><a href="<?php echo e(route('categories-index'), false); ?>" data-name="categories-index|categories-add|categories-edit"><i class="fa fa-book"></i>Danh mục / Thể loại</a></li>
                    <!-- <li><a href="<?php echo e(route('authors-index'), false); ?>" data-name="authors-index|authors-add|authors-edit"><i class="fa fa-camera-retro"></i> Tác giả</a></li> -->
                    <li><a href="<?php echo e(route('suppliers-index'), false); ?>" data-name="suppliers-index|suppliers-add|suppliers-edit"><i class="fa fa-truck"></i>Nhà cung cấp</a></li>
                    <!-- <li><a href="<?php echo e(route('attributes-index'), false); ?>" data-name="attributes-index|attributes-add|attributes-edit"><i class="fa fa-clone"></i> Thuộc tính sản phẩm</a></li> -->
                    <li><a href="<?php echo e(route('comments-index'), false); ?>" data-name="comments-index|comments-confirm"><i class="fa fa-commenting"></i>Quản lý nhận xét/ đánh giá</a></li>
                    <li><a href="<?php echo e(route('question-index'), false); ?>" data-name="question-index"><i class="fa fa-comments"></i>Quản lý hỏi, đáp</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i><span>Quản lý bán hàng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('orders-index'), false); ?>" data-name="orders-index|orders-add|orders-edit"><i class="fa fa-print"></i>Đơn hàng</a></li>
                    <li><a href="<?php echo e(route('vat-index'), false); ?>" data-name="vat-index"><i class="fa fa-money"></i>Hóa đơn</a></li>
                    <!-- <li><a href="#" data-name=""><i class="fa fa-gift"></i> Coupon / Quà tặng</a></li> -->
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-globe"></i><span>Quản lý marketing</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('coupons-index'), false); ?>" data-name="coupons-index|coupons-add|coupons-edit"><i class="fa fa-file-archive-o"></i>Quản lý coupon</a></li>
                    <li><a href="#" data-name=""><i class="fa fa-envelope"></i>Gửi thư tin tức</a></li>
                    <li><a href="#" data-name=""><i class="fa fa-pie-chart"></i>Chiến dịch email marketing</a></li>
                    <li><a href="<?php echo e(route('promotions-index'), false); ?>" data-name="promotions-index"><i class="fa fa-gift"></i>Chương trình khuyến mãi</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i><span>Quản lý khách hàng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('customers-index'), false); ?>" data-name="customers-index|customers-add|customers-edit"><i class="fa fa-handshake-o"></i>Khách hàng</a></li>
                    <li><a href="<?php echo e(route('customers-groups-index'), false); ?>" data-name="customers-groups-index|customers-groups-add|customers-groups-edit"><i class="fa fa-user-circle"></i>Nhóm khách hàng</a></li>
                </ul>
            </li>
            <li class="header header-company">HỆ THỐNG TÀI CHÍNH</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-usd"></i><span>Doanh thu</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('gross_revenues-index'), false); ?>" data-name="gross_revenues-index|gross_revenues-add|gross_revenues-edit"><i class="fa fa-usd"></i>Doanh thu tổng</a></li>
                    <li><a href="<?php echo e(route('net_revenues-index'), false); ?>" data-name=""><i class="fa fa-usd"></i>Doanh thu thực tế</a></li>
                    <li><a href="<?php echo e(route('receivables_debts-index'), false); ?>" data-name=""><i class="fa fa-usd"></i>Công nợ phải thu</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fas fa-hand-holding-usd"></i><span>Chi phí</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="treeview item">
                        <a href="#">
                            <i class="fas fa-hand-holding-usd"></i><span>Chi phí tổng</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu list-items">
                            <li><a href="<?php echo e(route('cpt_gvt-index'), false); ?>" data-name="cpt_gvt-index|cpt_gvt-add|cpt_gvt-edit"><i class="fas fa-hand-holding-usd"></i>Giá vốn tổng</a></li>
                            <li><a href="<?php echo e(route('cpt_qlbh-index'), false); ?>" data-name="cpt_qlbh-index|cpt_qlbh-add|cpt_qlbh-edit"><i class="fas fa-hand-holding-usd"></i>Quản lý bán hàng</a></li>
                            <li><a href="<?php echo e(route('cpt_qldn-index'), false); ?>" data-name="cpt_qldn-index|cpt_qldn-add|cpt_qldn-edit"><i class="fas fa-hand-holding-usd"></i>Quản lý doanh nghiệp</a></li>
                            <li><a href="<?php echo e(route('cpt_tscd-index'), false); ?>" data-name="cpt_tscd-index|cpt_tscd-add|cpt_tscd-edit"><i class="fas fa-hand-holding-usd"></i>Tài sản cố định</a></li>
                            <li><a href="<?php echo e(route('cpt_khac-index'), false); ?>" data-name="cpt_khac-index|cpt_khac-add|cpt_khac-edit"><i class="fas fa-hand-holding-usd"></i>Khác</a></li>
                        </ul>
                    </li>

                    <li class="treeview item">
                        <a href="#">
                            <i class="fas fa-hand-holding-usd"></i><span>Chi phí thực tế</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu list-items">
                            <li><a href="<?php echo e(route('cptt_gvhb-index'), false); ?>" data-name="cptt_gvhb-index"><i class="fas fa-hand-holding-usd"></i>Giá vốn hàng bán</a></li>
                            <li><a href="<?php echo e(route('cptt_bh-index'), false); ?>" data-name="cptt_bh-index"><i class="fas fa-hand-holding-usd"></i>Chi phí bán hàng</a></li>
                            <li><a href="<?php echo e(route('cptt_dn-index'), false); ?>" data-name="cptt_dn-index"><i class="fas fa-hand-holding-usd"></i>Chi phí doanh nghiệp</a></li>
                            <li><a href="<?php echo e(route('cptt_tscd-index'), false); ?>" data-name="cptt_tscd-index"><i class="fas fa-hand-holding-usd"></i>Chi phí tài sản cố định</a></li>
                            <li><a href="<?php echo e(route('cptt_khac-index'), false); ?>" data-name="cptt_khac-indext"><i class="fas fa-hand-holding-usd"></i>Chi phí khác</a></li>
                        </ul>
                    </li>

                    <li class="treeview item">
                        <a href="#">
                            <i class="fas fa-hand-holding-usd"></i><span>Công nợ phải trả</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu list-items">
                            <li><a href="<?php echo e(route('cpcn_gvhb-index'), false); ?>" data-name="cpcn_gvhb-index"><i class="fas fa-hand-holding-usd"></i>Công nợ giá vốn</a></li>
                            <li><a href="<?php echo e(route('cpcn_bh-index'), false); ?>" data-name="cpcn_bh-index"><i class="fas fa-hand-holding-usd"></i>Công nợ bán hàng</a></li>
                            <li><a href="<?php echo e(route('cpcn_dn-index'), false); ?>" data-name="cpcn_dn-index"><i class="fas fa-hand-holding-usd"></i>Công nợ doanh nghiệp</a></li>
                            <li><a href="<?php echo e(route('cpcn_tscd-index'), false); ?>" data-name="cpcn_tscd-index"><i class="fas fa-hand-holding-usd"></i>Công nợ tài sản cố định</a></li>
                            <li><a href="<?php echo e(route('cpcn_khac-index'), false); ?>" data-name="cpcn_khac-index"><i class="fas fa-hand-holding-usd"></i>Công nợ khác</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="list-menu"><a href="<?php echo e(route('profit-index'), false); ?>" data-name="profit-index"><i class="fas fa-piggy-bank"></i><span>Lợi nhuận</span></a></li>

            <li class="list-menu"><a href="#" data-name=""><i class="fa fa-line-chart"></i><span>Thống kê</span></a></li>

            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-calculator"></i><span>Kế toán</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('debts-index'), false); ?>" data-name="debts-index|debts-add|debts-edit"><i class="fa fa-file-text"></i>Công nợ</a></li>
                    <li><a href="#" data-name=""><i class="fa fa-file-text"></i>Chứng từ</a></li>
                    <li><a href="#" data-name=""><i class="fa fa-file-text"></i>Hóa đơn</a></li>
                    <li><a href="#" data-name=""><i class="fa fa-file-text"></i>Báo cáo</a></li>
                </ul>
            </li> -->
            <li class="header header-system-account">HỆ THỐNG VẬN HÀNH</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-plus"></i><span>Tuyển dụng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('careers-index'), false); ?>" data-name="careers-index|careers-add|careers-edit|careers-detail"><i class="fa fa-file-text"></i>Danh sách phỏng vấn</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i></i><span>Nhân sự</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('employees-index'), false); ?>" data-name="employees-index|employees-add|employees-edit|employees-detail"><i class="fa fa-bars"></i>Hồ sơ nhân sự</a></li>
                    <li><a href="<?php echo e(route('emplperdays-index'), false); ?>" data-name="emplperdays-index|emplperdays-add|emplperdays-edit|emplperdays-detail"><i class="fa fa-calendar"></i>Quản lý phép năm</a></li>

                    <li class="treeview item">
                        <a href="#">
                            <i class="fa fa-bar-chart"></i><span>Báo cáo nhân sự</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu list-items">
                            <li><a href="<?php echo e(route('checkemployees-index'), false); ?>" data-name="checkemployees-index|checkemployees-add|checkemployees-edit|checkemployees-detail"><i class="fa fa-check-square"></i>Phê duyệt nghỉ phép</a></li>
                            <li><a href="<?php echo e(route('checkbusiness-index'), false); ?>" data-name="checkbusiness-index|checkbusiness-add|checkbusiness-edit|checkbusiness-detail"><i class="fa fa-check-square"></i>Phê duyệt công tác</a></li>
                            <li><a href="#" data-name="laborcontracts-index|laborcontracts-add|laborcontracts-edit|laborcontracts-detail"><i class="fa fa-address-book"></i>Hợp đồng lao động</a></li>
                        </ul>
                    </li>

                    <li class="treeview item">
                        <a href="#">
                            <i class="fa fa-table"></i><span>Bảng công - lương</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu list-items">
                            <li><a href="<?php echo e(route('checkemployeemonths-index'), false); ?>" data-name="checkemployeemonths-index|checkemployeemonths-add|checkemployeemonths-edit|checkemployeemonths-detail"><i class="fa fa-calculator"></i>Bảng công tổng hợp</a></li>
                            <li><a href="<?php echo e(route('monthinsurances-index'), false); ?>" data-name="monthinsurances-index"><i class="fa fa-calculator"></i>Bảng tính BHXH</a></li>
                            <li><a href="<?php echo e(route('monthsalarys-index'), false); ?>" data-name="monthsalarys-index"><i class="fa fa-calculator"></i>Bảng lương tháng</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo e(route('kpis-index'), false); ?>" data-name="kpis-index|kpis-add|kpis-edit|kpis-detail"><i class="fa fa-signal"></i>KPI</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open"></i><span> ISO</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#" data-name=""><i class="fa fa-file-text"></i>Danh sách tài liệu</a></li>
                    <li><a href="#" data-name=""><i class="fa fa-th-large"></i>Nhóm tài liệu</a></li>
                </ul>
            </li>

            <li class="list-menu"><a href="<?php echo e(route('tscds-index'), false); ?>" data-name="tscds-index|tscds-add|tscds-edit"><i class="fa fa-television"></i><span>Quản lý tài sản cố định</span></a></li>

            <li class="header header-system">TÀI KHOẢN</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i><span>Quản lý user</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('users-index'), false); ?>" data-name="users-index|users-add|users-edit"><i class="fa fa-users"></i>User</a></li>
                    <li><a href="#" data-name=""><i class="fa fa-id-card"></i>Role</a></li>
                    <li><a href="#" data-name=""><i class="fa fa-ban"></i>Permission</a></li>
                    <li class="treeview item">
                        <a href="#">
                            <i class="fa fa-sliders"></i><span>Tham số hệ thống</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu list-items">
                            <li><a href="<?php echo e(route('departments-index'), false); ?>" data-name="departments-index|departments-add|departments-edit"><i class="fa fa-sitemap"></i>Phòng/ban</a></li>
                            <li><a href="<?php echo e(route('divisions-index'), false); ?>" data-name="divisions-index|divisions-add|divisions-edit"><i class="fa fa-building"></i>Bộ phận</a></li>
                            <li><a href="<?php echo e(route('positions-index'), false); ?>" data-name="positions-index|positions-add|positions-edit"><i class="fa fa-address-card"></i>Chức vụ</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <?php
                $parameter =  Auth::user()->id;
                $parameter = Crypt::encrypt($parameter);
            ?>
            <li class="list-menu"><a href="<?php echo e(route('users-detail', ['id' => $parameter ]), false); ?>"><i class="fa fa-info"></i><span>Thông tin tài khoản</span></a></li>
            <li class="list-menu"><a href="#"><i class="fa fa-question-circle"></i><span>Hỗ trợ</span></a></li>


            <li class="list-menu"><a href="<?php echo e(route('applicationroles-index'), false); ?>"><i class="fa fa-info"></i><span>Quản lý role truy cập</span></a></li>
            <li class="list-menu"><a href="<?php echo e(route('applicationmodules-index'), false); ?>"><i class="fa fa-info"></i><span>Quản lý module truy cập</span></a></li>
            <li class="list-menu"><a href="<?php echo e(route('applicationresources-index'), false); ?>"><i class="fa fa-info"></i><span>Quản lý trang truy cập</span></a></li>



        </ul>
    </section>
<!-- /.sidebar -->
</aside>