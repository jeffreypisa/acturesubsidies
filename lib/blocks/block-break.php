<?php

// ACF Block: break
	
add_action( 'acf/init', 'acf_init_break' );
function acf_init_break() {
    // Check function exists.
    if( function_exists('acf_register_block') ) {
        
        // Register a new block.
        acf_register_block(array(
            'name'				=> 'break',
            'title'				=> __( 'Ruimte tussen onderdelen', 'your-text-domain' ),
            'description'		=> __( 'Informatie gegroepeerd weergeven', 'your-text-domain' ),
            'render_callback'	=> 'acfblock_break',
            'category'			=> 'formatting',
            'icon'				=> 'image-flip-vertical',
            'keywords'		    => array( 'tabel' ),
        ) );
    }
}
function acfblock_break( $block, $content = '', $is_preview = false ) {
    $context = Timber::get_context();
    
    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields(); 

    // Store $is_preview value.
    $context['is_preview'] = $is_preview; 

    // Render the block.
    Timber::render( 'templates/block/break.twig', $context );
}