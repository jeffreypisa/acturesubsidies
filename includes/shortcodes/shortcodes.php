<?php
//===============================================//
//=========== Add shortcodes button =============//
//===============================================//


add_action('admin_head', 'add_shortcodes_button');

function add_shortcodes_button() {
    global $typenow;

    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
	    return;
    }

    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "add_tinymce_plugin");
        add_filter('mce_buttons', 'register_shortcodes_button');
    }
}

function add_tinymce_plugin($plugin_array) {
    $plugin_array['shortcodes_button'] = esc_url( get_template_directory_uri() ) . '/includes/shortcodes/js/shortcodes.js';
    return $plugin_array;
}

function register_shortcodes_button($buttons) {
   array_push($buttons, "shortcodes_button");
   return $buttons;
}


//===============================================//
//============== Enqueue scripts ================//
//===============================================//


/* -- Javascript
========================================== */

function shortcodes_js() {
	wp_enqueue_script('jquery');
	wp_register_script('faq_js', esc_url( get_template_directory_uri() ) . '/includes/shortcodes/js/faq.js', array ( 'jquery'), null, true);
	wp_register_script('tabs_js', esc_url( get_template_directory_uri() ) . '/includes/shortcodes/js/tabs.js', array ( 'jquery' ), null, true);
}

add_action('wp_enqueue_scripts', 'shortcodes_js');


//===============================================//
//================= Elements ====================//
//===============================================//


/* -- Row
========================================== */

function row( $atts, $content = null ) {
	return '<div class="row">'.do_shortcode($content).'</div>';
}

add_shortcode('row', 'row');

/* -- Columns
========================================== */

function column( $atts, $content = null ) {
	extract( shortcode_atts(
		array(
			'width' => '',
		), $atts )
	);
	return '<div class="column '.$width.'">'.do_shortcode($content).'</div>';
}

add_shortcode('column', 'column');

/* -- Button
========================================== */

function button( $atts, $content = null ) {
	extract( shortcode_atts(
		array(
			'size' => '',
			'link' => '',
			'target' => '',
		), $atts )
	);

	if($target) { $target = 'target="'.$target.'"'; }

	return '<a class="button '.$size.'" href="'.$link.'" '. $target.'>'. $content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content) .'</a>';

}

add_shortcode('button', 'button');

/* -- Tabs & accordion
========================================== */

function tab_group( $atts, $content = null ) {

	//Enque scripts
	wp_enqueue_script('tabs_js');
	wp_enqueue_style('fontawesome');

	// Display Tabs
	extract( shortcode_atts(
		array(
			'type' => '',
		), $atts)
	);

	preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
	$tab_titles = array();
	$randomid = rand(1, 9999);
	if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
	$output = '';
	if( count($tab_titles) ){
		$output .= "<script type='text/javascript'>jQuery(document).ready(function () {jQuery('#".$randomid."').tabs({type: '".$type."',});});</script>";
	    $output .= '<div id="'.$randomid.'">';
		$output .= '<ul class="tabs_nav">';
		foreach( $tab_titles as $tab ){
			$output .= '<li>' . $tab[0] . '</li>';
		}
	    $output .= '</ul>';
	    $output .= '<div class="tabs_container">'.do_shortcode( $content ).'</div>';
	    $output .= '</div>';
	} else {
		$output .= do_shortcode( $content );
	}
	return $output;
}

add_shortcode( 'tab_group', 'tab_group' );

function tab( $atts, $content = null ) {
	$defaults = array(
		'title'	=> 'Titel',
	);
	extract( shortcode_atts( $defaults, $atts ) );
	return '<div>'. do_shortcode( $content ) .'</div>';
}

add_shortcode( 'tab', 'tab' );

/* -- FAQ
========================================== */

function faq( $atts, $content = null ) {
	extract( shortcode_atts(
		array(
			'title' => '',
		), $atts )
	);

	wp_enqueue_style('fontawesome');
	wp_enqueue_script('faq_js');

	return '<dl class="faq"><dt><span>'. $title .'</span><i class="faq_icon fa fa-plus"></i></dt><dd class="faq_content">' . do_shortcode($content) . '</dd></dl>';

}

add_shortcode('faq', 'faq'); ?>