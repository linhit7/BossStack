@extends('layouts.master')

@section('head')
<style type="text/css">
    .box.cashaccount .box-body{
        padding: 15px 35px; 
        background: #eeeeee; 
        border: 1px solid #b7b7b7;
    }

    .box-body > .table {
        font-size: 14px;
    }

    .box-body > .table thead{
        border-top: none;
    }

    .box-body > .table thead tr th{
        border-bottom-color: #b7b7b7;
    }

    .box-body > .table tbody tr td{
        border-top-color: #b7b7b7;
    }

    @media only screen and (max-width: 768px){
        .box.cashaccount .box-body{
            padding: 0;
            background: transparent; 
            border: none;
        }

        .box-body{
            overflow-x: auto;
        }

        .box-body > .table {
            width: 1000px;
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

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">DANH SÁCH CÁC VÍ TIỀN</h3>
            </div>
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools" style="right: 0;">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('cashtranfers-add') }}" class="btn btn-success" style="color: #fff;"><i class="fa fa-refresh" aria-hidden="true"></i> Chuyển tiền</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;" class="text-nowrap" width="1%">STT</th>
                            <th style="text-align: center;" class="text-nowrap" width="15%">SỐ VÍ TIỀN</th>
                            <th style="text-align: center;" class="text-nowrap">TÊN VÍ MỤC TIÊU</th>
                            <th style="text-align: center;" class="text-nowrap">SỐ DƯ</th>
                            <th style="text-align: center;" class="text-nowrap" width="4%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($collections->count() === 0)
                        <tr>
                            <td colspan="7"><b>Không có dữ liệu!!!</b></td>
                        </tr>
                        @endif
                        @php
                            $i = 1
                        @endphp                        
                        @foreach($collections as $cashaccount)
                            <tr class="table-cashaccount">
                                <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $cashaccount->accountno }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $cashaccount->accountname }}</td>
                                <td style="text-align: right;" class="text-nowrap">{!! formatNumberColor($cashaccount->amount, 1, 0, 1) !!}</td>
                                <td style="text-align: center;" class="text-nowrap">
                                    <a href="{{ route('cashaccounts-viewAccount',['id'=> $cashaccount->id]) }}" title='Xem'><i class="far fa-file"></i></a> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix text-right">
                {{ $collections->links() }}
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>

<a href="{{ route('cash-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   

@endsection

@section('scripts')
@include('product-manage.cashaccount.partials.script')
@endsection

