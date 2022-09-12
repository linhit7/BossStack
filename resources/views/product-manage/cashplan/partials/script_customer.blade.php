<script>
      var unitcurrency = 1000;
      
      //Bieu do dang thanh
//      var smallData = [
//            ['Tiền tích lũy hàng năm', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
//            ['Số dư tích lũy', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20 ],
//            ['Chỉ tiêu', 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20],
//      ];

//      var categoriesData = ['25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44'];

      var smallData = [];
      var categoriesData = [];
            
      var i = 1; j = 0;
      var fromtime = {{ $model->currentage }};
      var totime = {{ $model->planage }};

      smallData[0] = ['Tiền tích lũy hàng năm'];
      smallData[1] = ['Số dư tích lũy'];
      smallData[2] = ['Mục tiêu'];

      var savingamountplan = Math.round({{ $savingamountplan }}/unitcurrency); 
      var totalsavingamountplan = Math.round({{ $model->totalcurrentamount }}/unitcurrency); 
      var requireamountplan = Math.round({{ $requireamount }}/unitcurrency); 

      @for($item=$model->currentage+1; $item <= $model->planage; $item++  )
        categoriesData[j] = '{{ "$item" }}';

        totalsavingamountplan += savingamountplan;
        totalsavingamountplan = (totalsavingamountplan>requireamount ? requireamountplan : totalsavingamountplan);
         
        smallData[0][i] = savingamountplan;
        smallData[1][i] = totalsavingamountplan;
        smallData[2][i] = requireamountplan;
  
        i++; j++;
      @endfor

      c3.generate({
        bindto: '#chart',
        data: {
          columns: smallData,

          types: {
            'Tiền tích lũy hàng năm': 'bar',
            'Số dư tích lũy': 'bar',
            'Chỉ tiêu': 'area'
          },
          colors: {
            'Tiền tích lũy hàng năm': '#00ff00',
            'Số dư tích lũy': '#1f77b4',
            'Chỉ tiêu': '#ff0000'
          },          
        },
        point: {
            show: false
        },        
        axis: {
            x: {
                type: 'category',
                categories: categoriesData,
            },
            y : {
                tick: {
                    format: d3.format(",")
//                    format: function (d) { return d + "M"; }
                }
            }
        },
        bar: {
          width: {
            ratio: 0.4,
            max: 25
          },
        },         
    });

</script>