<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <style type="text/css" media="screen">
        body {
			margin: 0;
			padding: 0;
			background: #555;
		}
		.content {
			max-width: 768px;
		    margin: auto;
		    background: white;
		    padding: 10px;
	        font-family: 'Roboto', sans-serif;
    		font-size: 15px;
    		border-width: 6px;
		    border-style: double;
		    border-color: #000;
		}

		.content .im{
			color: #000;
		}

		.content section{
			margin: 0 45px;
		}

		table {
			width: 100%;
			margin-left: 30px;
		}

		.img-logo {
			width: 170px;
			height: 80x;
		}
		.logo {
			width: 445px;
		}
		.app {
			width: 171px;
		}
		.google {
			width: 150px;
		}
		.head{
			float: left;
		}

		.info{
			float: left;
		}
		.payment{
			width: 50%;
		}
		.address{
			width: 50%;
		}
    </style>
</head>
<body>
		<div class="content">
	  		<header>
  				<div class="logo-header">
  					<img src="https://rbooks.vn/public/imgs/banners/RB-header-email.png" alt="" width="768px">
  				</div>
	    	</header>
		    <section>
		    	<article>
		    		<div style="text-align: center;">
		    			<h1 style="font-size: 30px; color: #283b91;">
		    				<b>THÔNG BÁO</b>
		    			</h1>
		    		</div>
		    	</article>
		    	<article class="pt-3">
		    		<h3 style="border-bottom: 2px solid #ddd; color: #283b91; font-size: 17px;">NGƯỜI YÊU CẦU</h3>
		    		<table class="table table-hover">
		    			<tbody>
		    				<tr>
		    					<td width="50%"><b>Nhân viên</b></td>
		    					<td><b><?php echo e($checkemployee->employee->id_staff, false); ?> - <?php echo e($checkemployee->employee->fullname, false); ?></b></td>
		    				</tr>
		    				<tr>
		    					<td width="50%"><b>Phòng ban</b></td>
		    					<td><?php echo e($checkemployee->department->name, false); ?></td>
		    				</tr>
		    				<tr>
		    					<td width="50%"><b>Chức vụ</b></td>
		    					<td><?php echo e($checkemployee->employee->position->name, false); ?></td>
		    				</tr>
		    			</tbody>
		    		</table>

		    		<h3 style="border-bottom: 2px solid #ddd; color: #283b91; font-size: 17px;">THÔNG TIN PHÊ DUYỆT</h3>
		    		<table class="table table-hover">
		    			<tbody>
		    				<tr>
		    					<td width="50%"><b>Ngày yêu cầu</b></td>
		    					<td><?php echo e(date("d-m-Y", strtotime($checkemployee->created_at)), false); ?></td>
		    				</tr>
		    				<tr>
		    					<td width="50%"><b>Ngày phê duyệt</b></td>
		    					<td><?php echo e(date("d-m-Y", strtotime($checkemployee->approved_at)), false); ?></td>
		    				</tr>
		    				<tr>
		    					<td width="50%"><b>Người phê duyệt</b></td>
		    					<td><b style="text-transform: capitalize;"><?php echo e($checkemployee->users()->first()->fullname, false); ?></b></td>
		    				</tr>
		    				<tr>
		    					<td width="50%"><b>Trạng thái phê duyệt</b></td>
		    					<td>
		    						<b>
		    							<?php if($checkemployee->status == 1): ?>
					    					<span style="color: #3c763d;">ĐÃ DUYỆT</span>
					    				<?php else: ?>
					    					<span style="color: red;">KHÔNG DUYỆT</span>
					    				<?php endif; ?>
		    						</b>
		    					</td>
		    				</tr>
		    			</tbody>
		    		</table>

		    		<h3 style="border-bottom: 2px solid #ddd; color: #283b91; font-size: 17px;">THÔNG TIN NGHỈ</h3>
		    		<table class="table table-hover">
		    			<tbody>
		    				<tr>
		    					<td width="50%"><b>Loại hình nghỉ</b></td>
		    					<td><?php echo e($checkemployee->checktype->description, false); ?></td>
		    				</tr>
		    				<tr>
		    					<td width="50%"><b>Xin nghỉ từ ngày</b></td>
		    					<td><?php echo e(date("d-m-Y", strtotime($checkemployee->fromdate)), false); ?></td>
		    				</tr>
		    				<tr>
		    					<td width="50%"><b>Xin nghỉ tới ngày</b></td>
		    					<td><?php echo e(date("d-m-Y", strtotime($checkemployee->todate)), false); ?></td>
		    				</tr>
		    				<tr>
		    					<td width="50%"><b>Tổng số ngày nghỉ</b></td>
		    					<td><?php echo e($checkemployee->numday, false); ?></td>
		    				</tr>
		    				<tr>
		    					<td width="50%"><b>Lý do</b></td>
		    					<td><?php echo e($checkemployee->description, false); ?></td>
		    				</tr>
		    			</tbody>
		    		</table>
		    	</article>
		    </section>
		    <footer style="margin-top: 40px;">
  				<div class="logo-footer">
  					<img src="https://rbooks.vn/public/imgs/banners/RB-footer-email.png" alt="" width="768px">
  				</div>
	    	</footer>
		</div>
</body>

</html>