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


// Remove new user/media from +New menu item in the admin bar
function mtn_remove_wp_nodes() {
    global $wp_admin_bar;   
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
	// add_filter('wpseo_pre_analysis_post_content', 'mtn_add_custom_to_yoast');

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


// Extend WordPress search to include custom fields
// http://adambalee.com

function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    
    return $join;
}
add_filter('posts_join', 'cf_search_join' );

function cf_search_where( $where ) {
    global $pagenow, $wpdb;
   
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );


// REST API
// Adding custom fields to the WP API JSON response

add_action( 'rest_api_init', 'mtn_register_api_hooks' );
function mtn_register_api_hooks() {

	$fields = array(
			'episode_num'
		);

    // Add the plaintext content to GET requests for individual posts
    foreach ($fields as $f) {
	    register_api_field(
	        'meister',
	        $f,
	        array(
	            'get_callback'    => 'mtn_return_cf_content',
	        )
	    );
    }

    register_api_field(
		'meister',
        'featured_image_url',
        array(
            'get_callback'    => 'mtn_return_feat_img',
        )
    );

    register_api_field(
		'meister',
        'formatted_date',
        array(
            'get_callback'    => 'mtn_return_date',
        )
    );
}

// Return plaintext content for posts
function mtn_return_cf_content( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}

// I think these can probably be in the same function
function mtn_return_feat_img( $object, $request ) {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $object['id'] ), 'single-post-thumbnail' );
	return $image[0];
}

function mtn_return_date($object, $request) {
    return get_the_date('F, Y');
	// return $date;
}


