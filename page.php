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

$length = 20;
$text = get_field('meister_bio');
// $words = explode(' ', $text);
// array_splice($words, $length);
// $text = implode(' ', $words);
// echo $text;
 
// Custom type Args and Pagination
global $paged;

if (!isset($paged) || !$paged){
    $paged = 1;
}


// Get the meister and deal post types for custom page templates
$meister_args = array( 
				'post_type' => 'meister', 
				'posts_per_page' => 10,
				'paged' => $paged
			);

$deal_args = array( 
				'post_type' => 'deal',
				'posts_per_page' => 10,
    			'paged' => $paged
    		);


if( is_page('Meisters') ) {
	query_posts($meister_args);
} elseif( is_page('Deals') ) {
	query_posts($deal_args);
}

// Start the context 

$context = Timber::get_context();
$post = new TimberPost();

// Get Meister and Deal posts
$context['meisters'] = Timber::get_posts($meister_args);
$context['deals'] = Timber::get_posts($deal_args);

$context['pagination'] = Timber::get_pagination();
$context['post'] = $post;

// $context['excerpt'] = $text;

// Sidebar
$context['sidebar'] = Timber::get_sidebar('sidebar.php');
$context['sidebar_class'] = 'has-sidebar';


/* make sure you've got query_posts in your .php file */
$context['posts'] = Timber::get_posts();
$context['pagination'] = Timber::get_pagination();

Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);

