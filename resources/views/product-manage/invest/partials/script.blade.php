<script>
    ClassicEditor
        .create( document.querySelector( '#shortcontent' ), {
            ckfinder: {
                uploadUrl: '/funds_manage/public/bower_components/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
//            toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );

    ClassicEditor
        .create( document.querySelector( '#content' ), {
            ckfinder: {
                uploadUrl: '/funds_manage/public/bower_components/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
//            toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );
</script>
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
        
        $('.btn-save').click(function() {
            $('#frm').submit();
        });

    });
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
            $('#newsdate').datepicker(param);
        });
</script>
<script>

      var smallData = [
        ['x', '2014-01-01', '2014-01-02', '2014-01-03', '2014-01-04', '2014-01-05', '2014-01-6', '2014-01-7', '2014-01-8', '2014-01-9', '2014-01-10'],
        ['sample', 6, 14, 12, 25, 37, 40, 5, 28, 9, 30],
      ];
    
      c3.generate({
        bindto: '#chart1',
        data: {
          type: 'bar',
          x: 'x',
          y: 'y',
          columns: smallData
        },
        axis: {
          x: {
            type: 'timeseries',
            tick: {
              format: "%d/%m"
            }
          },
          y: {
            max: 50,
            min: 5,
          }
        },
        bar: {
          width: {
            ratio: 0.3,
            max: 25
          },
        },
        size: {
            height: 360,
            width: 840
        }       
      });


      var dataPie = [
        ["a", 20],
        ["b", 50],
        ["c", 30],
      ];

      c3.generate({
        bindto: '#chart2',
        data: {
          type : 'pie',
          onmouseover: function (d, i) { console.log("onmouseover", d, i, this); },
          onmouseout: function (d, i) { console.log("onmouseout", d, i, this); },
          onclick: function (d, i) { console.log("onclick", d, i, this); },
          columns: dataPie
        },
        axis: {
          x: {
            label: 'Sepal.Width'
          },
          y: {
            label: 'Petal.Width'
          }
        },
      
      });

</script>