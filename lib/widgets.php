<?php 

/**
 * Home page widgets
 */

function mtn_home_widgets() {

	$args = array(
		'id'            => 'home_widgets',
		'name'          => __( 'Footer Widgets', 'mtnmeister' ),
		'description'   => __( 'Widgets on the hompage, hey!', 'mtnmeister' ),
		'class'         => 'widgets-home',
	);
	register_sidebar( $args );

}

add_action( 'widgets_init', 'mtn_home_widgets' );


/**
 * Footer widgets
 */

function mtn_footer_widgets() {

	$args = array(
		'id'            => 'footer_widgets',
		'name'          => __( 'Footer Widgets', 'mtnmeister' ),
		'description'   => __( 'Widgets in the footer, hey!', 'mtnmeister' ),
		'class'         => 'widgets-footer',
	);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'mtn_footer_widgets' );


/**
 * Global Sidebar
 */

function mtn_global_sidebar() {

	$args = array(
		'id'            => 'global_sidebar',
		'name'          => __( 'Global Sidebar', 'mtnmeister' ),
		'description'   => __( 'The sidebar appearing everywhere.', 'mtnmeister' ),
		'class'         => 'widgets-sidebar',
	);
	register_sidebar( $args );

}

add_action( 'widgets_init', 'mtn_global_sidebar' );


?>