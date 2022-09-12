<div class="box box-primary">
    <form action="{{ route('cashplans-index') }}">
        <div class="box-header with-border">
            <h3 class="box-title">TÌM KIẾM</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label>Từ khóa:</label>
                                <input type="text" class="form-control" name="searchValue" value="{{ $searchValue }}">
                            </div>
                            <div class="col-md-4">
                                <label>Tìm kiếm nhanh:</label>
                                @php
                                   $fieldnames = array('fullname'=>_('Họ tên khách hàng'), 
                                                   'customercode'=>_('Mã khách hàng'),
                                                   'planname'=>_('Kế hoạch')); 
                                @endphp 
                                <select class="form-control select2" name="searchField">                        
                                    <option value=""></option>
                                    @foreach($fieldnames as $key=>$value)
                                        @if( $key == $searchField )
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer text-right">
            <button class="btn btn-primary btn-search">Tìm kiếm</button>
        </div>
    </form>
</div>