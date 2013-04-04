<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme 
 */ 
 
$theme_prefix = 'aquilo';


/*-----------------------------------------------------------------------------------*/
/*	Texdomain
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain('aquilo', get_template_directory() . '/languages');


 
/*-----------------------------------------------------------------------------------*/
/*	Define paths
/*-----------------------------------------------------------------------------------*/
//framework directory path
$path_framework			= get_template_directory() . '/framework/';
$path_helper_functions	= $path_framework . 'helper_functions/';
$path_includes 			= $path_framework . 'includes/';
$path_post_types		= $path_framework . 'post_types/';
$path_shortcodes		= $path_framework . 'shortcodes/';
$path_theme_options 	= $path_framework . 'theme_options/';
$path_theme_plugins 	= $path_framework . 'theme_plugins/';
$path_theme_widgets 	= $path_framework . 'theme_widgets/';

//other paths
$path_theme_scripts		= get_template_directory() . '/js/';

//plugins
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/framework/theme_plugins/meta-box')); //define style path fro emeta-box plugin



/*-----------------------------------------------------------------------------------*/
/*	Load theme files
/*-----------------------------------------------------------------------------------*/
//theme options
require_once $path_theme_options . 'interface.php';

//load helper functions
require_once $path_helper_functions . 'style_declaration.php'; 		//declaration styles
require_once $path_helper_functions . 'script_declaration.php'; 	//declaration scripts
require_once $path_helper_functions . 'register_sidebars.php'; 		//register sidebars
require_once $path_helper_functions . 'other_small_functions.php'; 	//other small functions
require_once $path_helper_functions . 'post_thumbnail.php'; 		//post thumbnail
require_once $path_helper_functions . 'comment.php'; 				//comment template
require_once $path_helper_functions . 'menus.php'; 					//register menus


//load custom post types
require_once $path_post_types . 'portfolio_post_type.php'; 			//portfolio post type
require_once $path_post_types . 'slides_post_type.php'; 			//slides post type

//load shortcodes
require_once $path_shortcodes . 'accordion.php';
require_once $path_shortcodes . 'boxes.php';
require_once $path_shortcodes . 'buttons.php';
require_once $path_shortcodes . 'other.php';
require_once $path_shortcodes . 'code.php';
require_once $path_shortcodes . 'columns.php';
require_once $path_shortcodes . 'dropcaps.php';
require_once $path_shortcodes . 'headings.php';
require_once $path_shortcodes . 'highlights.php';
require_once $path_shortcodes . 'icons.php';
require_once $path_shortcodes . 'images.php';
require_once $path_shortcodes . 'list.php';
require_once $path_shortcodes . 'map.php';
require_once $path_shortcodes . 'progressbar.php';
require_once $path_shortcodes . 'scrollTop.php';
require_once $path_shortcodes . 'slides.php';
require_once $path_shortcodes . 'quotes.php';
require_once $path_shortcodes . 'tabs.php';
require_once $path_shortcodes . 'team.php';
require_once $path_shortcodes . 'videos.php';
require_once $path_shortcodes . 'posts.php';
require_once $path_shortcodes . 'portfolio_shortcodes.php';

//theme plugins
require_once $path_theme_plugins . 'image_resize.php';						//resize images
require_once $path_theme_plugins . 'breadcrumb.php';						//breadcrumb
require_once $path_theme_plugins . 'pagination.php';						//pagination
require_once $path_theme_plugins . 'meta-box/metabox.php';					//metabox plugin
require_once $path_theme_plugins . 'meta-box/metabox-usage.php';			//metabox plugin
require_once $path_theme_plugins . 'shortcodes-mce/shortcodes-mce.php';		//shortcodes generator

//theme widgets
require_once $path_theme_widgets . 'recent_posts.php';
require_once $path_theme_widgets . 'flickr.php';
require_once $path_theme_widgets . 'twitter.php';