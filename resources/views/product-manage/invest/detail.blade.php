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

<div class="single-post">
	<div class="single-post-detail">
		<div class="content-single-post">
			<header>
				<h4 class="name">{{$model->newstitle}}</h4>
				<div class="date">{{ConvertSQLDate($model->newsdate)}}</div>
			</header>
			<div class="short-content">{!! $model->shortcontent !!}</div>
            @if($model->newsimage != "")
	        <div class="image">
                <img src="{{ asset($pathimage . $model->newsimage) }}" width="100%">
	        </div>
            @endif
	        <div class="content-post">{!! $model->content !!}</div>
	        <div class="author">{{$model->author}}</div>
		</div>

		<div class="news-posted">
			<h3 class="title-category"><span>TIN TỨC ĐÃ ĐĂNG</span></h3>
			<ul>
                @php
                    $i = 0;
                @endphp
                @foreach($collections_0 as $model)
                @php
                    $i++;
                    if ($i >= 20){
                        break;
                    }
                @endphp
				<li><a href="{{ route('invests-detail', ['id'=> $model->id]) }}">{{$model->newstitle}}</a> - <span class="date">{{ConvertSQLDate($model->newsdate)}}</span></li>
                @endforeach
			</ul>
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
                if ($i >= 20){
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
                        <span class="author">{{$model->author}}</span>-<span class="date">{{ConvertSQLDate($model->newsdate)}}</span>
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
                        <span class="author">{{$model->author}}</span>-<span class="date">{{ConvertSQLDate($model->newsdate)}}</span>
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

