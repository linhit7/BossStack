<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="route" content="{{ request()->route()->getName() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/fiinves-f-logo-tab.png') }}" sizes="32x32" />

    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/style_fund.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    @yield('head')
    @laravelPWA
</head>

<body style="font-family: 'Roboto', sans-serif !important;">

    @if(session()->has('success'))
        @include('layouts.partials.messages.success')
    @endif


    <div id="header-fund">

        <!-- Menu -->
        @include('home.menu')
        <!-- End Menu -->

        <!-- Register -->
        <div class="register">

            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card-group">
                            <div class="card card-left">
                                <img class="card-img" src="{{ asset('img/signup-hinh.png') }}" alt="">
                            </div>
                            <div class="card card-right">
                                <div class="card-body">
                                    <form role="form" action="{{ route('customers-addCustomer') }}?continue=true" method="post" id="frm">
                            
                                        <div class="box box-primary" style="margin-bottom: 30px;">
                                            <div class="box-header text-center">
                                                <img src="{{ asset('img/logo-bossstack.png') }}" alt="" width="30%">
                                            </div>
                                            {{ csrf_field() }}
                                            <div class="box-body">
                                                
                                                <h2 class="text-center"><font color="#2a3b8e">THÔNG TIN CÁ NHÂN</font></h2>

                                                <div class="form-group">
                                                    <label>Họ & tên <small class="text-danger text"> (*)</small>:</label>
                                                    <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}">
                                                    @if($errors->has('fullname'))<span class="text-danger">{{ $errors->first('fullname') }}</span>@endif
                                                </div>

                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Ngày sinh <small class="text-danger text"> (*)</small>:</label>
                                                            <input type='text' class="form-control" name="birthday" id='birthday' value="{{ old('birthday') }}"/>
                                                            @if($errors->has('birthday'))<span class="text-danger">{{ $errors->first('birthday') }}</span>@endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Giới tính <small class="text-danger text"> (*)</small>:</label>
                                                            <select class="form-control select2" name="gender">
                                                                <option value=""></option>
                                                                @foreach($gendertype as $key=>$value)
                                                                    @if($key == old('gender'))
                                                                        <option value="{{ $key }}" selected>{{ $value }}</option>
                                                                    @else
                                                                        <option value="{{ $key }}">{{ $value }}</option> 
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            @if($errors->has('gender'))<span class="text-danger">{{ $errors->first('gender') }}</span>@endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Địa chỉ <small class="text-danger text"> (*)</small>:</label>
                                                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                                    @if($errors->has('address'))<span class="text-danger">{{ $errors->first('address') }}</span>@endif
                                                </div>

                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Điện thoại <small class="text-danger text"> (*)</small>:</label>
                                                            <input type="text" class="form-control" tabindex="5" name="phone" value="{{ old('phone') }}"> 
                                                            @if($errors->has('phone'))<span class="text-danger">{{ $errors->first('phone') }}</span>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email <small class="text-danger text"> (*)</small>:</label>
                                                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                                            @if($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span>@endif
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Người liên hệ khi cần:</label>
                                                            <input type="text" class="form-control" tabindex="5" name="contactname" value="{{ old('contactname') }}"> 
                                                            @if($errors->has('contactname'))<span class="text-danger">{{ $errors->first('contactname') }}</span>@endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Điện thoại:</label>
                                                            <input type="text" class="form-control" tabindex="5" name="contactphone" value="{{ old('contactphone') }}"> 
                                                            @if($errors->has('contactphone'))<span class="text-danger">{{ $errors->first('contactphone') }}</span>@endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nhóm khách hàng <small class="text-danger text"> (*)</small>:</label>
                                                    <select class="form-control select2" name="customertype">
                                                        <option value=""></option>
                                                        @foreach($customertype as $key=>$value)
                                                            @if($key == old('customertype'))
                                                                <option value="{{ $key }}" selected>{{ $value }}</option>
                                                            @else
                                                                <option value="{{ $key }}">{{ $value }}</option>      
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('customertype'))<span class="text-danger">{{ $errors->first('customertype') }}</span>@endif
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Thông tin sản phẩm <small class="text-danger text"> (*)</small>:</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <select class="form-control select2" name="typereport" id="typereport" onchange='onChangeSelect();'>
                                                                @foreach($service_product as $item)
                                                                    @if($item->id == old('typereport') or $item->id == $typereport)
                                                                        @if($item->id == 4)
                                                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                                                        @else
                                                                            <option value="{{ $item->id }}" selected>{{ $item->name }} ({{ formatNumber($item->price, 1, 0, 1) }} đồng/tháng)</option>                                                                        
                                                                        @endif
                                                                    @else
                                                                        @if($item->id == 4)
                                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                        @else
                                                                            <option value="{{ $item->id }}">{{ $item->name }} ({{ formatNumber($item->price, 1, 0, 1) }} đồng/tháng)</option>      
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            @if($errors->has('typereport'))<span class="text-danger">{{ $errors->first('typereport') }}</span>@endif
                                                        </div>
                                                    </div>
                                                </div>
 
                                                <div id="producttypelabel" style="">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <select class="form-control select2" name="producttype" id="producttype" onchange='onChangeSelect();'>
                                                                    <option value="0">Chọn gói thời gian</option>
                                                                    @foreach($producttypes as $key=>$value)
                                                                        @if($key > 0)
                                                                            @if($key == old('producttype') or $key == $producttype)
                                                                                <option value="{{ $key }}" selected>{{ $value['month'] }} tháng (giảm {{ $value['discount'] }}%)</option>
                                                                            @else
                                                                                <option value="{{ $key }}">{{ $value['month'] }} tháng (giảm {{ $value['discount'] }}%)</option>      
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                @if($errors->has('producttype'))<span class="text-danger">{{ $errors->first('producttype') }}</span>@endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                 &nbsp;Số tiền thanh toán: <font size="3" color='red'><b><span id="amountlabel"></span></font> đồng.</b>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-register"><b>ĐĂNG KÝ</b></button>   
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Register -->

        

    </div> 

    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/commons.js') }}"></script>
    
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" />
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.vi.min.js') }}"></script>


    <!-- Fund JS -->
    <script src="{{ asset('js/fund.js') }}"></script>
    <!-- Fund JS -->

    <script type="text/javascript">
            $(function () {
                param = {   format: "dd/mm/yyyy",
                            autoclose: true,
                            daysOfWeekHighlighted: "0,6",
                            todayHighlight: true,
                            todayBtn: "linked",
                            language: "vi",
                        };
                $('#birthday').datepicker(param);
            });
    </script>
    <script type="text/javascript">
        var dataProduct = [];
        @foreach($service_product as $item)
          dataProduct[{{ $item['id'] }}] = ['{{ $item['name'] }}', {{ $item['price'] }}];
        @endforeach
        var dataProductType = [];
        @foreach($producttypes as $key=>$value)
          dataProductType[{{ $key }}] = [{{ $value['month'] }}, {{ $value['discount'] }}];
        @endforeach

        function onChangeSelect(){
            if (document.getElementById("typereport").value == 4){
                document.getElementById("producttypelabel").style.display = 'none';
            }else{
                document.getElementById("producttypelabel").style.display = 'block';

                typereport_id = document.getElementById("typereport").value;
                producttype_id = document.getElementById("producttype").value;
                price = dataProduct[typereport_id][1];
                month = dataProductType[producttype_id][0];
                discount = dataProductType[producttype_id][1];
                
                amount = (price - (price*discount/100))*month; 
                document.getElementById("amountlabel").innerHTML = formatCurrency(amount);  
            } 
        }            

        if (document.getElementById("typereport").value == 4){
            document.getElementById("producttypelabel").style.display = 'none';
        }else{
            document.getElementById("producttypelabel").style.display = 'block';

            typereport_id = document.getElementById("typereport").value;
            producttype_id = document.getElementById("producttype").value;
            price = dataProduct[typereport_id][1];
            month = dataProductType[producttype_id][0];
            discount = dataProductType[producttype_id][1];
            
            amount = (price - (price*discount/100))*month; 
            document.getElementById("amountlabel").innerHTML = formatCurrency(amount);  
        } 
    </script>

</body>
</html>
