@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">

<style type="text/css">
	@media only screen and (min-width: 320px) and (max-width: 575px){
		.content-wrapper .content{
			padding-top: 0;
		}
	}
</style>
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<form role="form" action="{{ route('dashboard-customer') }}" method="get" name="frm" id="frm">
{{ csrf_field() }}
<input type='hidden' name='typereport' value=''>

<div class="row">
	<div class="banner-dashboard">
        <h5>
            <span>Phần mềm quản lý dòng tiền</span>
            <img src="{{ asset('img/logo-bossstack.png') }}" alt="">
        </h5>
		<div class="banner-icon">
			<div class="icon">
				<a href="{{ route('cash-index') }}" title="CẬP NHẬT THU CHI VÍ TỔNG">
					<div class="banner-img"><img src="{{ asset('img/dashboard-1.png') }}"></div>
					<p>Cập nhật thu chi ví tổng</p>
				</a>
			</div>

            <div class="icon">
                <a href="{{ route('invests-index') }}" title="ĐẦU TƯ">
                    <img src="{{ asset('img/dashboard-2.png') }}">
                    <p>Đầu tư</p>
                </a>
            </div>

			<div class="icon">
				<a href="{{ route('cash-process') }}" title="DÒNG TIỀN CÁ NHÂN">
					<img src="{{ asset('img/dashboard-3.png') }}">
					<p>Dòng tiền cá nhân</p>
				</a>
			</div>

			<div class="icon">
				<a href="{{ route('cashassets-index') }}" title="THEO DÕI DANH MỤC TÀI SẢN">
					<img src="{{ asset('img/dashboard-4.png') }}">
					<p>Theo dõi danh mục tài sản</p>
				</a>
			</div>
		</div>
	</div>

	<div class="col-md-12">

		<div class="box box-dashboard box-customer" style="padding-top: 0px; margin-top: 20px;">
			<div class="box-body">

				<div class="title clearfix">
					<div class="row">
						<div class="col-lg-6 col-md-4 col-xs-12" style="align-self: center;">
							<div class="title-1">
								<h3><b>DÒNG TIỀN CỦA TÔI</b></h3>
							</div>
						</div>
						<div class="col-lg-6 col-md-8 col-xs-12" style="align-self: center;">
							<div class="title-2">
	                        	<div class="filter-date">
                                    <div class="items">
                                        <label>Thời gian từ:</label>
	                        		</div>
	                        		<div class="items">
                                        <input type='text' class="form-control" name="fromDate" id='fromDate' value="{{ old('fromDate') == "" ? $fromDate : old('fromDate') }}"/>
	                        		</div>
	                        		<div class="items">
	                        			<label style="color: #2d3194; text-align: center;">đến:</label>
	                        		</div>
	                        		<div class="items">
                                        <input type='text' class="form-control" name="toDate" id='toDate' value="{{ old('toDate') == "" ? $toDate : old('toDate') }}"/>
	                        		</div>
	                        		<div class="items">
				                        <button class="btn btn-primary btn-search" style="background-color: #ff7f0e; border: 1px solid #ff7f0e;">
                                            <span class="text">Lọc</span>
                                            <span class="icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                                        </button>
				                    </div>
	                        	</div>
		                    </div>
						</div>
					</div>
				</div>
				<div class="my-cash">
                    <div id="chart5"></div>
				</div>

				<h3><b>VÍ MỤC TIÊU TÀI CHÍNH</b></h3>

                <div class="financial-planning">
                    <div class="row">
                        <div class="col-md-12" style="text-align: right;">
                            <font size='2' color='#ff0000'>(ĐVT: VND)&nbsp;&nbsp;</font>
                        </div>
                    </div>
                    <div class="financial-planning-list">
                        <div class="wrap">
                            <div class="financial-planning-item">
                                <a class="btn btn-default add-objective" href="{{ route('cashplans-add') }}" title="">
                                    <i class="fas fa-plus-circle"></i> 
                                    <p><b>THÊM VÍ MỤC TIÊU</b></p>
                                </a>
                            </div>
                            
                            @php
                                $i = 0;
                            @endphp  
                            @foreach($listcashplans as $item)
                                <div class="financial-planning-item">
                                    
                                    <table width="100%" style="display: none;">
                                        <tbody>
                                        	<tr style="border-top: 0; border-bottom: 0;">
                                                <th colspan="2" width="100%"><h4><b>VÍ {{ mb_strtoupper($plantypes[$item->plantype]) }}</b></h6></th>
                                            </tr>
                                            <tr style="border-top: 0;">
                                                <th width="50%"><b><font size='3' color='red'>{{ $item->planage }}</font> TUỔI</b></th>
                                                <td width="50%" class="text-right"><b><font size='3' color='#ff423e'>{{ formatNumber($item->requireamount * $item->requireamountunittype, 1, 0, 0) }}</font></b></td>
                                            </tr>
                                            <tr>
                                                <th width="50%"><b><font size='3'>Vốn hiện tại</font></b></th>
                                                <td width="50%" class="text-right"><font size='3' color='#1eb40f'>{{ formatNumber($item->totalcurrentamount, 1, 0, 0) }}</font> </td>
                                            </tr>
                                            <tr>
                                                <th width="50%"><b><font size='3'>Số tiền còn thiếu</font></b></th>
                                                <td width="50%" class="text-right"><font size='3' color='#ff423e'>{{ formatNumber(($item->requireamount*intval($item->requireamountunittype) - $item->totalcurrentamount), 1, 0, 0) }}</font> </td>
                                            </tr>
                                            <tr>
                                                <th width="50%"><b><font size='3'>Thời gian hoàn thiện</font></b></th>
                                                <td width="50%" class="text-right"><b><font color='red'>{{ $item->planage - $item->currentage }}</font>&nbsp; NĂM</b></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <h4><b>VÍ {{ mb_strtoupper($plantypes[$item->plantype]) }}</b></h4>
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <th><b>Số tuổi mục tiêu</b></th>
                                                <td class="text-right"><b><font color='red'>{{ $item->planage }}</font> TUỔI</b></td>
                                            </tr>
                                            <tr>
                                                <th><b>Số tiền mục tiêu</b></th>
                                                <td class="text-right"><b><font color='red'>{{ formatNumber($item->requireamount * $item->requireamountunittype, 1, 0, 0) }}</font></b></td>
                                            </tr>
                                            <tr>
                                                <th><b>Vốn hiện tại</b></th>
                                                <td class="text-right"><b><font color='#1eb40f'>{{ formatNumber($item->totalcurrentamount, 1, 0, 0) }}</font></b></td>
                                            </tr>
                                            <tr>
                                                <th><b>Số tiền còn thiếu</b></th>
                                                <td class="text-right"><b><font color='#ff423e'>{{ formatNumber(($item->requireamount*intval($item->requireamountunittype) - $item->totalcurrentamount), 1, 0, 0) }}</font></b></td>
                                            </tr>
                                            <tr>
                                                <th><b>Thời gian hoàn thiện</b></th>
                                                <td class="text-right"><b><font color='red'>{{ $item->planage - $item->currentage }}</font> NĂM</b></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="financial-planning-btn">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <a class="btn btn-primary btn-income" target="blank" href="{{ route('cashplans-edit',['id'=> $item->id]) }}"><b>CHỈNH SỬA</b></a>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <a class="btn btn-primary btn-analytical" target="blank" href="{{ route('cashplans-analysis',['id'=> $item->id]) }}"><b>PHÂN TÍCH</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $i++;
                                    if ($i == 10){
                                        break;
                                    }
                                @endphp                                                 
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="title-myAssets">
                	<div class="row">
                		<div class="col-md-6 col-xs-8"><h3><b>THEO DÕI CÁC TÀI SẢN</b></h3></div>
                        <div class="col-md-6 col-xs-4" style="text-align: right;"><a href="{{ route('cashassets-index') }}" target="blank">Xem chi tiết &gt;&gt;</a></div>
                	</div>
                </div>
                
                <div class="my-assets">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="report">
                                <div class="row">
                                    <div class="col-md-4 col-xs-12" style="text-align: center;">
                                        <div id="rptasset1" style="margin-bottom: 12px;"></div>
                                        <font size='3' color="#2d3194"><b>Nợ</b></font>
                                    </div>
                                    <div class="col-md-4 col-xs-12" style="text-align: center;">
                                        <div id="rptasset2" style="margin-bottom: 12px;"></div>
                                        <font size='3' color="#2d3194"><b>Tài sản</b></font>
                                    </div>
                                    <div class="col-md-4 col-xs-12" style="text-align: center;">
                                        <div id="rptasset3" style="margin-bottom: 12px;"></div>
                                        <font size='3' color="#2d3194"><b>Tổng tài sản thực</b></font>
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

</form>
@endsection

@section('scripts')
@include('dashboard.partials.script_customer')
@endsection