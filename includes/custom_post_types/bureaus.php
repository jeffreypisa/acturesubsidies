<?php
/* --- Register Custom Post Type
================================== */

add_action( 'init', 'register_custom_post_type_bureau' );

function register_custom_post_type_bureau() {

    $labels = array(
		'menu_name'				=> "Bureau's",
		'name'					=> "Bureau's",
		'singular_name'			=> "Bureau",
		'add_new'				=> 'Nieuw bureau toevoegen',
		'add_new_item'			=> 'Nieuw bureau toevoegen',
		'edit_item'				=> 'Bewerk bureau',
		'new_item'				=> 'Nieuw bureau toevoegen',
		'view_item'				=> 'Toon bureau',
		'search_items'			=> 'Zoek bureau(s)',
		'not_found'				=> 'Geen bureau(s) gevonden',
		'not_found_in_trash'	=> 'Geen bureau(s) gevonden in de prullenmand',
		'parent_item_colon'		=> 'Huidig bureau:',
    );

	$args = array(
		'labels'				=> $labels,
		'hierarchical'			=> false,
		'supports'				=> array( 'title', 'editor', 'thumbnail'),
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'menu_position'			=> 5,
		'menu_icon'				=> 'dashicons-admin-multisite',
		'show_in_nav_menus'		=> true,
		'publicly_queryable'	=> true,
		'exclude_from_search'	=> true,
		'has_archive'			=> false,
		'query_var'				=> true,
		'can_export'			=> true,
		'rewrite'				=> true,
		'capability_type'		=> 'post',
		'taxonomies' 			=> array('post_tag')
	);

    register_post_type( 'bureau', $args );
}
?>