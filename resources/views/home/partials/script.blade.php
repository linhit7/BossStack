<script>
	
	var first_about_pro = $(".element-about-3 .about-product .col-md-4").first();
	var heading_about_pro = first_about_pro.find("h1");
	var height_heading = heading_about_pro.height();

	$(".about-product .about-product-item h1").css("height", height_heading);


	var about_product_default = $(".about-product-default .col-md-4").first();
	var heading_2 = about_product_default.find("h2");
	var height_h2 = heading_2.height();

	$(".about-product-item .info h2").css("min-height", height_h2);


	$('.carousel-items').owlCarousel({
          loop:true,
          autoplay: true,
          autoHeight:true,
          center: true,
          dots: false,
          nav:false,
          margin:50,
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
                  items:3
              },
              1000:{
                  items:4
              }
          }
      })

</script>