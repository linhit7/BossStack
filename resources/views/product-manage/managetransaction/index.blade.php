@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">

<style type="text/css">
	.manage-transaction .box{
		padding: 10px;
	}

	.manage-transaction .box-group{
		margin-bottom: 110px;
	}

	.manage-transaction .box-group:last-child{
		margin-bottom: 0;
	}

	.manage-transaction .box-group .title{
		font-weight: bold;
	}

	.manage-transaction .box-group:first-child .content{
		padding: 45px 15px;
		border: 1px solid #2d3194;
		border-radius: 15px;
	}

	.manage-transaction .box-group .title,
	.manage-transaction .table-group .table-title{
		color: #2d3194;
	}

	.manage-transaction .table-group{
		padding-bottom: 25px;
		margin-bottom: 40px;
	}

	.manage-transaction .table-group:last-child{
		padding-bottom: 0;
		margin-bottom: 0;
	}

	.manage-transaction .table-group .table-title{
		margin-top: 0;
	}

	.manage-transaction .table-group table{
		width: 100%;
	}

	.manage-transaction .table-group table thead th,
	.manage-transaction .table-group table tbody td{
		padding: 10px 0;
	}

	.manage-transaction .table-group table th{
		font-size: 15px;
	}

	.manage-transaction-left .table-group{
		border-bottom: 1px solid #6c6c6c;
	}

	.manage-transaction-left .table-group:last-child{
		border-bottom: none;
	}

	.manage-transaction-left .table-group table thead th,
	.manage-transaction-left .table-group table tbody td{
		text-align: center;
		background-color: #e2e3e4;
	}

	.manage-transaction-left .table-group table tbody td{
		border-top: 2px solid #ffffff;
	}

	.manage-transaction-left .btn-all{
		float: right;
	}

	.manage-transaction-center{
		padding: 45px 30px;
		border-radius: 15px;
		background-color: #eff0f0;
	}

	.manage-transaction-center #chart1{
		background-color: #fff;
		margin-bottom: 50px;
	}

	.manage-transaction-center .table-group,
	.manage-transaction-right .table-group{
		padding-bottom: 0;
	}

	.manage-transaction-center .table-group .table-wrap{
		background-color: #fff;
		border-radius: 15px;
		padding: 25px;
		box-shadow: 10px 10px 0px -6px rgba(209,211,212,1);
	}

	.manage-transaction-center .table-group table tbody th,
	.manage-transaction-center .table-group table tbody td,
	.manage-transaction-right .table-group table tbody th,
	.manage-transaction-right .table-group table tbody td{
		width: 50%;
	}

	.manage-transaction-center .table-group table tbody td,
	.manage-transaction-right .table-group table tbody td{
		font-weight: bold;
		text-align: right;
	}

	.manage-transaction-right #chart2{
		margin-bottom: 50px;
	}

	.manage-transaction-right .table-group .table-wrap{
		border: 1px solid #2d3194;
		border-radius: 15px;
		padding: 25px;
	}

	.ability-assessment-wrap{
        max-height: 575px;
        height: 100%;
        overflow-y: auto;
    }

    .ability-assessment-wrap #ability-assessment thead tr th{
        color: #2d3194;
    }

    .ability-assessment-wrap #ability-assessment tbody tr td,
    .ability-assessment-wrap #ability-assessment tfoot tr td{
        vertical-align: middle;
    }

    .ability-assessment-wrap #ability-assessment tfoot tr td{
        border: 1px solid #a6a6a6;
    }

    .square{
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 3px;
        margin-right: 5px;
    }

    .square.success{
        background-color: #00a65a;
    }

    .square.danger{
        background-color: #dd4b39;
    }

    .investment-system .items{
    	width: 100%;
    	height: 100%;
    	min-height: 500px;
    	border: 1px solid #2d3194;
		border-radius: 15px;
		padding: 10px 25px;
    }

    .investment-system .items h3{
    	max-width: 250px;
    	margin: 0 auto 75px;
    	background-color: #01a659;
    	padding: 10px 0;
    	text-align: center;
    	color: #fff;
    	border-radius: 10px;
    }

    .investment-system-content{
    	margin-bottom: 40px;
    }

    .investment-system-content a{
    	display: block;
    }

    .investment-system-content a .content-item{
    	width: 100%;
    	height: 100%;
    	min-height: 200px;
    	border-radius: 5px;
    	background-color: #f4f4f4;
    	border-bottom: 8px solid #2d3194;
    	margin-bottom: 25px;
    	position: relative;
    }

    .investment-system-content a .content-item .text{
    	font-weight: bold;
    	font-size: 18px;
    	color: #2d3194;
    	white-space: nowrap;
    	position: absolute;
    	top: 50%;
    	left: 50%;
    	transform: translate(-50%, -50%);
    }

    .investment-system-form .form-group{
    	width: calc(100% - 93px);
    }

    .investment-system-form .form-group .input-group{
    	width: 100%;
    	border: 1px solid #2d3194;
    	border-radius: 10px;
    }

    .investment-system-form .form-group .input-group-addon,
    .investment-system-form .form-group input{
    	height: 40px;
    	border: none;
    }

    .investment-system-form .form-group .input-group-addon{
    	width: 140px;
    	position: relative;
    	font-weight: bold;
    	text-align: left;
    	border-top-left-radius: 10px;
    	border-bottom-left-radius: 10px;
    }

    .investment-system-form .form-group .input-group-addon::after{
    	content: "";
    	width: 12px;
    	height: 100%;
    	background-image: url("{{ asset('img/line-form.png') }}");
    	background-repeat: no-repeat;
    	background-size: 100%;
    	position: absolute;
    	top: 0;
    	right: 0;
    }

    .investment-system-form .form-group input{
    	background-color: transparent;
    	border-top-right-radius: 10px;
    	border-bottom-right-radius: 10px;
    }

    .investment-system-form button{
    	width: 70px;
    	height: 40px;
    	margin-left: 20px;
    	font-weight: bold;
    	border-radius: 10px;
    }
    

    @media only screen and (max-width: 768px){
        .content-wrapper .content-header > h1{
            font-size: 22px;
        }

        .ability-assessment-wrap{
            height: 500px;
            overflow: auto;
        }

        .ability-assessment-wrap #ability-assessment{
            width: 1000px;
        }
    }
