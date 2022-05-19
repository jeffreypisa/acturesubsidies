<?php
/* --- Register Custom Post Type
================================== */

add_action( 'init', 'register_custom_post_type_specialist' );

function register_custom_post_type_specialist() {

    $labels = array(
		'menu_name'				=> 'Adviseurs',
		'name'					=> 'Adviseurs',
		'singular_name'			=> 'Adviseur',
		'add_new'				=> 'Nieuwe adviseur toevoegen',
		'add_new_item'			=> 'Nieuwe adviseur toevoegen',
		'edit_item'				=> 'Bewerk adviseur',
		'new_item'				=> 'Nieuwe adviseur toevoegen',
		'view_item'				=> 'Toon adviseur',
		'search_items'			=> 'Zoek adviseur(s)',
		'not_found'				=> 'Geen adviseur(s) gevonden',
		'not_found_in_trash'	=> 'Geen adviseur(s) gevonden in de prullenmand',
		'parent_item_colon'		=> 'Huidige adviseur:',
    );

	$args = array(
		'labels'				=> $labels,
		'hierarchical'			=> false,
		'supports'				=> array( 'title','thumbnail','editor','excerpt' ),
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'menu_position'			=> 5,
		'menu_icon'				=> 'dashicons-groups',
		'show_in_nav_menus'		=> true,
		'publicly_queryable'	=> true,
		'exclude_from_search'	=> true,
		'has_archive'			=> true,
		'query_var'				=> true,
		'can_export'			=> true,
		'rewrite'            	=> array( 'slug' => 'adviseur' ),
		'capability_type'		=> 'post'
	);

    register_post_type( 'specialist', $args );
}

/* --- CPT taxonomy: Provincies
================================ */

add_action( 'init', 'taxonomy_provinces', 0 );

function taxonomy_provinces() {

	$tax_labels = array(
		'menu_name'				=> 'Provincies',
	    'name'					=> 'Provincie',
	    'singular_name'			=> 'Provincie',
	    'search_items'			=> 'Zoek provincies',
	    'popular_items'			=> 'Populaire provincies',
	    'all_items'				=> 'Alle provincies',
	    'edit_item'				=> 'Bewerk provincie',
	    'update_item'			=> 'Provincie bijwerken',
	    'add_new_item'			=> 'Nieuwe provincie toevoegen',
	    'new_item_name'			=> 'Nieuwe provincie',
	    'add_or_remove_items'	=> 'Provincie toevoegen of verwijderen',
	    'not_found'				=> 'Geen provincies gevonden.',
	  );

	  register_taxonomy('provincie',array('specialist'), array(
	    'labels'				=> $tax_labels,
	    'hierarchical'			=> true,
	    'show_ui'				=> true,
	    'show_admin_column'		=> true,
	    'show_in_nav_menus'		=> false,
	    'query_var'				=> true,
	  ));
}

/* --- CPT taxonomy: Regio's
================================ */

add_action( 'init', 'taxonomy_regions', 0 );

function taxonomy_regions() {

	$tax_labels = array(
		'menu_name'				=> "Regio's",
	    'name'					=> 'Regio',
	    'singular_name'			=> 'Regio',
	    'search_items'			=> "Zoek regio's",
	    'popular_items'			=> "Populaire regio's",
	    'all_items'				=> "Alle regio's",
	    'edit_item'				=> "Bewerk regio's",
	    'update_item'			=> 'Regio bijwerken',
	    'add_new_item'			=> 'Nieuwe regio toevoegen',
	    'new_item_name'			=> 'Nieuwe regio',
	    'add_or_remove_items'	=> 'Regio toevoegen of verwijderen',
	    'not_found'				=> "Geen regio's gevonden.",
	  );

	  register_taxonomy('regio',array('specialist'), array(
	    'labels'				=> $tax_labels,
	    'hierarchical'			=> true,
	    'show_ui'				=> true,
	    'show_admin_column'		=> true,
	    'show_in_nav_menus'		=> false,
	    'query_var'				=> true,
	  ));
}

