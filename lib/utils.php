<?php 

/**
 *
 * Utility functions for cleaning up
 *
 */



// Meister title placeholder
function mtn_custom_type_title_text ( $title ) {
	if ( get_post_type() == 'meister' ) {
		$title = __( 'Meister Name' );
	} else if ( get_post_type() == 'deal' ) {
        $title = __( 'Deal Title' );
	} else if ( get_post_type() == 'gear' ) {
        $title = __( 'Gear Name' );
	}
	return $title;
} // End title_text_input()

add_filter( 'enter_title_here', 'mtn_custom_type_title_text' );




// Remove unused items from the Dashboard menu
function mtn_remove_menu_items(){
	remove_menu_page( 'edit.php' ); // Posts
	remove_menu_page( 'edit-comments.php' ); // Posts
	remove_menu_page( 'users.php' ); // Users
}
add_action( 'admin_menu', 'mtn_remove_menu_items' );


// Remove new post/user/media from +New menu item in the admin bar
function mtn_remove_wp_nodes() {
    global $wp_admin_bar;   
    $wp_admin_bar->remove_node( 'new-post' );
    $wp_admin_bar->remove_node( 'new-link' );
    $wp_admin_bar->remove_node( 'new-media' );
    $wp_admin_bar->remove_node( 'new-user' );
}
add_action( 'admin_bar_menu', 'mtn_remove_wp_nodes', 999 );

?>