<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['line']});
    google.charts.setOnLoadCallback(drawChart);

    var getmonth = getMonth();

    alert('getmonth');

    function drawChart() {
      
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Doanh Thu');
      
      var i;
      var day = new Date();
      var month = day.getMonth() + 1;
      var year = day.getFullYear();
           
      if(month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12){
        for(i = 1; i <= 31; i++){
          data.addRows([
            [i,  50]
          ]);
        }
      }else if(month == 4 || month == 6 || month == 9 || month == 11){
        for(i = 1; i <= 30; i++){
          data.addRows([
            [i,  50]
          ]);
        }
      }else{
        if(year % 4 == 0 && year % 400 == 0){
          for(i = 1; i <= 29; i++){
            data.addRows([
              [i,  50]
            ]);
          }
        }else{
          for(i = 1; i <= 28; i++){
            data.addRows([
              [i,  50]
            ]);
          }
        }
      }
      
      var options = {
        chart: {
          title: 'Doanh thu đơn hàng trong tháng',
          subtitle: 'triệu đồng (VND)'
        },
        width: 'auto',
        height: 500,
        backgroundColor: 'transparent'
      };

      var chart = new google.charts.Line(document.getElementById('linechart_material'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
</script> -->




<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

var data_chart = [];

var data_append = {};

<?php $__currentLoopData = $orderOnMonthYear->where('status',3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  //var date_append = "<?php echo e($item->created_at, false); ?>";
  var date_append = "<?php echo e($item->created_at, false); ?>".split(" ")[0];
  if(data_append[date_append] != null) {
    data_append[date_append] = parseInt(data_append[date_append]) + parseInt("<?php echo e($item->total, false); ?>");
  } else {
    data_append[date_append] = parseInt("<?php echo e($item->total, false); ?>");
  }
  //console.log(data_append);
  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

for(var key in data_append) {
  if (data_append.hasOwnProperty(key)) {
    var obj_value = data_append[key];
    data_chart.push({"date": key, "value": obj_value});
  }
}

// Add data
chart.data = data_chart;

// Set input format for the dates
chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

// Create axes
var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.skipEmptyPeriods = true;
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "value";
series.dataFields.dateX = "date";
series.tooltipText = "{value}"
series.strokeWidth = 2;
series.minBulletDistance = 15;

//Drop-shaped tooltips
series.tooltip.background.cornerRadius = 20;
series.tooltip.background.strokeOpacity = 0;
series.tooltip.pointerOrientation = "vertical";
series.tooltip.label.minWidth = 40;
series.tooltip.label.minHeight = 40;
series.tooltip.label.textAlign = "middle";
series.tooltip.label.textValign = "middle";

// Make bullets grow on hover
var bullet = series.bullets.push(new am4charts.CircleBullet());
bullet.circle.strokeWidth = 2;
bullet.circle.radius = 4;
bullet.circle.fill = am4core.color("#fff");

var bullethover = bullet.states.create("hover");
bullethover.properties.scale = 1.3;

// Make a panning cursor
chart.cursor = new am4charts.XYCursor();
chart.cursor.behavior = "panXY";
chart.cursor.xAxis = dateAxis;
chart.cursor.snapToSeries = series;

// Create vertical scrollbar and place it before the value axis
chart.scrollbarY = new am4core.Scrollbar();
chart.scrollbarY.parent = chart.leftAxesContainer;
chart.scrollbarY.toBack();

// Create a horizontal scrollbar with previe and place it underneath the date axis
chart.scrollbarX = new am4charts.XYChartScrollbar();
chart.scrollbarX.series.push(series);
chart.scrollbarX.parent = chart.bottomAxesContainer;

}); // end am4core.ready()
</script>