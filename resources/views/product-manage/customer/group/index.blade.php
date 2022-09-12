@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

@include('product-manage.customer.group.partials.search-form')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách nhóm khách hàng</h3>
                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('customers-groups-add') }}" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-download" aria-hidden="true"></i> Xuất danh sách
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="fas fa-download" aria-hidden="true"></i> Xuất tất cả</a></li>
                                <li><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> Xuất nhóm đã chọn</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="btn-group btn-group-sm">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-window-maximize" aria-hidden="true"></i> Hiển thị
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('customers-groups-index', filter_data($filter, 'limit', 10)) }}">10 dòng / trang</a></li>
                                <li><a href="{{ route('customers-groups-index', filter_data($filter, 'limit', 25)) }}">25 dòng / trang</a></li>
                                <li><a href="{{ route('customers-groups-index', filter_data($filter, 'limit', 50)) }}">50 dòng / trang</a></li>
                                <li><a href="{{ route('customers-groups-index', filter_data($filter, 'limit', 100)) }}">100 dòng / trang</a></li>
                            </ul>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sort" aria-hidden="true"></i> Sắp xếp
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('customers-groups-index', filter_data($filter, 'orderBy', 'id')) }}">Mã nhóm</a></li>
                                <li><a href="{{ route('customers-groups-index', filter_data($filter, 'orderBy', 'fullname')) }}">Tên Nhóm</a></li>
                            </ul>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if($filter['sortedBy'] == 'asc' || empty($filter['sortedBy']))
                                <i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Tăng dần
                                @else
                                <i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Giảm dần
                                @endif
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('customers-groups-index', filter_data($filter, 'sortedBy', 'asc')) }}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Tăng dần</a></li>
                                <li><a href="{{ route('customers-groups-index', filter_data($filter, 'sortedBy', 'desc')) }}"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Giảm dần</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="1%">
                                <label>
                                    <input type="checkbox" class="minimal checkbox-all" value="1">
                                </label>
                            </th>
                            <th class="text-nowrap" width="1%">#</th>
                            <th class="text-nowrap">Tên nhóm</th>
                            <th class="text-nowrap">Mã nhóm</th>
                            <th class="text-nowrap">Số lượng thành viên</th>
                            <th width="10%" class="text-nowrap">
                                <span class="lbl-action">Chức năng</span>
                                <button class="btn btn-danger btn-xs btn-block hide btn-delete-selected">Xóa <span class="lbl-selected-rows-count">0</span> nhóm</button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($collections->count() === 0)
                        <tr>
                            <td colspan="8"><b>Không có dữ liệu!!!</b></td>
                        </tr>
                        @endif
                        @foreach($collections as $customergroup)
                            <tr class="table-customer">
                                <td width="1%">
                                    <label>
                                        <input type="checkbox" class="minimal checkbox-item" data-id="{{ $customergroup->id }}">
                                    </label>
                                </td>
                                <td>{{ $customergroup->id }}</td>
                                <td>{{ $customergroup->name }}</td>
                                <td>{{ $customergroup->code }}</td>
                                <td>{{ $customergroup->customers->count() }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Thao tác <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Chi tiết</a></li>
                                            <li><a href="{{ route('customers-groups-edit',['id'=> $customergroup->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i> Chỉnh sửa</a></li>
                                            <li><a href="javascript:void(0)" data-id="{{ $customergroup->id }}" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                                <form name="form-delete-{{ $customergroup->id }}" method="post" action="{{ route('customers-groups-delete', ['id' => $customergroup->id ]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
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
<script>
    $(function() {
        $('.btn-delete').click(function(){
            var id = $(this).data('id');
            swal({
                title: "Bạn có chắc không?",
                text: "Nội dung xóa sẽ được đưa vào thùng rác",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((value) => {
                console.log(value);
                if(value) {
                    document.forms['form-delete-'+id].submit();
                }
            });
        });
        
        @if(!empty($filter['searchFields']))
        $('#searchFields').val('{{ $filter['searchFields'] }}').trigger('change');
        @endif
    });
</script>
@endsection
