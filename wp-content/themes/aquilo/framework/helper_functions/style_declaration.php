<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */ 
 
 
/*-----------------------------------------------------------------------------------*/
/*	Enqueue Styles
/*-----------------------------------------------------------------------------------*/
function mb2_style(){	
	if (!is_admin()){	
		
		/*-----------------------------------------------------------------------------------*/
		/*	Theme styles
		/*-----------------------------------------------------------------------------------*/
		//load style file
		wp_enqueue_style('style',get_template_directory_uri().'/style.css');
		
		//load color style files
		$parameter_id = mb2_post_id_replace();	
		$meta_predefined_style = get_post_meta($parameter_id, 'meta_general_predefined_style', true);
		$theme_predefined_style = mb2_theme_option('aquilo_predefined_style');	
		
		if($meta_predefined_style !=''){
			$predefined_style = $meta_predefined_style;
		}
		else {
			$predefined_style = $theme_predefined_style;
		}
		
				
		wp_enqueue_style(''.$predefined_style.'-style', get_template_directory_uri().'/css/colors/'.$predefined_style.'/style.css');	
				
		//responsive theme
		$responsive_theme = mb2_theme_option('aquilo_responsive_theme');
		if($responsive_theme == 1){
			wp_enqueue_style('responsive-style', get_template_directory_uri().'/css/responsive.css');				
		}
			
		
		
		
		
		/*-----------------------------------------------------------------------------------*/
		/*	Google fonts
		/*-----------------------------------------------------------------------------------*/
		//general fonts
		$general_google_font = mb2_theme_option('aquilo_general_google_font');
		$general_google_font_family = mb2_theme_option('aquilo_general_google_font_family');
		
		if ($general_google_font == 1) {
			wp_enqueue_style ('google-general-font', 'http://fonts.googleapis.com/css?family='. $general_google_font_family .'');
		}
		
		//headings fonts
		$headings_google_font = mb2_theme_option('aquilo_headings_google_font');
		$headings_google_font_family = mb2_theme_option('aquilo_headings_google_font_family');
				
		if ($headings_google_font == 1) {
			//check if general google fonts are enabled
			if($general_google_font == 1){
				if($headings_google_font_family !== $general_google_font_family) {
					wp_enqueue_style ('google-headings-font', 'http://fonts.googleapis.com/css?family='. $headings_google_font_family .'');
				}
			}
			else {
					wp_enqueue_style ('google-headings-font', 'http://fonts.googleapis.com/css?family='. $headings_google_font_family .'');
			}
		}
		
		//menu fonts
		$menu_google_font = mb2_theme_option('aquilo_menu_google_font');
		$menu_google_font_family = mb2_theme_option('aquilo_menu_google_font_family');
				
		if ($menu_google_font == 1) {			
			
			if($general_google_font == 1 && $headings_google_font == 1) {
				if($menu_google_font_family !== $general_google_font_family && $menu_google_font_family !== $headings_google_font_family) {
					wp_enqueue_style ('google-menu-font', 'http://fonts.googleapis.com/css?family='. $menu_google_font_family .'');

				}
			}
			
			elseif($general_google_font == 1 && $headings_google_font == 0) {
				if($menu_google_font_family !== $general_google_font_family) {
					wp_enqueue_style ('google-menu-font', 'http://fonts.googleapis.com/css?family='. $menu_google_font_family .'');
				}
			}
						
			elseif($general_google_font == 0 && $headings_google_font == 1) {
				if($menu_google_font_family !== $headings_google_font_family) {
					wp_enqueue_style ('google-menu-font', 'http://fonts.googleapis.com/css?family='. $menu_google_font_family .'');
				}
			}
			
			else {
					wp_enqueue_style ('google-menu-font', 'http://fonts.googleapis.com/css?family='. $menu_google_font_family .'');
			}
		}
		
		
		
		
		
		//submenu fonts
		$submenu_google_font = mb2_theme_option('aquilo_submenu_google_font');
		$submenu_google_font_family = mb2_theme_option('aquilo_submenu_google_font_family');
				
		if ($submenu_google_font == 1) {			
			
			if($general_google_font == 1 && $headings_google_font == 1 && $menu_google_font == 1) {
				if($submenu_google_font_family !== $general_google_font_family && $submenu_google_font_family !== $headings_google_font_family && $submenu_google_font_family !== $menu_google_font_family) {
					wp_enqueue_style ('google-submenu-font', 'http://fonts.googleapis.com/css?family='. $submenu_google_font_family .'');
				}
			}
			
			elseif($general_google_font == 1 && $headings_google_font == 1 && $menu_google_font == 0) {
				if($submenu_google_font_family !== $general_google_font_family && $submenu_google_font_family !== $headings_google_font_family) {
					wp_enqueue_style ('google-submenu-font', 'http://fonts.googleapis.com/css?family='. $menu_google_font_family .'');
				}
			}
			
			elseif($general_google_font == 1 && $headings_google_font == 0 && $menu_google_font == 1) {
				if($submenu_google_font_family !== $general_google_font_family && $submenu_google_font_family !== $menu_google_font_family) {
					wp_enqueue_style ('google-submenu-font', 'http://fonts.googleapis.com/css?family='. $menu_google_font_family .'');
				}
			}
					
			elseif($general_google_font == 1 && $headings_google_font == 0 && $menu_google_font == 0) {
				if($submenu_google_font_family !== $general_google_font_family) {
					wp_enqueue_style ('google-submenu-font', 'http://fonts.googleapis.com/css?family='. $menu_google_font_family .'');
				}
			}
					
			elseif($general_google_font == 0 && $headings_google_font == 1 && $menu_google_font == 1) {
				if($submenu_google_font_family !== $headings_google_font_family && $submenu_google_font_family !== $menu_google_font_family) {
					wp_enqueue_style ('google-submenu-font', 'http://fonts.googleapis.com/css?family='. $menu_google_font_family .'');
				}
			}
					
			elseif($general_google_font == 0 && $headings_google_font == 1 && $menu_google_font == 0) {
				if($submenu_google_font_family !== $headings_google_font_family) {
					wp_enqueue_style ('google-submenu-font', 'http://fonts.googleapis.com/css?family='. $menu_google_font_family .'');
				}
			}
					
			elseif($general_google_font == 0 && $headings_google_font == 0 && $menu_google_font == 1) {
				if($submenu_google_font_family !== $menu_google_font_family) {
					wp_enqueue_style ('google-submenu-font', 'http://fonts.googleapis.com/css?family='. $menu_google_font_family .'');
				}
			}
			
			else {
					wp_enqueue_style ('google-submenu-font', 'http://fonts.googleapis.com/css?family='. $menu_google_font_family .'');
			}
		}	
		
		
							
	}
}
add_action('wp_enqueue_scripts', 'mb2_style');







