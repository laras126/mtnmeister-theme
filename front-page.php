<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package 	WordPress
 * @subpackage 	Timber
 * @since 		Timber 0.1
 */

	if (!class_exists('Timber')){
		echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
		return;
	}

	$meister_args = array( 'post_type' => 'meister');
	$deal_args = array( 'post_type' => 'deal');

	$context = Timber::get_context();
	$context['meisters'] = Timber::get_posts($meister_args);
	$context['deals'] = Timber::get_posts($deal_args);
	$context['sidebar'] = Timber::get_sidebar('sidebar.php');
	
	$post = new TimberPost();
	$context['post'] = $post;

	$templates = array('front-page.twig');

	Timber::render($templates, $context);