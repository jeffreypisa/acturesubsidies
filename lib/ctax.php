<?php

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_kennisbank_tax', 0 );

function create_kennisbank_tax() {

	$labels = array(
		'name'              => _x( 'Categorie', 'taxonomy general name' ),
		'singular_name'     => _x( 'Categorie', 'taxonomy singular name' ),
		'search_items'      => __( 'Zoek categorie' ),
		'all_items'         => __( 'Alle categorie' ),
		'parent_item'       => __( 'Parent categorie' ),
		'parent_item_colon' => __( 'Parent categorie' ),
		'edit_item'         => __( 'Bewerk categorie' ),
		'update_item'       => __( 'Update categorie' ),
		'add_new_item'      => __( 'Nieuwe categorie toevoegen' ),
		'new_item_name'     => __( 'Naam nieuwe categorie' ),
		'menu_name'         => __( 'Categorieën' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest' 			=> true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'kennisbank' ),
	);

  register_taxonomy('kennisbank_cat', array('kennisbank'), $args);

}

add_action( 'init', 'create_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies() 
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  ); 

  register_taxonomy('tag','kennisbank',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_in_rest' => true,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag' ),
  ));
}

add_action( 'init', 'create_changelog_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_changelog_taxonomies() 
{
	$labels = array(
		'name'              => _x( 'Status', 'taxonomy general name' ),
		'singular_name'     => _x( 'Status', 'taxonomy singular name' ),
		'search_items'      => __( 'Zoek status' ),
		'all_items'         => __( 'Alle status' ),
		'parent_item'       => __( 'Parent status' ),
		'parent_item_colon' => __( 'Parent status' ),
		'edit_item'         => __( 'Bewerk status' ),
		'update_item'       => __( 'Update status' ),
		'add_new_item'      => __( 'Nieuwe status toevoegen' ),
		'new_item_name'     => __( 'Naam nieuwe status' ),
		'menu_name'         => __( 'Status' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest' 			=> true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'changelog' ),
	);

  register_taxonomy('changelog_cat', array('changelog'), $args);
}