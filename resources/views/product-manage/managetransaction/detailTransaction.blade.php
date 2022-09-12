@extends('layouts.master')

@section('head')
<style type="text/css">
	.manage-transaction .box-group .title{
		font-weight: bold;
		color: #2d3194;
	}

	.manage-transaction.detail .box-group .title{
		margin-top: 0;
	}

	.manage-transaction .box-group:first-child{
		padding: 20px;
		border: 1px solid #2d3194;
		border-radius: 15px;
		margin: 20px 0 90px;
	}

	.manage-transaction .box-group:last-child{
		border: 1px solid #2d3194;
		border-radius: 15px;
	}

	.manage-transaction .box-group:nth-child(2){
		padding: 65px 0;
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

	.investment-portfolio .item .control-label,
	.transaction .item .control-label{
		text-align: left;
	}

	.investment-portfolio button.btn.btn-add,
	.transaction button.btn.btn-add{
		margin-left: auto;
		display: block;
		background-color: #ff7f0e; 
		border: 1px solid #ff7f0e;
	}

	.investment-portfolio button.btn.btn-add{
		width: 70px;
	}

	.investment-portfolio .table-group{
		max-height: 241px;
		height: 100%;
		overflow-y: auto;
	}

	.investment-portfolio .table-group table thead th,
	.investment-portfolio .table-group table tbody td{
		text-align: center;
		border: 1px solid #000;
	}

	.investment-portfolio .table-group table thead th{
		background-color: #f3caae;
	}

	.investment-portfolio .table-group table tbody td:last-child a{
		margin-right: 10px;
	}

	.transaction button.btn.btn-add{
		margin-top: 20px;
	}

	.manage-transaction-left .table-group{
		padding-bottom: 25px;
		margin-bottom: 40px;
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
</style>
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

@if(isset($infor))
    @include('layouts.partials.messages.infor')
@endif

<div class="manage-transaction detail">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-group">
					<h2 class="title">Danh Mục Đầu Tư</h2>
					<div class="content investment-portfolio">
						<div class="row">
							<div class="col-md-6">
								<div class="item form-horizontal">
									<div class="form-group">
										<label class="col-sm-4 control-label">Ngày tạo</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="dateCreate">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Loại hình</label>
										<div class="col-sm-8">
                                			<input type="text" class="form-control" id="type">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Danh mục</label>
										<div class="col-sm-8">
                                			<input type="text" class="form-control" id="category">       
										</div>
									</div>
									<div class="form-group" style="padding: 0 15px;">
										<button type="submit" class="btn btn-primary btn-add">Tạo</button>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="item">
									<div class="table-group">
										<table>
											<thead>
												<tr>
													<th>STT</th>
													<th>LOẠI HÌNH</th>
													<th>TÊN DANH MỤC</th>
													<th>NGÀY TẠO</th>
													<th>CHỨC NĂNG</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td>01</td>
													<td></td>
													<td>Chứng khoán</td>
													<td>10/12/2021</td>
													<td>
														<a style="color: #1b1464;" href="" title='Sửa'><i class="fas fa-pencil-alt"></i></a>

														<a style="color: #1b1464;" href="javascript:void(0)" data-id="" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
			                                            <form name="" method="post" action="">
			                                                {{ csrf_field() }}
			                                                {{ method_field('delete') }}
			                                            </form>
													</td>
												</tr>

												<tr>
													<td>02</td>
													<td></td>
													<td>Bất động sản</td>
													<td>10/12/2021</td>
													<td>
														<a style="color: #1b1464;" href="" title='Sửa'><i class="fas fa-pencil-alt"></i></a>

														<a style="color: #1b1464;" href="javascript:void(0)" data-id="" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
			                                            <form name="" method="post" action="">
			                                                {{ csrf_field() }}
			                                                {{ method_field('delete') }}
			                                            </form>
													</td>
												</tr>

												<tr>
													<td>03</td>
													<td></td>
													<td>Chứng khoán</td>
													<td>10/12/2021</td>
													<td>
														<a style="color: #1b1464;" href="" title='Sửa'><i class="fas fa-pencil-alt"></i></a>

														<a style="color: #1b1464;" href="javascript:void(0)" data-id="" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
			                                            <form name="" method="post" action="">
			                                                {{ csrf_field() }}
			                                                {{ method_field('delete') }}
			                                            </form>
													</td>
												</tr>

												<tr>
													<td>04</td>
													<td></td>
													<td>Bất động sản</td>
													<td>10/12/2021</td>
													<td>
														<a style="color: #1b1464;" href="" title='Sửa'><i class="fas fa-pencil-alt"></i></a>

														<a style="color: #1b1464;" href="javascript:void(0)" data-id="" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
			                                            <form name="" method="post" action="">
			                                                {{ csrf_field() }}
			                                                {{ method_field('delete') }}
			                                            </form>
													</td>
												</tr>

												<tr>
													<td>05</td>
													<td></td>
													<td>Bất động sản</td>
													<td>10/12/2021</td>
													<td>
														<a style="color: #1b1464;" href="" title='Sửa'><i class="fas fa-pencil-alt"></i></a>

														<a style="color: #1b1464;" href="javascript:void(0)" data-id="" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
			                                            <form name="" method="post" action="">
			                                                {{ csrf_field() }}
			                                                {{ method_field('delete') }}
			                                            </form>
													</td>
												</tr>

												<tr>
													<td>06</td>
													<td></td>
													<td>Bất động sản</td>
													<td>10/12/2021</td>
													<td>
														<a style="color: #1b1464;" href="" title='Sửa'><i class="fas fa-pencil-alt"></i></a>

														<a style="color: #1b1464;" href="javascript:void(0)" data-id="" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
			                                            <form name="" method="post" action="">
			                                                {{ csrf_field() }}
			                                                {{ method_field('delete') }}
			                                            </form>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="box-group">
					<h2 class="title">Giao Dịch</h2>
					<div class="content transaction">
						<div class="row">
							<div class="col-md-6">
								<div class="item form-horizontal">
									<div class="form-group">
										<label class="col-sm-4 control-label">Loại hình</label>
										<div class="col-sm-8">
											<select class="form-control select2" name="type" onChange="">
												<option value="">Chọn loại hình</option>
			                                    <option value="">Chứng khoán</option>
			                                    <option value="">Bất động sản</option>
                                			</select> 
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label">Danh mục</label>
										<div class="col-sm-8">
											<select class="form-control select2" name="category" onChange="">
												<option value="">Chọn danh mục</option>
			                                    <option value="">Chứng khoán</option>
			                                    <option value="">Bất động sản</option>
                                			</select>         
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label">Ngày giao dịch</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="dateTransaction">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label">Sản phẩm</label>
										<div class="col-sm-8">
											<select class="form-control select2" name="product" onChange="">
												<option value="">Chọn sản phẩm</option>
			                                    <option value="">Sản phẩm 1</option>
			                                    <option value="">Sản phẩm 2</option>
                                			</select>         
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="item form-horizontal">
									<div class="form-group">
										<label class="col-sm-4 control-label">Giá mua</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="purchasePrice">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label">Giá bán</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="price">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label">Khối lượng</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="mass">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label">Lãi / Lỗ</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="ratio">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-add">Thêm Giao Dịch</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="box-group">
					<div class="content">
						<div class="row">
							<div class="col-md-12">
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

