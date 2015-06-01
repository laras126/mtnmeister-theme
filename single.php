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


// Get meister connected to gear

// in gear
// 	query meisters
		// Meisters with connected gear matching gears ID

// Returning a meister, separate loop


$rows = get_field('connected_gear' ); // get all the rows
$first_row = $rows[0]; // get the first row
$first_row_image = $first_row['time_in_episode']; // get the sub field value 

$id = get_the_ID();

// Get the meister with connected gear matching this.
// This needs to be going by the ID though, not the time in episode
$rows = $wpdb->get_results($wpdb->prepare( 
    "
    SELECT * 
    FROM {$wpdb->prefix}postmeta
    WHERE meta_key LIKE %s
        AND meta_value = %s
    ",
    'connected_gear_%_gear_item', // meta_name: $ParentName_$RowNumber_$ChildName
    $post // meta_value: 'type_3' for example
));

// Need to get the gear ID from the key

$meister_args = array( 
				'post_type' => 'meister', 
				'posts_per_page' => -1,
				'paged' => $paged,
				'meta_query' => array(
			        array(
			            'key' => 'episode_num',
			            'value' => '102',
			            'compare' => '='
			        )
			    )
			);

// $gear_arr = get_post_meta($meister_args[0]->ID, 'connected_gear');

// $context['meister_id'] = $gear_arr;
$context['test_g'] = Timber::get_posts($rows);
$context['id'] = $post->ID;

$context['test_q'] = Timber::get_posts($meister_args);;
$context['post'] = $post;
$context['wp_title'] .= ' - ' . $post->title();
$context['comment_form'] = TimberHelper::get_comment_form();

$context['categories'] = Timber::get_terms('category');
$context['tags'] = Timber::get_terms('post_tag');

$context['sidebar'] = Timber::get_widgets('blog_sidebar');
$context['sidebar_class'] = 'has-sidebar';


// $context['connected_meisters'] = Timber::get_posts($meister_args);



// ----
// Related posts
// ----

// Only get posts data on a single Meister page
if( is_singular('meister') ) {

	$this_post = $post->ID;
	
	// Get 4 Meister posts (excluding current post)
	$related_args = array(  
    	'post_type' => 'meister',
    	'post__not_in' => array( $this_post ),
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
}


if (post_password_required($post->ID)){
	Timber::render('single-password.twig', $context);
} else {
	Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
}