<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */
  
 
//basic parameters loaded from theme options 
//$slide_count = mb2_theme_option('aquilo_slide_count');
$slide_order = mb2_theme_option('aquilo_slide_order');
$slide_order_by = mb2_theme_option('aquilo_slide_orderby');

//define default slider image when user enable slider but not add slide post yet
$default_slider = get_template_directory_uri() . '/images/default-slider-image.jpg';

//check what is the slider layout (parameters from page metaboxes)
$parameter_id = mb2_post_id_replace();
$slides_category = get_post_meta ($parameter_id, 'meta_slider_taxonomy', true);
$layout = get_post_meta ($parameter_id, 'meta_slider_layout', true);
$slide_count = get_post_meta ($parameter_id, 'meta_slider_count', true);




?>
<div class="flex-container">
<div id="main-flexslider" class="flexslider layout-<?php echo $layout; ?>" style="max-width:100%;margin-left:auto;margin-right:auto;">
<ul class="slides">   
<?php





/*-----------------------------------------------------------------------------------*/
/*	define wp_query for slides posts
/*-----------------------------------------------------------------------------------*/
//wp_query if user use id of slides categories
$slider_query_1 = array(
	'post_type'=>'slides',
	'posts_per_page'=>''.$slide_count.'',
	'order'=>''.$slide_order.'',
	'orderby'=>''.$slide_order_by.'',
	'tax_query' => array(
		array(
			'taxonomy' => 'slide_categories',
			'field' => 'id',
			'terms' => mb2_slider_terms_array()
		)
	)
);





//wp_query if user don't use id of slides categories
$slider_query_2 = array(
	'post_type'=>'slides',
	'posts_per_page'=>''.$slide_count.'',
	'order'=>''.$slide_order.'',
	'orderby'=>''.$slide_order_by.''
);





if($slides_category !=''){
	$slider_query = $slider_query_1;	
}
else {
	$slider_query = $slider_query_2;	
}



$flexslider_query = new WP_Query($slider_query);
if ($flexslider_query->have_posts()) { while ( $flexslider_query->have_posts()): $flexslider_query->the_post();






/*-----------------------------------------------------------------------------------*/
/*	Slides parameters from slides postst metaboxes
/*-----------------------------------------------------------------------------------*/
$slide_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );
$slide_caption_enabler = get_post_meta ($post->ID, 'meta_slides_post_caption_enabler', true);
$slide_caption_top_position = get_post_meta ($post->ID, 'meta_slides_post_caption_top_position', true);
$slide_caption_width = get_post_meta ($post->ID, 'meta_slides_post_caption_width', true);
$slide_description = get_post_meta ($post->ID, 'meta_slides_post_description', true);
$slide_caption_bg = get_post_meta ($post->ID, 'meta_slides_post_caption_bg', true);
$slide_caption_align = get_post_meta ($post->ID, 'meta_slides_post_caption_align', true);
$slide_link = get_post_meta ($post->ID, 'meta_slides_post_link', true);
$slide_link_target = get_post_meta ($post->ID, 'meta_slides_post_link_target', true);
$slide_title_enabler = get_post_meta ($post->ID, 'meta_slides_post_title_enabler', true);
$slide_title_font_size = get_post_meta ($post->ID, 'meta_slides_post_title_font_size', true);
$slide_title_font_weight = get_post_meta ($post->ID, 'meta_slides_post_title_font_weight', true);
$slide_title_text_transform = get_post_meta ($post->ID, 'meta_slides_post_title_text_transform', true);
$slide_title_font_style = get_post_meta ($post->ID, 'meta_slides_post_title_font_style', true);
$slide_title_color = get_post_meta ($post->ID, 'meta_slides_post_title_color', true);
$slide_title_bg = get_post_meta ($post->ID, 'meta_slides_post_title_bg', true);
$slide_subtitle = get_post_meta ($post->ID, 'meta_slides_post_subtitle', true);
$slide_subtitle_font_size = get_post_meta ($post->ID, 'meta_slides_post_subtitle_font_size', true);
$slide_subtitle_font_weight = get_post_meta ($post->ID, 'meta_slides_post_subtitle_font_weight', true);
$slide_subtitle_text_transform = get_post_meta ($post->ID, 'meta_slides_post_subtitle_text_transform', true);
$slide_subtitle_font_style = get_post_meta ($post->ID, 'meta_slides_post_subtitle_font_style', true);
$slide_subtitle_color = get_post_meta ($post->ID, 'meta_slides_post_subtitle_color', true);
$slide_subtitle_bg = get_post_meta ($post->ID, 'meta_slides_post_subtitle_bg', true);
$slide_desc = get_post_meta ($post->ID, 'meta_slides_post_description', true);
$slide_desc_color = get_post_meta ($post->ID, 'meta_slides_post_description_color', true);
$slide_desc_bg = get_post_meta ($post->ID, 'meta_slides_post_description_bg', true);



//caption bg css class
if($slide_caption_bg != 1) {
	$is_caption_bg = '';	
}
else {
	$is_caption_bg = 'caption-bg';	
}




//caption align
if($slide_caption_align == 'right') {
	$is_slide_caption_align ='float:right;';	
}
elseif($slide_caption_align == 'center') {
	$is_slide_caption_align ='margin-left:auto;margin-right:auto;';	
}
else {
	$is_slide_caption_align ='float:left;';	
}
	



