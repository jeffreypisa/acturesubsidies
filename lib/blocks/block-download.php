<?php

// ACF Block: Download
	
add_action( 'acf/init', 'acf_init_download' );
function acf_init_download() {
    // Check function exists.
    if( function_exists('acf_register_block') ) {
        
        // Register a new block.
        acf_register_block(array(
            'name'				=> 'download',
            'title'				=> __( 'Download', 'your-text-domain' ),
            'description'		=> __( 'Bestand', 'your-text-domain' ),
            'render_callback'	=> 'acfblock_download',
            'category'			=> 'formatting',
            'icon'				=> 'download',
            'keywords'		    => array( 'download' ),
        ) );
    }
}
function acfblock_download( $block, $content = '', $is_preview = false ) {
    $context = Timber::get_context();
    
    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields(); 

    // Store $is_preview value.
    $context['is_preview'] = $is_preview; 

    // Render the block.
    Timber::render( 'templates/block/download.twig', $context );
}