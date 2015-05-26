$(document).ready(function() {


	console.log('Check it: http://github.com/laras126/mtnmeister-theme');


	// Plugins

	$('.lazy').lazyload({
		effect : 'fadeIn',
		threshold : 600
	}); // Am I lazy for using this?

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
		
		// NOT working
		if($('.search-field').is(':focus')) {
			$('.search-field').focusout();
			$('.search-form').removeClass('focused');
		} else {
			$('.search-field').focus();
			$('.search-form').addClass('focused');	
		}

	});



	// ----
	// Menu and callout bar
	// ----

  	var $scroll_class = 'banner-opaque',
		$header_ht = $('.page-header').outerHeight(),
		$banner = $('.banner'),
		$banner_ht = $('.banner').outerHeight(),
		$total_ht = $header_ht - $banner_ht*5;
	  
	$(window).scroll(function() {

		// Fade in menu bar background
		if( $(this).scrollTop() > $total_ht ) {
			$banner.addClass($scroll_class);
		} else if($(this).scrollTop() < $total_ht ) {
			$banner.removeClass($scroll_class);
		}

		// Fix the banner to the top when callout bar is no longer visible
		var callout_ht = $('.callout').outerHeight(),
			scroll_pos = $(document).scrollTop();

		if( scroll_pos > callout_ht ) {
			$('.banner').addClass('fixed');
		} else {
			$('.banner').removeClass('fixed');
		}
			
	});



	// ----
	// Header image laoding
	// ----

	var $hero = $('.page-header');
	
	$hero.each( function() {
		var $image = $(this).find('.page-header-image'),
			$t = $(this);
	
		$(this).imagesLoaded( function() {

			$t.fadeTo(300, 0.5, function() {
			    
				$image.css('opacity', 1);
				$t.find('.spinner').hide();

			}).fadeTo(300, 1);
			
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