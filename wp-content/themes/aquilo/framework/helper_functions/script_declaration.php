<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */ 


/*-----------------------------------------------------------------------------------*/
/*	Enqueue Scripts
/*-----------------------------------------------------------------------------------*/
function mb2_scripts(){
	if (!is_admin()){		
		wp_enqueue_script ('jquery');		
   		wp_enqueue_script ('jquery-ui-core');
		wp_enqueue_script ('jquery-ui-accordion');
		wp_enqueue_script ('jquery-ui-tabs');		
		//wp_enqueue_script ('hoverIntent', get_template_directory_uri().'/js/menu/hoverIntent.js','','',true);
		wp_enqueue_script ('superfish', get_template_directory_uri().'/js/menu/superfish.js','','',true);
		wp_enqueue_script ('supersubs', get_template_directory_uri().'/js/menu/supersubs.js','','',true);
		wp_enqueue_script ('prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js','','',true);
		wp_enqueue_script ('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js','','',true);	
		wp_enqueue_script ('mobilemenu', get_template_directory_uri() .'/js/jquery.mobilemenu.js','','',true);	
		
		//filterable portfolio scripts
		if (is_page_template ('template-portfolio.php')) {		
			wp_enqueue_script ('quicksand', get_template_directory_uri() . '/js/jquery.quicksand.js','','',true);
			wp_enqueue_script ('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js','','',true);
		}		
		
		//responsive theme
		$responsive_theme = mb2_theme_option('aquilo_responsive_theme');
		if($responsive_theme == 1){
			wp_enqueue_script ('respond', get_template_directory_uri().'/js/respond.min.js','','',true);			
		}
	
		wp_enqueue_script ('custom-scripts', get_template_directory_uri() . '/js/scripts.js','','',true);	
	}	 
}
add_action('wp_enqueue_scripts','mb2_scripts');









/*-----------------------------------------------------------------------------------*/
/*	Inline Scripts
/*-----------------------------------------------------------------------------------*/
function mb2_custom_scripts(){
	global $post;
	$mb2_custom_scripts ="";
	
	
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	Page slider
	/*-----------------------------------------------------------------------------------*/
	$parameter_id = mb2_post_id_replace();	
	$meta_slider_enabler = get_post_meta ($parameter_id, 'meta_slider_enabler', true);
	$meta_slider = get_post_meta ($parameter_id, 'meta_slider', true);
	$layout = get_post_meta ($parameter_id, 'meta_slider_layout', true);
		
	
	//flexslider
	if($meta_slider_enabler == 1 && $meta_slider == 'flexslider'){
				
		$animation_type = mb2_theme_option('aquilo_flexslider_animation_type');
		$direction = mb2_theme_option('aquilo_flexslider_direction');
		$slideshow_speed = mb2_theme_option('aquilo_flexslider_slideshow_speed');
		$animation_speed = mb2_theme_option('aquilo_flexslider_animation_speed');
		$direction_nav = mb2_theme_option('aquilo_flexslider_direction_navigation');				
		
		//thumbnail control
		if($layout == 'thumbnail-control'){		
			$control_nav = 'thumbnails';
		}
		else {
			$control_nav = mb2_theme_option('aquilo_flexslider_control_navigation');		
		}							
				
		$mb2_custom_scripts .= "jQuery(document).ready(function($){				
			$('#main-flexslider').flexslider({
				animation: '".$animation_type."',
				direction:'".$direction."',
				slideshowSpeed: ".$slideshow_speed.",
				animationSpeed: ".$animation_speed.",			
				controlNav: '".$control_nav."',   
				directionNav: ".$direction_nav."		
			});				
			$('.flexslider').flexslider({
				animation: 'fade' 
			});						
		});";
		
	}
	else {	
		$mb2_custom_scripts .= "jQuery(document).ready(function($){					
			$('.flexslider').flexslider({
				animation: 'fade' 
			});						
		});";	
	}
	
	


$scripts_output = "\n<script type=\"text/javascript\">\n" . $mb2_custom_scripts . "\n</script>";

if($mb2_custom_scripts != ''){
	echo $scripts_output;
}

}
add_action('wp_footer', 'mb2_custom_scripts', 100);