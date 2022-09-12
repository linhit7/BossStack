@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection
@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">DANH SÁCH ĐĂNG KÝ KHÓA HỌC</h3>
                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-default" href="#"><i class="fa fa-download"></i> Xuất excel</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;" class="text-nowrap" width="1%">STT</th>
                            <th style="text-align: center;" class="text-nowrap" width="20%">TÊN KHÁCH HÀNG</th>
                            <th style="text-align: center;" class="text-nowrap">EMAIL</th>
                            <th style="text-align: center;" class="text-nowrap">ĐIỆN THOẠI</th>
                            <th style="text-align: center;" class="text-nowrap">NGÀY ĐĂNG KÝ</th>
                            <th style="text-align: center;" class="text-nowrap">KHÓA HỌC</th>
                            <th style="text-align: center;" class="text-nowrap">TIÊU ĐỀ</th>
                            <th style="text-align: center;" class="text-nowrap">NỘI DUNG</th>
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
                                <td style="text-align: left;" class="text-nowrap">{{ $customer->email }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $customer->phone }}</td>
                                <td style="text-align: center;" class="text-nowrap">{{ $customer->registerdate == null ? "" : ConvertSQLDate($customer->registerdate) }}</td>
                                <td style="text-align: left;" class="text-nowrap">
                                  {{ $coursetype[$customer->course] }}        
                                </td>
                                <td style="text-align: left;" class="text-nowrap">{{ $customer->title }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $customer->content }}</td>
                                <td style="text-align: center;" class="text-nowrap">
                                    <a href="javascript:void(0)" data-id="{{ $customer->id }}" class="btn-delete" title='Xóa'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <form name="form-delete-{{ $customer->id }}" method="post" action="{{ route('report-delete', ['id' => $customer->id ]) }}">
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

<a href="{{ route('dashboard') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>   


@endsection

@section('scripts')
@include('product-manage.report.partials.script')
@endsection