</style>
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

@if(isset($infor))
    @include('layouts.partials.messages.infor')
@endif

           
<div class="manage-transaction">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-group">
					<h2 class="title">DANH MỤC ĐẦU TƯ</h2>
					<div class="content">
						<div class="row">
							<div class="col-md-4">
								<div class="manage-transaction-left">
									<div class="table-group">
										<h3 class="table-title">Chứng Khoán / SSI</h3>
										<table>
											<thead>
												<tr>
													<th>Ngày GD</th>
													<th>Sản phẩm</th>
													<th>Giá mua</th>
													<th>Giá bán</th>
													<th>Khối lượng</th>
													<th>Lãi/Lỗ</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td>1/1/21</td>
													<td>ABC</td>
													<td>10,000</td>
													<td>12,000</td>
													<td>1000</td>
													<td>2,000,000</td>
												</tr>

												<tr>
													<td>1/1/21</td>
													<td>ABC</td>
													<td>10,000</td>
													<td>12,000</td>
													<td>1000</td>
													<td>2,000,000</td>
												</tr>
											</tbody>
										</table>
									</div>

									<div class="table-group">
										<h3 class="table-title">BĐS / Đất Bình Thạnh</h3>
										<table>
											<thead>
												<tr>
													<th>Ngày GD</th>
													<th>Sản phẩm</th>
													<th>Giá mua</th>
													<th>Giá bán</th>
													<th>Khối lượng</th>
													<th>Lãi/Lỗ</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td>1/1/21</td>
													<td>ABC</td>
													<td>10,000</td>
													<td>12,000</td>
													<td>1000</td>
													<td>2,000,000</td>
												</tr>

												<tr>
													<td>1/1/21</td>
													<td>ABC</td>
													<td>10,000</td>
													<td>12,000</td>
													<td>1000</td>
													<td>2,000,000</td>
												</tr>
											</tbody>
										</table>
									</div>

									<div class="table-group">
										<h3 class="table-title">Quỹ Đầu Tư / ABC</h3>
										<table>
											<thead>
												<tr>
													<th>Ngày GD</th>
													<th>Sản phẩm</th>
													<th>Giá mua</th>
													<th>Giá bán</th>
													<th>Khối lượng</th>
													<th>Lãi/Lỗ</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td>1/1/21</td>
													<td>ABC</td>
													<td>10,000</td>
													<td>12,000</td>
													<td>1000</td>
													<td>2,000,000</td>
												</tr>

												<tr>
													<td>1/1/21</td>
													<td>ABC</td>
													<td>10,000</td>
													<td>12,000</td>
													<td>1000</td>
													<td>2,000,000</td>
												</tr>
											</tbody>
										</table>
									</div>

									<a href="{{ route('managetransactions-detailTransaction') }}" class="btn-all">Xem tất cả &gt;&gt;</a>
								</div>
							</div>

							<div class="col-md-4">
								<div class="manage-transaction-center">
									<div id="chart1"></div>
									<div class="table-group">
										<h3 class="table-title">Lãi / Lỗ Tạm Tính</h3>
										<div class="table-wrap">
											<table>
												<tbody>
													<tr>
														<th>Tổng số lượng giao dịch:</th>
														<td>20</td>
													</tr>

													<tr>
														<th>Số lượng giao dịch Lãi:</th>
														<td><font color="#1eb40f">15</font></td>
													</tr>

													<tr>
														<th>Số lượng giao dịch Lỗ:</th>
														<td><font color="#ff423e">5</font></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>

									<div class="table-group">
										<div class="table-wrap">
											<table>
												<tbody>
													<tr>
														<th>Lãi cao nhất:</th>
														<td><font color="#1eb40f">100,000,000</font> VND</td>
													</tr>

													<tr>
														<th>Lỗ cao nhất:</th>
														<td><font color="#ff423e">150,000,000</font> VND</td>
													</tr>

													<tr>
														<th>Tổng Lãi/ Lỗ:</th>
														<td><font color="#ff423e">-150,000,000</font> VND</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="manage-transaction-right">
									<div id="chart2"></div>
									<div class="table-group">
										<h3 class="table-title">Kết Quả Giao Dịch</h3>
										<div class="table-wrap">
											<table>
												<tbody>
													<tr>
														<th>% Lãi / Lỗ Tổng:</th>
														<td><font color="#1eb40f">20</font> %</td>
													</tr>

													<tr>
														<th>% Lãi / Lỗ Tháng:</th>
														<td><font color="#1eb40f">30</font> %</td>
													</tr>

													<tr>
														<th>% Lãi / Lỗ Tổng:</th>
														<td><font color="#ff423e">5</font> %</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>

									<div class="table-group">
										<div class="table-wrap">
											<table>
												<tbody>
													<tr>
														<th>Vốn đầu tư:</th>
														<td><font color="#1eb40f">100,000,000</font> VND</td>
													</tr>

													<tr>
														<th>Lãi /  Lỗ (Tạm Tính):</th>
														<td><font color="#ff423e">150,000,000</font> VND</td>
													</tr>

													<tr>
														<th>Số đủ hiện tại:</th>
														<td><font color="#ff423e">150,000,000</font> VND</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="box-group">
					<h2 class="title">DÒNG TIỀN ĐẦU TƯ</h2>
					<div class="content" style="padding-left: 0; padding-right: 0;">
						<div class="ability-assessment-wrap">
			                <table class="table table-hover" id="ability-assessment">
			                    <thead>
			                        <tr>
			                            <th class="text-nowrap text-center" width="5%"><b><font size="3">STT</font></b></th>
			                            <th class="text-nowrap text-center"><b><font size="3">Mục Tiêu</font></b></th>
			                            <th class="text-nowrap text-center"><b><font size="3">Tên Mục Tiêu</font></b></th>
			                            <th class="text-nowrap text-center"><b><font size="3">Kế hoạch</font></b></th>
			                            <th class="text-nowrap text-center"><b><font size="3">Số tiền đã thực hiện</font></b></th>
			                            <th class="text-nowrap text-center" width="10%"><b><font size="3">Tình Trạng</font></b></th>
			                            <th class="text-nowrap text-center" width="26%"><b><font size="3">Tiến Độ</font></b></th>
			                        </tr>
			                    </thead>

			                    <tbody>
			                        <tr>
			                            <td class="text-nowrap text-center">01</td>
			                            <td class="text-nowrap">Mục tiêu 01</td>
			                            <td class="text-nowrap"><b>Ví Mục tiêu nghỉ hưu</b> <br> Nghỉ hưu năm 40 tuổi <br>Ngày lập: 24/09/2021</td>
			                            <td class="text-nowrap text-right"><font style="color:#1eb40f">+ 20,000,000,000</font></td>
			                            <td class="text-nowrap text-right"><font style="color:#1eb40f">+ 1,000,000,000</font></td>
			                            <td class="text-nowrap text-center"><span class="label label-success" style="font-size: 100%;">Đang thực hiện tốt</span></td>
			                            <td class="text-nowrap text-left">
			                                <div class="progress" style="margin-bottom: 20px;">
		                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5.00" aria-valuemin="0" aria-valuemax="100" style="width: 5.00%">
		                                            5%
		                                        </div>
		                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="95.00" aria-valuemin="0" aria-valuemax="100" style="width: 95.00%">
		                                            95%
		                                        </div>
		                                    </div>
			                                <p style="margin-bottom: 5px; display: inline-block; margin-right: 20px;"><span class="square success"></span>Đã thực hiện: 5%</p>
			                                <p style="margin-bottom: 0; display: inline-block;"><span class="square danger"></span>Chưa thực hiện: 95%</p>
			                            </td>
			                        </tr>  

			                        <tr>
			                            <td class="text-nowrap text-center">02</td>
			                            <td class="text-nowrap">Mục tiêu 01</td>
			                            <td class="text-nowrap"><b>Ví Mục tiêu nghỉ hưu</b> <br> Nghỉ hưu năm 40 tuổi <br>Ngày lập: 24/09/2021</td>
			                            <td class="text-nowrap text-right"><font style="color:#1eb40f">+ 20,000,000,000</font></td>
			                            <td class="text-nowrap text-right"><font style="color:#1eb40f">+ 1,000,000,000</font></td>
			                            <td class="text-nowrap text-center"><span class="label label-success" style="font-size: 100%;">Đang thực hiện tốt</span></td>
			                            <td class="text-nowrap text-left">
			                                <div class="progress" style="margin-bottom: 20px;">
		                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5.00" aria-valuemin="0" aria-valuemax="100" style="width: 5.00%">
		                                            5%
		                                        </div>
		                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="95.00" aria-valuemin="0" aria-valuemax="100" style="width: 95.00%">
		                                            95%
		                                        </div>
		                                    </div>
			                                <p style="margin-bottom: 5px; display: inline-block; margin-right: 20px;"><span class="square success"></span>Đã thực hiện: 5%</p>
			                                <p style="margin-bottom: 0; display: inline-block;"><span class="square danger"></span>Chưa thực hiện: 95%</p>
			                            </td>
			                        </tr>

			                        <tr>
			                            <td class="text-nowrap text-center">03</td>
			                            <td class="text-nowrap">Mục tiêu 01</td>
			                            <td class="text-nowrap"><b>Ví Mục tiêu nghỉ hưu</b> <br> Nghỉ hưu năm 40 tuổi <br>Ngày lập: 24/09/2021</td>
			                            <td class="text-nowrap text-right"><font style="color:#1eb40f">+ 20,000,000,000</font></td>
			                            <td class="text-nowrap text-right"><font style="color:#1eb40f">+ 1,000,000,000</font></td>
			                            <td class="text-nowrap text-center"><span class="label label-success" style="font-size: 100%;">Đang thực hiện tốt</span></td>
			                            <td class="text-nowrap text-left">
			                                <div class="progress" style="margin-bottom: 20px;">
		                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5.00" aria-valuemin="0" aria-valuemax="100" style="width: 5.00%">
		                                            5%
		                                        </div>
		                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="95.00" aria-valuemin="0" aria-valuemax="100" style="width: 95.00%">
		                                            95%
		                                        </div>
		                                    </div>
			                                <p style="margin-bottom: 5px; display: inline-block; margin-right: 20px;"><span class="square success"></span>Đã thực hiện: 5%</p>
			                                <p style="margin-bottom: 0; display: inline-block;"><span class="square danger"></span>Chưa thực hiện: 95%</p>
			                            </td>
			                        </tr>                                                   
			                    </tbody>

			                    <tbody>
			                        <tr>
			                            <td class="text-nowrap" colspan="3"><b>Tổng cộng</b></td>
			                            <td class="text-nowrap text-right"><font style="color:#1eb40f; font-weight: bold;">+ 37,100,000,000</font></td>
			                            <td class="text-nowrap text-right"><font style="color:#1eb40f; font-weight: bold;">+ 1,980,000,000</font></td>
			                            <td class="text-nowrap text-center"><span class="label label-danger" style="font-size: 100%;">Đang thiếu hụt</span></td>
			                            <td class="text-nowrap text-left">
			                                <div class="progress" style="margin-bottom: 20px;">
		                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5.00" aria-valuemin="0" aria-valuemax="100" style="width: 5.00%">
		                                            5%
		                                        </div>
		                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="95.00" aria-valuemin="0" aria-valuemax="100" style="width: 95.00%">
		                                            95%
		                                        </div>
		                                    </div>
			                                <p style="margin-bottom: 5px; display: inline-block; margin-right: 20px;"><span class="square success"></span>Đã thực hiện: 5%</p>
			                                <p style="margin-bottom: 0; display: inline-block;"><span class="square danger"></span>Chưa thực hiện: 95%</p>
			                            </td>
			                        </tr>
			                    </tbody>
			                </table>
            			</div>
					</div>
				</div>

				<div class="box-group">
					<h2 class="title">HỆ THỐNG ĐẦU TƯ</h2>
					<div class="content">
						<div class="investment-system">
							<div class="row">
								<div class="col-md-5">
									<div class="items">
										<h3>NHẬT KÝ GIAO DỊCH</h3>

										<div class="investment-system-content history">
											<div class="row">
												<div class="col-md-5">
													<a href="#">
														<div class="content-item">
															<p class="text">CHỨNG KHOÁN</p>
														</div>
													</a>
												</div>
												<div class="col-md-5 col-md-offset-2">
													<a href="#">
														<div class="content-item">
															<p class="text">BẤT ĐỘNG SẢN</p>
														</div>
													</a>
												</div>
												<div class="col-md-5">
													<a href="#">
														<div class="content-item">
															<p class="text">HÀNG HÓA</p>
														</div>
													</a>
												</div>
												<div class="col-md-5 col-md-offset-2">
													<a href="{{ route('managetransactions-listTransaction') }}">
														<div class="content-item">
															<p class="text">&plus; XEM THÊM</p>
														</div>
													</a>
												</div>
											</div>
										</div>

										<div class="investment-system-form form-inline">
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon">Tên Nhật Ký</div>
													<input type="text" class="form-control" id="nameDiary">
												</div>
											</div>
											<button type="submit" class="btn btn-success">Tạo</button>
										</div>
									</div>
								</div>

								<div class="col-md-5 col-md-offset-2">
									<div class="items">
										<h3>THƯ VIỆN MẪU</h3>

										<div class="investment-system-content gallery">
											<div class="row">
												<div class="col-md-5">
													<a href="#">
														<div class="content-item">
															<p class="text">CHỨNG KHOÁN</p>
														</div>
													</a>
												</div>
												<div class="col-md-5 col-md-offset-2">
													<a href="#">
														<div class="content-item">
															<p class="text">CHỨNG KHOÁN</p>
														</div>
													</a>
												</div>
												<div class="col-md-5">
													<a href="#">
														<div class="content-item">
															<p class="text">CHỨNG KHOÁN</p>
														</div>
													</a>
												</div>
												<div class="col-md-5 col-md-offset-2">
													<a href="{{ route('managetransactions-listTemplate') }}">
														<div class="content-item">
															<p class="text">&plus; XEM THÊM</p>
														</div>
													</a>
												</div>
											</div>
										</div>

										<div class="investment-system-form form-inline">
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon">Tên Thư Viện</div>
													<input type="text" class="form-control" id="nameGallery">
												</div>
											</div>
											<button type="submit" class="btn btn-success">Tạo</button>
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
</div>

@endsection


@section('scripts')
@include('product-manage.managetransaction.partials.script')
@endsection

