@extends('layouts.master')

@section('content')

@if(isset($infor))
<div class="alert alert-success">
    {{ $infor }}
</div>
@endif

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<div class="row">
    <form role="form" action="{{ route('cashplans-store') }}?continue=true" method="post" id="frm">


        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">THÊM MỤC TIÊU</h3><br><br>
                    <h4 class="box-title"><font color='#000080'>Thêm mới</font></h4>
                </div>
                {{ csrf_field() }}
                <input type='hidden' name='typereport' value=''>
                <input type='hidden' name='customer_id' value='{{ $customer_id }}'>                
                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>TÊN MỤC TIÊU <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="planname" value="{{ old('planname') }}">
                                @if($errors->has('planname'))<span class="text-danger">{{ $errors->first('planname') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Ngày lập<small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input type="date" class="form-control" name="plandate" value="{{ old('plandate') == "" ? $plandate : old('plandate') }}">
                                @if($errors->has('plandate'))<span class="text-danger">{{ $errors->first('plandate') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    
                                        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Số tuổi hiện tại <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="currentage" value="{{ old('currentage') }}" onkeyup='this.value=formatNumberDecimal(this.value)'>
                                @if($errors->has('currentage'))<span class="text-danger">{{ $errors->first('currentage') }}</span>@endif
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Số tuổi đạt được mục tiêu tài chính <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <div class="slidecontainer">
                                    <input type="range" min="1" max="100" step=".5" value="{{ old('planage') == "" ? 50 : old('planage') }}" class="slider" name="planage" id="planage">
                                </div>
                            </div>                            
                            <div class="col-md-1">
                                <font size="3"><span id="planagelabel"></span> tuổi.</font>
                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Kế hoạch thu nhập <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <div class="slidecontainer">
                                    <input type="range" min="1" max="1000" step=".5" value="{{ old('planamount') == "" ? 0 : old('planamount') }}" class="slider" name="planamount" id="planamount">
                                </div>
                            </div>                            
                            <div class="col-md-1">
                                <font size="3"><span id="planamountlabel"></span></font>
                            </div>                            
                            <div class="col-md-1">
                                <select class="form-control select2" name="planamountunittype">
                                    @foreach($unittypes as $key=>$value)
                                        @if($key == old('planamountunittype'))
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                
                            </div>                            
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Liên kết ví tiền <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">

                            </div>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Vốn đầu tư hiện tại <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <div class="slidecontainer">
                                    <input type="range" min="1" max="1000" step=".5" value="{{ old('currentamount') == "" ? 0 : old('currentamount') }}" class="slider" name="currentamount" id="currentamount">
                                </div>
                            </div>                            
                            <div class="col-md-1">
                                <font size="3"><span id="currentamountlabel"></span></font>
                            </div>
                            <div class="col-md-1">
                                <select class="form-control select2" name="currentamountunittype">
                                    @foreach($unittypes as $key=>$value)
                                        @if($key == old('currentamountunittype'))
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                
                            </div>                                                         
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Mục tiêu <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-3">
                                <div class="slidecontainer">
                                    <input type="range" min="1" max="1000" step=".5" value="{{ old('requireamount') == "" ? 0 : old('requireamount') }}" class="slider" name="requireamount" id="requireamount">
                                </div>
                            </div>                            
                            <div class="col-md-1">
                                <font size="3"><span id="requireamountlabel"></span></font>
                            </div>
                            <div class="col-md-1">
                                <select class="form-control select2" name="requireamountunittype">
                                    @foreach($unittypes as $key=>$value)
                                        @if($key == old('requireamountunittype'))
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>                                                                    
                                        @endif
                                    @endforeach
                                </select>                                
                            </div>                                                         
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Số tiền tích lũy hiện tại:</label>
                            </div>
                            <div class="col-md-3">
                                <font size="3" color='red'><b>1000000 VNĐ</b></font>
                            </div>                            
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label>PHÂN TÍCH KẾ HOẠCH MỤC TIÊU TÀI CHÍNH</label>
                            </div>
                        </div>
                    </div>                    

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label>Để chi tiêu 25 triệu/tháng khi nghỉ hưu, cần tích lũy 9 triệu/tháng trong 25 năm</label>
                            </div>
                        </div>
                    </div>  

                    <hr>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label>HỖ TRỢ</label>
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
            <a href="{{ route('cashplans-index') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   
        </div>
    </form>
</div>

@endsection

@section('scripts')
@include('product-manage.cashplan.partials.script')
@endsection


