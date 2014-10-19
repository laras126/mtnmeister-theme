<?php
/**
 * The Template for displaying all single posts
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 */

$post = new TimberPost();

$context = array();

// These are various dynamic widget areas, but only global sidebar is currently in use.
$context['footer_widgets'] = Timber::get_widgets('footer_widgets');
$context['home_widgets'] = Timber::get_widgets('home_widgets');
$context['global_sidebar'] = Timber::get_widgets('global_sidebar');

// Get sidebars corresponding to page templates
Timber::render(array('sidebar-' . $post->post_name . '.twig', 'sidebar.twig'), $context);