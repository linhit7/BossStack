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
      right: 50
    }       
  });


  var dataPie = [
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
        height: 360,
        width: width_chart2
    },
    padding: {
      right: 50
    }        

  });


</script>