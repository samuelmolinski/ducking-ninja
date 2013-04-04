<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */
 
 


/*-----------------------------------------------------------------------------------*/
/*	Feed links
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );



/*-----------------------------------------------------------------------------------*/
/*	Content Width
/*-----------------------------------------------------------------------------------*/
if(!isset($content_width))$content_width = 1080;




/*-----------------------------------------------------------------------------------*/
/*	Shortcodes in widgets
/*-----------------------------------------------------------------------------------*/
add_filter('widget_text', 'do_shortcode');




/*-----------------------------------------------------------------------------------*/
/*	Thumbnails init
/*-----------------------------------------------------------------------------------*/
if ( function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	add_image_size('portfolio_featured_preview', 80, 80, true); 	//thumbnails on admin panel of portfolio posts	
	add_image_size('slides_featured_preview', 160, 80, true); 		//thumbnails on admin panel of slides posts
}




/*-----------------------------------------------------------------------------------*/
/*	Post excerpt content
/*-----------------------------------------------------------------------------------*/
function mb2_excerpt_length( $length ){
$blog_post_word_count = mb2_theme_option('aquilo_blog_post_word_count');
	return $blog_post_word_count; 
}
add_filter( 'excerpt_length', 'mb2_excerpt_length', 999 );



function new_excerpt_more($more){
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//allow shortcodes in excerpt
add_filter('the_excerpt', 'do_shortcode');







/*-----------------------------------------------------------------------------------*/
/*	Custom leght of excerpt
/*-----------------------------------------------------------------------------------*/
function mb2_string_length_by_words($string, $limit) {
    $array_of_words = explode(' ', $string, ($limit + 1));
    if( count($array_of_words) > $limit ){
		array_pop($array_of_words);
    }
    return implode(' ', $array_of_words);
}








/*-----------------------------------------------------------------------------------*/
/*	Display taxonomy list
/*-----------------------------------------------------------------------------------*/
function mb2_term_list($taxonomy='project_types',$link,$title,$echo){ 
	global $post;
	if($title == true){
	if($taxonomy == 'project_types'){
		$taxonomy_title = __('<span class="project-info-title">'.__('Project Types:','aquilo').'</span>','aquilo');	
	}
	elseif($taxonomy == 'project_skills'){
		$taxonomy_title = __('<span class="project-info-title">'.__('Project Skills:','aquilo').'</span>','aquilo');
	}
	}
	else{
		$taxonomy_title ='';	
	}
	$output='';
	$terms = wp_get_post_terms($post->ID, $taxonomy);
	$count = count($terms);
	$i=0;	
	if ($count > 0) {
		$output.='<div class="term-list '.$taxonomy.'">';
		$output.=''.$taxonomy_title.' ';		
    	foreach ($terms as $term){
			$i++;			
			if($link==true){
				if ($count > $i){
        			$output.= '<a href="'.get_term_link($term->slug, ''.$taxonomy.'').'">'.$term->name.'</a>, ';
				}
				else {
					$output.= '<a href="'.get_term_link($term->slug, ''.$taxonomy.'').'">'.$term->name.'</a>';			
				}
			}
			elseif($link==false){
				if ($count > $i){
        			$output.= ''.$term->name .', ';
				}
				else {
					$output.= ''.$term->name.'';				
				}			
			}			
    	}
		$output.= '</div>';	
	}	
	if ($echo)
		echo $output;
	else
		return $output;	
}









/*-----------------------------------------------------------------------------------*/
/*	Related posts
/*-----------------------------------------------------------------------------------*/
function mb2_related_posts($taxonomy,$post_not_in){ 
	global $post;
	$output='';
	$projects_column = mb2_theme_option('aquilo_related_projects_column');
	$post_count = $projects_column;
	$terms = wp_get_post_terms($post->ID, $taxonomy);
	$count = count($terms);
	$i=0;	
	if ($count > 0) {				
    	foreach ($terms as $term){
			$output.= ''.$term->slug.' ';
    	}
	}	
	$terms_array = explode(' ', $output);
	$related_array = array('post_type' => 'portfolio','post__not_in' => array($post_not_in),'posts_per_page' => $post_count,'tax_query' => array(array('taxonomy' => 'project_types','field' => 'slug','terms' => $terms_array)));	
	$related_query = new WP_Query($related_array);	
	return $related_query;
} 








//*-----------------------------------------------------------------------------------*/
/*	Get page id by page template
/*-----------------------------------------------------------------------------------*/
function mb2_page_id_by_page_template($template_name){
    global $wpdb;
    $page_ID = $wpdb->get_var("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = '$template_name' AND meta_key = '_wp_page_template'");
    return $page_ID;
}









/*-----------------------------------------------------------------------------------*/
/*	Change post id
/*-----------------------------------------------------------------------------------*/
function mb2_post_id_replace(){	
	global $post;
		
			
	//check if user set some style at page or post metaboxes
	$static_home_page_id = mb2_theme_option('aquilo_static_home_page');
	$blog_page_id = mb2_page_id_by_page_template('template-blog.php');
	$portfolio_page_id = mb2_page_id_by_page_template('template-portfolio.php');
	$single_post_style = mb2_theme_option('aquilo_single_blog_post_style');
	$archive_page_style = mb2_theme_option('aquilo_archive_page_style');
	$taxonomy_page_style = mb2_theme_option('aquilo_portfolio_archive_page_style');
	$single_project_style = mb2_theme_option('aquilo_single_project_style');
	$search_page_style = mb2_theme_option('aquilo_search_page_style');
	$output ='';


	if(is_front_page()){
		$parameter_id = $static_home_page_id;
	}
	elseif(is_tax() && $taxonomy_page_style !=''){
		$parameter_id = $taxonomy_page_style;
	}
	elseif(is_tax() && $taxonomy_page_style ==''){
		$parameter_id = null;
	}
	elseif(is_archive() && $archive_page_style != ''){
		$parameter_id = $archive_page_style;
	}
	elseif(is_archive() && $archive_page_style == ''){
		$parameter_id = null;
	}
	elseif(is_search() && $search_page_style != ''){
		$parameter_id = $search_page_style;
	}
	elseif(is_search() && $search_page_style == ''){
		$parameter_id = null;	
	}
	elseif(is_404()){
		$parameter_id = null;	
	}
	elseif(is_single() && get_post_type() == 'post' && $single_post_style != ''){
		$parameter_id = $single_post_style;
	}
	elseif(is_single() && get_post_type() == 'portfolio' && $single_project_style != ''){
		$parameter_id = $single_project_style;
	}
	else {
		$parameter_id = $post->ID;		
	}

	return $parameter_id;	
}








/*-----------------------------------------------------------------------------------*/
/*	Return terms array from slider taxonomy
/*-----------------------------------------------------------------------------------*/
function mb2_slider_terms_array(){		
	$parameter_id = mb2_post_id_replace();		
	$slides_category = get_post_meta ($parameter_id, 'meta_slider_taxonomy', true);	
	$slider_terms_array = explode(',', $slides_category);
	return $slider_terms_array;
}







/*-----------------------------------------------------------------------------------*/
/*	Background image function
/*-----------------------------------------------------------------------------------*/
/*
An example how to use this function:

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
);*/




function mb2_theme_style_bg_image($css_selector,array $bg_img){ 
	
	$parameter_id = mb2_post_id_replace();
	$meta_url = get_post_meta ($parameter_id, $bg_img['meta_url'], true);
	$meta_repeat = get_post_meta ($parameter_id, $bg_img['meta_repeat'], true);
	$meta_position = get_post_meta ($parameter_id, $bg_img['meta_position'], true);
	$meta_attachement = get_post_meta ($parameter_id, $bg_img['meta_attachement'], true);			
	$theme_url = mb2_theme_option($bg_img['url']);
	$theme_repeat = mb2_theme_option($bg_img['repeat']);
	$theme_position = mb2_theme_option($bg_img['position']);
	$theme_attachement = mb2_theme_option($bg_img['attachement']);
	$output = '';


		
	if($meta_url !=''){
		$bg_url = $meta_url;
		$bg_repeat = $meta_repeat;
		$bg_position = $meta_position;
		$bg_attachement = $meta_attachement;
	}
	else {
		$bg_url = $theme_url;
		$bg_repeat = $theme_repeat;
		$bg_position = $theme_position;
		$bg_attachement = $theme_attachement;		
	}

		
		
	if($meta_url !='' || $theme_url !=''){


			
	if($bg_img['attachement']!=''){	
		$output .=''.$css_selector.'{background-image:url('.$bg_url.');background-repeat:'.$bg_repeat.';background-position:'.$bg_position.';background-attachment:'.$bg_attachement.';}';
	}		
	else {		
		$output .=''.$css_selector.'{background-image:url('.$bg_url.');background-repeat:'.$bg_repeat.';background-position:'.$bg_position.';}';			
	}

		
		
	}	


	return $output;	
}









/*-----------------------------------------------------------------------------------*/
/*	Css declaration styles function
/*-----------------------------------------------------------------------------------*/
/*
An example how to use this function:

mb2_theme_style('background-color',
	//define html selecteors
	array(
		'body',
		'#page-heading',
		'.bottom'
	),
	//define style parameters from theme options and metaboxes
	array(
	'theme_style' => 'aquilo_general_background_color',
	'meta_style' => 'meta_general_background_color'
	)
);*/


function mb2_theme_style($css_type,array $css_selectors,array $css_style){  

	$parameter_id = mb2_post_id_replace();
	$meta_css_style = get_post_meta($parameter_id, $css_style['meta_style'], true);		
	$theme_css_style = mb2_theme_option($css_style['theme_style']);
	$output = '';





	//start css definition
	if(strlen($meta_css_style) > 1 || strlen($theme_css_style) > 1){
		


	//define foreach of css selectors
	$count = count($css_selectors);
	$i=0;


	foreach ($css_selectors as $key){
		++$i;
		
		if($count > 1 && $count != $i){		
			$output .= ''.$key.',';		
		}		
			
		elseif($count != $i || $count = 1) {		
			$output .=''. $key.'';
		}	
	}




	//start css
	$output .='{'.$css_type.':';


		
	//check what is the sorec of the styles theme options panel or metboxes
	if($meta_css_style !=''){	
		$output .= $meta_css_style;
	}
	else {
		$output .= $theme_css_style;
	}


	//end css
	$output .=';}';

	}
	

	return $output;	
}









/*-----------------------------------------------------------------------------------*/
/*	Custom search form
/*-----------------------------------------------------------------------------------*/
function mb2_search_form($form){
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" ><div><label class="screen-reader-text" for="s">' .__('Search for:', 'aquilo').'</label><input type="text" value="' . get_search_query() .'" name="s" id="s" size="30" /><input type="submit" id="searchsubmit" value="'. esc_attr__('Search', 'aquilo') .'" /></div></form>';
    return $form;
}

add_filter( 'get_search_form', 'mb2_search_form' );



function mb2_comment_form_submit_button($button){
	$button =
		'<input name="submit" type="submit" class="form-submit" tabindex="5" id="[args:id_submit]" value="[args:label_submit]" />' .
		get_comment_id_fields();
	return $button;
}
add_filter('comment_form_submit_button', 'mb2_comment_form_submit_button');