<?php

// ACF Block: Youtube
	
add_action( 'acf/init', 'acf_init_youtube' );
function acf_init_youtube() {
    // Check function exists.
    if( function_exists('acf_register_block') ) {
        
        // Register a new block.
        acf_register_block(array(
            'name'				=> 'youtube',
            'title'				=> __( 'Youtube', 'your-text-domain' ),
            'description'		=> __( 'Deze content wordt weergegeven in een grijs vlak', 'your-text-domain' ),
            'render_callback'	=> 'acfblock_youtube',
            'category'			=> 'formatting',
            'icon'				=> 'video-alt3',
            'keywords'		    => array( 'youtube' ),
        ) );
    }
}
function acfblock_youtube( $block, $content = '', $is_preview = false ) {
    $context = Timber::get_context();
    
    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields(); 

    // Store $is_preview value.
    $context['is_preview'] = $is_preview; 

    // Render the block.
    Timber::render( 'templates/block/youtube.twig', $context );
}