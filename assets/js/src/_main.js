$(document).ready(function() {


	console.log('Check it: http://github.com/laras126/mtnmeister-theme');


	// Plugins

	$('#content').fitVids();

	// ----
	// Toggle menu
	// ----


	var $menu = $('#menu'),
		$menulink = $('.menu-link');

	$menulink.on('click', function(e) {
		$(this).toggleClass('active');
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
	// Header image loading
	// ----

	var $hero = $('.page-header');

	$hero.each( function() {
		var $image = $(this).find('.page-header-image'),
			$t = $(this);

		$(this).imagesLoaded( function() {

			$t.fadeTo(100, 0.5, function() {

				$image.css('opacity', 1);
				$t.find('.spinner').hide();

			}).fadeTo(100, 1);

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
	// Responsive Optimizations
	// ----

	// Load post featured images on larger screens only
	if (matchMedia('only screen and (min-width: 880px)').matches) {
		// $('.thumb-container').html('<img src="mtn_script_vars.thumb_src">');
	}


	// ----
	// That's all, folks!
	// ----

	// I'll get back to my Rolling Rock now.


});


// Track Outbound links
// http://www.axllent.org/docs/view/track-outbound-links-with-analytics-js/

function _gaLt(event){
    var el = event.srcElement || event.target;

    /* Loop up the DOM tree through parent elements if clicked element is not a link (eg: an image inside a link) */
    while(el && (typeof el.tagName == 'undefined' || el.tagName.toLowerCase() != 'a' || !el.href)){
        el = el.parentNode;
    }

    if(el && el.href){
        /* link */
        var link = el.href;
        if(link.indexOf(location.host) == -1 && !link.match(/^javascript\:/i)){ /* external link */
            /* HitCallback function to either open link in either same or new window */
            var hitBack = function(link, target){
                target ? window.open(link, target) : window.location.href = link;
            };
            /* Is target set and not _(self|parent|top)? */
            var target = (el.target && !el.target.match(/^_(self|parent|top)$/i)) ? el.target : false;
            /* send event with callback */
            ga(
                "send", "event", "Outgoing Links", link,
                document.location.pathname + document.location.search,
                {"hitCallback": hitBack(link, target)}
            );

            /* Prevent standard click */
            event.preventDefault ? event.preventDefault() : event.returnValue = !1;
        }

    }
}

/* Attach the event to all clicks in the document after page has loaded */
var w = window;
w.addEventListener ? w.addEventListener("load",function(){document.body.addEventListener("click",_gaLt,!1)},!1)
 : w.attachEvent && w.attachEvent("onload",function(){document.body.attachEvent("onclick",_gaLt)});


