<?php

// ACF Block: Table
	
add_action( 'acf/init', 'acf_init_table' );
function acf_init_table() {
    // Check function exists.
    if( function_exists('acf_register_block') ) {
        
        // Register a new block.
        acf_register_block(array(
            'name'				=> 'table',
            'title'				=> __( 'Tabel', 'your-text-domain' ),
            'description'		=> __( 'Informatie gegroepeerd weergeven', 'your-text-domain' ),
            'render_callback'	=> 'acfblock_table',
            'category'			=> 'formatting',
            'icon'				=> 'excerpt-view',
            'keywords'		    => array( 'tabel' ),
        ) );
    }
}
function acfblock_table( $block, $content = '', $is_preview = false ) {
    $context = Timber::get_context();
    
    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields(); 

    // Store $is_preview value.
    $context['is_preview'] = $is_preview; 

    // Render the block.
    Timber::render( 'templates/block/table.twig', $context );
}