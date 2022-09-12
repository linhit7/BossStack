$(function() {

	$("body").ready(function(){
		var width_brower = $(window).width();

		if (width_brower < 1024) {
			$(".header-top").css("display", "none");
			$(".header-top-mobile").css("display", "block");
		}else{
			$(".header-top").css("display", "block");
			$(".header-top-mobile").css("display", "none");
		}

		$("#menuToggle-item").css("width", width_brower);
	});

	$(window).scroll(function(){

		if ( $(this).scrollTop() > 50 ) { 
			$('.header-top-mobile').addClass("fixed");
		} else { 
			$('.header-top-mobile').removeClass("fixed");
		}

	});


	$('.carousel-review-items').owlCarousel({
		loop:true,
		autoplay: true,
		autoHeight:true,
		center: true,
		dots: false,
		nav:false,
		margin:50,
		stagePadding: 50,
		autoplayTimeout: 10000,
		navText: [
		'<span class="btn-prev"><i class="icon-prev fas fa-chevron-left"></i><span>', 
		'<span class="btn-next"><i class="icon-next fas fa-chevron-right"></i><span>'
		],
		navClass: ['owl-prev', 'owl-next'],
		responsive:{
			0:{
				items:1,
				margin:10,
				stagePadding: 10
			},
			600:{
				items:1
			},
			768:{
				items:1
			},
			1000:{
				items:1
			}
		}
	})
	

});