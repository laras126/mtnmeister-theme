<?php 

// ----
// Home page widgets
// ----

// (Not using currently)

// $args = array(
// 	'id'            => 'home_widgets',
// 	'name'          => __( 'Homepage Widgets', 'mtnmeister' ),
// 	'description'   => __( 'Widgets on the hompage for dynamic content.', 'mtnmeister' ),
// 	'class'         => 'widgets-home',
// 	'before_widget' => '<li class="widget">',
// 	'after_widget'  => '</li>',
// 	'before_title'  => '<h4 class="widget-title">',
// 	'after_title'   => '</h4>'
// );
// register_sidebar( $args );

// ----
// Footer widgets
// ----


$fw_args = array(
	'id'            => 'footer_widgets',
	'name'          => __( 'Footer Widgets', 'mtnmeister' ),
	'description'   => __( 'Widgets in the footer. No more than 4.', 'mtnmeister' ),
	'class'         => 'widgets-footer',
	'before_widget' => '<div class="widget widget-fourth">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4 class="widget-title">',
	'after_title'   => '</h4>'
);
// register_sidebar( $fw_args );




// ----
// Global Sidebar
// ----

$gs_args = array(
	'id'            => 'global_sidebar',
	'name'          => __( 'Global Sidebar', 'mtnmeister' ),
	'description'   => __( 'The sidebar appearing througout the site. Good spot for ads and anything promotional', 'mtnmeister' ),
	'class'         => 'widgets-sidebar',
	'before_widget' => '<li class="widget widget-stacked">',
	'after_widget'  => '</li>',
	'before_title'  => '<h4 class="widget-title">',
	'after_title'   => '</h4>'
);
register_sidebar( $gs_args );




// ----
// Support page sidebar
// ----

$ss_args = array(
	'id'            => 'support_sidebar',
	'name'          => __( 'Support Sidebar', 'mtnmeister' ),
	'description'   => __( 'Logos of sponsors on the Support page.', 'mtnmeister' ),
	'class'         => 'widgets-sidebar',
	'before_widget' => '<li class="widget widget-stacked">',
	'after_widget'  => '</li>',
	'before_title'  => '<h4 class="widget-title">',
	'after_title'   => '</h4>'
);
register_sidebar( $ss_args );


?>