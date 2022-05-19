<?php

// ACF Block: Info
	
add_action( 'acf/init', 'acf_init_info' );
function acf_init_info() {
    // Check function exists.
    if( function_exists('acf_register_block') ) {
        
        // Register a new block.
        acf_register_block(array(
            'name'				=> 'info',
            'title'				=> __( 'Informatie blok', 'your-text-domain' ),
            'description'		=> __( 'Deze content wordt weergegeven in een grijs vlak', 'your-text-domain' ),
            'render_callback'	=> 'acfblock_info',
            'category'			=> 'formatting',
            'icon'				=> 'info',
            'keywords'		    => array( 'info' ),
        ) );
    }
}
function acfblock_info( $block, $content = '', $is_preview = false ) {
    $context = Timber::get_context();
    
    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields(); 

    // Store $is_preview value.
    $context['is_preview'] = $is_preview; 

    // Render the block.
    Timber::render( 'templates/block/info.twig', $context );
}