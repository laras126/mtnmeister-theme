<?php

/**
 *
 * Meister Custom Type
 *
 */

// Register Custom Post Type
// function mtn_meister_post_type() {

	$labels = array(
		'name'                => __( 'Meisters', 'Post Type General Name', 'mtnmeister' ),
		'singular_name'       => __( 'Meister', 'Post Type Singular Name', 'mtnmeister' ),
		'menu_name'           => __( 'Meisters', 'mtnmeister' ),
		'parent_item_colon'   => __( 'Parent Meister:', 'mtnmeister' ),
		'all_items'           => __( 'All Meisters', 'mtnmeister' ),
		'view_item'           => __( 'View Meister', 'mtnmeister' ),
		'add_new_item'        => __( 'Add New Meister', 'mtnmeister' ),
		'add_new'             => __( 'Add New', 'mtnmeister' ),
		'edit_item'           => __( 'Edit Meister', 'mtnmeister' ),
		'update_item'         => __( 'Update Meister', 'mtnmeister' ),
		'search_items'        => __( 'Search Meister', 'mtnmeister' ),
		'not_found'           => __( 'Not found', 'mtnmeister' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'mtnmeister' ),
	);
	$rewrite = array(
		'slug'                => 'meister',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'meister', 'mtnmeister' ),
		'description'         => __( 'The object for Meisters and Episodes', 'mtnmeister' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_rest' 		  => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_icon'           => 'dashicons-admin-users',
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'meister', $args );


/**
 *
 * Custom type for Gear
 *
 */

$labels = array(
	'name'                => _x( 'Gear', 'Post Type General Name', 'mtnmeister' ),
	'singular_name'       => _x( 'Gear', 'Post Type Singular Name', 'mtnmeister' ),
	'menu_name'           => __( 'Gear', 'mtnmeister' ),
	'parent_item_colon'   => __( 'Parent Gear:', 'mtnmeister' ),
	'all_items'           => __( 'All Gear', 'mtnmeister' ),
	'view_item'           => __( 'View Gear', 'mtnmeister' ),
	'add_new_item'        => __( 'Add New Gear', 'mtnmeister' ),
	'add_new'             => __( 'Add Gear', 'mtnmeister' ),
	'edit_item'           => __( 'Edit Gear', 'mtnmeister' ),
	'update_item'         => __( 'Update Gear', 'mtnmeister' ),
	'search_items'        => __( 'Search Gear', 'mtnmeister' ),
	'not_found'           => __( 'Not found', 'mtnmeister' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'mtnmeister' ),
);
$args = array(
	'label'               => __( 'gear', 'mtnmeister' ),
	'description'         => __( 'Gear from episodes and deals.', 'mtnmeister' ),
	'labels'              => $labels,
	'supports'            => array( 'title', 'thumbnail' ),
	'taxonomies'          => array( 'category', 'post_tag' ),
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_rest' 		  => true,
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-shield',
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'capability_type'     => 'page',
);
register_post_type( 'gear', $args );


/**
 *
 * Custom type for Meister Deals
 *
 */

$labels = array(
	'name'                => _x( 'Deals', 'Post Type General Name', 'mtnmeister' ),
	'singular_name'       => _x( 'Deal', 'Post Type Singular Name', 'mtnmeister' ),
	'menu_name'           => __( 'Deals', 'mtnmeister' ),
	'parent_item_colon'   => __( 'Parent Deal:', 'mtnmeister' ),
	'all_items'           => __( 'All Deals', 'mtnmeister' ),
	'view_item'           => __( 'View Deal', 'mtnmeister' ),
	'add_new_item'        => __( 'Add New Deal', 'mtnmeister' ),
	'add_new'             => __( 'Add Deal', 'mtnmeister' ),
	'edit_item'           => __( 'Edit Deal', 'mtnmeister' ),
	'update_item'         => __( 'Update Deal', 'mtnmeister' ),
	'search_items'        => __( 'Search Deal', 'mtnmeister' ),
	'not_found'           => __( 'Not found', 'mtnmeister' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'mtnmeister' ),
);
$rewrite = array(
	'slug'                => 'deal',
	'with_front'          => true,
	'pages'               => true,
	'feeds'               => true,
);
$args = array(
	'label'               => __( 'deal', 'mtnmeister' ),
	'description'         => __( 'Meister Deal', 'mtnmeister' ),
	'labels'              => $labels,
	'supports'            => array( 'title', 'thumbnail' ),
	'taxonomies'          => array( 'category', 'post_tag' ),
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_rest' 		  => true,
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-tag',
	'can_export'          => true,
	'has_archive'         => false,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'capability_type'     => 'page',
	'rewrite' 			  => $rewrite
);
register_post_type( 'deal', $args );



?>