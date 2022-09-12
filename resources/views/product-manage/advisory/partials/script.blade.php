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
                if(value) {
                    document.forms['form-delete-'+id].submit();
                }
            });
        });

        $('.btn-save').click(function() {
            $('#frm').submit();
        });

    });

    @if(!empty($filter['searchFields']))
    $('#searchFields').val('{{ $filter['searchFields'] }}').trigger('change');
    @endif

    $(document).ready(() => {
        // get hash on uri, to active tab if any
        var current_hash = window.location.hash;
        if(current_hash) {
            $(`.nav-pills a[href="${current_hash}"]`).click();
        }
        // get hash on 'a tag' when clicked
        $(".hash-tab").click((e) => {
            var hash = $(e.target).attr("href");
            window.location.hash = hash;
        });

        // get router from answers button when clicked
        $(".advisory-answers").click((e) => {
            var route = $(e.target).data("route");
            // add router to form action
            $("#formAnswer").attr("action", route);
        });
    });
</script>