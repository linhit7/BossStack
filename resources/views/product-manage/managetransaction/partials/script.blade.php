<script type="text/javascript">

var chart1 = c3.generate({
    bindto: '#chart1',
    size: {
      height: 255
    },
    padding: {
      top: 10,
      bottom: 0,
      left: 40,
      right: 40
    },
    data: {
        x: 'x',
        columns: [
            ['x', '2013-01-01', '2013-01-02', '2013-01-03', '2013-01-04', '2013-01-05', '2013-01-06'],
            ['data1', 30, 200, 100, 400, 150, 250]
        ]
    },
    legend: {
      hide: true
    },
    axis: {
      x: {
        type: 'timeseries',
        tick: {
            format: '%d/%m/%y'
        },
        label: {
          text: 'Thời gian'
        }
      },
      y: {
        label: {
          text: 'VND'
        }
      }
    }
});


var chart2 = c3.generate({
    bindto: '#chart2',
    size: {
      height: 255
    },
    data: {
        columns: [
            ['Lãi', 80],
            ['Lỗ', 20],
        ],
        type : 'pie',
        colors: {
            Lãi: '#01a659',
            Lỗ: '#dd4b39',
        },
        onclick: function (d, i) { console.log("onclick", d, i); },
        onmouseover: function (d, i) { console.log("onmouseover", d, i); },
        onmouseout: function (d, i) { console.log("onmouseout", d, i); }
    }
});

var chart3 = c3.generate({
    bindto: '#chart3',
    size: {
      height: 200
    },
    padding: {
      right: 20
    },
    data: {
        columns: [
            ['data1', 30, 200, 100, 400, 150, 250],
            ['data2', 50, 20, 10, 40, 15, 25]
        ]
    },
    legend: {
      hide: true
    },
});

var chart4 = c3.generate({
    bindto: '#chart4',
    size: {
      height: 400
    },
    padding: {
      right: 20
    },
    data: {
        columns: [
            ['data1', 30, 200, 100, 400, 150, 250],
            ['data2', 50, 20, 10, 40, 15, 25]
        ]
    },
    legend: {
      hide: true
    },
});

var chart5 = c3.generate({
    bindto: '#chart5',
    size: {
      height: 400
    },
    padding: {
      right: 20
    },
    data: {
        columns: [
            ['data1', 30, 200, 100, 400, 150, 250],
            ['data2', 50, 20, 10, 40, 15, 25]
        ]
    },
    legend: {
      hide: true
    },
});

var chart6 = c3.generate({
    bindto: '#chart6',
    size: {
      height: 400
    },
    padding: {
      right: 20
    },
    data: {
        columns: [
            ['data1', 30, 200, 100, 400, 150, 250],
            ['data2', 50, 20, 10, 40, 15, 25]
        ]
    },
    legend: {
      hide: true
    },
});

</script>