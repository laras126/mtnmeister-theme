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



	
	// ----
	// Load iframes when visible on page
	// ----

	// http://stackoverflow.com/questions/9144560/jquery-scroll-detect-when-user-stops-scrolling
	// http://stackoverflow.com/questions/487073/check-if-element-is-visible-after-scrolling
	// http://stackoverflow.com/questions/7154958/lazy-load-iframe-delay-src-http-call-with-jquery
	
	// Check if an element is within the viewport
	function isScrolledIntoView(elem) {
    	var docViewTop = $(window).scrollTop();
    	var docViewBottom = docViewTop + $(window).height();

    	var elemTop = $(elem).offset().top;
    	var elemBottom = elemTop + $(elem).height();

    	return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
	}
	

	var iframes = $('iframe');
	var iframeVisible = false;

	
	iframes.each(function() {

		// Interrupt the HTTP request
	    // var src = $(this).attr('src');
	    // $(this).data('src', src).attr('src', '');
	    // console.log('no iframe!');
		
		$(window).scroll(function() {
	    	// console.log($(this).scrollTop());
	    	// console.log($total_ht);
	    });

		// $(window).scroll(function() {
			
		// 	var iframeOffset = $(this).offset();
		// 	var iframeHeight = $(this).height();

	 //    	if( (iframeOffset.top + iframeHeight) >= $(window).height() ) {
	 //    		console.log('hi iframe!');
		// 		$(this).attr('src', function() {
	 //    			return $(this).data('src');
		// 		});
	 //    	}
	 //    });

	    // Load the iframe a few px before its visible
	    
	});
	
	$(window).scroll(function() {

		if( $('.tease-featured').scrollTop() > $total_ht ) {
			
		}
	});

	
	

	// Check if the iframe is visible when scrolling, load if it is.
	// $(window).scroll(function() {
	//     clearTimeout($.data(this, 'scrollTimer'));
	//     $.data(this, 'scrollTimer', setTimeout(function() {
	        
	//         var iframeVisible = isScrolledIntoView(iframes);
	//         console.log(iframeVisible);

	// 		if( iframeVisible ) {
	//         	iframes.attr('src', function() {
	// 	        	return $(this).data('src');
	// 	    	});
	// 	    }
	        
	//     }, 250));
	// });


	

	// ----
	// That's all, folks!
	// ----

	// I'll get back to my Rolling Rock now.


});