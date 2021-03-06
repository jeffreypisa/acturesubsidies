<?php

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
	});
	
	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});
	
	return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}

	function register_post_types() {
		//this is where you can register custom post types
	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies
	}

	function add_to_context( $context ) {
		$context['menu'] = new TimberMenu('menu');
		$context['footermenu_1'] = new TimberMenu('footermenu_1');
		$context['footermenu_2'] = new TimberMenu('footermenu_2');
		$context['footermenu_3'] = new TimberMenu('footermenu_3');
		$context['footermenu_4'] = new TimberMenu('footermenu_4');
		$context['saasmenu'] = new TimberMenu('saasmenu');
		$context['serviceproductmenu'] = new TimberMenu('serviceproductmenu');
		
		$context['menu_b'] = new TimberMenu('menu_b');
		$context['footermenu_1_b'] = new TimberMenu('footermenu_1_b');
		$context['footermenu_2_b'] = new TimberMenu('footermenu_2_b');
		$context['footermenu_3_b'] = new TimberMenu('footermenu_3_b');
		$context['footermenu_4_b'] = new TimberMenu('footermenu_4_b');
		$context['saasmenu_b'] = new TimberMenu('saasmenu_b');
		$context['serviceproductmenu_b'] = new TimberMenu('serviceproductmenu_b');
		
		$context['subfootermenu'] = new TimberMenu('subfootermenu');
		$context['site'] = $this;
    $context['lang'] = strtolower( substr( get_locale(), 0, 2 ));
    
    if ( wp_is_mobile() ) {
    	$context['ismobile'] = 'true';
    }
    
    return $context;
	}

	function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

}

new StarterSite();
