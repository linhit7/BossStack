<div class="box box-search">
    <form action="{{ route('invests-manage') }}">
        <div class="box-header with-border">
            <h3 class="box-title">Tìm kiếm</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <label>Loại tin tức :</label>
                        <select id="searchprefix" class="form-control" name="searchField">
                            <option value=""></option>
                            @foreach($newstypes as $key=>$value)
                                @if( $key == $searchField )
                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                @else
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endif
                            @endforeach                      
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <label>Nội dung tìm kiếm:</label>
                        <input type="text" class="form-control" name="searchValue" value="{{ $searchValue }}">
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <label></label>
                        <button class="btn btn-primary btn-search" style="width: 45%;">Tìm kiếm</button>
                    </div>
                </div>                
            </div>
            <!-- /.row -->
        </div>

    </form>
</div>