/* --- CPT taxonomy: Gemeenten
================================ */

add_action( 'init', 'taxonomy_gemeentes', 0 );

function taxonomy_gemeentes() {

	$tax_labels = array(
		'menu_name'				=> 'Gemeentes',
	    'name'					=> 'Gemeente',
	    'singular_name'			=> 'Gemeente',
	    'search_items'			=> 'Zoek gemeentes',
	    'popular_items'			=> 'Populaire gemeentes',
	    'all_items'				=> 'Alle gemeentes',
	    'edit_item'				=> 'Bewerk gemeente',
	    'update_item'			=> 'Gemeente bijwerken',
	    'add_new_item'			=> 'Nieuwe gemeente toevoegen',
	    'new_item_name'			=> 'Nieuwe gemeente',
	    'add_or_remove_items'	=> 'Gemeente toevoegen of verwijderen',
	    'not_found'				=> 'Geen gemeentes gevonden.',
	  );

	  register_taxonomy('gemeente',array('specialist'), array(
	    'labels'				=> $tax_labels,
	    'hierarchical'			=> true,
	    'show_ui'				=> true,
	    'show_admin_column'		=> true,
	    'show_in_nav_menus'		=> false,
	    'query_var'				=> true,
	  ));
}

/* --- CPT taxonomy: Plaatsen
================================ */

add_action( 'init', 'taxonomy_cities', 0 );

function taxonomy_cities() {

	$tax_labels = array(
		'menu_name'				=> 'Plaatsen',
	    'name'					=> 'Plaats',
	    'singular_name'			=> 'Plaats',
	    'search_items'			=> 'Zoek plaatsen',
	    'popular_items'			=> 'Populaire plaatsen',
	    'all_items'				=> 'Alle plaatsen',
	    'edit_item'				=> 'Bewerk plaats',
	    'update_item'			=> 'Plaats bijwerken',
	    'add_new_item'			=> 'Nieuwe plaats toevoegen',
	    'new_item_name'			=> 'Nieuwe plaats',
	    'add_or_remove_items'	=> 'Plaats toevoegen of verwijderen',
	    'not_found'				=> 'Geen plaatsen gevonden.',
	  );

	  register_taxonomy('plaats',array('specialist'), array(
	    'labels'				=> $tax_labels,
	    'hierarchical'			=> true,
	    'show_ui'				=> true,
	    'show_admin_column'		=> true,
	    'show_in_nav_menus'		=> false,
	    'query_var'				=> true,
	  ));
}

/* --- CPT taxonomy: SEO gebieden
================================ */

add_action( 'init', 'taxonomy_locatie', 0 );

function taxonomy_locatie() {

	$tax_labels = array(
		'menu_name'				=> 'SEO gebieden',
	    'name'					=> 'SEO gebied',
	    'singular_name'			=> 'SEO gebied',
	    'search_items'			=> 'Zoek SEO gebieden',
	    'popular_items'			=> 'Populaire SEO gebieden',
	    'all_items'				=> 'Alle SEO gebieden',
	    'edit_item'				=> 'Bewerk SEO gebied', 
	    'update_item'			=> 'SEO gebied bijwerken',
	    'add_new_item'			=> 'Nieuw SEO gebied toevoegen',
	    'new_item_name'			=> 'Nieuw SEO gebied',
	    'add_or_remove_items'	=> 'SEO gebied toevoegen of verwijderen',
	    'not_found'				=> 'Geen SEO gebieden gevonden.',
	  );
	
	  register_taxonomy('locatie',array('specialist'), array(
	    'labels'				=> $tax_labels,
	    'hierarchical'			=> true,
	    'show_ui'				=> true,
	    'show_admin_column'		=> true,
	    'show_in_nav_menus'		=> false,
	    'query_var'				=> true,
	  ));
}
?>