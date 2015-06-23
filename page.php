<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
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

// Get Header Images
$image_args = array( 
				'post_type' => 'header_image', 
				'posts_per_page' => -1,
				'paged' => $paged
			);

// ---
// Start the context 
// ---

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['header_images'] = Timber::get_posts($image_args);


// Get post type content. Ideally page names would not be hardcoded here, should likely use archive-meisters.twig, etc. instead of the page template. 
if( is_page('Meisters') ) {
	$context['meisters'] = Timber::get_posts($meister_args);
} elseif( is_page('Deals') ) {
	$context['deals'] = Timber::get_posts($deal_args);
} elseif( is_page('Blog') ) {
	$context['posts'] = Timber::get_posts($post_args);
}


// TODO: These should be within theme options or something, and not hardcoded page names.
// Sidebar, not on deals page
if( !is_page('Meisters') ) {
	$context['sidebar'] = Timber::get_sidebar('sidebar.php');
	$context['sidebar_class'] = 'has-sidebar';
}

// TODO: um, pagination. Or AJAX request the meisters on scroll, that could be cool.
// $context['pagination'] = Timber::get_pagination();

Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);

?>