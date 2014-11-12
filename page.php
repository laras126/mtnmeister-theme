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


// Custom type Args and Pagination
// global $paged;

// if (!isset($paged) || !$paged){
//     $paged = 1;
// }


// Get a random header image
$rows = get_field('header_images' ); // get all the rows
$rand_row = $rows[ array_rand( $rows ) ]; // get a random row



// ---
// Custom Post Type Args
// ---

// Exclude the most recent post
$meister_args = array( 
				'post_type' => 'meister', 
				'posts_per_page' => 10,
				'paged' => $paged,
				'offset' => 1
			);

// Get the most recent post for "Today's episode"
$todays_meister_args = array( 
				'post_type' => 'meister', 
				'posts_per_page' => 1,
				'showposts' => 1
			);

// Get deals
$deal_args = array( 
				'post_type' => 'deal',
				'posts_per_page' => 10,
    			'paged' => $paged
    		);


// ---
// Start the context 
// ---

$context = Timber::get_context();
$post = new TimberPost();

// Get a random header image
$context['header_image'] = $rand_row;
$context['post'] = $post;

// Get custom type content
if( is_page('Meisters') ) {
	// Get Meister and Deal posts
	$context['meisters'] = Timber::get_posts($meister_args);
	$context['todays_meister'] = Timber::get_posts($todays_meister_args);
} elseif( is_page('Deals') ) {
	$context['deals'] = Timber::get_posts($deal_args);
}

// Sidebar
$context['sidebar'] = Timber::get_sidebar('sidebar.php');
$context['sidebar_class'] = 'has-sidebar';

/* make sure you've got query_posts in your .php file */
if( !is_page('Meisters') && !is_page('Deals') ) {
	$context['posts'] = Timber::get_posts();
}

$context['pagination'] = Timber::get_pagination();

Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);

