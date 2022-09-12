<div class="box box-primary">
    <form action="{{ route('cashassets-index') }}">
        <div class="box-header with-border">
            <h3 class="box-title">QUẢN LÝ TÀI SẢN CÁ NHÂN</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-2">
                    <label>Tháng <small class="text-danger text"> (*)</small>:</label>
                    <select id="month" class="form-control" name="month">
                        @for ($i = 1; $i <= 12; $i++)
                            @if($month == $i)
                                <option value="{{ $i }}" selected>{{ $i }}</option>        
                            @else
                                <option value="{{ $i }}">{{ $i }}</option>                            
                            @endif                                
                        @endfor                        
                    </select>
                </div>
                <div class="col-xs-2">
                    <label>Năm <small class="text-danger text"> (*)</small>:</label>
                    <select id="year" class="form-control" name="year">
                        @for ($i = $year-3; $i <= $year+3; $i++)
                            @if($year == $i)
                                <option value="{{ $i }}" selected>{{ $i }}</option>        
                            @else
                                <option value="{{ $i }}">{{ $i }}</option>                            
                            @endif                                
                        @endfor                        
                    </select>
                </div>
                <div class="col-xs-3">
                    <label>&nbsp;</label><br>
                    <button class="btn btn-primary btn-search" style="width: 45%;">Tìm kiếm</button>
                </div>                
            </div>
            <!-- /.row -->
        </div>

    </form>
</div>