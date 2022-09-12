<script type="text/javascript">
        $(function () {
            param = {   format: "dd/mm/yyyy",
                        autoclose: true,
                        daysOfWeekHighlighted: "0,6",
                        todayHighlight: true,
                        todayBtn: "linked",
                        language: "vi",
                    };
            $('#plandate').datepicker(param);
        });
</script>
<script>
    $(function() {
        $('.btn-delete').click(function(){
            var id = $(this).data('id');
            swal({
                title: "Bạn có chắc không?",
                text: "Số dư hiện có trong ví tài chính sẽ mặc định được chuyển về ví tổng sau khi bạn xác nhận xóa ! ",
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
    
    var currentage = document.getElementById("currentage");
    var plandate = document.getElementById("plandate");
    var planage = document.getElementById("planage");
    var finishdate = document.getElementById("finishdate");

    planage.oninput = function() {
        amount = parseInt(planage.value)-parseInt(currentage.value);
        finishdate.value = DateAdd(plandate.value, "y", amount); 
    }    
        
//    var planamount = document.getElementById("planamount");
//    var planamountlabel = document.getElementById("planamountlabel");
//    planamountlabel.innerHTML = planamount.value;
//    planamount.oninput = function() {
//      planamountlabel.innerHTML = this.value;
//    }     

    //tinh so tien tich luy hien tai
    var accountno = document.getElementById("accountno");
    var currentamount = document.getElementById("currentamount");
    var currentamountunittype = document.getElementById("currentamountunittype");
    var requireamount = document.getElementById("requireamount");
    var requireamountunittype = document.getElementById("requireamountunittype");
    var totalcurrentamount = document.getElementById("totalcurrentamount");
    var totalcurrentamountlabel = document.getElementById("totalcurrentamountlabel");
    var checkamountlabel = document.getElementById("checkamountlabel");

    var total = 0;

    totalcurrentamountlabel.innerHTML = currentamount.value;
    currentamount.oninput = function() {
      amount = 0;  
      if (accountno.value != ""){  
          accountno_amount = accountno.value;
          var ibegin = accountno_amount.indexOf("_");
          amount = accountno_amount.substring(ibegin+1);
      }

      total = parseFloat(removeCharacter(currentamount.value,','))*parseInt(currentamountunittype.value) + parseFloat(amount);
      if (!isNaN(total)){
          totalcurrentamountlabel.innerHTML = formatCurrency(total);
          totalcurrentamount.value = formatCurrency(total);
      }
      //Kiem tra so tien muc tieu tich luy > so tien hien tai khong
      checkcurrentamount = parseFloat(removeCharacter(currentamount.value,','))*parseInt(currentamountunittype.value) + parseFloat(amount);
      checkrequireamount = parseFloat(removeCharacter(requireamount.value,','))*parseInt(requireamountunittype.value);
      if (checkcurrentamount > checkrequireamount){
          checkamountlabel.innerHTML = "Số tiền thiết lập mục tiêu tài chính phải lớn hơn số tiền tích lũy hiện tại !!!";       
      }else{
          checkamountlabel.innerHTML = "";          
      }
      
    }    

    //tinh so tien tich luy hien tai khi co thay doi lien ket vi tien
    accountno.onchange = function() {

      amount = 0;  
      if (accountno.value != ""){  
          accountno_amount = accountno.value;
          var ibegin = accountno_amount.indexOf("_");
          amount = accountno_amount.substring(ibegin+1);
      }
      
      total = parseFloat(removeCharacter(currentamount.value,','))*parseInt(currentamountunittype.value) + parseFloat(amount);
      if (!isNaN(total)){
          totalcurrentamountlabel.innerHTML = formatCurrency(total);
          totalcurrentamount.value = formatCurrency(total);
      }
      //Kiem tra so tien muc tieu tich luy > so tien hien tai khong
      checkcurrentamount = parseFloat(removeCharacter(currentamount.value,','))*parseInt(currentamountunittype.value) + parseFloat(amount);
      checkrequireamount = parseFloat(removeCharacter(requireamount.value,','))*parseInt(requireamountunittype.value);
      if (checkcurrentamount > checkrequireamount){
          checkamountlabel.innerHTML = "Số tiền thiết lập mục tiêu tài chính phải lớn hơn số tiền tích lũy hiện tại !!!";       
      }else{
          checkamountlabel.innerHTML = "";          
      }

    }

    requireamount.oninput = function() {
      //Kiem tra so tien muc tieu tich luy > so tien hien tai khong
      checkcurrentamount = parseFloat(removeCharacter(currentamount.value,','))*parseInt(currentamountunittype.value) + parseFloat(amount);
      checkrequireamount = parseFloat(removeCharacter(requireamount.value,','))*parseInt(requireamountunittype.value);
      if (checkcurrentamount > checkrequireamount){
          checkamountlabel.innerHTML = "Số tiền thiết lập mục tiêu tài chính phải lớn hơn số tiền tích lũy hiện tại !!!";       
      }else{
          checkamountlabel.innerHTML = "";          
      }
    }  
    
    //Lay so lieu luc total = 0, luc moi them moi va chuyen toi process
    if (total == 0){
      amount = 0;  
      if (accountno.value != ""){  
          accountno_amount = accountno.value;
          var ibegin = accountno_amount.indexOf("_");
          amount = accountno_amount.substring(ibegin+1);
      }
      total = parseFloat(removeCharacter(currentamount.value,','))*parseInt(currentamountunittype.value) + parseFloat(amount);
      if (!isNaN(total)){
          totalcurrentamountlabel.innerHTML = formatCurrency(total);
          totalcurrentamount.value = formatCurrency(total);
      }
    }


    var smallData = [
        ['data1', 300, 350, 300, 0, 0, 0],
        ['data2', 130, 100, 140, 200, 150, 50],
        ['data3', 130, 100, 140, 200, 150, 50]
      ];

      var width = $('#chart1').width();
    
      c3.generate({
        bindto: '#chart1',
        data: {
          types: {
            data1: 'bar',
            data2: 'bar',
            data3: 'area'
          },
          names: {
            data1: 'Data Name 1',
            data2: 'Data Name 2',
            data3: 'Data Name 3'
          },
          columns: smallData
        },
        bar: {
          width: {
            ratio: 0.3,
            max: 25
          },
        },
        size: {
            height: 600,
            width: width
        },
        padding: {
          right: 100
        }       
      });
</script>
