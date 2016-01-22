<?php

/**
 * Template Name: Find A Meister
 */


// ---
// Custom Post Type Args
// ---

// Get Meisters
$meister_args = array( 
				'post_type' => 'meister', 
				'posts_per_page' => -1,
				'paged' => $paged
			);

// Get Deals
$deal_args = array( 
				'post_type' => 'deal',
				'posts_per_page' => 10,
    			'paged' => $paged,
    			'orderby' => 'menu_order'
    		);

// Get Blog Posts
$post_args = array( 
				'post_type' => 'post',
				'posts_per_page' => 10,
    			'paged' => $paged
    		);


// ---
// Start the context 
// ---

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$args = array(
	'type'                     => 'meister',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false 

); 

$categories = get_categories( $args );
$context['cats'] = $categories;

// TODO: These should be within theme options or something, and not hardcoded page names.
// Sidebar, not on deals page
// if( !is_page('Meisters') ) {
// 	$context['sidebar'] = Timber::get_sidebar('sidebar.php');
// 	$context['sidebar_class'] = 'has-sidebar';
// }

// TODO: um, pagination. Or AJAX request the meisters on scroll, that could be cool.
// $context['pagination'] = Timber::get_pagination();

Timber::render(array('page-find-meister.twig'), $context);

?>