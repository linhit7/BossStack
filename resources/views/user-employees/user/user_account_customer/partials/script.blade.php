<script>
    $(function() {
        $('.btn-save').click(function() {
            $('#users-form').submit();
        });

        $('#chk-continue').on('ifChecked', function() {
            $('#users-form').attr('action', '{{ route('usercustomers-store') }}?continue=true');
        });

        $('#chk-continue').on('ifUnchecked', function() {
            $('#users-form').attr('action', '{{ route('usercustomers-store') }}');
        });

        $('.btn-delete').click(function(){
            var id = $(this).data('id');
            if(confirm('Bạn có muốn xóa không?')){
                document.forms['form-delete-'+ id].submit();
            }
        });
    });
    
    function processChanged(obj)
    {
        var customer_id = document.getElementById("customer_id");
        var name = document.getElementById("name");
        var email = document.getElementById("email");
        
        customer = obj.value;
        var point = customer.indexOf('-');
        var myLen = customer.length;
        tempValue = customer.substr(point+1,myLen);
        point = tempValue.indexOf('-');
        myLen = tempValue.length;
        sname = tempValue.substr(0,point);
        semail = tempValue.substr(point+1,myLen);        
        
        name.value = sname;
        email.value = semail;
    }        
</script>
<script type="text/javascript">
        $(function () {
            param = {   format: "dd/mm/yyyy",
                        autoclose: true,
                        daysOfWeekHighlighted: "0,6",
                        todayHighlight: true,
                        todayBtn: "linked",
                        language: "vi",
                    };
            $('#begin_at').datepicker(param);
            $('#finish_at').datepicker(param);
            $('#begin_at_product').datepicker(param);
            $('#finish_at_product').datepicker(param);
        });
</script>