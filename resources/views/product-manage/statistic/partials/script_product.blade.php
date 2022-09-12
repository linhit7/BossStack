<script>

//      var smallData = [
//        ['x', '2014-01-01', '2014-01-02', '2014-01-03', '2014-01-04', '2014-01-05', '2014-01-6', '2014-01-7', '2014-01-8', '2014-01-9', '2014-01-10'],
//        ['Quản lý dòng tiền cá nhân', 16, 13, 15, 22, 33, 20, 15, 18, 19, 10],
//        ['Đầu tư', 6, 18, 17, 20, 52, 30, 15, 25, 18, 20],
//        ['Tiết kiệm', 21, 12, 10, 21, 12, 22, 10, 10, 12, 15],
//      ];

      var smallData = [];  
      var i = 1;
      smallData[0] = ['x'];
      smallData[1] = ['Quản lý dòng tiền cá nhân'];
      smallData[2] = ['Đầu tư'];
      smallData[3] = ['Tiết kiệm'];
      @foreach($listContractByMonth as $key=>$item)
        smallData[0][i] = '{{ "$key" }}';
        smallData[1][i] = {{ $item[0] }};
        smallData[2][i] = {{ $item[1] }};
        smallData[3][i] = {{ $item[2] }};
        i++
      @endforeach

      var width_chart1 = $('#chart1').width();
    
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
            max: 20,
            min: 2,
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
            width: width_chart1
        },
        padding: {
          right: 100
        }       
      });


//      var dataPie = [
//        ["QL dòng tiền", 20],
//        ["Đầu tư", 50],
//        ["Tiết kiệm", 30],
//      ];
      var dataPie = [
        ["QL dòng tiền", {{$totalContractCashFlow}}],
        ["Đầu tư", {{$totalContractInvest}}],
        ["Tiết kiệm", {{$totalContractSaving}}],
      ];
      var width_chart2 = $('#chart2').width();

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
        size: {
            height: 200,
            width: width_chart2
        },
        padding: {
          right: 50
        }        

      });


      var data2 = [
            ['Đầu tư', 0, 0, 0, 0, 0, 0],
      ];

      var width_chart3 = $('#chart3').width();

      c3.generate({
        bindto: '#chart3',
        data: {
          type: 'bar',
          columns: data2
        },
        axis: {
          rotated: true
        },
        size: {
            height: 200,
            width: width_chart3
        },
        padding: {
          right: 50
        }        
      });

      var data1 = [
        ['x', '2014-01-01', '2014-01-02', '2014-01-03', '2014-01-04', '2014-01-05'],
        ['Tiết kiệm', 0, 0, 0, 0, 0],
      ];

      var width_chart4 = $('#chart4').width();
    
      c3.generate({
        bindto: '#chart4',
        data: {
          type: 'bar',
          x: 'x',
          y: 'y',
          columns: data1
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
            min: 10,
          }
        },
        bar: {
          width: {
            ratio: 0.3,
            max: 25
          },
        },
        size: {
            height: 200,
            width: width_chart4
        },
        padding: {
          right: 50
        }        
      });
</script>