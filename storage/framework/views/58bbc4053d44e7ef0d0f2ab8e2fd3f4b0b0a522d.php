<script>
    $(function() {
        $('.btn-save').click(function() {
            $('#users-form').submit();
        });

        $('#chk-continue').on('ifChecked', function() {
            $('#users-form').attr('action', '<?php echo e(route('users-store'), false); ?>?continue=true');
        });

        $('#chk-continue').on('ifUnchecked', function() {
            $('#users-form').attr('action', '<?php echo e(route('users-store'), false); ?>');
        });

        $('.btn-delete').click(function(){
            var id = $(this).data('id');
            if(confirm('Bạn có muốn xóa không?')){
                document.forms['form-delete-'+ id].submit();
            }
        });
    });
</script>