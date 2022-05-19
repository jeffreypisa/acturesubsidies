<?php 
	
// Add Login and Logout menu items to menu whose menu name (theme_location) is 'primary'
// Redirects to current page after login/logout

add_filter( 'wp_nav_menu_items', 'wti_loginout_menu_link', 10, 2 );

function wti_loginout_menu_link( $items, $args ) {
if ($args->theme_location == 'menu') {
if (is_user_logged_in()) {
$items .= '<li class="right"><a href="'. wp_logout_url( get_permalink() ) .'">Logout</a></li>'; // For logout
} else {
$items .= '<li class="right"><a href="'. wp_login_url(get_permalink()) .'">Login</a></li>'; // For login
}
}
return $items;
}

function wpse_44020_logout_redirect( $logouturl, $redir )
{
    return $logouturl . '&amp;redirect_to=' . get_permalink();
}
add_filter( 'logout_url', 'wpse_44020_logout_redirect', 10, 2 );