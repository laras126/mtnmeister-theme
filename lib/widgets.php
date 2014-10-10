<?php 

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


// Register Footer widget area
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

?>