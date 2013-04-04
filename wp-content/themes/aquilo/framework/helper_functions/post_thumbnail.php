<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */

function mb2_post_thumbnail($width=260,$height=180,$align='left',$link_to_post=false,$slider=true,$slider_count=3,$video=true,$gallery=true,$echo=true) {

global $post;
	





//basic parameters
$thumbnail_slider = get_post_meta ($post->ID, 'meta_post_thumbnail_slider', true);
$thumbnail_id = get_post_thumbnail_id();	 
$url = wp_get_attachment_url( $thumbnail_id,'full');
$thumbnail_video_url = get_post_meta ($post->ID, 'meta_post_video_url', true);
$thumbnail_video_width = get_post_meta ($post->ID, 'meta_post_video_width', true);
$thumbnail_video_height = get_post_meta ($post->ID, 'meta_post_video_height', true);
$thumbnail_link = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );
$thumbnail_zoom = 'img';
$thumbnail_rel = 'data-rel="prettyPhoto[portfolio_gallery]"';
$video_embed_code = get_post_meta ($post->ID, 'meta_post_video_embed_code', true);
$thumbnail=matthewruddy_image_resize($url,$width,$height,true,false); 









/*-----------------------------------------------------------------------------------*/
/*	Post thumbnail slider
/*-----------------------------------------------------------------------------------*/
if ($thumbnail_slider == 1 && $slider == true){		
		
	
		
	$output='';
	
	
	if($thumbnail_slider_images = get_posts(array(
		'post_parent' => get_the_ID(),
		'post_type' => 'attachment',
		'numberposts' => $slider_count, // show all
		'post_status' => null,
		'post_mime_type' => 'image',
		'order' => 'ASC',
		'orderby' => 'menu_order'))) {	
			
		
			//check if post have more that one image atached if not display warning message		
			$attachments = get_children(array(
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'post_parent' => $post->ID));
			
			
			
			//foreach atached images
			if(count($attachments) > 1) {	
			
				
				$output .='<div class="flexslider thumb-slider-align-'.$align.'" style="width:'.$width.'px;max-width:100%;"><ul class="slides">';			
			
				
				foreach($thumbnail_slider_images as $thumbnail_slider_image) {
					
									
					//define url of atached images
					$url=wp_get_attachment_url($thumbnail_slider_image->ID);		
					$thumbnail_slider=matthewruddy_image_resize($url,$width,$height,true,false);			
			
			
			
					$output   .= '<li><img class="img slide-img" src="'. $thumbnail_slider['url'] .'" alt="'. esc_attr(get_the_title() ? get_the_title() : get_the_ID()) .'" /></li>';
					
						
			
				}
			
			$output .='</ul></div>';
						
			
			if ( $echo ){
				echo $output;
			}
			else {
				return $output;	
			}
			}
			
			
			
			
			//display info message
			else {
				echo __('<div class="message-yellow"><div class="box">To use slider as featured image You need add at least two images to the post gallery.</div></div><br/>', 'nb4');	
		}
	}			
}
	
	
	
/*-----------------------------------------------------------------------------------*/
/*	Live video 
/*-----------------------------------------------------------------------------------*/	
elseif($video_embed_code !='' && $video == true){	
		
		$output ='';
		
		$output.='<div class="post-thumb video-thumb align-'.$align.'" style="width:'.$width.'px;max-width:100%;height:auto;">';
    	$output.=''.do_shortcode($video_embed_code).'';
		$output.='</div>';
		
		
		if ( $echo ){
				echo $output;
			}
			else {
				return $output;	
			}	
	
}	
	
	
	
	
/*-----------------------------------------------------------------------------------*/
/*	Post thumbnail
/*-----------------------------------------------------------------------------------*/	
elseif($url) {
	
	
$output='';	
		
	
	//disabled gallery
	if ($gallery != 'true') {
		$thumbnail_rel = 'data-rel="prettyPhoto"';	
	}
	
		


	
	//video thumbnail in lightbox
	if ($thumbnail_video_url !='') {
			
							
		//check if user use width and height of vide/flash file
		if ($thumbnail_video_width !='' && $thumbnail_video_height !='') { 			
			$thumbnail_link = ''.$thumbnail_video_url.'?width='. $thumbnail_video_width .'&height='. $thumbnail_video_height .'';					
		}				
		//else use default width and height
		else {		
			$thumbnail_link = $thumbnail_video_url;	
		}		
		
		
		$thumbnail_zoom = 'video';
	}
	
	
		
	
	
		 
	//thumbnail as link top post
	if ($link_to_post == true) {				
		$output.='<div class="post-thumb align-'.$align.'" style="width:'.$width.'px;max-width:100%;height:auto;">';
		$output.='<div class="zoom-post">';
		$output.='<a href="'. get_permalink() .'" title="">';
    	$output.='<img class="img img-opacity" src="'. $thumbnail['url'] .'" alt="'. esc_attr(get_the_title() ? get_the_title() : get_the_ID()) .'" />';
   	 	$output.='</a>';
		$output.='</div>';
		$output.='</div>';		
	}
	
	//thumbnail link to big image or video
	else {				
		$output.='<div class="post-thumb align-'.$align.'" style="width:'.$width.'px;max-width:100%;height:auto;">';
		$output.='<div class="zoom-'. $thumbnail_zoom .'">';
		$output.='<a '. $thumbnail_rel .' href="'. $thumbnail_link .'">';
    	$output.='<img class="img img-opacity" src="'. $thumbnail['url'] .'" alt="'. esc_attr(get_the_title() ? get_the_title() : get_the_ID()) .'" />';
    	$output.='</a>';
		$output.='</div>';
		$output.='</div>';
	}
	
	
	
	
		
	//show thumbnail
	if ( $echo )
		echo $output;
	else
		return $output;	
	}
}