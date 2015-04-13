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
			add_filter('timber_context', array($this, 'add_to_context'));
			add_filter('get_twig', array($this, 'add_to_twig'));
			add_action('init', array($this, 'register_post_types'));
			add_action('init', array($this, 'register_taxonomies'));
			parent::__construct();
		}

		function register_post_types(){
			//this is where you can register custom post types
		}

		function register_taxonomies(){
			//this is where you can register custom taxonomies
		}

		function add_to_context($context){

			// Get a random header image
			$images = get_field('header_images' );

			if( is_page() && $images ) {
				$rand_row = $images[ array_rand( $images ) ];
				$context['header_image'] = $rand_row;	
			}

			// ACF Options Page for Callout Bar
			$context['callout_tf'] = get_field('callout_tf', 'options');
			$context['callout_bar'] = get_field('callout_bar', 'options');
			
			$context['main_nav'] = new TimberMenu('main_nav');
			$context['footer_nav'] = new TimberMenu('footer_nav');
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

	require_once('lib/custom-types.php');
	require_once('lib/scripts-styles.php');
	require_once('lib/menus.php');
	require_once('lib/widgets.php'); 
	require_once('lib/utils.php'); 



// Disable code editor
function mtn_remove_editor_menu() {
    remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('mtn_admin_menu', 'mtn_remove_editor_menu', 1);



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

?>