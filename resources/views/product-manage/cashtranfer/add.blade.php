@extends('layouts.master')


@section('content')
@if(isset($infor))
    @if($checkAmount == 1)
        <div class="alert alert-danger">
            {{ $infor }}
        </div>
    @else
        <div class="alert alert-success">
            {{ $infor }}
        </div>
    @endif
@endif

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('cashtranfers-store') }}?continue=true" method="post" id="frm">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">CHUYỂN TIỀN</h3>
                </div>
                <div class="box-header with-border">
                    <font style="font-size:10pt;color='#000'">Thông tin ví tiền, số dư dùng để quản lý dòng tiền cá nhân. Để xem lại thông tin chi tiết các ví tiền vui lòng xem <a href="{{ route('cashaccounts-index') }}" style="color: #FFA500;"><b>tại đây</b></a>.</font>
                </div>

                {{ csrf_field() }}
                <input type='hidden' name='typereport' value=''>
                <input type='hidden' name='customer_id' value='{{ $customer_id }}'>
                <input type='hidden' name='accountno_primary' value='{{ $accountno_primary }}'>                
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5">
                                <label>Ngày giao dịch <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7">
                                <input type='text' class="form-control" name="tranferdate" id='tranferdate' value="{{ old('tranferdate') == "" ? $tranferdate : old('tranferdate') }}"/>
                                @if($errors->has('tranferdate'))<span class="text-danger">{{ $errors->first('tranferdate') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5">
                                <label>Ví tiền nguồn<small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7">
                                <select class="form-control select2" name="cashaccount_id_send" onChange="processSubmitOpenWindow('frm', 'view', '_top', '{{ route('cashtranfers-process') }}', '1')">
                                    <option value=""></option>
                                    @foreach($listaccounts as $item)
                                        @if($item->id == $cashaccount_id_send or $item->id == old('cashaccount_id_send'))
                                            <option value="{{ $item->id }}" selected>{{ $item->accountno . " - " . $item->accountname }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->accountno . " - " . $item->accountname }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                    
                                @if($errors->has('cashaccount_id_send'))<span class="text-danger">{{ $errors->first('cashaccount_id_send') }}</span>@endif
                            </div>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5">
                                <label>Số dư khả dụng:</label>
                            </div>
                            <div class="col-md-4 col-xs-7" style="text-align: right;">
                                <input type='hidden' name='cashaccount_amount_send' value='{{ $cashaccount_amount_send }}'>
                                <font style="font-size: 17px;font-weight:normal">{!! $cashaccount_amount_send === '' ? '' : formatNumberColor($cashaccount_amount_send, 1, 0, 1) !!}</font>
                            </div>                            
                        </div>
                    </div>

                    @php
                        $check = "";
                    @endphp
                    @if($cashaccount_id_send != '' and $accountno_primary != $cashaccount_id_send)
                    @php
                        $amount = formatNumber($cashaccount_amount_send, 1, 0, 1);
                        $check = "readonly";
                    @endphp
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-7 col-xs-5">
                                <font style="font-size: 17px;font-weight:normal;color:#ff0000">Quý khách đang thực hiện chuyển tiền từ ví mục tiêu. Để có thể tiếp tục thực hiện chuyển tiền từ ví mục tiêu này, hệ thống sẽ tự động kết thúc kế hoạch ví mục tiêu quý khách đang chọn để thực hiện thao tác chuyển tiền này !</font>
                            </div>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5">
                                <label>Thông tin ví tiền hưởng<small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7">
                                <select class="form-control select2" name="cashaccount_id_receive">
                                    <option value=""></option>
                                    @foreach($listaccounts as $item)
                                        @if($item->id != $cashaccount_id_send)
                                            @if( $item->id == $cashaccount_id_receive or $item->id == old('cashaccount_id_receive') )
                                                @if($item->requireamount == 0)
                                                    <option value="{{ $item->id }}" selected>{{ $item->accountno . " - " . $item->accountname . " (Số dư: " . formatNumber($item->amount, 1, 0, 1) . ")" }}</option>                                                                    
                                                @else
                                                    <option value="{{ $item->id }}" selected>{{ $item->accountno . " - " . $item->accountname . " (Kế hoạch: " . formatNumber($item->requireamount, 1, 0, 0) . ", Số dư: " . formatNumber($item->amount, 1, 0, 1) . ")" }}</option>                                                                    
                                                @endif
                                            @else
                                                @if($item->requireamount == 0)
                                                    <option value="{{ $item->id }}">{{ $item->accountno . " - " . $item->accountname . " (Số dư: " . formatNumber($item->amount, 1, 0, 1) . ")" }}</option>                                                                    
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->accountno . " - " . $item->accountname . " (Kế hoạch: " . formatNumber($item->requireamount, 1, 0, 0) . ", Số dư: " . formatNumber($item->amount, 1, 0, 1) . ")" }}</option>                                                                    
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                </select>                                    
                                @if($errors->has('cashaccount_id_receive'))<span class="text-danger">{{ $errors->first('cashaccount_id_receive') }}</span>@endif
                            </div>                            
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5">
                                <label>Số tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-7">
                                <input type="text" class="form-control" name="amount" {{$check}} value="{{ old('amount') == "" ? $amount : old('amount') }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('amount'))<span class="text-danger">{{ $errors->first('amount') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-xs-5">
                                <label>Nội dung: </label>
                            </div>
                            <div class="col-md-4 col-xs-7">
                                <input type="text" class="form-control" name="description" value="{{ old('description') == "" ? $description : old('description') }}">
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
            
            <button class="btn btn-success btn-bg-blue" onclick="processSubmitOpenWindow('frm', 'add', '_top', '{{ route('cashtranfers-store') }}?continue=true', '1')">Chuyển tiền</button>
            <br><hr>
            <a href="{{ route('cashaccounts-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashtranfer.partials.script')
@endsection


