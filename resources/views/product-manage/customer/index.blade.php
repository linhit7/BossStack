@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/style_admin.css') }}">

<style type="text/css">
    @media only screen and (min-width: 320px) and (max-width: 575px){
        .text-nowrap{
            white-space: nowrap !important;
        }
    }
</style>
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

@include('product-manage.customer.partials.search-form')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">DANH SÁCH</h3>
                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('customers-add') }}" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                        <a class="btn btn-default" href="{{ route('customers-export') }}"><i class="fa fa-download"></i> Xuất excel</a>
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
                            <th style="text-align: center;" class="text-nowrap">TUỔI</th>
                            <th style="text-align: center;" class="text-nowrap">EMAIL</th>
                            <th style="text-align: center;" class="text-nowrap">ĐIỆN THOẠI</th>
                            <th style="text-align: center;" class="text-nowrap">NGÀY <br> ĐĂNG KÝ</th>
                            <th style="text-align: center;" class="text-nowrap">SẢN PHẨM <br> ĐĂNG KÝ</th>
                            <th style="text-align: center;" class="text-nowrap">TÌNH TRẠNG</th>
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
                        @foreach($collections as $customer)
                            <tr class="table-customer">
                                <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $customer->fullname }}</td>
                                <td style="text-align: center;" class="text-nowrap">{{ (Carbon\Carbon::now()->year) - (substr($customer->birthday, 0, 4)) }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $customer->email }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $customer->phone }}</td>
                                <td style="text-align: center;" class="text-nowrap">{{ $customer->created_at == null ? "" : ConvertSQLDate($customer->created_at, 1) }}</td>
                                <td style="text-align: left;" class="text-nowrap">
                                    <b>{{ $customer->userCustomer()->first() == null ? '' : $serviceproduct->find($customer->userCustomer()->first()->service_product_id)->name  }}</b><br/>
                                    @if($customer->userCustomer()->first() != null and $customer->userCustomer()->first()->service_product_id != 4)
                                    Thời hạn từ: <br><font size='2'>{{ $customer->userCustomer()->first() == null ? '' : ConvertSQLDate($customer->userCustomer()->first()->begin_at_product) }} - {{ $customer->userCustomer()->first() == null ? '' : ConvertSQLDate($customer->userCustomer()->first()->finish_at_product) }}</font>
                                    @endif 
                                </td>
                                <td style="text-align: center;" class="text-nowrap">
                                      @if($customer->customerstatustype == 1)
                                            <b class="alert-warning">{{ mb_strtoupper($customerstatustype[$customer->customerstatustype]) }}</b>        
                                        @elseif($customer->customerstatustype == 2)
                                            <b class="alert-success">{{ mb_strtoupper($customerstatustype[$customer->customerstatustype]) }}</b>        
                                        @else 
                                            <b class="alert-danger">{{ mb_strtoupper($customerstatustype[$customer->customerstatustype]) }}</b>        
                                        @endif                                 
                                </td>
                                <td style="text-align: center;" class="text-nowrap">
                                    <a href="{{ route('customers-edit',['id'=> $customer->id]) }}" title='Sửa'><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i></a> 
                                    <a href="javascript:void(0)" data-id="{{ $customer->id }}" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <form name="form-delete-{{ $customer->id }}" method="post" action="{{ route('customers-delete', ['id' => $customer->id ]) }}">
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
@include('product-manage.customer.partials.script')
@endsection

