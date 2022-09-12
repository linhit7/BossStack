<div class="box box-primary">
    <form action="{{ route('customers-index') }}">
        <div class="box-header with-border">
            <h3 class="box-title">QUẢN LÝ KHÁCH HÀNG</h3>
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
                                                   'phone'=>_('Số điện thoại'),
                                                   'email'=>_('Email')); 
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
                                <label>Tình trạng khách hàng:</label>
                                <select class="form-control select2" name="searchCustomerStatusType">                        
                                    <option value=""></option>
                                    @foreach($customerstatustype as $key=>$value)
                                        @if( $key == $searchCustomerStatusType )
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