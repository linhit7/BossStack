<script>
    $(function() {
        $('.btn-delete').click(function(){
            var id = $(this).data('id');
            swal({
                title: "Bạn có chắc không?",
                text: "Nội dung xóa sẽ được đưa vào thùng rác",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((value) => {
                console.log(value);
                if(value) {
                    document.forms['form-delete-'+id].submit();
                }
            });
        });

        <?php if(!empty($filter['searchFields'])): ?>
        $('#searchFields').val('<?php echo e($filter['searchFields'], false); ?>').trigger('change');
        <?php endif; ?>

        $('#chk-continue').on('ifChecked', function() {
            $('#warehouse-form').attr('action', '<?php echo e(route('warehouses-store'), false); ?>?continue=true');
        });

        $('#chk-continue').on('ifUnchecked', function() {
            $('#warehouse-form').attr('action', '<?php echo e(route('warehouses-store'), false); ?>');
        });

        $('.btn-save').click(function() {
            $('#warehouse-form').submit();
        });
    });
</script>