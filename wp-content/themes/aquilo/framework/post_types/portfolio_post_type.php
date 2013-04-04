<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme 
 */




add_action('init', 'portfolio_register');  
  
function portfolio_register() {     
  
    register_post_type( 'portfolio', 
		array(  
        'label' => __('Portfolio','nb4'),  
        'singular_label' => __('Project','nb4'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor', 'thumbnail'),
		'menu_icon' => get_stylesheet_directory_uri().'/framework/post_types/portfolio_menu_icon.png')
		);
	
	register_taxonomy( 'project_skills', 'portfolio',
		array(
		'hierarchical' => false,
		'label' => __('Skills','nb4'),
		'singular_label' => __('Skill','nb4'),  
		'query_var' => 'project_skills',
		'rewrite' => array('slug' => 'project_skills'))
		);
		
	register_taxonomy('project_types', 'portfolio', 
		array(
		"hierarchical" => true, 
		"label" => __('Project Types','nb4'), 
		"singular_label" => "Project Type", 
		"rewrite" => true)
		); 
} 







//get featured image to show in portfolio projects preview
function ST4_get_featured_image($post_ID){
	$post_thumbnail_id = get_post_thumbnail_id($post_ID); 	
	if ($post_thumbnail_id){
  		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'portfolio_featured_preview');
  		return $post_thumbnail_img[0];
 	}
}



//add admin columns
add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns"); 

function portfolio_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __('Project','nb4'),
			"thumbnail" => __('Thumbnail','nb4'),  
            //"description" => __('Description','nb4'),
			"skills" => __('Skills','nb4'),              
            "type" => __('Project Types','nb4'),  
        );  
  
        return $columns;  
}




add_action("manage_posts_custom_column",  "portfolio_custom_columns"); 
 
function portfolio_custom_columns($column){  
	global $post;  
	$post_description = get_post_meta ($post->ID, 'meta_project_post_description', true);
	if($post_description ==''){$post_description=__('No description.','nb4');}			
	$post_featured_image = ST4_get_featured_image($post->ID);				

	switch ($column)  { 
		case "thumbnail":  
			echo '<img src="'.$post_featured_image .'" />';
		break; 
		//case "description":  
			//echo mb2_string_length_by_words($post_description, 18);
		//break;
		case "skills":  
			echo get_the_term_list($post->ID, 'project_skills', '', ', ','');  
		break;		              
		case "type":  
			echo get_the_term_list($post->ID, 'project_types', '', ', ','');  
		break;
	}  
}