<?php
/**
* Template Name: Changelog
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
    

$context = Timber::get_context();

$post = new TimberPost();
$context['post'] = $post;

/* Load categories */

$terms = \Timber::get_terms(array('taxonomy' => 'changelog_cat', 'hide_empty' => true));
$context['categories'] = $terms;

$args = array(
  'post_type'			  => 'changelog',
  'posts_per_page'  => -1,
);
	
	
$context['posts'] = Timber::get_posts($args);

Timber::render( array( 'page-changelog.twig' ), $context );