@extends('layouts.master')

@section('content')
@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

@include('product-manage.contract.partials.search-form')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">DANH SÁCH</h3>

                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <a href="javascript:processReports('frm', '1')" class="btn btn-warning"><i class="fa fa-file-text" aria-hidden="true"></i> Mới mở</a>
                        <a href="javascript:processReports('frm', '2')" class="btn btn-success"><i class="fa fa-hdd-o" aria-hidden="true"></i> Hoạt động</a>
                        <a href="javascript:processReports('frm', '3')" class="btn btn-danger"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Tất toán</a>
                    </div>
                </div>


            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;" class="text-nowrap" width="1%">STT</th>
                            <th style="text-align: center;" class="text-nowrap" width="15%">TÊN KHÁCH HÀNG</th>
                            <th style="text-align: center;" class="text-nowrap">MÃ ĐƠN HÀNG</th>
                            <th style="text-align: center;" class="text-nowrap">TÊN DỊCH VỤ</th>
                            <th style="text-align: center;" class="text-nowrap">THỜI GIAN TẠO</th>
                            <th style="text-align: center;" class="text-nowrap">TÌNH TRẠNG</th>
                            <th style="text-align: center;" class="text-nowrap">PHÊ DUYỆT</th>
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
                        @foreach($collections as $contract)
                            <tr class="table-contract">
                                <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $contract->fullname }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $contract->contractno }}</td>
                                <td style="text-align: left;" class="text-nowrap">
                                        - Gói: {{ $contract->service_product_name }}<br>        
                                        - Giá: {{ formatNumber($contract->service_product_price, 1, 0, 1) }} đồng<br>
                                        - Thời hạn từ: {{ $contract->contractdate == null ? "" : ConvertSQLDate($contract->contractdate) }} - {{ $contract->lastcontractdate == null ? "" : ConvertSQLDate($contract->lastcontractdate) }}<br>
                                        @if($contract->service_product_price == 0)
                                        - Thanh toán: Gói miễn phí<br>
                                        @else 
                                        - Thanh toán: {{ $paymenttype[$contract->payment == null ? "0" : $contract->payment] }}<br>        
                                        @endif 
                                </td>
                                <td style="text-align: center;" class="text-nowrap">{{ $contract->created_at == null ? "" : ConvertSQLDate($contract->created_at, 1) }}</td>
                                <td style="text-align: center;" class="text-nowrap">
                                    @if($contract->contractstatustype == 1)
                                        <b class="alert-warning">{{ $contractstatustype[$contract->contractstatustype] }}</b>        
                                    @elseif($contract->contractstatustype == 2)
                                        <b class="alert-success">{{ $contractstatustype[$contract->contractstatustype] }}</b>        
                                    @elseif($contract->contractstatustype == 3) 
                                        <b class="alert-danger">{{ $contractstatustype[$contract->contractstatustype] }}</b>        
                                    @endif 
                                </td>
                                <td style="text-align: center;" class="text-nowrap">
                                    @if($contract->approvestatustype == 'P')
                                        <b class="alert-warning">{{ $approvestatustype[$contract->approvestatustype] }}</b>        
                                    @elseif($contract->approvestatustype == 'A')
                                        <b class="alert-success">{{ $approvestatustype[$contract->approvestatustype] }}</b>        
                                    @elseif($contract->approvestatustype == 'R') 
                                        <b class="alert-danger">{{ $approvestatustype[$contract->approvestatustype] }}</b>        
                                    @endif 
                                </td>
                                <td style="text-align: center;" class="text-nowrap">
                                    <a href="{{ route('contracts-edit',['id'=> $contract->id]) }}" title='Sửa'><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i></a> 
                                    <a href="javascript:void(0)" data-id="{{ $contract->id }}" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <form name="form-delete-{{ $contract->id }}" method="post" action="{{ route('contracts-delete', ['id' => $contract->id ]) }}">
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
@endsection

@section('scripts')
@include('product-manage.contract.partials.script')
@endsection