//title color
$slide_title_color_char = strlen($slide_title_color);

if($slide_title_color_char > 1) {
	$is_slide_title_color = 'color:'.$slide_title_color.';';
}
else {
	$is_slide_title_color = '';
}
	
	
	
	
//title background
$slide_title_bg_char = strlen($slide_title_bg);

if($slide_title_bg_char > 1) {
	$is_slide_title_bg = 'background-color:'.$slide_title_bg.';padding:3px 15px;';
}
else {
	$is_slide_title_bg = '';
}
	
	
	
	
//sub-title color
$slide_subtitle_color_char = strlen($slide_subtitle_color);

if($slide_subtitle_color_char > 1) {
	$is_slide_subtitle_color = 'color:'.$slide_subtitle_color.';';
}
else {
	$is_slide_subtitle_color = '';
}
	
	
	
	
//sub-title background
$slide_subtitle_bg_char = strlen($slide_subtitle_bg);

if($slide_subtitle_bg_char > 1) {
	$is_slide_subtitle_bg = 'background-color:'.$slide_subtitle_bg.';padding:3px 15px;';
}
else {
	$is_slide_subtitle_bg = '';
}
	
	

	
//desc color
$slide_desc_color_char = strlen($slide_desc_color);

if($slide_desc_color_char > 1) {
	$is_slide_desc_color = 'color:'.$slide_desc_color.';';
}
else {
	$is_slide_desc_color = '';
}




//thumbnails control
if($layout == 'thumbnail-control'){	
	$url = $slide_image;
	$width= mb2_theme_option('aquilo_flexslider_thumbnail_width');
	$height = mb2_theme_option('aquilo_flexslider_thumbnail_height');
	$mb2_image=matthewruddy_image_resize($url,$width,$height,true,false);	
	$data_thumb = ' data-thumb="'.$mb2_image['url'].'"';		
}
else {
	$data_thumb='';	
}



	
	
//desc background
$slide_desc_bg_char = strlen($slide_desc_bg);

if($slide_desc_bg_char > 1) {
	$is_slide_desc_bg = 'background-color:'.$slide_desc_bg.';padding:3px 15px;';
}
else {
	$is_slide_desc_bg = '';
}














	
?>    
    
    <li class="slide"<?php echo $data_thumb; ?>>
    
    <?php if ($slide_link !='') { ?>
    	<a class="slide-link" href="<?php echo $slide_link; ?>" target="<?php echo $slide_link_target; ?>">
        	<img class="slide-img" src="<?php echo $slide_image; ?>" alt="" />
        </a>    
    <?php }
	else { ?>
		<img class="slide-img" src="<?php echo $slide_image; ?>" alt="" />
	<?php } ?>    
    
    <?php if ($slide_caption_enabler == 1) { ?>
    <div class="caption <?php echo $is_caption_bg; ?>" style="top: <?php echo $slide_caption_top_position; ?>;">  
    
    <div class="caption-container" style="width:<?php echo $slide_caption_width; ?>;<?php echo $is_slide_caption_align; ?>">    
    <?php if($slide_title_enabler == 1) { ?>
    <h3 class="slide-title" style="font-size:<?php echo $slide_title_font_size; ?>;<?php echo $is_slide_title_color; ?><?php echo $is_slide_title_bg; ?>font-weight:<?php echo $slide_title_font_weight ;?>;text-transform:<?php echo $slide_title_text_transform ;?>;font-style:<?php echo $slide_title_font_style ;?>;"><?php echo get_the_title(); ?></h3><div class="clear"></div>
    <?php } ?>    
    
     <?php if($slide_subtitle != '') { ?>
    <h4 class="slide-sub-title" style="font-size:<?php echo $slide_subtitle_font_size; ?>;<?php echo $is_slide_subtitle_color; ?><?php echo $is_slide_subtitle_bg; ?>font-weight:<?php echo $slide_subtitle_font_weight ;?>;text-transform:<?php echo $slide_subtitle_text_transform ;?>;font-style:<?php echo $slide_subtitle_font_style ;?>;"><?php echo $slide_subtitle; ?></h4><div class="clear"></div>
    <?php } ?>    
    
    <?php if($slide_description !='') { ?>
    <div class="slide-desc" <?php if($slide_desc_color_char > 1 || $slide_desc_bg_char > 1) { echo 'style="'.$is_slide_desc_color.''.$is_slide_desc_bg.'"';}?>><?php echo do_shortcode($slide_description); ?></div> 
    <?php } ?>    
    
    </div>
    <div class="clear"></div>
    </div>    
    <?php } ?>    
    </li> 
<?php

endwhile;               
}
else { 
  echo '<li style="position:relative;"><img src="'.$default_slider.'" alt="" /><div class="caption caption-bg" style="position:absolute;top:40%;">
    	<div class="caption-container" style="width:70%;float:left;"><h3 class="slide-title" style="font-size:220%;">Welcome to Aquilo Flexslider</h3><div class="clear"></div><div class="slide-desc">To use slider You need add <a href="'.home_url().'/wp-admin/post-new.php?post_type=slides">new slide post</a> at "Slides" custom posts type.</div></div></div></li>';				
}

//end loop 
wp_reset_query();
?>
</ul>
</div>
</div>