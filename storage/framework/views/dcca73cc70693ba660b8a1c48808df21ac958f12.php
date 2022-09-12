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

    <div id="header-fund">

        <!-- Menu -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo-fund">
                            <a href="https://dongtiencanhan.com/public/"><img src="<?php echo e(asset('img/lam-w.png')); ?>"></a>
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

        <div class="login">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="login-box">
                            <div class="card">
                                <div class="card-body d-flex">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="card-img" src="<?php echo e(asset('img/login-hinh.png')); ?>">
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            <div class="login-logo text-center">
                                                <img src="<?php echo e(asset('img/lam.png')); ?>" alt="" width="20%">
                                            </div>
                                            <form action="<?php echo e(route('login')); ?>" method="post">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="form-group has-feedback">
                                                    <input type="email" class="form-control" placeholder="Email" name="email" required="required" value="<?php echo e(env('TEST_USERNAME')); ?>">
                                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <input type="password" class="form-control" placeholder="Password" name="password" required="required" value="<?php echo e(env('TEST_PASSWORD')); ?>">
                                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-8">
                                                        <div class="remember">
                                                            <input type="checkbox" name="remember" value="1">
                                                            <p><b>Ghi nhớ tôi</b></p> 
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class="forgot-password">
                                                            <a href="#" class="card-link"><b>Quên mật khẩu?</b></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary btn-login" style="width: 100%;"><b>ĐĂNG NHẬP</b></button>
                                            </form>

                                            <p class="text-center" style="margin: 20px 0;"><b>Bạn có tài khoản chưa?</b></p>

                                            <a href="https://dongtiencanhan.com/public/customers/registerCustomer" class="btn btn-primary btn-register" style="width: 100%;"><b>ĐĂNG KÝ</b></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>

    <script>
        $(function() {
            var height_window = $( window ).height();
            var height_login = $(".login").innerHeight();

            $(".login").css("height", height_window);
            $(".login-box").css({
                "min-height": height_login,
                "display": "flex",
                "flex-direction": "column",
                "justify-content": "center",
                "align-items": "center",
                "text-align": "center",
            });

        });
    </script>
</body>
</html>
