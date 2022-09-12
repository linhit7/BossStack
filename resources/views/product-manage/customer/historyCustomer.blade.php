@extends('layouts.master')

@section('head')
<style type="text/css">
    
    @media only screen and (max-width: 768px){
        .box .box-body table tbody tr td{
            vertical-align: middle;
        }

        .pagination > li > a, 
        .pagination > li > span{
            padding: 5px 7px;
        }
    }

</style>
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;" class="text-nowrap" width="5%">STT</th>
                            <th style="text-align: center;" class="text-nowrap" width="25%">Tên truy cập</th>
                            <th style="text-align: center;" class="text-nowrap" width="40%">Nội dung</th>
                            <th style="text-align: center;" class="text-nowrap">Thời gian</th>
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
                        @foreach($collections as $item)
                            <tr>
                                <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $item->description }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $item->logresult }}</td>
                                <td style="text-align: center;" class="text-nowrap">{{ $item->created_at == null ? "" : ConvertSQLDate($item->created_at, 1) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix text-right">
                {{ $collections->render('product-manage.customer.partials.pagination') }}
            </div>
        </div>
            <a href="{{ route('dashboard') }}" style="width: 16%;"><i class="fa fa-arrow-left"></i> Quay lại</a>        
        <!-- /.box -->
    </div>
</div>
@endsection