/*-----------------------------------------------------------------------------------*/
/*	Inline styles
/*-----------------------------------------------------------------------------------*/
function mb2_inline_style() {
$mb2_custom_style ="";





/*-----------------------------------------------------------------------------------*/
/*	Inline styles ---> logo
/*-----------------------------------------------------------------------------------*/
//load general parameters
$logo_image = mb2_theme_option('aquilo_logo_image');
$logo_width = mb2_theme_option('aquilo_logo_width');
$logo_height = mb2_theme_option('aquilo_logo_height');
$logo_margin = mb2_theme_option('aquilo_logo_margin');


//logo image
$mb2_custom_style .= "#logo-image a{background:url(".$logo_image.") no-repeat left top;width:".$logo_width.";height:".$logo_height.";margin:".$logo_margin.";}";









/*-----------------------------------------------------------------------------------*/
/*	Inline styles ---> main menu
/*-----------------------------------------------------------------------------------*/
$main_menu_margin_top = mb2_theme_option('aquilo_main_menu_margin_top');

//margin top for main menu i a header
$mb2_custom_style .= "#navigation{margin-top:".$main_menu_margin_top.";}";










/*-----------------------------------------------------------------------------------*/
/*	Inline styles ---> custom color
/*-----------------------------------------------------------------------------------*/
//background custom color of many elements of the theme
$mb2_custom_style .= "".
mb2_theme_style('background-color',
	array(
		'.button',
		'.form-button-big',
		'.wpcf7-submit',
		'input[type=submit]',
		'#comment-form-button',
		'#navigation .sf-menu li:hover', 
		'#navigation .sf-menu li.sfHover',
		'#navigation .sf-menu li.sfHover a',
		'#navigation .sf-menu li.current-menu-item a',
		'#navigation .sf-menu a:focus', 
		'#navigation .sf-menu a:hover', 
		'#navigation .sf-menu a:active',
		'#navigation .sf-menu li.selected a',
		'#navigation .current-menu-parent a',
		'#navigation .sf-menu li ul',
		'#page-heading .wrap',
		'.post-meta-tags ul.tags-list li a:hover',
		'.post-meta-tags ul.tags-list li a:active',
		'.post-meta-tags ul.tags-list li a:focus',
		'.project-nav-prev a',
		'.project-nav-next a',
		'.project-nav-back-to-portfolio a',
		'.accordion .ui-state-default .ui-icon',
		'.accordion .ui-state-active .ui-icon',
		'ul.ui-tabs-nav li.ui-state-active',
		'.button-big',
		'.button-small',
		'.readmore',
		'.dropcap-style1',
		'.highlight1',
		'ul.list-menu1 li.active a',
		'ul.list-menu1 li a:hover',
		'ul.list-menu1 li a:active',
		'ul.list-menu1 li a:focus',
		'.zoom-img',
		'.zoom-video',
		'.zoom-post',
		'ul#portfolio-filter li a:hover',
		'ul#portfolio-filter li a:active',
		'ul#portfolio-filter li a:focus',
		'.tagcloud a:hover',
		'.tagcloud a:active',
		'.tagcloud a:focus',
		'.layout-thumbnail-control .flex-control-thumbs .flex-active'
	),	
	array(
		'theme_style' => 'aquilo_custom_color',
		'meta_style' => 'meta_general_custom_color'
	)
)
."";


//border custom color of many elements of the theme
$mb2_custom_style .= "".
mb2_theme_style('border-color',
	array(
		'.ui-tabs-nav',
		'blockquote',
		'.portfolio-item-bg:hover',
		'.portfolio-wrap-col-1 .portfolio-item-details:hover'		
	),	
	array(
		'theme_style' => 'aquilo_custom_color',
		'meta_style' => 'meta_general_custom_color'
	)
)
."";









/*-----------------------------------------------------------------------------------*/
/*	Inline styles ---> custom text, hedaings and links color
/*-----------------------------------------------------------------------------------*/
//text color
$mb2_custom_style .= "".
mb2_theme_style('color',
	array(
		'body',
		'input',
		'textarea'		
	),	
	array(
		'theme_style' => 'aquilo_general_text_color',
		'meta_style' => 'meta_general_text_color'
	)
)
."";


//headings color
$mb2_custom_style .= "".
mb2_theme_style('color',
	array(
		'h1',
		'h2',
		'h3',
		'h4',
		'h5',
		'h6'		
	),	
	array(
		'theme_style' => 'aquilo_general_headings_color',
		'meta_style' => 'meta_general_headings_color'
	)
)
."";


//links color
$mb2_custom_style .= "".
mb2_theme_style('color',
	array(
		'a'		
	),	
	array(
		'theme_style' => 'aquilo_general_links_color',
		'meta_style' => 'meta_general_links_color'
	)
)
."";


//hover links color
$mb2_custom_style .= "".
mb2_theme_style('color',
	array(
		'a:hover',
		'a:active',
		'a:focus'
	),	
	array(
		'theme_style' => 'aquilo_general_hover_links_color',
		'meta_style' => 'meta_general_hover_links_color'
	)
)
."";








/*-----------------------------------------------------------------------------------*/
/*	Inline styles ---> page background color and image
/*-----------------------------------------------------------------------------------*/
//background color
$mb2_custom_style .= "".
mb2_theme_style('background-color',
	array(
		'body'		
	),	
	array(
		'theme_style' => 'aquilo_general_background_color',
		'meta_style' => 'meta_general_background_color'
	)
)
."";



//background image
$mb2_custom_style .= "".
mb2_theme_style_bg_image('body',
	array(
	'url' => 'aquilo_general_background_image',
	'repeat' => 'aquilo_general_background_image_repeat',
	'position' => 'aquilo_general_background_image_position',
	'attachement' => 'aquilo_general_background_image_attachment',
	'meta_url' => 'meta_general_background_image',
	'meta_repeat' => 'meta_general_background_image_repeat',
	'meta_position' => 'meta_general_background_image_position',
	'meta_attachement' => 'meta_general_background_image_attachment'
	)	
)
."";









/*-----------------------------------------------------------------------------------*/
/*	Inline styles ---> page heading backgroud color and image
/*-----------------------------------------------------------------------------------*/
$mb2_custom_style .= "".
mb2_theme_style('background-color',
	array(
		'#page-heading .wrap'		
	),	
	array(
		'theme_style' => 'aquilo_page_heading_background_color',
		'meta_style' => 'meta_page_heading_background_color'
	)
)
."";



//background image
$mb2_custom_style .= "".
mb2_theme_style_bg_image('#page-heading .wrap',
	array(
	'url' => 'aquilo_page_heading_background_image',
	'repeat' => 'aquilo_page_heading_background_image_repeat',
	'position' => 'aquilo_page_heading_background_image_position',
	'attachement' => '',
	'meta_url' => 'meta_page_heading_background_image',
	'meta_repeat' => 'meta_page_heading_background_image_repeat',
	'meta_position' => 'meta_page_heading_background_image_position',
	'meta_attachement' => ''
	)	
)
."";








/*-----------------------------------------------------------------------------------*/
/*	Inline styles ---> page heding text, hedaings and links color
/*-----------------------------------------------------------------------------------*/
//text color
$mb2_custom_style .= "".
mb2_theme_style('color',
	array(
		'#page-heading .wrap'		
	),	
	array(
		'theme_style' => 'aquilo_page_heading_text_color',
		'meta_style' => 'meta_page_heading_text_color'
	)
)
."";


//headings color
$mb2_custom_style .= "".
mb2_theme_style('color',
	array(
		'#page-heading .wrap h1',
		'#page-heading .wrap h2',
		'#page-heading .wrap h3',
		'#page-heading .wrap h4',
		'#page-heading .wrap h5',
		'#page-heading .wrap h6'		
	),	
	array(
		'theme_style' => 'aquilo_page_heading_headings_color',
		'meta_style' => 'meta_page_heading_headings_color'
	)
)
."";


//links color
$mb2_custom_style .= "".
mb2_theme_style('color',
	array(
		'#page-heading .wrap a'		
	),	
	array(
		'theme_style' => 'aquilo_page_heading_links_color',
		'meta_style' => 'meta_page_heading_links_color'
	)
)
."";


//hover links color
$mb2_custom_style .= "".
mb2_theme_style('color',
	array(
		'#page-heading .wrap a:hover',
		'#page-heading .wrap a:active',
		'#page-heading .wrap a:focus'
	),	
	array(
		'theme_style' => 'aquilo_page_heading_hover_links_color',
		'meta_style' => 'meta_page_heading_hover_links_color'
	)
)
."";






/*-----------------------------------------------------------------------------------*/
/*	Inline styles ---> font-family
/*-----------------------------------------------------------------------------------*/
//load fonts parameters
$general_google_font = mb2_theme_option('aquilo_general_google_font');
$general_google_font_family = mb2_theme_option('aquilo_general_google_font_family');
$general_font_family = mb2_theme_option('aquilo_general_font_family');
$general_font_size = mb2_theme_option('aquilo_general_font_size');

$headings_google_font = mb2_theme_option('aquilo_headings_google_font');
$headings_google_font_family = mb2_theme_option('aquilo_headings_google_font_family');
$headings_font_family = mb2_theme_option('aquilo_headings_font_family');
$h1_font_size = mb2_theme_option('aquilo_h1_font_size');
$h2_font_size = mb2_theme_option('aquilo_h2_font_size');
$h3_font_size = mb2_theme_option('aquilo_h3_font_size');
$h4_font_size = mb2_theme_option('aquilo_h4_font_size');
$h5_font_size = mb2_theme_option('aquilo_h5_font_size');
$h6_font_size = mb2_theme_option('aquilo_h6_font_size');
$headings_font_weight = mb2_theme_option('aquilo_headings_font_weight');
$headings_text_transform = mb2_theme_option('aquilo_headings_text_transform');
$headings_font_style = mb2_theme_option('aquilo_headings_font_style');

$menu_google_font = mb2_theme_option('aquilo_menu_google_font');
$menu_google_font_family = mb2_theme_option('aquilo_menu_google_font_family');
$menu_font_family = mb2_theme_option('aquilo_menu_font_family');
$menu_font_size = mb2_theme_option('aquilo_menu_font_size');
$menu_font_weight = mb2_theme_option('aquilo_menu_font_weight');
$menu_text_transform = mb2_theme_option('aquilo_menu_text_transform');
$menu_font_style = mb2_theme_option('aquilo_menu_font_style');

$submenu_google_font = mb2_theme_option('aquilo_submenu_google_font');
$submenu_google_font_family = mb2_theme_option('aquilo_submenu_google_font_family');
$submenu_font_family = mb2_theme_option('aquilo_submenu_font_family');
$submenu_font_size = mb2_theme_option('aquilo_submenu_font_size');
$submenu_font_weight = mb2_theme_option('aquilo_submenu_font_weight');
$submenu_text_transform = mb2_theme_option('aquilo_submenu_text_transform');
$submenu_font_style = mb2_theme_option('aquilo_submenu_font_style');


//general fonts
if($general_google_font == 1){
	$is_general_font_family = $general_google_font_family;
}
else {
	$is_general_font_family = $general_font_family;	
}
$mb2_custom_style .= "body,input,textarea{font-family:".$is_general_font_family.";font-size:".$general_font_size.";}";


//headings fonts
if($headings_google_font == 1){
	$is_headings_font_family = $headings_google_font_family;
}
else {
	$is_headings_font_family = $headings_font_family;	
}
$mb2_custom_style .= "h1,h2,h3,h4,h5,h6{font-family:".$is_headings_font_family.";font-weight:".$headings_font_weight.";text-transform:".$headings_text_transform.";font-style:".$headings_font_style.";}h1{font-size:".$h1_font_size.";}h2{font-size:".$h2_font_size.";}h3{font-size:".$h3_font_size.";}h4{font-size:".$h4_font_size.";}h5{font-size:".$h5_font_size.";}h6{font-size:".$h6_font_size.";}";


//menu fonts
if($menu_google_font == 1){
	$is_menu_font_family = $menu_google_font_family;
}
else {
	$is_menu_font_family = $menu_font_family;	
}
$mb2_custom_style .= "#navigation .sf-menu a{font-family:".$is_menu_font_family.";font-weight:".$menu_font_weight.";text-transform:".$menu_text_transform.";font-style:".$menu_font_style.";font-size:".$menu_font_size.";}";


//submenu fonts
if($submenu_google_font == 1){
	$is_submenu_font_family = $submenu_google_font_family;
}
else {
	$is_submenu_font_family = $submenu_font_family;	
}
$mb2_custom_style .= "#navigation .sf-menu li li a{font-family:".$is_submenu_font_family.";font-weight:".$submenu_font_weight.";text-transform:".$submenu_text_transform.";font-style:".$submenu_font_style.";font-size:".$submenu_font_size.";}";









/*-----------------------------------------------------------------------------------*/
/*	Inline styles ---> custm css style from theme options panel
/*-----------------------------------------------------------------------------------*/
//load general parameters
$custom_css = mb2_theme_option('aquilo_custom_css_style');

if($custom_css !=''){	
	$mb2_custom_style .= "".$custom_css."";
}











// show custom css style
$css_output = "\n<style type=\"text/css\">\n" . $mb2_custom_style . "\n</style>";
if(($mb2_custom_style) !=''):
	echo $css_output;
endif;
}
add_action('wp_head', 'mb2_inline_style');