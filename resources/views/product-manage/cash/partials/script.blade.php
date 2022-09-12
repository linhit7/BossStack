<script type="text/javascript">
        $(function () {
            param = {   format: "dd/mm/yyyy",
                        autoclose: true,
                        daysOfWeekHighlighted: "0,6",
                        todayHighlight: true,
                        todayBtn: "linked",
                        language: "vi",
                    };
            $('#currentDateFull').datepicker(param);
            $('#fromDate').datepicker(param);
            $('#toDate').datepicker(param);                        
        });
</script>
<script>
      var unitcurrency = 1;
      var smallData = [
        ['x', '2014-01-01', '2014-01-02', '2014-01-03', '2014-01-04', '2014-01-05', '2014-01-6', '2014-01-7', '2014-01-8', '2014-01-9', '2014-01-10'],
        ['sample', 6, 14, 12, 25, 37, 40, 5, 28, 9, 30],
      ];

      var width = $('#chart1').width();
    
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
            width: width
        },
        padding: {
          right: 100
        }       
      });


//      var dataPie = [
//        ["abc", 20],
//        ["def", 50],
//        ["ghk", 30],
//      ];

      var dataPie = [];
      var i = 0;        
      @foreach($incomesday as $item)
        dataPie[i++] = ['{{ $item['incometypename'] }}', {{ $item['amount'] }}];
      @endforeach
      
      var width_chart2 = $('#chart2').width();

      c3.generate({
        bindto: '#chart2',
        data: {
          type : 'donut',
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
        size: {
            height: 220,
            width: width_chart2
        },
        padding: {
          right: 50
        }    
      });

//     var dataPie1 = [
//       ["abc", 20],
//       ["def", 50],
//       ["ghk", 30],
//     ];
      var dataPie1 = [];
      var i = 0;        
      @foreach($expensesday as $item)
        dataPie1[i++] = ['{{ $item['incometypename'] }}', {{ $item['amount'] }}];
      @endforeach
      
      var width_chart3 = $('#chart3').width();

      c3.generate({
        bindto: '#chart3',
        data: {
          type : 'donut',
          onmouseover: function (d, i) { console.log("onmouseover", d, i, this); },
          onmouseout: function (d, i) { console.log("onmouseout", d, i, this); },
          onclick: function (d, i) { console.log("onclick", d, i, this); },
          columns: dataPie1
        },
        axis: {
          x: {
            label: 'Sepal.Width'
          },
          y: {
            label: 'Petal.Width'
          }
        },
        size: {
            height: 220,
            width: width_chart3
        },
        padding: {
          right: 50
        }     
      
      });

//      var listmonth = [
//          ['Thu nhập', -30, 200, 200, 400, -150, 250],
//          ['Chi phí', 130, 100, -100, 200, -150, 50]
//      ];
      
      var listmonth = [];  
      var i = 1;
      listmonth[0] = ['x'];
      listmonth[1] = ['Thu nhập'];
      listmonth[2] = ['Chi phí'];
      listmonth[3] = ['Chênh lệch thu chi'];
      @foreach($listmonth as $key=>$item)
        listmonth[0][i] = '{{ "$key" }}';
        listmonth[1][i] = {{ $item['income_amount'] }}/unitcurrency;
        listmonth[2][i] = {{ -$item['expense_amount'] }}/unitcurrency;
        listmonth[3][i] = {{ $item['income_amount']-$item['expense_amount'] }}/unitcurrency;
        i++;
      @endforeach
            
      var width_chart4 = $('#chart4').width();
    
      c3.generate({
        bindto: '#chart4',
        data: {
          type: 'bar',
          types: {
            'Chênh lệch thu chi': 'line',
          },          
          x: 'x',
          y: 'y',          
          columns: listmonth,
          groups: [
              ['Thu nhập', 'Chi phí']
          ]
        },
        axis: {
          x: {
            type: 'timeseries',
            tick: {
              format: "%d/%m"
            },
            label:{
              text: 'Thời gian',
              position: 'outer-right'
            } 
          },
          y : {
            tick: {
                format: d3.format(",")
//                format: function (d) { return "$" + d; }
            },
            label:{
              text: 'ĐVT: VND',
              position: 'inner-top'
            }
        }
        },        
        grid: {
          y: {
            lines: [{value:0}],
            max: 500,
            min: -100
          }
        },
        bar: {
          width: {
            ratio: 0.3,
            max: 25
          },
        },
        size: {
            height: 500,
            width: width
        },
        padding: {
          top: 20,
          bottom: 20,
          right: 100
        }       
      });


      var width_chart4_mb = $('#chart4_mb').width();
      var data_chart4_mb = [
        ['x', '2021-02-01', '2021-02-02', '2021-02-03', '2021-02-04', '2021-02-05'],
        ['Chênh lệch thu chi', 10000000, 3000000, 700000, 6000000, 100000, 800000, 300000],
        ['Thu nhập', 10000000, 3000000, 700000, 6000000, 100000, 800000, 300000],
        ['Chi phí', 1500000, 1000000, 400000, 1800000, 200000, 100000, 400000],
      ];
    
      c3.generate({
        bindto: '#chart4_mb',
        data: {
          type: 'bar',
          types: {
            'Chênh lệch thu chi': 'line',
          },          
          x: 'x',
          y: 'y',          
          columns: data_chart4_mb,
          groups: [
              ['Thu nhập', 'Chi phí']
          ]
        },
        axis: {
          x: {
            type: 'timeseries',
            tick: {
              format: "%d/%m"
            },
            label:{
              text: 'Thời gian',
              position: 'outer-right'
            } 
          },
          y : {
            tick: {
                format: d3.format(",")
//                format: function (d) { return "$" + d; }
            },
            label:{
              text: 'ĐVT: VND',
              position: 'inner-top'
            }
        }
        },        
        grid: {
          y: {
            lines: [{value:0}],
            max: 500,
            min: -100
          }
        },
        bar: {
          width: {
            ratio: 0.3,
            max: 25
          },
        },
        size: {
            height: 300,
            width: width
        },      
      });

      var width_browser = $(document).width();

      if (width_browser < 576) {
        $('#chart4').hide();
        $('#chart4_mb').show();
      }else{
        $('#chart4').show();
        $('#chart4_mb').hide();
      }


//      var dataPie2 = [
//        ["abc", 20],
//        ["def", 50],
//        ["ghk", 30],
//      ];
      var dataPie2 = [];
      var i = 0;        
      @foreach($incomesmonth as $item)
        dataPie2[i++] = ['{{ $item['incometypename'] }}', {{ $item['amount'] }}];
      @endforeach

      var width_chart5 = $('#chart5').width();

      c3.generate({
        bindto: '#chart5',
        data: {
          type : 'donut',
          onmouseover: function (d, i) { console.log("onmouseover", d, i, this); },
          onmouseout: function (d, i) { console.log("onmouseout", d, i, this); },
          onclick: function (d, i) { console.log("onclick", d, i, this); },
          columns: dataPie2
        },
        axis: {
          x: {
            label: 'Sepal.Width'
          },
          y: {
            label: 'Petal.Width'
          }
        },
        size: {
            height: 300,
            width: width_chart5
        },
        padding: {
          right: 50
        }   
      
      });

//      var dataPie3 = [
//        ["abc", 20],
//        ["def", 50],
//        ["ghk", 30],
//      ];
      var dataPie3 = [];
      var i = 0;        
      @foreach($expensesmonth as $item)
        dataPie3[i++] = ['{{ $item['incometypename'] }}', {{ $item['amount'] }}];
      @endforeach
      
      var width_chart6 = $('#chart6').width();

      c3.generate({
        bindto: '#chart6',
        data: {
          type : 'donut',
          onmouseover: function (d, i) { console.log("onmouseover", d, i, this); },
          onmouseout: function (d, i) { console.log("onmouseout", d, i, this); },
          onclick: function (d, i) { console.log("onclick", d, i, this); },
          columns: dataPie3
        },
        axis: {
          x: {
            label: 'Sepal.Width'
          },
          y: {
            label: 'Petal.Width'
          }
        },
        size: {
            height: 300,
            width: width_chart6
        },
        padding: {
          right: 50
        }   
      
      });


      $(document).ready(function () {
          $('.list-wallet').click(function () {
              $('.list-wallet').removeClass('active');
              $(this).addClass('active');
          });
      }); 

  
  

  // $(document).ready(function(){
  //   var widthDiv = 300;
  //   var countDiv = (".financial-planning-item").lenght;
  //   var widthFinancial = widthDiv * countDiv;
    
  //   $(".financial-planning-list .wrap").css("width", widthFinancial);
  // });
  

</script>