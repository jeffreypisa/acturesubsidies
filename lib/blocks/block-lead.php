<?php

// ACF Block: Lead
	
add_action( 'acf/init', 'acf_init_lead' );
function acf_init_lead() {
    // Check function exists.
    if( function_exists('acf_register_block') ) {
        
        // Register a new block.
        acf_register_block(array(
            'name'				=> 'lead',
            'title'				=> __( 'Lead', 'your-text-domain' ),
            'description'		=> __( 'Lead tekst', 'your-text-domain' ),
            'render_callback'	=> 'acfblock_lead',
            'category'			=> 'formatting',
            'icon'				=> 'edit',
            'keywords'		    => array( 'lead' ),
        ) );
    }
}
function acfblock_lead( $block, $content = '', $is_preview = false ) {
    $context = Timber::get_context();
    
    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields(); 

    // Store $is_preview value.
    $context['is_preview'] = $is_preview; 

    // Render the block.
    Timber::render( 'templates/block/lead.twig', $context );
}