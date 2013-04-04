<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme 
 */




add_action('init', 'slides_register');  
  
function slides_register() {     
  
    register_post_type( 'slides', 
		array(  
        'label' => __('Slides','nb4'),  
        'singular_label' => __('Slide','nb4'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'thumbnail'),
		'menu_icon' => get_stylesheet_directory_uri().'/framework/post_types/slides_menu_icon.png')
	);
				
		
	register_taxonomy('slide_categories', 'slides', 
		array(
		"hierarchical" => true, 
		"label" => __('Ctegories','nb4'), 
		"singular_label" => "Category", 
		"rewrite" => true)
	);	 
} 


//get featured image to show in portfolio projects preview
function slides_featured_image($post_ID){
	$post_thumbnail_id = get_post_thumbnail_id($post_ID); 	
	if ($post_thumbnail_id){
  		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'slides_featured_preview');
  		return $post_thumbnail_img[0];
 	}
}



//add admin columns
add_filter("manage_edit-slides_columns", "slides_edit_columns"); 

function slides_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __('Title','aquilo'),
			"slide_thumbnail" => __('Image','aquilo'),			  
            "slide_link" => __('Link','aquilo'),
			"slide_category" => __('Category','aquilo') 
        );  
  
        return $columns;  
}


add_action("manage_posts_custom_column",  "slides_custom_columns"); 
 
function slides_custom_columns($column){  
	global $post;  
	$slide_link = get_post_meta ($post->ID, 'meta_slides_post_link', true);
	if($slide_link ==''){$slide_link=__('No link.','aquilo');}			
	$slide_image = slides_featured_image($post->ID);				

	switch ($column)  { 
		case "slide_thumbnail":  
			echo '<img src="'.$slide_image .'" />';
		break; 
		case "slide_link":  
			echo $slide_link;
		break;
		case "slide_category":  
			echo get_the_term_list($post->ID, 'slide_categories', '', ', ','');
		break;
	}  
}