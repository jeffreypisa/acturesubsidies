<?php
include 'lib/includes.php';
include 'lib/optionspage.php';
include 'lib/svg.php';
include 'lib/wpadmin.php';
include 'lib/videoembed.php';
include 'lib/timber.php';
include 'lib/acf.php';
include 'lib/gutenberg.php';
include 'lib/cpt.php';
include 'lib/ctax.php';
// include 'lib/sticky.php';
include 'lib/session.php';
include 'lib/hideusers.php';
include 'lib/youtube.php';

// Set permalink structure Kennisbank

function wpa_projecten_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'kennisbank' ){
        $terms = wp_get_object_terms( $post->ID, 'kennisbank_cat' );
        if( $terms ){
            return str_replace( '%kennisbank_cat%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'wpa_projecten_permalinks', 1, 2 );

// Set permalink structure Changelog

function wpa_changelog_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'changelog' ){
        $terms = wp_get_object_terms( $post->ID, 'changelog_cat' );
        if( $terms ){
            return str_replace( '%changelog_cat%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'wpa_changelog_permalinks', 1, 2 );

// add custom column title for custom meta value
// 'manage_pages_columns' or 'manage_edit-post_columns' both works
add_filter('manage_posts_columns', 'ws365150_add_custom_columns_title_pt', 10, 2 );
function ws365150_add_custom_columns_title_pt( $columns, $post_type ) {
    switch ( $post_type ) {
        case 'post':
        case 'kennisbank':
            $columns['ws365150_samenvatting'] = 'Samenvatting'; // you may use __() later on for translation support
            break;

        default:

            break;
    }

    return $columns;
}

// add custom column data with custom meta value for custom post types
add_action('manage_posts_custom_column', 'ws365150_add_custom_column_data_pt', 10, 2 );
function ws365150_add_custom_column_data_pt( $column_name, $post_id ) {
    switch ( $column_name ) {
        case 'ws365150_samenvatting': // specified for this column assigned in the column title
            echo get_post_meta( $post_id, 'samenvatting', true );
            break;

        default:
            break;
    }
}