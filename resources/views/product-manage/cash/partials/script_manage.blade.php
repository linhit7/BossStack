<script>

      var smallData = [
        ['x', '2014-01-01', '2014-01-02', '2014-01-03', '2014-01-04', '2014-01-05', '2014-01-6', '2014-01-7', '2014-01-8', '2014-01-9', '2014-01-10'],
        ['sample', 6, 14, 12, 25, 37, 40, 5, 28, 9, 30],
      ];

      var listcustomer = [];  
      var i = 1;
      listcustomer[0] = ['x'];
      listcustomer[1] = ['Khách hàng'];
      @foreach($listCustomerByMonth as $key=>$item)
        listcustomer[0][i] = '{{ "$key" }}';
        listcustomer[1][i] = {{ $item }};
        i++
      @endforeach
  
      var width = $('#rptcustomer').width();
    
      c3.generate({
        bindto: '#rptcustomer',
        data: {
          type: 'bar',
          x: 'x',
          y: 'y',
          columns: listcustomer
        },
        axis: {
          x: {
            type: 'timeseries',
            tick: {
              format: "{{$formatchart_x}}"
            },
            label: {
              text: 'Thời gian',
              position: 'outer-right'
            } 
          },
          y: {
            max: 50,
            min: 5,
            label: {
              text: 'Khách hàng',
              position: 'inner-top'
            }
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
          left: 30,
          right: 30
        }       
      });

</script>