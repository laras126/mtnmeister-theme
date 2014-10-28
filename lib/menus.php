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


// function special_nav_class($classes, $item){
//     if( in_array('current-menu-item', $classes) ){
//             $classes[] = 'active ';
//     }
//     return $classes;
// }
// add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

?>