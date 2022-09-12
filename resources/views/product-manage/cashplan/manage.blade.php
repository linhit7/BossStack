@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/style_admin.css') }}">
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
            <div class="box-header">
                <font size="4" color='#000'>Khách hàng <b>{{ $customer->fullname }}</b></font>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;" class="text-nowrap" width="1%">STT</th>
                            <th style="text-align: center;" class="text-nowrap" width="10%">KẾ HOẠCH</th>
                            <th style="text-align: center;" class="text-nowrap">NGÀY LẬP</th>
                            <th style="text-align: center;" class="text-nowrap">SỐ TUỔI <br> HIỆN TẠI</th>
                            <th style="text-align: center;" class="text-nowrap">SỐ TUỔI ĐẠT <br> MỤC TIÊU TÀI CHÍNH</th>
                            <th style="text-align: center;" class="text-nowrap">KẾ HOẠCH <br> THU NHẬP</th>
                            <th style="text-align: center;" class="text-nowrap">VỐN ĐẦU TƯ <br> HIỆN TẠI</th>
                            <th style="text-align: center;" class="text-nowrap">MỤC TIÊU <br> THU NHẬP</th>
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
                        @foreach($collections as $cashplan)
                            <tr class="table-cashplan">
                                <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $cashplan->planname }}</td>
                                <td style="text-align: center;" class="text-nowrap">{{ $cashplan->plandate == null ? "" : ConvertSQLDate($cashplan->plandate) }}</td>
                                <td style="text-align: right;" class="text-nowrap">{{ formatNumber($cashplan->currentage, 1, 0, 0) }}</td>
                                <td style="text-align: right;" class="text-nowrap">{{ formatNumber($cashplan->planage, 1, 0, 0) }}</td>
                                <td style="text-align: right;" class="text-nowrap">{{ $cashplan->planamount == null ? "-" : formatNumber($cashplan->planamount*$cashplan->planamountunittype, 1, 0, 0) }}</td>
                                <td style="text-align: right;" class="text-nowrap">{{ formatNumber($cashplan->currentamount*$cashplan->currentamountunittype, 1, 0, 0) }}</td>
                                <td style="text-align: right;" class="text-nowrap">{{ formatNumber($cashplan->requireamount*$cashplan->requireamountunittype, 1, 0, 0) }}</td>
                                <td style="text-align: center;" class="text-nowrap">
                                    <a href="{{ route('cashplans-analysisManage',['id'=> $cashplan->id, 'customer_id'=>Crypt::encrypt($cashplan->customer_id)]) }}" title='Xem'><i class="far fa-file" style="margin-right: 10px;"></i></a>
                                    <a href="{{ route('cashplans-editManage',['id'=> $cashplan->id]) }}" title='Sửa'><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i></a> 
                                    <a href="javascript:void(0)" data-id="{{ $cashplan->id }}" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <form name="form-delete-{{ $cashplan->id }}" method="post" action="{{ route('cashplans-deleteManage', ['id'=>$cashplan->id, 'customer_id'=>Crypt::encrypt($cashplan->customer_id)]) }}">
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

<a href="{{ route('cash-manage') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>
  

@endsection

@section('scripts')
@include('product-manage.cashplan.partials.script')
@endsection

