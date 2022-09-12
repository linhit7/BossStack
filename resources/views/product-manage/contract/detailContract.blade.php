@extends('layouts.master')

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('contracts-update', ['id' => $model->id]) }}?continue=true" method="post" id="contract-form">
        <div class="col-md-12">
            <div class="box box-primary">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type='hidden' name='typereport' value=''>
                <div class="box-body">
                    <div class="form-group">
                        <p class="text-primary" style="line-height: 2"><font size='3'><b>Thông tin khách hàng</b></font></p>                        
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Họ và tên :</label>
                            </div>
                            <div class="col-md-7">
                                {{ $model->customer()->first()->fullname }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Địa chỉ email :</label>
                            </div>
                            <div class="col-md-3">
                                {{ $model->customer()->first()->email }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Địa chỉ liên hệ:</label>
                            </div>
                            <div class="col-md-7">
                                {{ $model->customer()->first()->address }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Điện thoại :</label>
                            </div>
                            <div class="col-md-3">
                                {{ $model->customer()->first()->phone }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <p class="text-primary" style="line-height: 2"><font size='3'><b>Thông tin dịch vụ</b></font></p>                        
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Mã đơn hàng :</label>
                            </div>
                            <div class="col-md-3">
                                {{ $model->contractno }}
                            </div>
                            <div class="col-md-2">
                                <label>Tình trạng :</label>
                            </div>
                            <div class="col-md-2">
                                <font color="red"><b>{{ $contractstatustype[$model->contractstatustype] }}</b></font>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Ngày bắt đầu :</label>
                            </div>
                            <div class="col-md-3">
                                {{ ConvertSQLDate($model->contractdate) }}
                            </div>
                            <div class="col-md-2">
                                <label>Ngày kết thúc :</label>
                            </div>
                            <div class="col-md-2">
                                {{ ($model->lastcontractdate == null or $model->contractdate == $model->lastcontractdate) ? "Không thời hạn" : ConvertSQLDate($model->lastcontractdate) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;" class="text-nowrap">DỊCH VỤ</th>
                                            <th style="text-align: center;" class="text-nowrap">THỜI HẠN (tháng)</th>
                                            <th style="text-align: center;" class="text-nowrap">GIẢM GIÁ (%)</th>                                            
                                            <th style="text-align: center;" class="text-nowrap">SỐ TIỀN THANH TOÁN (đồng)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-contract">
                                            <td style="text-align: left;" class="text-nowrap">{{ $model->service_product_name }} <br> Giá: {{ formatNumber($model->service_product_price, 1, 0, 1) }} đồng/tháng</td>
                                            <td style="text-align: center;" class="text-nowrap">{{ $model->term }}</td>
                                            <td style="text-align: center;" class="text-nowrap">{{ $model->discount }}</td>
                                            <td style="text-align: right;" class="text-nowrap">{{ formatNumber($model->amount, 1, 0, 1) }}</td>
                                        </tr>
                                        <tr class="table-contract">
                                            <td style="text-align: left;" class="text-nowrap"></td>
                                            <td style="text-align: left;" class="text-nowrap"></td>
                                            <td style="text-align: right;" class="text-nowrap"><b>THÀNH TIỀN</b></td>
                                            <td style="text-align: right;" class="text-nowrap"><font color="#ff0000">{{ formatNumber($model->amount, 1, 0, 1) }}</font></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div> 

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Thanh toán :</label>
                            </div>
                            <div class="col-md-3">
                                @if($model->service_product_price != 0)
                                    @if($model->payment == null or $model->payment == '0')
                                        <b class="alert-danger">{{ $paymenttype[0] }}</b>        
                                    @elseif($model->payment == '1')
                                        <b class="alert-success">{{ $paymenttype[1] }}</b>        
                                    @endif
                                @endif                                    
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <p class="text-primary" style="line-height: 2"><font size='3'><b>Thông tin phê duyệt:</b></font></p>                        
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Trạng thái duyệt :</label>
                            </div>
                            <div class="col-md-2">
                                <font color="red"><b>{{ $model->approvestatustype == "" ? "" : $approvestatustype[$model->approvestatustype] }}</b></font>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Ngày duyệt :</label>
                            </div>
                            <div class="col-md-2">
                                {{ $model->approved_at == "0000-00-00" ? "" : ConvertSQLDate($model->approved_at) }}
                            </div>
                        </div>
                    </div>
                      
                </div>
            </div>

            <hr>
            <a href="{{ route('dashboard') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
            
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.contract.partials.script')
@endsection
