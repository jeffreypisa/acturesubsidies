<?php 
	
// Add styles

function wds_gutenberg_assets() {
	wp_enqueue_style( 'wds-gutenberg-admin', get_stylesheet_directory_uri() . '/assets/css/gutenberg.css', array(), '1.0.0' );
}
add_action( 'enqueue_block_assets', 'wds_gutenberg_assets' );


/**
 * Hide content editor pages.
 *
 */
 
add_action( 'admin_init', 'hide_editor' );

function hide_editor() {
  
    remove_post_type_support('page', 'editor');

}

/*
// Gutenberg blocks

include 'blocks/block-info.php';  
include 'blocks/block-link.php'; 
include 'blocks/block-download.php'; 
include 'blocks/block-accordion.php'; 
include 'blocks/block-quote.php'; 
include 'blocks/block-youtube.php'; 
include 'blocks/block-lead.php'; 
include 'blocks/block-break.php'; 

 Gutenberg editor

add_filter( 'allowed_block_types', 'misha_allowed_block_types' );
 
function misha_allowed_block_types( $allowed_blocks ) {
	return array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/imageslider',
		'acf/youtube',
		'acf/lead',
		'acf/info',
	);
}
*/
?>