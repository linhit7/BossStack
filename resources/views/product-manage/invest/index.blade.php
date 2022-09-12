@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">

<style type="text/css">
	@media only screen and (max-width: 768px){
		.news-related{
			margin-top: 20px;
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

<div class="news">
	<div class="news-list">
		<div class="news-latest">
			<h3 class="title-category"><span>NHẬN ĐỊNH CHỨNG KHOÁN</span></h3>
			<div class="news-wrap">
            	@php
                    $i = 0;
                @endphp
                @foreach($collections_0 as $model)
                @php
                    $i++;
                    if ($i >= 7){
                    	break;
                    }
                @endphp
            	<div class="items">
					<a href="{{ route('invests-detail', ['id'=> $model->id]) }}">
                        @if($model->newsimage != "")
						<div class="image">
                            <img src="{{ asset($pathimage . $model->newsimage) }}" width="100%">
						</div>
						<div class="info">
							<h4 class="name">{{$model->newstitle}}</h4>
							<div class="editor">
								<span class="author">{{$model->author}}</span><span class="date">{{ConvertSQLDate($model->newsdate)}}</span>
							</div>
							<div class="des">{!! $model->shortcontent !!}</div>
						</div>
                        @else
                        <div class="image">
                            <img src="https://fiinves.vn/public/funds_manage/public/newfiles/files/No_Image_Available.jpg" width="100%">
						</div>
                        <div class="info">
                            <h4 class="name">{{$model->newstitle}}</h4>
                            <div class="editor">
                                <span class="author">{{$model->author}}</span><span class="date">{{ConvertSQLDate($model->newsdate)}}</span>
                            </div>
                            <div class="des">{!! $model->shortcontent !!}</div>
                        </div>
                        @endif                          
					</a>
				</div>
				@endforeach	
			</div>
		</div>

		<div class="news-feed">
			<h3 class="title-category"><span>KIẾN THỨC TÀI CHÍNH ĐẦU TƯ</span></h3>
			<div class="news-wrap">
                @php
                    $i = 0;
                @endphp
                @foreach($collections_1 as $model)
                @php
                    $i++;
                    if ($i >= 10){
                        break;
                    }
                @endphp
				<div class="items">
					<a href="{{ route('invests-detail', ['id'=> $model->id]) }}">
                        @if($model->newsimage != "")
                        <div class="image">
                            @if($model->newsimage != "")
                                <img src="{{ asset($pathimage . $model->newsimage) }}" width="100%">
                            @endif                          
                        </div>
                        <div class="info">
                            <h4 class="name">{{$model->newstitle}}</h4>
                            <div class="editor">
                                <span class="author">{{$model->author}}</span><span class="date">{{ConvertSQLDate($model->newsdate)}}</span>
                            </div>
                            <div class="des">{!! $model->shortcontent !!}</div>
                        </div>
                        @else
                        <div class="image">
                            <img src="https://fiinves.vn/public/funds_manage/public/newfiles/files/No_Image_Available.jpg" width="100%">
						</div>
                        <div class="info">
                            <h4 class="name">{{$model->newstitle}}</h4>
                            <div class="editor">
                                <span class="author">{{$model->author}}</span><span class="date">{{ConvertSQLDate($model->newsdate)}}</span>
                            </div>
                            <div class="des">{!! $model->shortcontent !!}</div>
                        </div>
                        @endif                          
					</a>
				</div>
                @endforeach
			</div>
		</div>
	</div>

	<div class="news-related">
		<h3 class="title-category"><span>SỰ KIỆN</span></h3>
		<div class="news-wrap">
            @php
                $i = 0;
            @endphp
            @foreach($collections_2 as $model)
            @php
                $i++;
                if ($i >= 5){
                    break;
                }
            @endphp
			<div class="items">
                @if($model->newsimage != "")
				<div class="image">
                    <img src="{{ asset($pathimage . $model->newsimage) }}" width="100%">
				</div>
				<div class="info">
					<h4 class="name">{{$model->newstitle}}</h4>
					<div class="editor">
						<span class="author">{{$model->author}}</span><span class="dash">-</span><span class="date">{{ConvertSQLDate($model->newsdate)}}</span>
					</div>
					<a href="{{ route('invests-detail', ['id'=> $model->id]) }}">Xem chi tiết &#62;&#62;</a>
				</div>
                @else
                <div class="image">
                    <img src="https://fiinves.vn/public/funds_manage/public/newfiles/files/No_Image_Available.jpg" width="100%">
				</div>
                <div class="info">
                    <h4 class="name">{{$model->newstitle}}</h4>
                    <div class="editor">
                        <span class="author">{{$model->author}}</span><span class="dash">-</span><span class="date">{{ConvertSQLDate($model->newsdate)}}</span>
                    </div>
                    <a href="{{ route('invests-detail', ['id'=> $model->id]) }}">Xem chi tiết &#62;&#62;</a>
                </div>
                @endif                          
			</div>
            @endforeach
		</div>
	</div>
</div>

@endsection


@section('scripts')
<script type="text/javascript">
    $(function () {
        var width_img = $(".news-list .image").width();

        $(".news-list .image").css("height", width_img);
    });
</script>
@endsection

