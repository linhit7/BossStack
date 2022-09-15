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
					<p>Cập nhật thu chi<br/>ví tổng</p>
				</a>
			</div>

            <div class="icon">
                <a href="{{ route('invests-index') }}" title="ĐẦU TƯ">
                    <div class="banner-img"><img src="{{ asset('img/dashboard-2.png') }}"></div>
                    <p>Đầu tư</p>
                </a>
            </div>

			<div class="icon">
				<a href="{{ route('cash-process') }}" title="DÒNG TIỀN CÁ NHÂN">
                    <div class="banner-img"><img src="{{ asset('img/dashboard-3.png') }}"></div>
					<p>Dòng tiền<br/>cá nhân</p>
				</a>
			</div>

			<div class="icon">
				<a href="{{ route('cashassets-index') }}" title="THEO DÕI DANH MỤC TÀI SẢN">
                    <div class="banner-img"><img src="{{ asset('img/dashboard-4.png') }}"></div>
					<p>Theo dõi danh<br/>mục tài sản</p>
				</a>
			</div>
		</div>
	</div>

	<div class="col-md-12" style="padding: 0;">
		<div class="box box-dashboard box-customer" style="padding-top: 0px; margin-bottom: 38px;">
			<div class="box-body">
				<div class="title">
                    <h3><b>dòng tiền của tôi</b></h3>
                    <div class="title-2">
                        <div class="filter-date">
                            <div class="items">
                                <label>Thời gian từ:</label>
                            </div>
                            <div class="items">
                                <input type='text' class="form-control" name="fromDate" id='fromDate' value="{{ old('fromDate') == "" ? $fromDate : old('fromDate') }}"/>
                            </div>
                            <div class="items">
                                <label style="text-align: center;">đến:</label>
                            </div>
                            <div class="items">
                                <input type='text' class="form-control" name="toDate" id='toDate' value="{{ old('toDate') == "" ? $toDate : old('toDate') }}"/>
                            </div>
                            <div class="items">
                                <button class="btn btn-primary btn-search">
                                    <span class="text">Lọc</span>
                                </button>
                            </div>
                        </div>
                    </div>
				</div>

				<div class="my-cash">
                    <div id="chart5"></div>
				</div>
			</div>
		</div>

        <div class="box box-dashboard box-customer" style="padding-top: 0px; margin-bottom: 38px;">
            <div class="box-body">
                <h3><b>ví mục tiêu tài chính</b></h3>
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
                                    <p>Thêm ví mục tiêu</p>
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

                                    <h4>Ví {{ $plantypes[$item->plantype] }}</h4>
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <th>Số tuổi mục tiêu</th>
                                                <td class="text-right"><font color='#F52020'>{{ $item->planage }}</font> TUỔI</td>
                                            </tr>
                                            <tr>
                                                <th>Số tiền mục tiêu</th>
                                                <td class="text-right"><font color='#F52020'>{{ formatNumber($item->requireamount * $item->requireamountunittype, 1, 0, 0) }}</font></td>
                                            </tr>
                                            <tr>
                                                <th>Vốn hiện tại</th>
                                                <td class="text-right"><font color='#1eb40f'>{{ formatNumber($item->totalcurrentamount, 1, 0, 0) }}</font></td>
                                            </tr>
                                            <tr>
                                                <th>Số tiền còn thiếu</th>
                                                <td class="text-right"><font color='#F52020'>{{ formatNumber(($item->requireamount*intval($item->requireamountunittype) - $item->totalcurrentamount), 1, 0, 0) }}</font></td>
                                            </tr>
                                            <tr>
                                                <th>Thời gian hoàn thiện</th>
                                                <td class="text-right"><font color='#F52020'>{{ $item->planage - $item->currentage }}</font> NĂM</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="financial-planning-btn">
                                        <div class="row">
                                            <div class="col-md-7 col-xs-7">
                                                <a class="btn btn-primary btn-analytical" target="blank" href="{{ route('cashplans-analysis',['id'=> $item->id]) }}">Phân tích</a>
                                            </div>
                                            <div class="col-md-5 col-xs-5">
                                                <a class="btn-income" target="blank" href="{{ route('cashplans-edit',['id'=> $item->id]) }}">Chỉnh sửa</a>
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

                    <div class="view-detail">
                        <a href="{{ route('cashplans-index') }}" target="_blank">Xem chi tiết <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-dashboard box-customer">
			<div class="box-body">
                <h3><b>theo dõi các tài sản</b></h3>
                
                <div class="my-assets">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="report">
                                <div class="row">
                                    <div class="col-md-4 col-xs-12" style="text-align: center;">
                                        <p class="title">Nợ</p>
                                        <div id="rptasset1" style="margin-top: 12px;"></div>
                                    </div>
                                    <div class="col-md-4 col-xs-12" style="text-align: center;">
                                        <p class="title">Tài sản</p>
                                        <div id="rptasset2" style="margin-top: 12px;"></div>
                                    </div>
                                    <div class="col-md-4 col-xs-12" style="text-align: center;">
                                        <p class="title">Tổng tài sản thực</p>
                                        <div id="rptasset3" style="margin-top: 12px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>

                <div class="view-detail">
                    <a href="{{ route('cashassets-index') }}" target="_blank">Xem chi tiết <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
			</div>
		</div>
	</div>
</div>

</form>
@endsection

@section('scripts')
@include('dashboard.partials.script')
@include('dashboard.partials.script_customer')
@endsection