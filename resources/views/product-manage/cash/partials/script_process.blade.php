<script type="text/javascript">
$(function () {
    param = {   
                format: "mm/yyyy",
                minViewMode: 1,
                viewMode: 'months',
                autoclose: true,
                todayHighlight: true,
                todayBtn: "linked",
                language: "vi",
            };
    $('#fromdate').datepicker(param);
    $('#todate').datepicker(param);
});
</script>

<script type="text/javascript">

//var datacolumn = [[1, 'Tháng'], [2, 'Thu nhập'], [3, 'Chi phí'], [4, 'Các khoản nợ']];

//var datacolumn = [];
//var i = 5; j = 0;        
//@foreach($listcashplan as $cashplan)
//    datacolumn[j++] = [i++, 'planamount_{{ $cashplan->id }}'];
//@endforeach
//
//@for($i=0; $i<count($yearArray); $i++)      
//$('#tablecash_{{$i}}').Tabledit({
//    url: '{{ route('cash-processPlan') }}',
//    eventType: 'dblclick',
//    deleteButton: false,
//    editButton: true,
//    saveButton: false,    
//    autoFocus: false,
//    buttons: {
//        edit: {
//            class: 'btn btn-sm btn-primary',
//            html: '<span class="glyphicon glyphicon-pencil"></span>',
//            action: 'edit'
//        }
//    },
//    columns: {
//        identifier: [1, 'monthyear'],
//        editable: datacolumn
//    }
//});
//@endfor
</script>

