<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(config('app.name')); ?></title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="route" content="<?php echo e(request()->route()->getName()); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Bootstrap CSS -->

	<!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Fontawesome CSS -->

    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/style_fund.css')); ?>">

	<!-- Font Family -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <!-- Font Family -->

    <?php echo $__env->yieldContent('head'); ?>

</head>

<body>
	
	<div id="header-fund">
		
		<!-- Menu -->
        <?php echo $__env->make('home.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- End Menu -->

		<!-- Banner -->
        <div class="banner-default-fund">
            <div class="container"></div>
        </div>
        <!-- End Banner -->

	</div>

	<div id="main-fund">
		<?php echo $__env->yieldContent('content'); ?>
	</div>

	<?php echo $__env->make('home.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<!-- Jquery Script -->
	<script src="<?php echo e(asset('bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- Jquery Script -->

    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- Bootstrap Script -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!-- Bootstrap Script -->

    <script>
        
        var url = window.location.href;

        if(url == "https://dongtiencanhan.com/public/about-us"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>VỀ LAMs</font></h1>" );

        }else if(url == "https://dongtiencanhan.com/public/intro-products"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>SẢN PHẨM</font></h1>" );

        }else if(url == "https://dongtiencanhan.com/public/invest"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>ĐẦU TƯ</font></h1>" );

        }else if(url == "https://dongtiencanhan.com/public/personalcash"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>QUẢN LÝ DÒNG TIỀN CÁ NHÂN</font></h1>" );

        }else if(url == ""){

        }else if(url == ""){

        }else if(url == "https://dongtiencanhan.com/public/advisory"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>DỊCH VỤ HỖ TRỢ</font></h1>" );

        }else if(url == "https://dongtiencanhan.com/public/recruitment"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>TUYỂN DỤNG</font></h1>" );

        }else if(url == "https://dongtiencanhan.com/public/contact"){
            $( ".banner-default-fund .container" ).html( "<h1 class='text-center'><font size='7' color='#fff'>LIÊN HỆ</font></h1>" );
        }

    </script>
	
	<?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>