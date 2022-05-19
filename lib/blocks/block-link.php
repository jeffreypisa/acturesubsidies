<?php

// ACF Block: Link
	
add_action( 'acf/init', 'acf_init_link' );
function acf_init_link() {
    // Check function exists.
    if( function_exists('acf_register_block') ) {
        
        // Register a new block.
        acf_register_block(array(
            'name'				=> 'link',
            'title'				=> __( 'Link', 'your-text-domain' ),
            'description'		=> __( 'Link naar een pagina of een bestand', 'your-text-domain' ),
            'render_callback'	=> 'acfblock_link',
            'category'			=> 'formatting',
            'icon'				=> 'admin-links',
            'keywords'		    => array( 'link' ),
        ) );
    }
}
function acfblock_link( $block, $content = '', $is_preview = false ) {
    $context = Timber::get_context();
    
    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields(); 

    // Store $is_preview value.
    $context['is_preview'] = $is_preview; 

    // Render the block.
    Timber::render( 'templates/block/link.twig', $context );
}