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
			$context['stuff'] = 'I am a value set in your functions.php file';
			$context['notes'] = 'These values are available everytime you call Timber::get_context();';
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


?>