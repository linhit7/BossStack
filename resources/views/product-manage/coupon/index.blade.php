@extends('layouts.master')

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif
@if(session()->has('errors'))
    @include('layouts.partials.messages.errors')
@endif

@include('product-manage.coupon.partials.search-form')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ ('Danh sách mã giảm giá') }}</h3>
                <div class="box-tools">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('coupons-add') }}" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> {{ ('Tạo mới') }}</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;" class="text-nowrap" width="2.5%">{{ ('STT') }}</th>
                            <th style="text-align: center;" class="text-nowrap" width="10%">{{ ('Loại') }}</th>
                            <th style="text-align: center;" class="text-nowrap" width="10%">{{ ('Mã giảm giá') }}</th>
                            <th style="text-align: center;" class="text-nowrap" width="10%">{{ ('% giảm giá') }}</th>
                            <th style="text-align: center;" class="text-nowrap" width="17%">{{ ('Số lượng') }}</th>
                            <th style="text-align: center;" class="text-nowrap" width="15%">{{ ('Ghi chú') }}</th>
                            <th style="text-align: center;" class="text-nowrap" width="13%">{{ ('Trạng thái') }}</th>
                            <th style="text-align: center;" class="text-nowrap" width="10%">{{ ('Gửi mail') }}</th>
                            <th style="text-align: center;" class="text-nowrap">{{ ('Chức năng') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($collections->count() === 0)
                        <tr>
                            <td colspan="9"><b>{{ ('Không có dữ liệu') }}!!!</b></td>
                        </tr>
                        @endif
                        @foreach($collections as $coupon)
                            <tr class="table-customer">
                                <td style="text-align: center;" class="text-nowrap">{{ $coupon->id }}</td>
                                <td class="text-nowrap">{{ $coupontypes[$coupon->typecoupon] }}</td>
                                <td class="text-nowrap">{{ $coupon->key }}</td>
                                <td style="text-align: center;" class="text-nowrap">{{ $coupon->percent }}</td>
                                <td style="text-align: left;" class="text-nowrap">- Tổng: {{ $coupon->quantity }} <br> - Đã sử dụng: {{ ($coupon->quantity-$coupon->quantitied) }} <br> - Chưa sử dụng: {{ ($coupon->quantitied) }}</td>
                                <td class="text-nowrap">{{ $coupon->description }}</td>
                                <td style="text-align: center;" class="text-nowrap">
                                    @if($coupon->status == 1)
                                        <b class="btn-success">{{ $couponstatus[$coupon->status] }}</b>
                                    @elseif($coupon->status == 2)
                                        <b class="btn-danger">{{ $couponstatus[$coupon->status] }}</b>
                                    @else
                                        <b class="btn-info">{{ $couponstatus[$coupon->status] }}</b>
                                    @endif
                                </td>
                                <td style="text-align: center;" class="text-nowrap">
                                    @if($coupon->quantitied > 0)
                                        <a href="{{ route('coupons-mail',['id'=> $coupon->id]) }}" title='Gửi mail mã coupon'><i class="fa fa-envelope" style="margin-right: 10px;"></i></a>
                                    @endif                                        
                                </td>
                                <td style="text-align: center;" class="text-nowrap">
                                    <div class="btn-group">
                                        <a href="{{ route('coupons-edit',['id'=> $coupon->id]) }}" title='Sửa'><i class="fas fa-pencil-alt" style="margin-right: 10px;"></i></a>
                                        <a href="javascript:void(0)" data-id="{{ $coupon->id }}" title='Xóa' class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <form name="form-delete-{{ $coupon->id }}" method="post" action="{{ route('coupons-delete', ['id' => $coupon->id ]) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                            </form>
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
