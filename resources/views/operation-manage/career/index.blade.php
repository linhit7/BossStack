@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/pages/products.css') }}">
@endsection
@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

@include('operation-manage.career.partials.search-form')

@include('operation-manage.career.partials.description')
@include('operation-manage.career.partials.requirements')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách tin tuyển dụng
                    <small>(Hiển thị {{ $filter['limit'] }} dòng / trang) </small>
                </h3>
                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('careers-add') }}" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới</a>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-download" aria-hidden="true"></i> Xuất danh sách
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Xuất tất cả</a></li>
                                <li><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> Xuất tùy chọn</a></li>
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
                                <li><a href="#">10 dòng / trang</a></li>
                                <li><a href="#">25 dòng / trang</a></li>
                                <li><a href="#">50 dòng / trang</a></li>
                                <li><a href="#">100 dòng / trang</a></li>
                            </ul>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sort" aria-hidden="true"></i> Sắp xếp
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#">ID</a></li>
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
                                <li><a href="#"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Tăng dần</a></li>
                                <li><a href="#"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Giảm dần</a></li>
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
                            <th width="2%" style="text-align: center;">STT</th>
                            <th style="text-align: center;">TÊN CÔNG VIỆC</th>
                            <th style="text-align: center;">THỜI GIAN <br>LÀM VIỆC</th>
                            <th style="text-align: center;">PHÒNG BAN</th>
                            <th style="text-align: center;">CHỨC VỤ</th>
                            <th style="text-align: center;">LƯƠNG</th>
                            <th style="text-align: center;">ĐỊA ĐIỂM</th>
                            <th style="text-align: center;">KINH NGHIỆM</th>
                            <th style="text-align: center;">BẰNG CẤP</th>
                            <th style="text-align: center;" width="15%">NỘI DUNG CÔNG VIỆC</th>
                            <th style="text-align: center;">NGÀY ĐĂNG</th>
                            <th style="text-align: center;">CHỨC NĂNG</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                        	<td style="text-align: center;">01</td>
                        	<td style="text-align: center;">Thiết kế đồ họa</td>
                        	<td style="text-align: center;">Full time</td>
                        	<td style="text-align: center;">Thiết kế</td>
                        	<td style="text-align: center;">Nhân viên</td>
                        	<td style="text-align: center;">Thỏa thuận</td>
                        	<td style="text-align: center;">TP Hồ Chí Minh</td>
                        	<td style="text-align: center;">Không yêu cầu kinh nghiệm</td>
                            <td style="text-align: center;">Đại học</td>
                            <td style="text-align: justify;">
                                
                                <div>
                                    <span><b>Mô tả công việc</b></span> (<a href="#" data-toggle="modal" data-target="#jobDescription">Xem chi tiết</a>)
                                </div>

                                <div>
                                    <span><b>Yêu cầu công việc</b></span> (<a href="#" data-toggle="modal" data-target="#jobRequirements">Xem chi tiết</a>)
                                </div>
                                
                            </td>
                            <td style="text-align: center;">13/04/2020</td>
                        	<td>
                        		<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Thao tác <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ route('careers-edit', ['id' => 1]) }}"><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i> Chỉnh sửa</a></li>
                                        <li><a href="{{ route('candidate-list') }}"><i class="fa fa-list-alt" style="margin-right: 10px;"></i> Danh sách ứng viên</a></li>
                                        <li><a href="javascript:void(0)" data-id="" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                            <form name="form-delete" method="post" action="">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                        	</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix text-right">
                
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
                title: "{{ trans('home.Bạn có chắc không?') }}",
                text: "{{ trans('home.Nội dung xóa sẽ được đưa vào thùng rác') }}",
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