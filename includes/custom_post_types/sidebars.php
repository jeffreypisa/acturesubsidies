<?php
/* --- Register Custom Post Type
================================== */

add_action( 'init', 'register_custom_post_type_zijbalk' );

function register_custom_post_type_zijbalk() {

    $labels = array(
		'menu_name'				=> 'Zijbalken',
		'name'					=> 'Zijbalken',
		'singular_name'			=> 'Zijbalk',
		'add_new'				=> 'Nieuwe zijbalk toevoegen',
		'add_new_item'			=> 'Nieuwe zijbalk toevoegen',
		'edit_item'				=> 'Bewerk zijbalk',
		'new_item'				=> 'Nieuwe zijbalk toevoegen',
		'view_item'				=> 'Toon zijbalk',
		'search_items'			=> 'Zoek zijbalk(en)',
		'not_found'				=> 'Geen zijbalk(en) gevonden',
		'not_found_in_trash'	=> 'Geen zijbalk(en) gevonden in de prullenmand',
		'parent_item_colon'		=> 'Huidige zijbalk:',
    );

	$args = array(
		'labels'				=> $labels,
		'hierarchical'			=> false,
		'supports'				=> array( 'title' ),
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'menu_position'			=> 58,
		'menu_icon'				=> 'dashicons-align-left',
		'show_in_nav_menus'		=> true,
		'publicly_queryable'	=> true,
		'exclude_from_search'	=> true,
		'has_archive'			=> false,
		'query_var'				=> true,
		'can_export'			=> true,
		'rewrite'				=> true,
		'capability_type'		=> 'post'
	);

    register_post_type( 'sidebar', $args );
}
?>