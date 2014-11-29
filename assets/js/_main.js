$(document).ready(function() {


	console.log('Check it: http://github.com/laras126/mtnmeister-theme');


	// $(window).scroll(lazyLoadIframes);
 //   	lazyLoadIframes();

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
	// Fade in the nav background when scrolling
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

	var $iframes = $('iframe');
	var src = $(this).attr('src');
	var loaded = $(this).attr('data-loaded');

	console.log($iframes);

	$iframes.attr('data-loaded', false);

	// http://stackoverflow.com/a/7154968/609046
	// Interrupt the HTTP request and save the src
	// $iframes.attr('data-src', function() {
	// 	var src = $(this).attr('src');
	    
	//     if( !loaded ) {
	//     	$(this).removeAttr('src');
	//     	console.log('bye, iframe');
	//     	return src;
	//     }
	// });

	// http://stackoverflow.com/a/10211585/609046
	function lazyLoadIframes(){
	   var wt = $(window).scrollTop();    //* top of the window
	   var wb = wt + $(window).height();  //* bottom of the window

	   $iframes.each( function(index, value){
	   		
	      	var ot = $(this).offset().top;  //* top of object (i.e. advertising div)
	      	var ob = ot + $(this).height(); //* bottom of object

	      	if( !loaded && wt<=ob && wb >= ot ){
				
				$(this).attr('data-loaded', true);
				
				// Make the HTTP request
	   			$(this).attr('src', function() {
			        return $(this).data('src');
			    });

				$(this).css('border', '3px solid yellow');
				console.log('iframe!');

				// $(this).unbind('attr');
				
	      	}
	   });
	}

	// Check if the iframe is visible when scrolling, load if it is.
	// $(window).scroll(function() {
	//     clearTimeout($.data(this, 'scrollTimer'));
	//     $.data(this, 'scrollTimer', setTimeout(function() {
	//         // lazyLoadIframes();
	//     }, 250));
	// });


	// http://stackoverflow.com/questions/9144560/jquery-scroll-detect-when-user-stops-scrolling
	// http://stackoverflow.com/questions/487073/check-if-element-is-visible-after-scrolling
	// http://stackoverflow.com/questions/7154958/lazy-load-iframe-delay-src-http-call-with-jquery
	
	// Check if an element is within the viewport
	// function isScrolledIntoView(elem) {
 //    	var docViewTop = $(window).scrollTop();
 //    	var docViewBottom = docViewTop + $(window).height();

 //    	var elemTop = $(elem).offset().top;
 //    	var elemBottom = elemTop + $(elem).height();

 //    	console.log((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
	// }
	

	// var iframes = $('iframe');
	// var iframeVisible = false;

	// isScrolledIntoView(iframes);


	// $(window).scroll(function() {

	// 	if( $('.tease-featured').scrollTop() > $total_ht ) {
			
	// 	}
	// });

	
	

	// ----
	// Slide up episode info on Minor Meister hover
	// ----

	$('.thumb-container').hover( function() {
		$(this).find('.thumb-caption').stop(true, true).slideDown(300);
		console.log('poop');
	}, function() {
		$(this).find('.thumb-caption').stop(true, true).slideUp(300);
	});


	

	// ----
	// That's all, folks!
	// ----

	// I'll get back to my Rolling Rock now.


});