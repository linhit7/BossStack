@extends('layouts.master')

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
<div class="row">
    <form role="form" action="{{ route('contracts-store') }}?continue=true" method="post" id="frm">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">THÔNG TIN DỊCH VỤ</h3><br><br>
                    <h4 class="box-title"><font color='#000080'>Thêm mới</font></h4>
                </div>
                {{ csrf_field() }}
                <input type='hidden' name='typereport' value=''>
                <div class="box-body">

                    <div class="form-group">
                        <label><h5><u>THÔNG TIN DỊCH VỤ:</u></h5></label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>MÃ KHÁCH HÀNG <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-7">
                                <select class="form-control select2" name="customer_id">                        
                                    <option value=""></option>
                                    @foreach($customers as $item)
                                        @if( $item->id == old('customer_id') )
                                            <option value="{{ $item->id }}" selected>{{'['. $item->customercode . '] ' . $item->fullname . ' - Email: ' . $item->email . ' - Ngày sinh: ' . ConvertSQLDate($item->birthday) }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{'['. $item->customercode . '] ' . $item->fullname . ' - Email: ' . $item->email  . ' - Ngày sinh: ' . ConvertSQLDate($item->birthday)}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Mã đơn hàng <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="contractno" value="{{ old('contractno') }}"><font size='1'>&nbsp;<u>Cấu trúc</u>: HD + ddmmyy + số thứ tự  <br>(<u>Ex</u>: HD01012000000001)</font>
                                @if($errors->has('contractno'))<span class="text-danger">{{ $errors->first('contractno') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Ngày bắt đầu <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input type='text' class="form-control" name="contractdate" id='contractdate' value="{{ old('contractdate') }}"/>
                                @if($errors->has('contractdate'))<span class="text-danger">{{ $errors->first('contractdate') }}</span>@endif
                            </div>
                            <div class="col-md-1"></div>                            
                            <div class="col-md-2">
                                <label>Ngày kết thúc <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input type='text' class="form-control" name="lastcontractdate" id='lastcontractdate' value="{{ old('lastcontractdate') }}"/>
                                @if($errors->has('lastcontractdate'))<span class="text-danger">{{ $errors->first('lastcontractdate') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><h5><u>GÓI DỊCH VỤ:</u></h5></label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <p>
                                    <input type="radio" tabindex="4" id="chk_month" name="service_product_id" value="{{ $serviceproduct[0]->id }}" {{ old('service_product_id')==$serviceproduct[0]->id ? 'checked="checked"' : '' }}>
                                    <font size="2" color="#000000">Hàng {{ $serviceproduct[0]->name }} <br> <font color="red">{{ formatNumber($serviceproduct[0]->price, 1, 0, 0) }} đồng/{{ mb_strtolower($serviceproduct[0]->name) }}</font></font>
                                </p>
                            </div>
                            <div class="col-md-2 text-center">
                                <p>
                                    <input type="radio" tabindex="4" id="chk_precious" name="service_product_id" value="{{ $serviceproduct[1]->id }}" {{ old('service_product_id')==$serviceproduct[1]->id ? 'checked="checked"' : '' }}>
                                    <font size="2" color="#000000">Hàng {{ $serviceproduct[1]->name }} <br> <font color="red">{{ formatNumber($serviceproduct[1]->price, 1, 0, 0) }} đồng/{{ mb_strtolower($serviceproduct[1]->name) }}</font></font>
                                 </p>
                            </div>
                            <div class="col-md-2 text-center">
                                <p>
                                    <input type="radio" tabindex="4" id="chk_year" name="service_product_id" value="{{ $serviceproduct[2]->id }}" {{ old('service_product_id')==$serviceproduct[2]->id ? 'checked="checked"' : '' }}>
                                    <font size="2" color="#000000">Hàng {{ $serviceproduct[2]->name }} <br> <font color="red">{{ formatNumber($serviceproduct[2]->price, 1, 0, 0) }} đồng/{{ mb_strtolower($serviceproduct[2]->name) }}</font></font>
                                </p>
                            </div>
                        </div> 
                        @if($errors->has('service_product_id'))<span class="text-danger">{{ $errors->first('service_product_id') }}</span>@endif
                    </div> 
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Ghi chú: </label>
                            </div>
                            <div class="col-md-7">
                                <textarea class="form-control" name="description" rows="1">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="form-group">
                        <label><h5><u>THÔNG TIN PHÊ DUYỆT:</u></h5></label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Tình trạng :</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" name="contractstatustype">
                                    @foreach($contractstatustype as $key=>$value)
                                        @if($key == old('contractstatustype'))
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('contractstatustype'))<span class="text-danger">{{ $errors->first('contractstatustype') }}</span>@endif
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Nhân viên kinh doanh:</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" name="officer_user_id">                        
                                    <option value=""></option>
                                    @foreach($users as $item)
                                        @if( $item->id == old('officer_user_id') )
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Trạng thái duyệt:</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" name="approvestatustype">
                                    <option value=""></option>
                                    @foreach($approvestatustype as $key=>$value)
                                        @if($key == old('approvestatustype'))
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('statustype'))<span class="text-danger">{{ $errors->first('statustype') }}</span>@endif
                            </div>
                            <div class="col-md-1"></div>                            
                            <div class="col-md-2">
                                <label>Kiểm soát phê duyệt:</label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control select2" name="approved_user_id">                        
                                    <option value=""></option>
                                    @foreach($approvedusers as $item)
                                        @if( $item->id == old('approved_user_id') )
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Ngày duyệt đơn hàng:</label>
                            </div>
                            <div class="col-md-2">
                                <input type='text' class="form-control" name="approved_at" id='approved_at' value="{{ old('approved_at') }}"/>
                                @if($errors->has('approved_at'))<span class="text-danger">{{ $errors->first('approved_at') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">

                        </div>
                    </div>
                    
                </div>
            </div>
            
            <button class="btn btn-success" style="width: 15%;" onclick="processReports('frm', 'store')">Lưu</button>
            <br><hr>
            <a href="{{ route('contracts-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.contract.partials.script')
@endsection


