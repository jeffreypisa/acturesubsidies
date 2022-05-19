<?php
/* --- Register Custom Post Type
================================== */

add_action( 'init', 'register_custom_post_type_subsidies' );

function register_custom_post_type_subsidies() {

    $labels = array(
		'menu_name'				=> 'Subsidies',
		'name'					=> 'Subsidies',
		'singular_name'			=> 'Subsidie',
		'add_new'				=> 'Nieuwe subsidie toevoegen',
		'add_new_item'			=> 'Nieuwe subsidie toevoegen',
		'edit_item'				=> 'Bewerk subsidie',
		'new_item'				=> 'Nieuwe subsidie toevoegen',
		'view_item'				=> 'Toon subsidies',
		'search_items'			=> 'Zoek subsidie(s)',
		'not_found'				=> 'Geen subsidie(s) gevonden',
		'not_found_in_trash'	=> 'Geen subsidie(s) gevonden in de prullenmand',
		'parent_item_colon'		=> 'Huidige subsidie:',
    );

	$args = array(
		'labels'				=> $labels,
		'hierarchical'			=> false,
		'supports'				=> array( 'title', 'editor' ),
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'menu_position'			=> 5,
		'menu_icon'				=> 'dashicons-portfolio',
		'show_in_nav_menus'		=> true,
		'publicly_queryable'	=> true,
		'exclude_from_search'	=> false,
		'has_archive'			=> true,
		'query_var'				=> true,
		'can_export'			=> true,
		'capability_type'		=> 'post',
		'taxonomies' 			=> array('post_tag')
	);

    register_post_type( 'subsidie', $args );
}

/* --- CPT taxonomy: Thema's
================================== */

add_action( 'init', 'taxonomy_thema', 0 );

function taxonomy_thema()
{

	$tax_labels = array(
		'menu_name'				=> "Thema's",
	    'name'					=> "Thema",
	    'singular_name'			=> 'Thema',
	    'search_items'			=> "Zoek thema's",
	    'popular_items'			=> "Populaire thema's",
	    'all_items'				=> "Alle thema's",
	    'edit_item'				=> 'Bewerk thema',
	    'update_item'			=> 'Thema bijwerken',
	    'add_new_item'			=> 'Nieuw thema toevoegen',
	    'new_item_name'			=> 'Nieuw thema',
	    'add_or_remove_items'	=> 'Thema toevoegen of verwijderen',
	    'not_found'				=> "Geen thema's gevonden.",
	  );

	  register_taxonomy('thema',array('subsidie'), array(
	    'labels'				=> $tax_labels,
	    'hierarchical'			=> true,
	    'show_ui'				=> true,
	    'show_admin_column'		=> true,
	    'show_in_nav_menus'		=> false,
	    'query_var'				=> true,
	  ));
}

/* --- CPT taxonomy: Moeilijkheidsgraad
================================ */

add_action( 'init', 'taxonomy_moeilijkheidsgraad', 0 );

function taxonomy_moeilijkheidsgraad()
{

	$tax_labels = array(
		'menu_name'				=> 'Moeilijkheidsgraad',
	    'name'					=> 'Moeilijkheidsgraad',
	    'singular_name'			=> 'Moeilijkheidsgraad',
	    'search_items'			=> 'Zoek moeilijkheidsgraad',
	    'popular_items'			=> 'Populaire moeilijkheidsgraad',
	    'all_items'				=> 'Alle moeilijkheidsgraad',
	    'edit_item'				=> 'Bewerk moeilijkheidsgraad',
	    'update_item'			=> 'Moeilijkheidsgraad bijwerken',
	    'add_new_item'			=> 'Nieuwe moeilijkheidsgraad toevoegen',
	    'new_item_name'			=> 'Nieuwe moeilijkheidsgraad',
	    'add_or_remove_items'	=> 'Moeilijkheidsgraad toevoegen of verwijderen',
	    'not_found'				=> 'Geen moeilijkheidsgraad gevonden.',
	  );

	  register_taxonomy('moeilijkheidsgraad',array('subsidie'), array(
	    'labels'				=> $tax_labels,
	    'hierarchical'			=> true,
	    'show_ui'				=> true,
	    'show_admin_column'		=> true,
	    'show_in_nav_menus'		=> false,
	    'query_var'				=> true,
	  ));
}

/* --- CPT taxonomy: Geo categorieën
================================== */

add_action( 'init', 'taxonomy_geo', 0 );

function taxonomy_geo()
{

	$tax_labels = array(
		'menu_name'				=> 'Geo categorieën',
	    'name'					=> 'Geo categorie',
	    'singular_name'			=> 'Geo categorie',
	    'search_items'			=> 'Zoek geo categorieën',
	    'popular_items'			=> 'Populaire geo categorieën',
	    'all_items'				=> 'Alle geo categorieën',
	    'edit_item'				=> 'Bewerk geo categorie',
	    'update_item'			=> 'Geo categorie bijwerken',
	    'add_new_item'			=> 'Nieuwe geo categorie toevoegen',
	    'new_item_name'			=> 'Nieuwe geo categorie',
	    'add_or_remove_items'	=> 'Geo categorie toevoegen of verwijderen',
	    'not_found'				=> 'Geen geo categorieën gevonden.',
	  );

	  register_taxonomy('geo',array('subsidie'), array(
	    'labels'				=> $tax_labels,
	    'hierarchical'			=> true,
	    'show_ui'				=> true,
	    'show_admin_column'		=> true,
	    'show_in_nav_menus'		=> false,
	    'query_var'				=> true,
	  ));
}
?>