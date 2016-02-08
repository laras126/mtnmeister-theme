<?php

	/**
	 * Initialize Timber
	 */

	if (!class_exists('Timber')){
		add_action( 'admin_notices', function(){
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
		});
		return;
	}

	class MtnMeisterTheme extends TimberSite {

		function __construct(){
			add_theme_support('post-formats');
			add_theme_support('post-thumbnails');
			add_theme_support('menus');
			add_theme_support( 'html5', array( 'search-form' ) );
			
			add_filter('timber_context', array($this, 'add_to_context'));
			add_filter('get_twig', array($this, 'add_to_twig'));

			add_action('init', array($this, 'register_post_types'));
			add_action('init', array($this, 'register_taxonomies'));
			add_action('widgets_init', array($this, 'register_widgets'));
			
			parent::__construct();
		}

		function register_post_types(){
			require('lib/custom-types.php');
		}
		
		function register_widgets() {
			require('lib/widgets.php');
		}

		function add_to_context($context){

			// Get a random header image
			$images = get_field('header_images' );

			if( is_page() && $images ) {
				$rand_row = $images[ array_rand( $images ) ];
				$context['header_image'] = $rand_row;	
			}

			// ACF Site Settings (elements on every page)
			$context['callout_tf'] = get_field('callout_tf', 'options');
			$context['callout_bar'] = get_field('callout_bar', 'options');
			$context['support_title'] = get_field('support_title', 'options');
			$context['support_text'] = get_field('support_text', 'options');
	
			$context['support_text_link'] = get_field('support_text_link', 'options');
			$context['support_page_link'] = get_field('support_page_link', 'options');
			$context['support_btn_text'] = get_field('support_button_text', 'options');
			
			$context['footer_widgets'] = Timber::get_widgets('footer_widgets');
			
			$context['main_nav'] = new TimberMenu('main_nav');
			$context['footer_nav'] = new TimberMenu('footer_nav');
			$context['footer_nav_second'] = new TimberMenu('footer_nav_second');
			$context['site'] = $this;
			return $context;
		}

		function add_to_twig($twig){
			/* this is where you can add your own fuctions to twig */
			$twig->addExtension(new Twig_Extension_StringLoader());
			$twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
			return $twig;
		}

	}

	new MtnMeisterTheme();


/**
 *
 * Custom MTNmeister functions
 *
 * Functions are separated into files located in lib/, and included below
 *
 */

require_once('lib/scripts-styles.php');
require_once('lib/menus.php');
require_once('lib/utils.php'); 


// Change thumbnail size
// set_post_thumbnail_size( 400, 400 );

// Disable code editor
function mtn_remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('mtn_admin_menu', 'mtn_remove_editor_menu', 1);



// Add custom types tp search query
function mtn_add_custom_types( $query ) {
  	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    	$query->set( 
    		'post_type', 
    		array(
     			'meister', 'gear', 'deal', 'nav_menu_item'
			)
		);
	  	
	  	return $query;
	}
}
add_filter( 'pre_get_posts', 'mtn_add_custom_types' );


// Add Options Page
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page('Site Settings');
}


// Clean up menu classes (e.g. remove everything except current marker)

// http://wordpress.stackexchange.com/questions/30417/removing-all-classes-from-nav-menu-except-current-menu-item-and-current-menu-par
add_filter('nav_menu_css_class', 'discard_menu_classes', 10, 2);

function discard_menu_classes($classes, $item) {
    $classes = array_filter( 
        $classes, 
        create_function( '$class', 
                 'return in_array( $class, 
                      array( "current-menu-item", "current-menu-parent" ) );' )
        );
    return array_merge(
        $classes,
        (array)get_post_meta( $item->ID, '_menu_item_classes', true )
	);
}
