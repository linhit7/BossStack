@extends('layouts.master')

@section('head')
<style type="text/css">
    .content-wrapper{
        background-color: #3963d3 !important;
    }

    .content-header h1 b font{
        color: #fff;
    }

    .manage-transaction.list .box{
        border-top-color: #fff;
        background-color: #3963d3;
        box-shadow: none;
    }

    .search-control .content{
        min-height: auto;
    }

    .search-control .form-horizontal label{
        text-align: left;
    }

    .search-control .form-horizontal .form-group .control-label{
        color: #fff;
    }

    .search-control .form-horizontal .form-group:nth-child(2) .control-label,
    .search-control .form-horizontal #name,
    .search-control .form-horizontal .select2-selection--single,
    .search-control .form-horizontal .btn-add{
        border: none;
        border-radius: 5px;
        color: #fff;
        background-color: #4b80e0;
    }

    .search-control .form-horizontal .form-group:nth-child(2) .control-label{
        height: 34px;
        line-height: 34px;
        padding: 0 12px;
    }

    .search-control .form-horizontal .select2-selection__rendered,
    .search-control .form-horizontal .btn-add{
        color: #fff;
    }

    .search-control .form-horizontal .select2-selection__arrow b{
        border-color: #fff transparent transparent transparent;
    }

    .serviceList .serviceList-wrap .item{
        width: 100%;
        min-height: 200px;
        background-color: #ebecf0;
        border-radius: 10px;
        padding: 20px;
    }

    .serviceList .serviceList-wrap .item-group{
        margin-bottom: 40px;
    }

    .serviceList .serviceList-wrap .item-group:last-child{
        margin-bottom: 0;
    }

    .serviceList .serviceList-wrap .item-group a{
        display: block;
    }

    .serviceList .serviceList-wrap .item-group .wrap{
        padding: 10px;
        background-color: #fff;
    }

    .serviceList .serviceList-wrap .item-group .wrap p{
        color: #2d3192;
    }

    .serviceList .serviceList-wrap .item-group .wrap p span{
        font-size: 14px;
    }

    .serviceList .serviceList-wrap .item-group .wrap p span:first-child{
        margin-right: 20px;
    }

    .serviceList .serviceList-wrap .item-group .wrap p.checklist span:last-child{
        color: #fff;
        padding: 4px 8px;
        border-radius: 5px;
        background-color: #61bd4e;
    }
</style>
@endsection

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

@if(isset($infor))
    @include('layouts.partials.messages.infor')
@endif


<div class="manage-transaction list">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-group search-control">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div class="form-horizontal">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="col-md-4 control-label">Chọn</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control select2" name="type" onChange="">
                                                        <option value="">Chọn loại hình</option>
                                                        <option value="">Chứng khoán</option>
                                                        <option value="">Bất động sản</option>z
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="col-sm-4 control-label">Tên Nhật Ký</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="name">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <button type="submit" class="btn btn-primary btn-add"><b>Tạo</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-group serviceList">
                    <div class="content">
                        <div class="serviceList-wrap">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="item">
                                        <div class="item-group">
                                            <a href="{{ route('managetransactions-viewTransaction') }}">
                                                <h4 class="title">Cổ phiếu Abc</h4>
                                                <div class="wrap">
                                                    <div class="chart-wrap">
                                                        <div id="chart3"></div>
                                                    </div>
                                                    <p class="time">
                                                        <span><b>Thời gian:</b></span>
                                                        <span>17/12/2021</span>
                                                    </p>
                                                    <p class="checklist">
                                                        <span><b>Checklist:</b></span>
                                                        <span><i class="fa fa-check-square" aria-hidden="true"></i> 6/6</span>
                                                    </p>
                                                    <p class="result">
                                                        <span><b>Kết quả:</b></span>
                                                        <span>Lãi</span>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="item-group">
                                            <a href="{{ route('managetransactions-viewTransaction') }}">
                                                <h4 class="title">Cổ phiếu Abc</h4>
                                                <div class="wrap">
                                                    <div class="chart-wrap">
                                                        <div id="chart3"></div>
                                                    </div>
                                                    <p class="time">
                                                        <span><b>Thời gian:</b></span>
                                                        <span>17/12/2021</span>
                                                    </p>
                                                    <p class="checklist">
                                                        <span><b>Checklist:</b></span>
                                                        <span><i class="fa fa-check-square" aria-hidden="true"></i> 6/6</span>
                                                    </p>
                                                    <p class="result">
                                                        <span><b>Kết quả:</b></span>
                                                        <span>Lãi</span>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="item">
                                        <div class="item-group">
                                            <a href="{{ route('managetransactions-viewTransaction') }}">
                                                <h4 class="title">Cổ phiếu Abc</h4>
                                                <div class="wrap">
                                                    <div class="chart-wrap">
                                                        <div id="chart3"></div>
                                                    </div>
                                                    <p class="time">
                                                        <span><b>Thời gian:</b></span>
                                                        <span>17/12/2021</span>
                                                    </p>
                                                    <p class="checklist">
                                                        <span><b>Checklist:</b></span>
                                                        <span><i class="fa fa-check-square" aria-hidden="true"></i> 6/6</span>
                                                    </p>
                                                    <p class="result">
                                                        <span><b>Kết quả:</b></span>
                                                        <span>Lãi</span>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="item">
                                        <div class="item-group">
                                            <a href="{{ route('managetransactions-viewTransaction') }}">
                                                <h4 class="title">Cổ phiếu Abc</h4>
                                                <div class="wrap">
                                                    <div class="chart-wrap">
                                                        <div id="chart3"></div>
                                                    </div>
                                                    <p class="time">
                                                        <span><b>Thời gian:</b></span>
                                                        <span>17/12/2021</span>
                                                    </p>
                                                    <p class="checklist">
                                                        <span><b>Checklist:</b></span>
                                                        <span><i class="fa fa-check-square" aria-hidden="true"></i> 6/6</span>
                                                    </p>
                                                    <p class="result">
                                                        <span><b>Kết quả:</b></span>
                                                        <span>Lãi</span>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="item">
                                        <div class="item-group">
                                            <a href="{{ route('managetransactions-viewTransaction') }}">
                                                <h4 class="title">Cổ phiếu Abc</h4>
                                                <div class="wrap">
                                                    <div class="chart-wrap">
                                                        <div id="chart3"></div>
                                                    </div>
                                                    <p class="time">
                                                        <span><b>Thời gian:</b></span>
                                                        <span>17/12/2021</span>
                                                    </p>
                                                    <p class="checklist">
                                                        <span><b>Checklist:</b></span>
                                                        <span><i class="fa fa-check-square" aria-hidden="true"></i> 6/6</span>
                                                    </p>
                                                    <p class="result">
                                                        <span><b>Kết quả:</b></span>
                                                        <span>Lãi</span>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="item-group">
                                            <a href="{{ route('managetransactions-viewTransaction') }}">
                                                <h4 class="title">Cổ phiếu Abc</h4>
                                                <div class="wrap">
                                                    <div class="chart-wrap">
                                                        <div id="chart3"></div>
                                                    </div>
                                                    <p class="time">
                                                        <span><b>Thời gian:</b></span>
                                                        <span>17/12/2021</span>
                                                    </p>
                                                    <p class="checklist">
                                                        <span><b>Checklist:</b></span>
                                                        <span><i class="fa fa-check-square" aria-hidden="true"></i> 6/6</span>
                                                    </p>
                                                    <p class="result">
                                                        <span><b>Kết quả:</b></span>
                                                        <span>Lãi</span>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('scripts')
@include('product-manage.managetransaction.partials.script')
@endsection

