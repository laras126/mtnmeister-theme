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
	// Fade in the nav background when scrolling
	// ----

  	var $scroll_class = "scrolled",
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

	});



	// ----
	// Hide/show callout bar according to scroll position
	// ----

	$(window).scroll(function() {    
		// Not ideal at all. Should be incorporated into the scroll logic above.
    	// http://jsfiddle.net/mdesdev/jJkj2/
    	var scroll = ($(this).scrollTop() > 0) ? $('.callout').slideUp(100) : $('.callout').slideDown(100);
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