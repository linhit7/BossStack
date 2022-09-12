@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection

@section('content')


@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('contracts-processPaymentMomo') }}?continue=true" method="post" id="frm">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-home" aria-hidden="true"></i> / {{ $title->sub_heading }}</h3>
                </div>
                {{ csrf_field() }}
                <div class="form-group">
                <br>
                @if($errorCode == '0')
                    <p class="text-success" style="line-height: 2"><font size='3'><b>{{ $infor }}</b></font></p>                    
                @else 
                    <h3>{{ $infor }}</h3>      
                @endif 
                <br>
                </div>
            </div>

            <div class="button-function" style="text-align: center;">
                <a class="btn btn-default" href="{{ route('dashboard-customer') }}" style="float: inherit;">
                    <span class="text" style="float: inherit;">Trở về trang chủ</span>
                </a>
            </div>
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.contract.partials.script')
@endsection


