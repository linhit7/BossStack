@extends('layouts.master')

@section('content')

@if(session()->has('success'))
    @include('layouts.partials.messages.success')
@endif

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin trang truy cập</h3>
            </div>
            <form role="form" action="{{ route('invests-update', ['id' => $model->id]) }}?continue=true" method="post" id="frm"  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Ngày đăng <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-2 col-xs-8 item">
                                <input type='text' class="form-control" name="newsdate" id='newsdate' value="{{ ConvertSQLDate($model->newsdate) }}"/>
                                @if($errors->has('newsdate'))<span class="text-danger">{{ $errors->first('newsdate') }}</span>@endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Loại <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-4 col-xs-8 item">
                                <select id="newstype" class="form-control" name="newstype">
                                    <option value=""></option>
                                    @foreach($newstypes as $key=>$value)
                                        @if( $key == $model->newstype )
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endif
                                    @endforeach                      
                                </select>
                                @if($errors->has('newstype'))<span class="text-danger">{{ $errors->first('newstype') }}</span>@endif                        
                            </div>
                        </div>
                    </div>                      

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Tiêu đề <small class="text-danger text"> (*)</small>:</label>
                            </div>
                            <div class="col-md-10 col-xs-8 item">
                                <input type="text" class="form-control" name="newstitle" value="{{ $model->newstitle }}">
                                @if($errors->has('newstitle'))<span class="text-danger">{{ $errors->first('newstitle') }}</span>@endif                        
                            </div>
                        </div>
                    </div>                      

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-12 item">
                                <label>Ảnh giới thiệu :</label>
                            </div>
                            <div class="col-md-7 col-xs-12 item">
                                <input type="hidden" name="newsimage" value="{{ $model->newsimage }}">
                                <div class="box-body">
                                    <div class="avatar-demo">
                                        <img src="{{ asset(empty($model->newsimage) ? NO_IMAGE_URL : $model->newsimage) }}" class="img-circle" width="100%" height="100%" type="file" name="be_image" value="{{ $model->newsimage }}">
                                    </div>
                                    <input type="file" name="fImages" style="width: 100%">
                                    <p class="text-danger" style="margin-top: 10px;">Lưu ý: Tải hình ảnh có kích thước 500 x 500 (px) và dung lượng hình dưới 2MB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-12 item">
                                <label>Tải tệp đính kèm:</label>
                            </div>
                            <div class="col-md-7 col-xs-12 item">
                                <input type="hidden" name="" value="">
                                <ol class="list-file" style="padding: inherit;">
                                    <li class="item-file">
                                        <span class="name-file" style="padding-right: 10px; font-weight: bold;">Abc.docx</span>
                                        <a href="#" class="control"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="item-file">
                                        <span class="name-file" style="padding-right: 10px; font-weight: bold;">Abc.docx</span>
                                        <a href="#" class="control"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </li>
                                </ol>
                                <input type="file" name="importFile" multiple style="width: 100%">
                                <p class="text-danger" style="margin-top: 10px;">Lưu ý: Tải file .pdf hoặc .docx</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Mô tả <small class="text-danger text"> (*)</small>: </label>
                            </div>
                            <div class="col-md-10 col-xs-8 item">
                                <textarea name="shortcontent" id="shortcontent">{{ $model->shortcontent }}</textarea>
                                @if($errors->has('shortcontent'))<span class="text-danger">{{ $errors->first('shortcontent') }}</span>@endif                        
                            </div>
                        </div>
                    </div>                      

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Nội dung <small class="text-danger text"> (*)</small>: </label>
                            </div>
                            <div class="col-md-10 col-xs-8 item">
                                <textarea name="content" id="content">{{ $model->content }}</textarea>
                                @if($errors->has('content'))<span class="text-danger">{{ $errors->first('content') }}</span>@endif                        
                            </div>
                        </div>
                    </div>                      

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-xs-4 item">
                                <label>Tác giả <small class="text-danger text"> (*)</small>: </label>
                            </div>
                            <div class="col-md-6 col-xs-8 item">
                                <input type="text" class="form-control" name="author" value="{{ $model->author }}">
                                @if($errors->has('author'))<span class="text-danger">{{ $errors->first('author') }}</span>@endif                            
                            </div>
                        </div>
                    </div>                      
                    <br>
                    <button class="btn btn-success btn-bg-blue" style="width: 15%;" onclick="processReports('frm', 'update')">Lưu</button>
                    <br><br>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@include('product-manage.invest.partials.script')
@endsection