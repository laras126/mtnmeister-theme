<?php

/**
 * Template Name: Find A Meister
 */


$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$args = array(
	'type'                     => 'meister',
	'child_of'                 => 0,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'taxonomy'                 => 'category',
	'pad_counts'               => false 
); 

$categories = get_categories( $args );
$context['cats'] = $categories;

Timber::render(array('page-find-meister.twig'), $context);
