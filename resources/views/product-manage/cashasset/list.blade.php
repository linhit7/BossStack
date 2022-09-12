@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;vertical-align: middle;" rowspan='2' class="text-nowrap" width="1%">STT</th>
                            <th style="text-align: center;vertical-align: middle;" rowspan='2' class="text-nowrap">CHI TIẾT</th>
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
                            <td colspan="7"><b>Không có dữ liệu!!!</b></td>
                        </tr>
                        @endif
                        @php
                            $i = 1;
                            $total_asset = 0; $total_expense = 0;
                        @endphp                        
                        @foreach($collections as $cashasset)
                            @php
                                if($cashasset->assetstatustype == 0){
                                    $total_asset += $cashasset->amount;
                                }elseif($cashasset->assetstatustype == 1){
                                    $total_expense += $cashasset->amount;
                                }elseif($cashasset->assetstatustype == 2){
                                    $total_expense += $cashasset->amount;
                                } 
                            @endphp                         
                            <tr class="table-cashasset">
                                <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $cashasset->assetname }}</td>
                                <td style="text-align: center;" class="text-nowrap">{{ $cashasset->assetdate == null ? "" : ConvertSQLDate($cashasset->assetdate) }}</td>

                                @if($cashasset->assetstatustype == 0)
                                    <td style="text-align: right;" class="text-nowrap">{{ formatNumber($cashasset->amount, 1, 0, 0) }}</td>
                                    <td style="text-align: right;" class="text-nowrap"></td>
                                @elseif($cashasset->assetstatustype == 1 or $cashasset->assetstatustype == 2)
                                    <td style="text-align: right;" class="text-nowrap"></td>
                                    <td style="text-align: right;" class="text-nowrap">{{ formatNumber($cashasset->amount, 1, 0, 0) }}</td>
                                @endif 

                                <td style="text-align: center;" class="text-nowrap">
                                    @if($cashasset->assetstatustype == 0)
                                        <b class="alert-success">{{ mb_strtoupper($assetstatustypes[$cashasset->assetstatustype]) }}</b>        
                                    @elseif($cashasset->assetstatustype == 1)
                                        <b class="alert-warning">{{ mb_strtoupper($assetstatustypes[$cashasset->assetstatustype]) }}</b>        
                                    @elseif($cashasset->assetstatustype == 2)
                                        <b class="alert-danger">{{ mb_strtoupper($assetstatustypes[$cashasset->assetstatustype]) }}</b>        
                                    @endif 
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <th style="text-align: left;" colspan='3' class="text-nowrap">TỔNG CỘNG</th>
                            <th style="text-align: right;" class="text-nowrap">{{ formatNumber($total_asset, 1, 0, 1) }}</th>
                            <th style="text-align: right;" class="text-nowrap">{{ formatNumber($total_expense, 1, 0, 1) }}</th>
                            <th style="text-align: center;" colspan='1' class="text-nowrap"></th>
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
@include('product-manage.cashasset.partials.script')
@endsection

