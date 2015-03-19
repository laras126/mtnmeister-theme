<?php 

/**
 *
 * Utility functions and cleanup
 *
 */



// Meister title placeholder
function mtn_custom_type_title_text ( $title ) {
	if ( get_post_type() == 'meister' ) {
		$title = __( 'Meister Name' );
	} else if ( get_post_type() == 'deal' ) {
        $title = __( 'Deal Title' );
	} else if ( get_post_type() == 'gear' ) {
        $title = __( 'Gear Model' );
	}
	return $title;
} // End title_text_input()

add_filter( 'enter_title_here', 'mtn_custom_type_title_text' );



// Remove unused items from the Dashboard menu
function mtn_remove_menu_items(){
	remove_menu_page( 'edit.php' ); // Posts
	// remove_menu_page( 'edit-comments.php' ); // Posts
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



// Add a 'Very Simple' toolbar style for the WYSIWYG editor in ACF
// http://www.advancedcustomfields.com/resources/customize-the-wysiwyg-toolbars/
function mtn_acf_wysiwyg_toolbar( $toolbars ) {

	$toolbars['Text Based'] = array();

	// Only one row of buttons
	$toolbars['Text Based'][1] = array('formatselect' , 'bold' , 'link' , 'italic' , 'unlink' );

	return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars' , 'mtn_acf_wysiwyg_toolbar'  );



// Customize the editor style, from Roots.io 
// https://github.com/roots/roots-sass/blob/master/assets/css/editor-style.css
function mtn_editor_styles() {
	add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'mtn_editor_styles' );


// Make custom fields work with Yoast SEO (only impacts the light, but helpful!)
// https://imperativeideas.com/making-custom-fields-work-yoast-wordpress-seo/

if ( is_admin() ) { // check to make sure we aren't on the front end
	add_filter('wpseo_pre_analysis_post_content', 'mtn_add_custom_to_yoast');

	function mtn_add_custom_to_yoast( $content ) {
		global $post;
		$pid = $post->ID;
		
		$custom_content = '';

		$custom = get_post_custom($pid);
		unset($custom['_yoast_wpseo_focuskw']); // Don't count the keyword in the Yoast field!

		foreach( $custom as $key => $value ) {
			if( substr( $key, 0, 1 ) != '_' && substr( $value[0], -1) != '}' && !is_array($value[0]) && !empty($value[0])) {
			  $custom_content .= $value[0] . ' ';
			}
		}

		$content = $content . ' ' . $custom_content;
		return $content;

		remove_filter('wpseo_pre_analysis_post_content', 'mtn_add_custom_to_yoast'); // don't let WP execute this twice
	}
}



?>