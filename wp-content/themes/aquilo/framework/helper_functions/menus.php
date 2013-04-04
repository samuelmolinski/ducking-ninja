<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */ 

/*register menus*/
if ( function_exists('wp_nav_menu') ) {
    add_theme_support( 'nav-menus' );	
	register_nav_menus( array(
	'main_navigation' => esc_html__( 'Main Navigation', 'aquilo' ),
	'footer_navigation' => esc_html__( 'Footer Navigation', 'aquilo' )
    ));
}

/*do this function if menu not exist*/
function default_menu() {   
	echo '<ul id="mobile-menu" class="sf-menu main-nav"><li class="current-menu-item"><a href="'.home_url().'/wp-admin/nav-menus.php">Add Menu Items</a></li></ul>'; 
}