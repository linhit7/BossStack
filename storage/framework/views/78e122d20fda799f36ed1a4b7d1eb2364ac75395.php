<script>

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


      var dataPie = [
        ["abc", 20],
        ["def", 50],
        ["ghk", 30],
      ];

      
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
            height: 210,
            width: width_chart2
        },
        padding: {
          right: 50
        },   
        donut: {
            title: ""
        }      
      });

     var dataPie1 = [
       ["abc", 20],
       ["def", 50],
       ["ghk", 30],
     ];
      
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
            height: 230,
            width: width_chart3
        },
        padding: {
          right: 50
        },   
        donut: {
            title: ""
        }      
      
      });

      var listmonth = [
          ['Thu nhập', -30, 200, 200, 400, -150, 250],
          ['Chi phí', 130, 100, -100, 200, -150, 50]
      ];
      
            
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
            }
          },
        y : {
            tick: {
                format: d3.format(",")
//                format: function (d) { return "$" + d; }
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


      var dataPie2 = [
        ["abc", 20],
        ["def", 50],
        ["ghk", 30],
      ];

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
            height: 250,
            width: width_chart5
        },
        padding: {
          right: 50
        }   
      
      });

      var dataPie3 = [
        ["abc", 20],
        ["def", 50],
        ["ghk", 30],
      ];
      
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
            height: 265,
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

</script>