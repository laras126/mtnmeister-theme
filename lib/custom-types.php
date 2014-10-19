<?php

/**
 *
 * Meister Custom Type
 *
 */

// Register Custom Post Type
function mtn_meister_post_type() {

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
		'supports'            => array( 'title', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
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

}

// Hook into the 'init' action
add_action( 'init', 'mtn_meister_post_type', 0 );


/**
 *
 * Taxonomy for Meister Types
 *
 */

// Register Custom Taxonomy
function mtn_meister_industry_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Industry', 'Taxonomy General Name', 'mtnmeister' ),
		'singular_name'              => _x( 'Industry', 'Taxonomy Singular Name', 'mtnmeister' ),
		'menu_name'                  => __( 'Industries', 'mtnmeister' ),
		'all_items'                  => __( 'All Industries', 'mtnmeister' ),
		'parent_item'                => __( 'Parent Industry', 'mtnmeister' ),
		'parent_item_colon'          => __( 'Parent Industry:', 'mtnmeister' ),
		'new_item_name'              => __( 'New Industry', 'mtnmeister' ),
		'add_new_item'               => __( 'Add Industry', 'mtnmeister' ),
		'edit_item'                  => __( 'Edit Industry', 'mtnmeister' ),
		'update_item'                => __( 'Update Industry', 'mtnmeister' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'mtnmeister' ),
		'search_items'               => __( 'Search Industries', 'mtnmeister' ),
		'add_or_remove_items'        => __( 'Add or remove Industries', 'mtnmeister' ),
		'choose_from_most_used'      => __( 'Choose from the most used Industries', 'mtnmeister' ),
		'not_found'                  => __( 'Not Found', 'mtnmeister' ),
	);
	$rewrite = array(
		'slug'                       => 'industry',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	// register_taxonomy( 'meister_industry', array( 'meister' ), $args );

}

// Hook into the 'init' action
// add_action( 'init', 'mtn_meister_industry_taxonomy', 0 );



/**
 *
 * Taxonomy for Meister Tags
 *
 */

// Register Custom Taxonomy
function mtn_meister_tag_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Meister Tags', 'Taxonomy General Name', 'mtnmeister' ),
		'singular_name'              => _x( 'Meister Tag', 'Taxonomy Singular Name', 'mtnmeister' ),
		'menu_name'                  => __( 'Meister Tags', 'mtnmeister' ),
		'all_items'                  => __( 'All Meister Tags', 'mtnmeister' ),
		'parent_item'                => __( 'Parent Meister Tag', 'mtnmeister' ),
		'parent_item_colon'          => __( 'Parent Meister Tag:', 'mtnmeister' ),
		'new_item_name'              => __( 'New Tag', 'mtnmeister' ),
		'add_new_item'               => __( 'Add Tag', 'mtnmeister' ),
		'edit_item'                  => __( 'Edit Tag', 'mtnmeister' ),
		'update_item'                => __( 'Update Tag', 'mtnmeister' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'mtnmeister' ),
		'search_items'               => __( 'Search Meister Tags', 'mtnmeister' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'mtnmeister' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags', 'mtnmeister' ),
		'not_found'                  => __( 'Not Found', 'mtnmeister' ),
	);
	$rewrite = array(
		'slug'                       => 'tag',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'menu_icon'           		 => 'dashicons-groups',
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	// register_taxonomy( 'meister_tag', array( 'meister' ), $args );

}

// Hook into the 'init' action
// add_action( 'init', 'mtn_meister_tag_taxonomy', 0 );


/**
 *
 * Custom type for Meister Deals
 *
 */

// Register Custom Post Type
function mtn_deal_post_type() {

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
		'supports'            => array( 'title' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
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

}

// Hook into the 'init' action
add_action( 'init', 'mtn_deal_post_type', 0 );


/**
 *
 * Change the title placeholder text for Custom Types
 *
 */

// Meister title placeholder
function mtn_custom_type_title_text ( $title ) {
	if ( get_post_type() == 'meister' ) {
		$title = __( 'Meister Name' );
	} else if ( get_post_type() == 'deal' ) {
        $title = __( 'Deal Title' );
	}
	return $title;
} // End title_text_input()

add_filter( 'enter_title_here', 'mtn_custom_type_title_text' );


?>