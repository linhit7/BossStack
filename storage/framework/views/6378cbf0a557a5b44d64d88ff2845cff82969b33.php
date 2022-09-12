<script>
      //Bieu do dang thanh
//      var smallData = [
//        ['x', '2014-01-01', '2014-01-02', '2014-01-03', '2014-01-04', '2014-01-05', '2014-01-6', '2014-01-7', '2014-01-8', '2014-01-9', '2014-01-10'],
//        ['Khách hàng', 6, 14, 12, 25, 37, 40, 5, 28, 9, 30],
//      ];

      var smallData = [];  
      var i = 1;
      smallData[0] = ['x'];
      smallData[1] = ['Khách hàng'];
      <?php $__currentLoopData = $listCustomerByMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        smallData[0][i] = '<?php echo e("$key"); ?>';
        smallData[1][i] = <?php echo e($item); ?>;
        i++
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
            width: width
        },
        padding: {
          right: 100
        }    
      });

      //Bieu do tron  
//      var dataPie = [
//        ["QL dòng tiền", 20],
//        ["Đầu tư", 50],
//        ["Tiết kiệm", 30],
//      ];
      
      var dataPie = [];  
      var i = 0;
      <?php $__currentLoopData = $listGroupCustomer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        dataPie[i++] = ['<?php echo e($customertype[$item->customertype]); ?>', <?php echo e($item->countcustomer); ?>];
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      c3.generate({
        bindto: '#chart2',
        data: {
          type : 'pie',
          onmouseover: function (d, i) { console.log("onmouseover", d, i, this); },
          onmouseout: function (d, i) { console.log("onmouseout", d, i, this); },
          onclick: function (d, i) { console.log("onclick", d, i, this); },
          columns: dataPie
        },
        size: {
            height: 250,
            width: 250
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