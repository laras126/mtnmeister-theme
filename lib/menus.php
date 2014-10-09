<?php 

// Register Navigation Menus
function mtn_custom_menus() {

	$locations = array(
		'main_nav' => __( 'Primary Menu', 'mtnmeister' ),
		'footer_nav' => __( 'Footer Links', 'mtnmeister' ),
	);
	register_nav_menus( $locations );

}

// Hook into the 'init' action
add_action( 'init', 'mtn_custom_menus' );

?>