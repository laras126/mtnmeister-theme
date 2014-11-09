$(document).ready(function() {

	console.log('Check it: http://github.com/laras126/mtnmeister-theme');

	// ----
	// Toggle menu
	// ----

	// TODO: add this with modernizer, causes a blip
	// $('body').addClass('js'); // Detect JS
	  
	var $menu = $('#menu'),
		$menulink = $('.menu-link');
		
	$menulink.click(function() {
		$menulink.toggleClass('active');
		$menu.toggleClass('active');
		return false;
	});

	

	// ----
	// Fix the nav when scrolling
	// ----

  	var $scroll_class = "scrolled",
		$header_ht = $('.page-header-image').outerHeight(),
		$banner = $('.banner'),
		$banner_ht = $('.banner').outerHeight(),
		$total_ht = $header_ht - $banner_ht*5;
	  
	$(window).scroll(function() {
		if( $(this).scrollTop() > $total_ht ) {
		  $banner.addClass($scroll_class);
		} else if($(this).scrollTop() < $total_ht ) {
		  $banner.removeClass($scroll_class);
		}
	});



	// ----
	// Header image spinner
	// ----
	var $container = $('.page-header');
	var $image = $('.page-header-image');
	$image.hide();
	
	$container.imagesLoaded( function() {
		$image.fadeIn(300);
		$('.spinner').hide();
	});

});