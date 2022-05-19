<?php
/**
* Template Name: Kennisbank
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
    

$context = Timber::get_context();

$post = new TimberPost();
$context['post'] = $post;

/* Load categories */

$terms = \Timber::get_terms(array('taxonomy' => 'kennisbank_cat', 'hide_empty' => true));
$context['categories'] = $terms;

$context['posts'] = Timber::get_posts();

Timber::render( array( 'page-kennisbank.twig' ), $context );