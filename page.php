<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

// Get the meister and deal post types for custom page templates

$meister_args = array( 'post_type' => 'meister');
$deal_args = array( 'post_type' => 'deal');

$context = Timber::get_context();
$post = new TimberPost();

$context['meisters'] = Timber::get_posts($meister_args);
$context['deals'] = Timber::get_posts($deal_args);

$context['post'] = $post;

$context['sidebar'] = Timber::get_sidebar('sidebar.php');

Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);