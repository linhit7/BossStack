@extends('layouts.master')

@section('head')
<style type="text/css">
    @media only screen and (max-width: 768px){
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

@include('product-manage.cashaccount.partials.search-form')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools" style="right: 0;">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('cashaccounts-add') }}" class="btn btn-default btn-bg-blue"  style="color: #fff;"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;" class="text-nowrap" width="1%">STT</th>
                            <th style="text-align: center;" class="text-nowrap" width="15%">MÃ VÍ TIỀN</th>
                            <th style="text-align: center;" class="text-nowrap">TÊN VÍ TIỀN</th>
                            <th style="text-align: center;" class="text-nowrap">NGÀY MỞ</th>
                            <th style="text-align: center;" class="text-nowrap">SỐ DƯ</th>
                            <th style="text-align: center;" width="10%">CHỨC NĂNG</th>
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
                                <td style="text-align: center;" class="text-nowrap">{{ $cashaccount->accountdate == null ? "" : ConvertSQLDate($cashaccount->accountdate) }}</td>
                                <td style="text-align: right;" class="text-nowrap">{{ formatNumber($cashaccount->amount, 1, 0, 0) }}</td>
                                <td style="text-align: center;" class="text-nowrap">
                                    <a style="color: #1b1464;" href="{{ route('cashaccounts-edit',['id'=> $cashaccount->id]) }}" title='Sửa'><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i></a> 
                                    <a style="color: #1b1464;" href="javascript:void(0)" data-id="{{ $cashaccount->id }}" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <form name="form-delete-{{ $cashaccount->id }}" method="post" action="{{ route('cashaccounts-delete', ['id' => $cashaccount->id ]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                        </form>
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

