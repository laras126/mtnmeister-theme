<?php 


// Enqueue styles
function mtn_styles() {
  wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.min.css' );
}
add_action( 'wp_enqueue_scripts', 'mtn_styles' );


// Enqueue scripts
function mtn_scripts() {

  // Use jQuery from CDN
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
    wp_enqueue_script('jquery', array(), null, true);
  }

  // Add MTNmeister JS
  wp_register_script('mtn-js', get_template_directory_uri() . '/assets/js/scripts.js');
  // wp_register_script('mtn-js', get_template_directory_uri() . '/assets/js/build/scripts.min.js');
  wp_enqueue_script( 'mtn-js', array('jquery'), null, true );

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action( 'wp_footer', 'mtn_scripts' );



/**
 * Google Analytics snippet from HTML5 Boilerplate
 * 
 * Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM
 */

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
</script>

<?php }

if (GOOGLE_ANALYTICS_ID && (WP_ENV !== 'production' || !current_user_can('manage_options'))) {
  add_action('wp_footer', 'mtn_google_analytics', 20);
}


?>