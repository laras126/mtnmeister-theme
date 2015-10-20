<?php 


  // Enqueue scripts
  function mtn_scripts() {

    // Use jQuery from CDN, enqueue in footer
    if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), null, true);
      wp_enqueue_script('jquery');
    }

    // Enqueue stylesheet
    if( WP_ENV == 'production' ) {
      wp_enqueue_style( 'mtn-styles', get_template_directory_uri() . '/assets/css/main.min.css', 1.0);
      wp_enqueue_script( 'js', get_template_directory_uri() . '/assets/js/build/site.min.js', array('jquery'), '1.0.0', true );
    } else {
      wp_enqueue_style( 'mtn-styles', get_template_directory_uri() . '/assets/css/main.css', 1.0);
      wp_enqueue_script( 'js', get_template_directory_uri() . '/assets/js/build/site.js', array('jquery'), '1.0.0', true );
    }

    // Add our JS
  }
  add_action( 'wp_enqueue_scripts', 'mtn_scripts' );



// Load Gravity Forms JS in the footer...really? Sheesh.
// https://bjornjohansen.no/load-gravity-forms-js-in-footer

// TODO: This may be a super hack and can be done better. Maybe.

function wrap_gform_cdata_open( $content = '' ) {
  $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
  return $content;
}
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open' );

function wrap_gform_cdata_close( $content = '' ) {
  $content = ' }, false );';
  return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close' );




// ----
// Google Analytics snippet from HTML5 Boilerplate
// ----

// Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM

define('GOOGLE_ANALYTICS_ID', 'UA-50385573-1');
function mtn_google_analytics() { ?>
<script>
  <?php if (WP_ENV === 'production') : ?>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  <?php else : ?>
    function ga() {
      console.log('GoogleAnalytics: ' + [].slice.call(arguments));
    }
  <?php endif; ?>
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>','auto');ga('send','pageview');
    
    // Hotjar Tracking Code
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:91115,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<?php }

if (GOOGLE_ANALYTICS_ID && (WP_ENV !== 'production' || !current_user_can('manage_options'))) {
  add_action('wp_head', 'mtn_google_analytics', 20);
}


?>