<?php
/**
 * The Template for displaying all single posts
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 */

$context = array();
$context['footer_widgets'] = Timber::get_widgets('footer_widgets');
$context['home_widgets'] = Timber::get_widgets('home_widgets');
$context['global_sidebar'] = Timber::get_widgets('global_sidebar');

Timber::render('sidebar.twig', $context);