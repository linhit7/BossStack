<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(config('app.name')); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="route" content="<?php echo e(request()->route()->getName()); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/font-awesome/css/font-awesome.min.css')); ?>">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/Ionicons/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/common.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/style_fund.css')); ?>">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <?php echo $__env->yieldContent('head'); ?>

</head>

<body style="font-family: 'Roboto', sans-serif !important;">

    <?php if(session()->has('success')): ?>
        <?php echo $__env->make('layouts.partials.messages.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>


    <div id="header-fund">

        <!-- Menu -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo-fund">
                            <a href="http://103.101.162.242/public/funds/public/"><img src="<?php echo e(asset('img/lam-w.png')); ?>"></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="menu-fund">
                            <ul>
                                <li><a href="#">Về chúng tôi</a></li>
                                <li><a href="#">Sản phẩm</a></li>
                                <li><a href="#">Dịch vụ hỗ trợ</a></li>
                                <li><a href="#">Tuyển dụng</a></li>
                                <li><a href="#">Liên hệ</a></li>
                                <li class="sign-in"><a href="<?php echo e(route('login')); ?>">Đăng nhập</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Menu -->

        <!-- Register -->
        <div class="register">

            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card-group">
                            <div class="card card-left">
                                <img class="card-img" src="<?php echo e(asset('img/signup-hinh.jpg')); ?>" alt="">
                            </div>
                            <div class="card card-right">
                                <div class="card-body">
                                    <form role="form" action="<?php echo e(route('customers-addCustomer')); ?>?continue=true" method="post" id="customer-form">
                            
                                        <div class="box box-primary">
                                            <div class="box-header text-center">
                                                <img src="<?php echo e(asset('img/lam.png')); ?>" alt="" width="20%">
                                            </div>
                                            <?php echo e(csrf_field()); ?>

                                            <div class="box-body">
                                                <div class="form-group text-center">
                                                    <h3>THÔNG TIN CÁ NHÂN</h3>
                                                </div>

                                                <div class="form-group">
                                                    <label>Họ & tên <small class="text-danger text"> (*)</small>:</label>
                                                    <input type="text" class="form-control" name="fullname" value="<?php echo e(old('fullname')); ?>">
                                                    <?php if($errors->has('fullname')): ?><span class="text-danger"><?php echo e($errors->first('fullname')); ?></span><?php endif; ?>
                                                    </div>
                                                </div>

                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Ngày sinh <small class="text-danger text"> (*)</small>:</label>
                                                            <input type="date" class="form-control" name="birthday" value="<?php echo e(old('birthday')); ?>">
                                                            <?php if($errors->has('birthday')): ?><span class="text-danger"><?php echo e($errors->first('birthday')); ?></span><?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Giới tính <small class="text-danger text"> (*)</small>:</label>
                                                            <select class="form-control select2" name="gender">
                                                                <option value=""></option>
                                                                <?php $__currentLoopData = $gendertype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($key == old('gender')): ?>
                                                                        <option value="<?php echo e($key); ?>" selected><?php echo e($value); ?></option>
                                                                    <?php else: ?>
                                                                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option> 
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <?php if($errors->has('gender')): ?><span class="text-danger"><?php echo e($errors->first('gender')); ?></span><?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Địa chỉ <small class="text-danger text"> (*)</small>:</label>
                                                    <input type="text" class="form-control" name="address" value="<?php echo e(old('address')); ?>">
                                                    <?php if($errors->has('address')): ?><span class="text-danger"><?php echo e($errors->first('address')); ?></span><?php endif; ?>
                                                </div>

                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Điện thoại <small class="text-danger text"> (*)</small>:</label>
                                                            <input type="text" class="form-control" tabindex="5" name="phone" value="<?php echo e(old('phone')); ?>"> 
                                                            <?php if($errors->has('phone')): ?><span class="text-danger"><?php echo e($errors->first('phone')); ?></span><?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email <small class="text-danger text"> (*)</small>:</label>
                                                            <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
                                                            <?php if($errors->has('email')): ?><span class="text-danger"><?php echo e($errors->first('email')); ?></span><?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Người liên hệ khi cần:</label>
                                                            <input type="text" class="form-control" tabindex="5" name="contactname" value="<?php echo e(old('contactname')); ?>"> 
                                                            <?php if($errors->has('contactname')): ?><span class="text-danger"><?php echo e($errors->first('contactname')); ?></span><?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Điện thoại:</label>
                                                            <input type="text" class="form-control" tabindex="5" name="contactphone" value="<?php echo e(old('contactphone')); ?>"> 
                                                            <?php if($errors->has('contactphone')): ?><span class="text-danger"><?php echo e($errors->first('contactphone')); ?></span><?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nhóm khách hàng <small class="text-danger text"> (*)</small>:</label>
                                                    <select class="form-control select2" name="customertype">
                                                        <option value=""></option>
                                                        <?php $__currentLoopData = $customertype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($key == old('customertype')): ?>
                                                                <option value="<?php echo e($key); ?>" selected><?php echo e($value); ?></option>
                                                            <?php else: ?>
                                                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>                                                                    
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php if($errors->has('customertype')): ?><span class="text-danger"><?php echo e($errors->first('customertype')); ?></span><?php endif; ?>
                                                </div>

                                                <hr>
                                                <div class="form-group text-center">
                                                    <h3>SẢN PHẨM ĐĂNG KÝ</h3>
                                                </div>

                                                <div class="register-product">
                                                    <div class="row">
                                                        <div class="col-md-4 text-center">
                                                            <img src="<?php echo e(asset('img/icon-1.png')); ?>" width="50%">
                                                            <div class="check-product">
                                                                <input type="checkbox" tabindex="4" name="personalcashflow" value="1" id="chk-personalcashflow" <?php echo e(old('personalcashflow')==1 ? 'checked="checked"' : ''); ?>>
                                                                <p>Dòng tiền cá nhân</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <img src="<?php echo e(asset('img/icon-2.png')); ?>" width="50%">
                                                            <div class="check-product">
                                                                <input type="checkbox" tabindex="4" name="invest" value="1" id="chk-invest" <?php echo e(old('invest')==1 ? 'checked="checked"' : ''); ?>>
                                                                <p>Đầu tư</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <img src="<?php echo e(asset('img/icon-3.png')); ?>" width="50%">
                                                            <div class="check-product">
                                                                <input type="checkbox" tabindex="4" name="saving" value="1" id="chk-saving" <?php echo e(old('saving')==1 ? 'checked="checked"' : ''); ?>>
                                                                <p>Tiết kiệm</p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                                                     
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-register"><b>ĐĂNG KÝ</b></button>   
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Register -->

        

    </div> 


</body>
</html>
