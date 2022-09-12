@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection
@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif


@include('product-manage.advisory.partials.search-form')
@include('product-manage.advisory.mailAdvisoryAnswer')

<div class="status">
    <b class="alert alert-warning">Tổng số yêu cầu: {{ $totalRequest }}</b>
    <b class="alert alert-success">Đã xử lý: {{ $totalRequested }}</b>
    <b class="alert alert-danger">Thông tin chờ xử lý: {{ $totalRequesting }}</b>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-help">
        	<div class="box-header">
        		<ul class="nav nav-pills">
					<li class="active">
						<a data-toggle="pill" class="hash-tab" href="#email">Email</a>
					</li>
					<li>
						<a data-toggle="pill" class="hash-tab" href="#website">Website</a>
					</li>
				</ul>
        	</div>

            <div class="box-body">

				<div class="tab-content">
					<div id="email" class="tab-pane fade in active">
						<table class="table table-hover">
		                    <thead>
		                        <tr>
		                            <th class="text-center">MỨC ĐỘ<br> QUAN TRỌNG</th>
		                            <th class="text-center">TÊN KHÁCH HÀNG</th>
		                            <th class="text-center">EMAIL</th>
		                            <th class="text-center">SỐ ĐIỆN THOẠI</th>
		                            <th class="text-center" style="width: 35%;">YÊU CẦU HỖ TRỢ</th>
		                            <th class="text-center">THAO TÁC</th>
		                            <th class="text-center">NHÂN VIÊN<br> HỖ TRỢ</th>
		                            <th class="text-center">HOÀN THÀNH</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@if($collections->count() === 0)
			                    	<tr>
			                    		<td class="text-center">Không có dữ liệu !!!</td>
			                    	</tr>
			                    @endif
		                        @foreach($collections->where('type', 1) as $advisory)
			                        <tr>
			                            <td class="text-center">Gấp</td>
			                            <td class="text-center">{{ $advisory->fullname }}</td>
			                            <td class="text-center">{{ $advisory->email }}</td>
			                            <td class="text-center">{{ $advisory->phone }}</td>
			                            <td>
			                            	<p><b>Tiêu đề: </b>{{ $advisory->titleadvisory }}</p>
			                            	<p><b>Nội dung: </b>{{ $advisory->contentadvisory }}</p>
			                            </td>
			                            <td class="text-center">
			                            	<a data-toggle="modal" class="advisory-answers" data-route="{{ route('advisory-answers', ['id' => $advisory->id]) }}" href="#answerEmail">
			                            		<i class="fas fa-undo-alt"></i> Trả lời
			                            	</a>
			                            </td>
			                            <td class="text-center">{{ $advisory->advisoryAnswer == NULL ? "" : $advisory->advisoryAnswer->user()->first()->name }}</td>
			                            @if($advisory->status == 0)
											<td class="text-center" style="color: red;"><b>Chờ xử lý</b></td>
			                            @else
			                            	<td class="text-center" style="color: #197b30;"><b>Đã hoàn thành</b></td>
			                            @endif
			                        </tr>
		                        @endforeach
		                    </tbody>
		                </table>
					</div>

					<div id="website" class="tab-pane fade">
						<table class="table table-hover">
		                    <thead>
		                        <tr>
		                            <th class="text-center">MỨC ĐỘ<br> QUAN TRỌNG</th>
		                            <th class="text-center">TÊN KHÁCH HÀNG</th>
		                            <th class="text-center">EMAIL</th>
		                            <th class="text-center">SỐ ĐIỆN THOẠI</th>
		                            <th class="text-center" style="width: 35%;">YÊU CẦU HỖ TRỢ</th>
		                            <th class="text-center">THAO TÁC</th>
		                            <th class="text-center">NHÂN VIÊN<br> HỖ TRỢ</th>
		                            <th class="text-center">HOÀN THÀNH</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@if($collections->count() === 0)
			                    	<tr>
			                    		<td class="text-center">Không có dữ liệu !!!</td>
			                    	</tr>
			                    @endif
		                        @foreach($collections->where('type', 0) as $website)
			                        <tr>
			                            <td class="text-center">Gấp</td>
			                            <td class="text-center">{{ $website->fullname }}</td>
			                            <td class="text-center">{{ $website->email }}</td>
			                            <td class="text-center">{{ $website->phone }}</td>
			                            <td>
			                            	<p><b>Tiêu đề: </b>{{ $website->titleadvisory }}</p>
			                            	<p><b>Nội dung: </b>{{ $website->contentadvisory }}</p>
			                            </td>
			                            <td class="text-center">
			                            	<a data-toggle="modal" class="advisory-answers" data-route="{{ route('advisory-answers', ['id' => $website->id]) }}" href="#answerEmail">
			                            		<i class="fas fa-undo-alt"></i> Trả lời
			                            	</a>
			                            </td>
			                            <td class="text-center">{{ $website->advisoryAnswer == NULL ? "" : $website->advisoryAnswer->user()->first()->name }}</td>
			                            @if($website->status == 0)
											<td class="text-center" style="color: red;"><b>Chờ xử lý</b></td>
			                            @else
			                            	<td class="text-center" style="color: #197b30;"><b>Đã hoàn thành</b></td>
			                            @endif
			                        </tr>
		                        @endforeach
		                    </tbody>
		                </table>
					</div>
				</div>

            </div>

            <div class="box-footer clearfix text-right">

            </div>

        </div>
	</div>
</div>



@endsection

@section('scripts')
@include('product-manage.advisory.partials.script')
@endsection