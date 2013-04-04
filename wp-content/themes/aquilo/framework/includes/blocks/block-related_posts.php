<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */
 
global $post;

$post_meta_date_format = mb2_theme_option('aquilo_blog_post_date_format');
$post_column = mb2_theme_option('aquilo_single_blog_post_related_posts_columns');
$i = 0;




if($post_column == 2){
	$column_class = ' one-two';	
}
elseif($post_column == 3){
	$column_class = ' one-three';	
}
elseif($post_column == 4){
	$column_class = ' one-four';	
}
else{
	$column_class = ' one-three';
}



$related = get_posts( array( 
		'category__in' => wp_get_post_categories($post->ID), 
		'numberposts' => $post_column, 
		'post__not_in' => array($post->ID) 
		) 
	);



if($related){


?>
<div class="related-posts">
<h4 class="title1"><?php _e('Related Posts','aquilo'); ?></h4>
<?php

if( $related ) foreach( $related as $post ) { setup_postdata($post); 


++$i;

if($i == 1){
	$column_class_first = ' first';	
}
else{
	$column_class_first ='';	
}
if($i == $post_column){
	$column_class_last = ' last';		
}
else{
	$column_class_last = '';	
}



$width = get_post_meta ($post->ID, 'meta_post_thumbnail_width', true);
$height = get_post_meta ($post->ID, 'meta_post_thumbnail_height', true);
$slider_count = get_post_meta ($post->ID, 'meta_post_thumbnail_slider_count', true);
$slider = get_post_meta ($post->ID, 'meta_post_thumbnail_slider', true);
$link_to_post = get_post_meta ($post->ID, 'meta_post_thumbnail_link', true);

?>



<div class="related-post-tem<?php echo $column_class; ?><?php echo $column_class_first; ?><?php echo $column_class_last; ?>">
<?php edit_post_link(__('Edit Post', 'aquilo'), '<span class="post-edit">', '</span>'); ?>
<?php mb2_post_thumbnail($width,$height,'center',$link_to_post,$slider,$slider_count,false,false,true); ?>
<h6 class="title related-posts-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h6>
<span class="related-posts-date"><?php the_time(''.$post_meta_date_format.''); ?></span>
</div>


 
<?php }
wp_reset_postdata();
?>
<div class="clear"></div>
</div>


<?php

}