@extends('layouts.master')

@section('head')
<style type="text/css">
	.stock-form .control-label{
		text-align: left;
	}

	.stock-form .select2-container--default .select2-selection--single,
	.stock-form #desc{
    	border: 2px solid #312f90;
    	background-color: #fff;
    }

    .stock-form #desc{
    	resize: none;
    }

    .chart-analysis .chart-group #chart4,
    .transaction-analysis .transaction-group #chart5,
    .result .result-group #chart6{
        border-radius: 10px;
        border: 2px solid #312f90;
        background-color: #fff;
    }

    .checklist .checklist-group .checklist-wrap{
        border-radius: 5px;
        border: 2px solid #312f90;
    }

    .checklist .checklist-group table{
        width: 100%;
        margin-bottom: 15px;
    }

    .checklist .checklist-group table tbody td{
        padding: 10px 0;
        color: #312f90;
        text-align: center;
        background-color: #cbe1f8;
        border-bottom: 2px solid #ffffff;
        font-size: 15px;
        font-weight: bold;
    }

    .checklist .checklist-group table tbody tr:first-child td:first-child{
        border-top-left-radius: 5px;
    }

    .checklist .checklist-group table tbody tr:first-child td:last-child{
        border-top-right-radius: 5px;
    }

    .checklist .checklist-group table tbody tr:last-child td:first-child{
        border-bottom-left-radius: 5px;
    }

    .checklist .checklist-group table tbody tr:last-child td:last-child{
        border-bottom-right-radius: 5px;
    }

    .checklist-total{
        text-align: right;
    }

    .checklist-total span{
        display: inline-block;
        color: #fff;
        font-size: 15px;
        padding: 7px 14px;
        border-radius: 5px;
        background-color: #61bd4e;
        margin-right: 15px;
        margin-bottom: 30px;
    }

    .transaction-analysis.chart,
    .result.chart{
    	margin-bottom: 40px;
    }

    .transaction-analysis.form .control-label,
    .result.form .control-label{
    	text-align: left;
    }

    .transaction-analysis.form .form-control,
    .result.form .form-control{
    	border: 2px solid #312f90;
    	background-color: #fff;
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

<div class="manage-transaction detail-transactionLog">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-group">
					<h2 class="title">Cổ phiếu ABC</h2>
					<div class="content stock-form">
						<div class="row">
							<div class="col-md-12">
								<div class="item form-horizontal">
									<div class="form-group">
										<label class="col-sm-1 control-label">Mẫu sử dụng</label>
										<div class="col-sm-4">
											<select class="form-control select2" name="type" onChange="">
												<option value="">Chọn loại hình</option>
			                                    <option value="">Chứng khoán</option>
			                                    <option value="">Bất động sản</option>
                                			</select> 
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-1 control-label">Danh mục</label>
										<div class="col-sm-4">
											<select class="form-control select2" name="category" onChange="">
												<option value="">Chọn danh mục</option>
			                                    <option value="">Chứng khoán</option>
			                                    <option value="">Bất động sản</option>
                                			</select>         
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label">Mô tả</label>
										<div class="col-sm-8">
											<textarea class="form-control" id="desc" rows="5"></textarea>         
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

                <div class="box-group" style="background-color: #eef5ff;">
                	<div class="content chart-analysis">
                		<h2 class="title">Phân tích</h2>
                		<div class="chart-group">
           					<div class="row">
           						<div class="col-md-6 col-md-offset-3">
           							<div id="chart4"></div>
           						</div>
           					</div>
                		</div>
                    </div>

                    <div class="content checklist">
                        <h2 class="title">Checklist</h2>
                        <div class="checklist-group">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="checklist-wrap">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td width="10%">1</td>
                                                    <td>ABC</td>
                                                    <td width="10%">
                                                        <input type="checkbox" name="checkItem">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="10%">2</td>
                                                    <td>ABC</td>
                                                    <td width="10%">
                                                        <input type="checkbox" name="checkItem">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="checklist-total">
                                            <span><i class="fa fa-check-square" aria-hidden="true"></i> 3/4</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-group">
                	<div class="content transaction-analysis">
                		<h2 class="title">Giao dịch</h2>
                		<div class="transaction-group">
                			<div class="transaction-analysis chart">
                				<div class="row">
	           						<div class="col-md-6 col-md-offset-3">
	           							<div id="chart5"></div>
	           						</div>
	           					</div>
                			</div>
           					<div class="transaction-analysis form">
                				<div class="row">
	           						<div class="col-md-12">
	           							<div class="form-horizontal">
	           								<div class="form-group">
												<label class="col-sm-1 control-label">Ngày giao dịch</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" id="dateTransaction">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label">Khối lượng</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" id="mass">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label">Giá mua</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" id="purchasePrice">
												</div>
											</div>
	           							</div>
	           						</div>
	           					</div>
                			</div>
                		</div>
                    </div>
                </div>

                <div class="box-group">
                	<div class="content result">
                		<h2 class="title">Kết quả: Lãi/Lỗ</h2>
                		<div class="result-group">
                			<div class="result chart">
                				<div class="row">
	           						<div class="col-md-6 col-md-offset-3">
	           							<div id="chart6"></div>
	           						</div>
	           					</div>
                			</div>
           					<div class="result form">
                				<div class="row">
	           						<div class="col-md-12">
	           							<div class="form-horizontal">
	           								<div class="form-group">
												<label class="col-sm-1 control-label">Ngày giao dịch</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" id="dateTransaction">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label">Khối lượng</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" id="mass">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label">Giá bán</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" id="price">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label">Số tiền Lãi/Lỗ</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" id="ratio">
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
	</div>
</div>

@endsection


@section('scripts')
@include('product-manage.managetransaction.partials.script')
@endsection

