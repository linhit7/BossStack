<script>
  var data_chart1 = [
    ['x', '2014-01-01', '2014-01-02', '2014-01-03', '2014-01-04', '2014-01-05', '2014-01-6', '2014-01-7', '2014-01-8', '2014-01-9', '2014-01-10'],
    ['sample', 6, 14, 12, 25, 37, 40, 5, 28, 9, 30],
  ];


  var width_chart1 = $('#chart1').width();


  c3.generate({
    bindto: '#chart1',
    data: {
      type: 'bar',
      x: 'x',
      y: 'y',
      columns: data_chart1
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
        width: width_chart1
    },
    padding: {
      right: 50
    }       
  });



  var data_chart2 = [
    ["QL dòng tiền", 20],
    ["Đầu tư", 30],
    ["Tiết kiệm", 50],
  ];


  var width_chart2 = $('#chart2').width();


  c3.generate({
    bindto: '#chart2',
    data: {
      type : 'pie',
      onmouseover: function (d, i) { console.log("onmouseover", d, i, this); },
      onmouseout: function (d, i) { console.log("onmouseout", d, i, this); },
      onclick: function (d, i) { console.log("onclick", d, i, this); },
      columns: data_chart2
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
        height: 360,
        width: width_chart2
    },
    padding: {
      right: 50
    }        
  });


  var data_chart3 = [
        ['Đầu tư', 30, 40, 50, 60, 70, 80],
  ];


  var width_chart3 = $('#chart3').width();


  c3.generate({
    bindto: '#chart3',
    data: {
      type: 'bar',
      columns: data_chart3
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



  var data_chart4 = [
    ['x', '2014-01-01', '2014-01-02', '2014-01-03', '2014-01-04', '2014-01-05', '2014-01-6', '2014-01-7', '2014-01-8', '2014-01-9', '2014-01-10'],
    ['sample', 6, 14, 12, 25, 37, 40, 5, 28, 9, 30],
  ];


  var width_chart4 = $('#chart4').width();


  c3.generate({
    bindto: '#chart4',
    data: {
      type: 'bar',
      x: 'x',
      y: 'y',
      columns: data_chart4
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
        width: width_chart4
    },
    padding: {
      right: 50
    }       
  });




  var data_chart5 = [
    ['x', '2014-01-01', '2014-01-02', '2014-01-03', '2014-01-04', '2014-01-05', '2014-01-6', '2014-01-7', '2014-01-8', '2014-01-9', '2014-01-10'],
    ['sample', 6, 14, 12, 25, 37, 40, 5, -28, 9, 30],
    ['sample1', 10, 18, 19, -50, 40, 40, 10, 25, 35, 40],
  ];

  var width_chart5 = $('#chart5').width();

  c3.generate({
    bindto: '#chart5',
    data: {
      type: 'line',
      x: 'x',
      y: 'y',
      columns: data_chart5,
      names: {
        sample: 'Thu',
        sample1: 'Chi',
      },
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
        min: -70,
      }
    },
    grid: {
      y: {
          lines: [{value:0}]
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
        width: width_chart5
    },
    padding: {
      right: 50
    }       
  });


  var data_chart6 = [
    ['x', 'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9'],
    ['sample', 6, 14, 12, 25, 37, 40, 5, 28, 9],
    ['sample1', 10, 18, 19, 50, 40, 40, 10, 25, 35],
    ['sample2', 10, 18, 19, 50, 40, 40, 10, 25, 35],
  ];

  var width_chart6 = $('#chart6').width();

  c3.generate({
    bindto: '#chart6',
    data: {
      types: {
          sample: 'bar',
          sample1: 'bar',
          sample2: 'line',
      },
      x: 'x',
      y: 'y',
      columns: data_chart6,
      names: {
        sample: 'Tài sản có',
        sample1: 'Nợ',
        sample2: 'Tổng tài sản',
      },
    },
    axis: {
      x: {
        type: 'category'
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
        height: 500,
        width: width_chart6
    },
    padding: {
      right: 50
    }       
  });


  var data_chart7 = [
      ['Gói 1', 30],
      ['Gói 2', 30],
      ['Gói 3', 40],
  ];

  var width_chart7 = $('#chart7').width();

  c3.generate({
    bindto: '#chart7',
    data: {
      type: 'donut',
      onmouseover: function (d, i) { console.log("onmouseover", d, i, this); },
      onmouseout: function (d, i) { console.log("onmouseout", d, i, this); },
      onclick: function (d, i) { console.log("onclick", d, i, this); },
      columns: data_chart7
    },
    donut: {
        title: "30,120,720",
        label: {
          show: false 
        },
        width: 25
    },
    size: {
      height: 350,
      width: width_chart7
    },
    padding: {
      right: 50
    }        
  });

  d3.select("#chart7 .c3-chart-arcs-title").append("tspan").attr("dy", 25).attr("x", 0).attr("class", "second-title").text("+2,190,321 / +15,20%");


</script>