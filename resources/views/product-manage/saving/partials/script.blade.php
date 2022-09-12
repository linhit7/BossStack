<script>

      var smallData = [
        ['x', '2014-01-01', '2014-01-02', '2014-01-03', '2014-01-04', '2014-01-05', '2014-01-6', '2014-01-7', '2014-01-8', '2014-01-9', '2014-01-10'],
        ['sample', 6, 14, 12, 25, 37, 40, 5, 28, 9, 30],
      ];
    
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
            width: 840
        }       
      });


      var dataPie = [
        ["a", 20],
        ["b", 50],
        ["c", 30],
      ];

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
      
      });


      $('.bank-link-carousel').owlCarousel({
          loop:true,
          autoplay: true,
          autoHeight:true,
          center: true,
          dots: false,
          nav:true,
          navText: [
            '<span class="btn-prev"><i class="icon-prev fas fa-chevron-left"></i><span>', 
            '<span class="btn-next"><i class="icon-next fas fa-chevron-right"></i><span>'
          ],
          navClass: ['owl-prev', 'owl-next'],
          responsive:{
              0:{
                  items:2,
                  margin:30
              },
              600:{
                  items:3
              },
              768:{
                  items:5
              },
              1000:{
                  items:6
              }
          }
      })

</script>