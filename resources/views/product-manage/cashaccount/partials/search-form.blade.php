<div class="box box-primary">
    <form action="{{ route('cashaccounts-index') }}">
        <!-- <div class="box-header with-border d-none">
            <h3 class="box-title">QUẢN LÝ VÍ TIỀN</h3>
        </div> -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-xs-12" style="margin-bottom: 10px;">
                                <label>Tìm kiếm nhanh:</label>
                                @php
                                   $fieldnames = array('fullname'=>_('Tên khách hàng'), 
                                                   'accountno'=>_('Tên ví tiền')); 
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
                            <div class="col-md-3 col-xs-12" style="margin-bottom: 10px;">
                                <label>Từ khóa:</label>
                                <input type="text" class="form-control" name="searchValue" value="{{ $searchValue }}">
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <label>&nbsp;</label><br>
                                <button class="btn btn-primary btn-search btn-bg-blue" style="width: 45%;">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>