<script>
	
	var height_about_pro = $(".about-product .row .col-md-4").first().height();

	$(".about-product-item").css("height", height_about_pro);


	var about_product_default = $(".about-product-default .col-md-3").first();
	var heading_2 = about_product_default.find("h2");
	var height_h2 = heading_2.height();

	$(".about-product-item .info h2").css("min-height", height_h2);

</script>