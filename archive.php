<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */
     
$templates = array( 'archive-' . $post->post_type . '.twig', 'archive.twig', 'index.twig' );

$context = Timber::get_context();

if ( is_tag() ) {
	$context['title'] = single_tag_title( '', false );
} elseif ( is_category() ) {
	$context['title'] = single_cat_title( '', false );
	array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
} elseif ( is_post_type_archive() ) {
	$context['title'] = post_type_archive_title( '', false );
	array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
}

$postType = get_queried_object();
$thisPostType = $postType->labels->name;
$currentPostType = get_post_type();

if ($currentPostType == 'post') {
	$thisPostTypeLink = '/blog';
} else {
	$thisPostTypeLink = get_post_type_archive_link($currentPostType);
}

$context['posttype'] = $thisPostType;
$context['posttype_link'] = $thisPostTypeLink;
$context['posttype_current'] = $currentPostType;

// Get posts

// Get taxonomies

$quoteterms = \Timber::get_terms(array('taxonomy' => 'quote-categorie', 'hide_empty' => true)); 
$context['quoteterms'] = $quoteterms;

/* Load categories */

if ($currentPostType == 'kennisbank') {
	$termcat = 'kennisbank_cat'; 
	$terms = \Timber::get_terms(array('taxonomy' => $termcat, 'hide_empty' => true, 'parent' => 0 )); 
	$context['categories'] = $terms;
	
	$postcatid = get_queried_object()->term_id;
	$context['current_category'] = $postcatid;
	
	/* Load posts */
	
	$args = array(
	  'post_type'			  => $posttype_current,
		'posts_per_page'  => -1,
		'tax_query' 			=> array(
		    array(
		        'taxonomy' => $termcat,
		        'field' => 'term_id',
		        'terms' => $postcatid,
		    ),
		  ),
	);

} elseif ($currentPostType == 'changelog') {
	$termcat = 'changelog_cat'; 
	$terms = \Timber::get_terms(array('taxonomy' => $termcat, 'hide_empty' => true, 'parent' => 0 )); 
	$context['categories'] = $terms;
	
	$postcatid = get_queried_object()->term_id;
	$context['current_category'] = $postcatid;
	
	/* Load posts */
	
	$args = array(
	  'post_type'			  => $posttype_current,
		'posts_per_page'  => -1,
		'tax_query' 			=> array(
		    array(
		        'taxonomy' => $termcat,
		        'field' => 'term_id',
		        'terms' => $postcatid,
		    ),
		  ),
	);

} else {
	
	$termcat = 'category';
	
	$terms = \Timber::get_terms(array('taxonomy' => $termcat, 'hide_empty' => true)); 
	$context['categories'] = $terms;
	
	$postcatid = get_queried_object()->term_id;
	$context['current_category'] = $postcatid;
	
	/* Load posts */
	
	$args = array(
	  'post_type'			  => $posttype_current,
		'posts_per_page'  => -1,
		'tax_query' => array(
		    array(
		        'taxonomy' => $termcat,
		        'field' => 'term_id',
		        'terms' => $postcatid,
		    ),
		  ),
	);

}

$context['posts'] = Timber::get_posts($args);

Timber::render( $templates, $context );