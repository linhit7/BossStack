@extends('layouts.master')

@section('head')
<style type="text/css">
    .box.cashincome-list .box-body{
        padding: 15px 35px; 
        background: #eeeeee; 
    }

    .box-body > .table thead{
        border-top: none;
    }

    .box-body > .table thead tr th{
        border-bottom-color: #e3e3e3;
    }

    .box-body > .table tbody tr td{
        border-top-color: #e3e3e3;
    }

    .box-body > .table tbody tr:last-child th:first-child{
        border-left: 1px solid #a6a6a6;
    }

    @media only screen and (max-width: 768px){
        .box.cashincome-list .box-body{
            padding: 15px 0; 
            background: transparent; 
            overflow-x: auto;
        }

        .box-body > .table{
            width: 1000px;
        }
    }
</style>
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box cashincome-list">
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;vertical-align: middle;" rowspan='2' class="text-nowrap" width="1%">STT</th>
                            <th style="text-align: center;vertical-align: middle;" rowspan='2' class="text-nowrap">CHI TIẾT</th>
                            <th style="text-align: center;vertical-align: middle;" rowspan='2' class="text-nowrap">NỘI DUNG</th>
                            <th style="text-align: center;vertical-align: middle;" rowspan='2' class="text-nowrap">NGÀY</th>
                            <th style="text-align: center;vertical-align: middle;" colspan='2' class="text-nowrap">SỐ DƯ</th>
                            <th style="text-align: center;vertical-align: middle;" rowspan='2' class="text-nowrap">LOẠI</th>
                         </tr>
                        <tr>
                            <th style="text-align: center;" class="text-nowrap">THU NHẬP</th>
                            <th style="text-align: center;" class="text-nowrap">CHI PHÍ</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        @if($collections->count() === 0)
                        <tr>
                            <td colspan="8"><b>Không có dữ liệu!!!</b></td>
                        </tr>
                        @endif
                        @php
                            $i = 1;
                            $total_income = 0; $total_expense = 0;
                        @endphp                        
                        @foreach($collections as $cashincome)
                            @php
                                if($cashincome->incomestatustype == 0){
                                    $total_income += $cashincome->amount;
                                }elseif($cashincome->incomestatustype == 1){
                                    $total_expense += $cashincome->amount;
                                }elseif($cashincome->incomestatustype == 2){
                                    $total_expense += $cashincome->amount;
                                } 
                            @endphp                         
                            <tr class="table-cashincome">
                                <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $cashincome->incomename }}</td>
                                <td style="text-align: center;" class="text-nowrap">{{ $cashincome->incomedate == null ? "" : ConvertSQLDate($cashincome->incomedate) }}</td>
                                <td style="text-align: center;" class="text-nowrap"></td>
                                @if($cashincome->incomestatustype == 0)
                                    <td style="text-align: right;" class="text-nowrap">{{ formatNumber($cashincome->amount, 1, 0, 0) }}</td>
                                    <td style="text-align: right;" class="text-nowrap"></td>
                                @elseif($cashincome->incomestatustype == 1 or $cashincome->incomestatustype == 2)
                                    <td style="text-align: right;" class="text-nowrap"></td>
                                    <td style="text-align: right;" class="text-nowrap">{{ formatNumber($cashincome->amount, 1, 0, 0) }}</td>
                                @endif 

                                <td style="text-align: center;" class="text-nowrap">
                                    @if($cashincome->incomestatustype == 0)
                                        <b class="alert-success">{{ mb_strtoupper($incomestatustypes[$cashincome->incomestatustype]) }}</b>        
                                    @elseif($cashincome->incomestatustype == 1)
                                        <b class="alert-warning">{{ mb_strtoupper($incomestatustypes[$cashincome->incomestatustype]) }}</b>        
                                    @elseif($cashincome->incomestatustype == 2)
                                        <b class="alert-danger">{{ mb_strtoupper($incomestatustypes[$cashincome->incomestatustype]) }}</b>        
                                    @endif 
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <th style="text-align: left;" colspan='3' class="text-nowrap">TỔNG CỘNG</th>
                            <th style="text-align: right;" class="text-nowrap">{{ formatNumber($total_income, 1, 0, 1) }}</th>
                            <th style="text-align: right;" class="text-nowrap">{{ formatNumber($total_expense, 1, 0, 1) }}</th>
                            <th style="text-align: center;" class="text-nowrap"></th>
                        </tr>                          
                        
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

<a href="javascript:closeWindow();" style="width: 16%;"><i class="far fa-times-circle"></i> Thoát</a>   

@endsection

@section('scripts')
@include('product-manage.cashincome.partials.script')
@endsection

