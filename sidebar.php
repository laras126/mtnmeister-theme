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

$context['global_sidebar'] = Timber::get_widgets('global_sidebar');
$context['support_sidebar'] = Timber::get_widgets('support_sidebar');

// Get sidebars corresponding to page templates
Timber::render(array('sidebar-' . $post->post_name . '.twig', 'sidebar.twig'), $context);