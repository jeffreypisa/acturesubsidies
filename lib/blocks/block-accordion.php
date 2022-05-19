<?php

// ACF Block: Accordion
	
add_action( 'acf/init', 'acf_init_accordion' );
function acf_init_accordion() {
    // Check function exists.
    if( function_exists('acf_register_block') ) {
        
        // Register a new block.
        acf_register_block(array(
            'name'				=> 'accordion',
            'title'				=> __( 'Accordion', 'your-text-domain' ),
            'description'		=> __( 'Accordion', 'your-text-domain' ),
            'render_callback'	=> 'acfblock_accordion',
            'category'			=> 'formatting',
            'icon'				=> 'list-view',
            'keywords'		    => array( 'accordion' ),
        ) );
    }
}
function acfblock_accordion( $block, $content = '', $is_preview = false ) {
    $context = Timber::get_context();
    
    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields(); 

    // Store $is_preview value.
    $context['is_preview'] = $is_preview; 

    // Render the block.
    Timber::render( 'templates/block/accordion.twig', $context );
}