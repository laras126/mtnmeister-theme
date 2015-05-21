$(document).ready(function() {


	console.log('Check it: http://github.com/laras126/mtnmeister-theme');


	// Plugins

	$('.lazy').lazyload({
		effect : 'fadeIn',
		threshold : 600
	}); // Am I lazy for using this?

	//
	$('#content').fitVids();
	


	// ----
	// Toggle menu
	// ----

	  
	var $menu = $('#menu'),
		$menulink = $('.menu-link');
		
	$menulink.click(function(e) {
		$menulink.toggleClass('active');
		$menu.toggleClass('active');
		e.preventDefault();
	});



	// ----
	// Search form
	// ----

	// Drop down search field in header

	$('.shape-search').click(function() {
		$('.search-field').focus();
		$('.search-form').addClass('focused');
		console.log('clicked');
	});



	// ----
	// Fade in the menu background when scrolling
	// ----

  	var $scroll_class = 'banner-opaque',
		$header_ht = $('.page-header').outerHeight(),
		$banner = $('.banner'),
		$banner_ht = $('.banner').outerHeight(),
		$total_ht = $header_ht - $banner_ht*5;
	  
	$(window).scroll(function() {
		if( $(this).scrollTop() > $total_ht ) {
			$banner.addClass($scroll_class);
		} else if($(this).scrollTop() < $total_ht ) {
			$banner.removeClass($scroll_class);
		}

		// Fix the banner to the top when callout bar is no longer visible

		/* 
		
		if scrolled area is larger than callout bar
			position fixed
		else
			position absolute

		how to tell if callout bar is fixed
			get height of calloutbar
			


		*/ 

		var callout_ht = $('.callout').outerHeight(),
			scroll_pos = $(document).scrollTop();


		if( scroll_pos > callout_ht ) {
			$('.banner').addClass('fixed');
		} else {
			$('.banner').removeClass('fixed');
		}
			

	});




	// ----
	// Hide/show callout bar according to scroll position
	// ----

	$(window).scroll(function() {    
		// http://jsfiddle.net/mdesdev/jJkj2/
    	// var scroll = ($(this).scrollTop() > 0) ? $('.callout').slideUp(100) : $('.callout').slideDown(100);

    	 // var scroll = ($(this).scrollTop() > 0) ? $('.banner').addClass('fixed', 1000);
  	});




	// ----
	// Header image laoding
	// ----

	var $hero = $('.page-header');
	
	$hero.each( function() {
		var $image = $(this).find('#headerImageLoader'),
			$t = $(this),
			imageSrc = $image.attr('src');
	
		$(this).imagesLoaded( function() {

			$t.fadeTo(300, 0.5, function() {
			    
				$t.css('background-image', 'url(\'' + imageSrc + '\')');

			}).fadeTo(300, 1);

			$t.find('.spinner').hide();
			
		});
	});
	


	
	// ----
	// Slide up episode info on Minor Meister hover
	// ----

	$('.thumb-container').hover( function() {
		$(this).find('.thumb-caption').stop(true, true).slideDown(300);
	}, function() {
		$(this).find('.thumb-caption').stop(true, true).slideUp(300);
	});


	

	// ----
	// That's all, folks!
	// ----

	// I'll get back to my Rolling Rock now.


});