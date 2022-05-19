<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();

$currentPostType = get_post_type();

$context['posttype'] = $currentPostType;

$context['post'] = $post;

$postobject = get_queried_object();
$postType = get_post_type_object(get_post_type($postobject));

$thisPostType = $postType->labels->name;
$currentPostType = get_post_type();

if ($currentPostType == 'post') {
	$thisPostTypeLink = '/blog';
} elseif ($currentPostType == 'features') {
	$thisPostTypeLink = '/features';
} elseif ($currentPostType == 'kennisbank') {
	$thisPostTypeLink = '/kennisbank';
        
        
	if ( function_exists('yoast_breadcrumb') ) {
	  $context['breadcrumbs'] = yoast_breadcrumb('<ul id="breadcrumbs" class="mod-breadcrumbs-yoast"><span><a href="/kennisbank">Kennisbank</a> / </span>','</ul>', false );
	}

	// Let's first retrieve the category of the current post and find their IDs:
	
	$categories = get_the_terms( get_the_ID(), 'kennisbank_cat' );

	foreach ($categories as $category ) {
	  $category_ids[] = $category->term_id;
	}
	
	// We do the same for the tags:
	
	
	if(has_tag()) {
		$tags = get_the_terms( get_the_ID(), 'tag' );
		
		foreach ($tags as $tag) {
	    $tag_ids[] = $tag->term_id;
	  }
	  
	  // Then, we build a set of query arguments (we later feed to a WP_Query-call):
	                    
		$related_args = array(
	    'post_type'      => array(
	        'kennisbank',
	    ),
	    'post_status'    => 'publish',
	    'posts_per_page' => 3, // Get all posts
	    'post__not_in'   => array( get_the_ID() ), // Hide current post in list of related content
	    'tax_query'      => array(
	        'relation' => 'AND', // Make sure to mach both category and term
	        array(
	            'taxonomy' => 'kennisbank_cat',
	            'field'    => 'term_id',
	            'terms'    => $category_ids,
	        ),
	        array(
	            'taxonomy' => 'tag',
	            'field'    => 'term_id',
	            'terms'    => $tag_ids,
	        ),
	    ),
		);
	} else {
		$related_args = array(
	    'post_type'      => array(
	        'kennisbank',
	    ),
	    'post_status'    => 'publish',
	    'posts_per_page' => 3, // Get all posts
	    'post__not_in'   => array( get_the_ID() ), // Hide current post in list of related content
	    'tax_query'      => array(
	        array(
	            'taxonomy' => 'kennisbank_cat',
	            'field'    => 'term_id',
	            'terms'    => $category_ids,
	        )
	    ),
		);
	}

	$context['related'] = Timber::get_posts($related_args);
	
}

$args = array(
  'post_type'			  => 'post',
	'posts_per_page'  => 2,
);

$context['blog'] = Timber::get_posts($args);

$context['posttype'] = $thisPostType;
$context['posttype_link'] = $thisPostTypeLink;
$context['posttype_current'] = $thisPostType;

// Get taxonomies

$quoteterms = \Timber::get_terms(array('taxonomy' => 'quote-categorie', 'hide_empty' => true)); 
$context['quoteterms'] = $quoteterms;


if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
}