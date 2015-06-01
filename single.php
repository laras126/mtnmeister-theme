<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */


$context = Timber::get_context();
$post = Timber::query_post();

$context['post'] = $post;
$context['wp_title'] .= ' - ' . $post->title();
$context['comment_form'] = TimberHelper::get_comment_form();

$context['categories'] = Timber::get_terms('category');
$context['tags'] = Timber::get_terms('post_tag');

$context['sidebar'] = Timber::get_widgets('blog_sidebar');
$context['sidebar_class'] = 'has-sidebar';


// $context['connected_meisters'] = Timber::get_posts($meister_args);




// ----
// Related Meisters
// ----

// Get 4 Meister posts (excluding current post)
$related_args = array(  
	'post_type' => 'meister',
	'posts_per_page' => 6,
	'orderby' => 'rand'
);

// First relate them by category, 
// If not that, then tag,
// Otherwise, just 4 random ones.

if( has_category() ) {
	$post_cat = $post->get_terms('category');
	$post_cat = $post_cat[0]->ID;

	$related_args['cat'] = $post_cat;
	
} else if ( has_tag() ) {
	$post_tag = $post->get_terms('tag');
	$post_tag = $post_tag[0]->ID;
	
	$related_args['tax_query']['terms'] = $post_tag;
}

// Add those posts to the page context
$context['related_meisters'] = Timber::get_posts($related_args);



// ----
// If password protected
// ----

if (post_password_required($post->ID)){
	Timber::render('single-password.twig', $context);
} else {
	Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
}