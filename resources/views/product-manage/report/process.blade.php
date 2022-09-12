@extends('layouts.master')

@section('head')
	<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

@if(isset($infor))
    @include('layouts.partials.messages.infor')
@endif

BÁO CÁO TÀI CHÍNH

@endsection

