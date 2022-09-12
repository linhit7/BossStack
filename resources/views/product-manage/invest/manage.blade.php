@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/style_admin.css') }}">
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

@include('product-manage.invest.partials.search-form')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách tin tức</h3>
                <div class="box-tools">
                    <a href="{{ route('invests-add') }}" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                </div>
            </div>

            <div class="box-body no-padding" style="overflow: auto;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align: center;">STT</th>
                            <th width="20%" style="text-align: center;">Tiêu đề</th>
                            <th width="18%" style="text-align: center;">Loại</th>
                            <th width="15%" style="text-align: center;">Ngày đăng</th>
                            <th width="10%" style="text-align: center;">Tác giả</th>
                            <th width="10%" style="text-align: center;">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($collections->count() === 0)
                            <tr>
                                <td colspan="8"><b>Không có dữ liệu</b></td>
                            </tr>
                        @endif
                        @php
                            $i = 1
                        @endphp
                        @foreach($collections as $model)
                            <tr>
                                <td style="text-align: center;" class="text-nowrap">{{ $i++ }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $model->newstitle }}</td>
                                <td style="text-align: left;" class="text-nowrap">{{ $newstypes[$model->newstype] }}</td>
                                <td style="text-align: center;" class="text-nowrap">{{ $model->newsdate == null ? "" : ConvertSQLDate($model->newsdate) }}</td>                                
                                <td style="text-align: left;" class="text-nowrap">{{ $model->author }}</td>
                                <td style="text-align: center;" class="text-nowrap">
                                    <a href="{{ route('invests-edit', ['id'=> $model->id]) }}"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i></a>
                                    <a href="javascript:void(0)" data-id="{{ $model->id }}" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <form style="margin: 0;" name="form-delete-{{ $model->id }}" method="post" action="{{ route('invests-delete', ['id' => $model->id]) }}">
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
                {{ $collections->render('product-manage.invest.partials.pagination') }}                
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@include('product-manage.invest.partials.script')
@endsection
