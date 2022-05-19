<?php class admin_filters {
function __construct() {
	add_action( 'admin_menu', array( $this, 'remove_menus' ) );
	add_action( 'admin_init', array( $this, 'remove_submenus' ) );
	add_action( 'admin_menu', array( $this, 'remove_dashboard_widgets' ) );
	add_action( 'after_setup_theme', array( $this, 'remove_admin_bar' ) );
	add_action( 'wp_before_admin_bar_render', array( $this, 'remove_admin_bar_items' ) );
	add_action( 'admin_menu', array( $this, 'remove_meta_boxes' ) );
	add_action( 'admin_init', array( $this, 'deactivate_columns' ) );
	add_action( 'widgets_init', array( $this, 'remove_widgets' ) );
	add_action( 'customize_register', array( $this, 'remove_customizer' ) );
}

/* *******************************
************ MENU'S **************
******************************* */

function remove_menus() {
	remove_menu_page( 'tools.php' );										// Extra
	remove_menu_page( 'edit-comments.php' );								// Comments
	//remove_menu_page( 'plugins.php' );									// Plugins
	//remove_menu_page( 'users.php' );										// Users
	//remove_menu_page( 'edit.php' );										// Posts
}

/* *******************************
*********** SUBMENU'S ************
******************************* */

function remove_submenus() {
	global $submenu;
	unset($submenu['edit.php'][16]);										// View / edit theme
	//unset($submenu['themes.php'][5]);										// View / themes
	unset($submenu['themes.php'][6]);										// View / edit theme
	//unset($submenu['options-general.php'][15]);							// Settings / writing
	//unset($submenu['options-general.php'][25]);							// Settings / comments
	//unset($submenu['options-general.php'][40]);							// Settings / permalinks
}

/* *******************************
******* DASHBOARD WIDGETS ********
******************************* */

function remove_dashboard_widgets() {
	remove_meta_box('dashboard_primary', 'dashboard', 'core');				// Wordpress news
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');			// Secondary Wordpress news
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');			// Right now
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core'); 		// Incoming links
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');				// Plugin news
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');			// QuickPress
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');		// Recent comments
}

/* *******************************
******* POST TYPE SUPPORT ********
******************************* */

function deactivate_columns() {
    remove_post_type_support( 'post', 'comments' );							// Comments - posts
    remove_post_type_support( 'page', 'comments' );							// Comments - pages
    remove_post_type_support( 'post', 'author' );							// Author - posts
    remove_post_type_support( 'page', 'author' );							// Author - pages
    //remove_post_type_support( 'post', 'thumbnail' );						// Featured image - posts
    remove_post_type_support( 'page', 'thumbnail' );						// Featured image - pages
}

/* *******************************
*********** METABOXES ************
******************************* */

function remove_meta_boxes() {
	//remove_meta_box('tagsdiv-post_tag', 'post', 'normal');				// Tags
	remove_meta_box('trackbacksdiv', 'post', 'normal');						// Trackbacks
	remove_meta_box('slugdiv', 'post', 'normal');							// Slug - posts
	remove_meta_box('slugdiv', 'page', 'normal');							// Slug - pages
	remove_meta_box('postcustom', 'post', 'normal');						// Extra fields - posts
	remove_meta_box('postcustom', 'page', 'normal');						// Extra fields - pages
	remove_meta_box('authordiv', 'page', 'normal');							// Author
	remove_meta_box('revisionsdiv', 'page', 'normal');						// Revisions
}

/* *******************************
************ WIDGETS *************
******************************* */

function remove_widgets() {
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	//unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Pages');
}

/* *******************************
************ ADMINBAR ************
******************************* */

// Remove admin bar for non-admins
function remove_admin_bar() { if (!current_user_can('administrator') && !is_admin()) { show_admin_bar(false); } }

// Remove admin bar items
function remove_admin_bar_items() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');									// WordPress logo
    $wp_admin_bar->remove_menu('comments');									// Comments
    $wp_admin_bar->remove_menu('search');									// Search
}
// Remove customizer items
function remove_customizer( $wp_customize ) {
	$wp_customize->remove_section("themes");								// Themes
	$wp_customize->remove_section("colors");								// Colors
	$wp_customize->remove_section("background_image");						// Background
	$wp_customize->remove_section("static_front_page");						// Front-page settings
	$wp_customize->remove_panel("widgets");									// Widgets
}
}
$admin_filters = new admin_filters();

/* *******************************
******** CUSTOM WP ADMIN *********
******************************* */

function additional_admin_color_schemes() {
    $theme_dir = get_template_directory_uri();

    wp_admin_css_color( 'wbrnd', __( 'We Brand Creative' ),
        $theme_dir . '/includes/admin/color_scheme/colors.css',
        array( '#eb0655', '#444444', '#f1f1f1', '#ffffff' )
    );
}
add_action('admin_init', 'additional_admin_color_schemes');

function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'flat'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');

function rename_fresh_color_scheme() {
    global $_wp_admin_css_colors;
    $color_name = $_wp_admin_css_colors['fresh']->name;

    if( $color_name == 'Default' ) {
        $_wp_admin_css_colors['fresh']->name = 'Fresh';
    }
    return $_wp_admin_css_colors;
}
add_filter('admin_init', 'rename_fresh_color_scheme');

add_filter('get_user_option_admin_color', 'smb_change_dashboard_colour');
function smb_change_dashboard_colour($result) {
	return 'wbrnd'; // Enter the theme name here
}

/* *******************************
******** FIX SHORTCODES **********
******************************* */

function fix_shortcodes($content){
	$array = array (
		'<p>['		=> '[',
		']</p>'		=> ']',
		']<br />'	=> ']'
	);
	$content = strtr($content, $array);
	return $content;
}

add_filter('the_content', 'fix_shortcodes');
add_filter('acf_the_content', 'fix_shortcodes');

/* *******************************
******* CUSTOM WP FOOTER *********
******************************* */

function custom_admin_footer() {
	_e( '<span id="footer-thankyou">Ontwikkeld door <a href="http://www.webrandcreative.nl" target="_blank">We Brand Creative</a>. Hulp nodig? Bel: 0229 - 220 000 of mail naar <a href="mailto:hello@webrandcreative.nl">hello@webrandcreative.nl</a></span>.' );
}
add_filter('admin_footer_text', 'custom_admin_footer');

add_filter('widget_text', 'do_shortcode', 11);
//define('DISALLOW_FILE_EDIT', true);

/* *******************************
********* GRAVITY FORMS **********
******************************* */


add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' ); // Hide field label

/* *******************************
****** REMOVE HEADER URL'S *******
******************************* */

remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

/* *******************************
************* FIXES **************
******************************* */

add_action('admin_enqueue_scripts', 'chrome_fix');
function chrome_fix() {
	if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Chrome' ) !== false )
		wp_add_inline_style( 'wp-admin', '#adminmenu { transform: translateZ(0); }' );
}

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
?>