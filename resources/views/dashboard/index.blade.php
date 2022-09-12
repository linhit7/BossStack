@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection


@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif


@endsection

@section('scripts')
@include('dashboard.partials.script')
@endsection