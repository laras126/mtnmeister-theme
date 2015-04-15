<?php 

/**
 * Home page widgets
 */

function mtn_home_widgets() {

	$args = array(
		'id'            => 'home_widgets',
		'name'          => __( 'Homepage Widgets', 'mtnmeister' ),
		'description'   => __( 'Widgets on the hompage for dynamic content.', 'mtnmeister' ),
		'class'         => 'widgets-home',
		'before_widget' => '<li class="widget">',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	);
	register_sidebar( $args );

}

// add_action( 'widgets_init', 'mtn_home_widgets' );


/**
 * Footer widgets
 */

function mtn_footer_widgets() {

	$args = array(
		'id'            => 'footer_widgets',
		'name'          => __( 'Footer Widgets', 'mtnmeister' ),
		'description'   => __( 'Widgets in the footer. No more than 4.', 'mtnmeister' ),
		'class'         => 'widgets-footer',
		'before_widget' => '<div class="col-sm-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
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
		'description'   => __( 'The sidebar appearing througout the site. Good spot for ads and anything promotional', 'mtnmeister' ),
		'class'         => 'widgets-sidebar',
		'before_widget' => '<li class="widget">',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	);
	register_sidebar( $args );

}

add_action( 'widgets_init', 'mtn_global_sidebar' );

/**
 * Support page sidebar
 */

function mtn_support_sidebar() {

	$args = array(
		'id'            => 'support_sidebar',
		'name'          => __( 'Support Sidebar', 'mtnmeister' ),
		'description'   => __( 'Logos of sponsors on the Support page.', 'mtnmeister' ),
		'class'         => 'widgets-sidebar',
		'before_widget' => '<li class="widget">',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	);
	register_sidebar( $args );

}

add_action( 'widgets_init', 'mtn_support_sidebar' );


?>