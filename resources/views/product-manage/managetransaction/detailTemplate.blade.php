@extends('layouts.master')

@section('head')
<style type="text/css">
	.search-control .content{
        min-height: auto;
    }

    .search-control .form-horizontal label{
        text-align: left;
    }

    .search-control .form-horizontal .form-group .control-label{
        color: #312f90;
    }

    .search-control .form-horizontal .form-group:nth-child(2) .control-label,
    .search-control .form-horizontal #name,
    .search-control .form-horizontal .select2-selection--single,
    .search-control .form-horizontal .btn-add{
        border: none;
        border-radius: 5px;
        color: #312f90;
        background-color: #e6e7e9;
    }

    .search-control .form-horizontal .form-group:nth-child(2) .control-label{
        height: 34px;
        line-height: 34px;
        padding: 0 12px;
    }

    .search-control .form-horizontal .select2-selection__rendered,
    .search-control .form-horizontal .btn-add{
        color: #312f90;
    }

    .trading-method #trading-content{
    	resize: none;
    	border: 2px solid #312f90;
    	border-radius: 10px;
    	background-color: #fff;
    }

    .chart-analysis .chart-group #chart4{
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
        background-color: #e2e3e4;
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
</style>
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

@if(isset($infor))
    @include('layouts.partials.messages.infor')
@endif

<div class="manage-transaction detail-template">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-group search-control">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div class="form-horizontal">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="col-md-4 control-label">Chọn</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control select2" name="type" onChange="">
                                                        <option value="">Chọn loại hình</option>
                                                        <option value="">Chứng khoán</option>
                                                        <option value="">Bất động sản</option>z
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-sm-4 control-label">Tên Thư Viện</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="name">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <button type="submit" class="btn btn-primary btn-add"><b>Tạo</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-group trading-method">
                	<h2 class="title">Phương pháp giao dịch</h2>
                	<div class="content">
                        <div class="row">
                            <div class="col-md-12">
                            	<textarea class="form-control" id="trading-content" rows="20"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-group" style="background-color: #f2f2f2;">
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
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
@include('product-manage.managetransaction.partials.script')
@endsection

