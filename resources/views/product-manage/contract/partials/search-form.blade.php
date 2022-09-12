<div class="box box-primary">
    <form action="{{ route('contracts-index') }}" id="frm" name="frm">
        <input type='hidden' name='typereport' value=''>
        <div class="box-header with-border">
            <h3 class="box-title">QUẢN LÝ HỢP ĐỒNG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Tìm kiếm nhanh:</label>
                                @php
                                   $fieldnames = array('fullname'=>_('Họ tên khách hàng'), 
                                                   'customercode'=>_('Mã khách hàng'),
                                                   'contractno'=>_('Mã hợp đồng')); 
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
                            <div class="col-md-3">
                                <label>Từ khóa:</label>
                                <input type="text" class="form-control" name="searchValue" value="{{ $searchValue }}">
                            </div>
                            <div class="col-md-2">
                                <label>Tình trạng hợp đồng:</label>
                                <select class="form-control select2" name="searchContractStatusType">                        
                                    <option value="">Tất cả</option>
                                    @foreach($contractstatustype as $key=>$value)
                                        @if( $key == $searchContractStatusType )
                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>                            
                            <div class="col-md-3">
                                <label>&nbsp;</label><br>
                                <button class="btn btn-primary btn-search" style="width: 45%;">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>