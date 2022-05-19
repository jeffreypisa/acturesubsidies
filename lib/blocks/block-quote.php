<?php

// ACF Block: quote
	
add_action( 'acf/init', 'acf_init_quote' );
function acf_init_quote() {
    // Check function exists.
    if( function_exists('acf_register_block') ) {
        
        // Register a new block.
        acf_register_block(array(
            'name'				=> 'quote',
            'title'				=> __( 'Quote', 'your-text-domain' ),
            'description'		=> __( 'Quote', 'your-text-domain' ),
            'render_callback'	=> 'acfblock_quote',
            'category'			=> 'formatting',
            'icon'				=> 'format-quote',
            'keywords'		    => array( 'quote' ),
        ) );
    }
}
function acfblock_quote( $block, $content = '', $is_preview = false ) {
    $context = Timber::get_context();
    
    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields(); 

    // Store $is_preview value.
    $context['is_preview'] = $is_preview; 

    // Render the block.
    Timber::render( 'templates/block/quote.twig', $context );
}