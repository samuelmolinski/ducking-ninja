<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */
 
get_header();
global $post;
$static_home_page_id = mb2_theme_option('aquilo_static_home_page');


if($static_home_page_id){
	get_template_part('framework/includes/blocks/block','home_static_page');
}
else {
	echo '<div id="main-content"><div class="wrap main-content-wrap"><div class="content col-24"><article class="article"><h2>Welcome to Aquilo Theme!</h2><p>To get front page You need go to wordpress backend at Aquilo <a href="'.home_url().'/wp-admin/themes.php?page=aquilo-theme-options&settings-updated=true#front_page">front page options</a> and select page to display on front page.</p></article></div><div class="clear"></div></div></div>';	
}

get_footer();