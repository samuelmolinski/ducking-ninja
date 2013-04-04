<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */
global $post;

//load parameters
$post_sidebar = get_post_meta ($post->ID, 'meta_sidebar', true);
$thumbnail = get_post_meta ($post->ID, 'meta_post_thumbnail', true);
$slider_count = get_post_meta ($post->ID, 'meta_post_thumbnail_slider_count', true);
$navigation = get_post_meta ($post->ID, 'meta_portfolio_post_navigation', true);
$project_info = get_post_meta ($post->ID, 'meta_portfolio_post_project_info', true);
$project_layout = get_post_meta ($post->ID, 'meta_portfolio_post_layout', true);
$width = get_post_meta ($post->ID, 'meta_post_thumbnail_width', true);
$height = get_post_meta ($post->ID, 'meta_post_thumbnail_height', true);
$align = get_post_meta ($post->ID, 'meta_post_thumbnail_align', true);
$echo = $thumbnail;
$media_column_class = '';
$desc_column_class = '';

//define link back to portfolio
$theme_options_link_to_portfolio = mb2_theme_option('aquilo_single_project_link_to_portfolio');

if(!$theme_options_link_to_portfolio){
$portfolio_page_id = mb2_page_id_by_page_template('template-portfolio.php');
}
else {
$portfolio_page_id = $theme_options_link_to_portfolio;	
}

$link_to_portfolio = get_permalink($portfolio_page_id);

//show or hide thumbnail image
if($thumbnail == 1 && $post_sidebar == 0){	
	if($project_layout == 'media-desc'){
		$media_column_class = ' col-16 alpha';
		$desc_column_class = ' col-8 omega';
	}
	elseif($project_layout == 'desc-media'){
		$media_column_class = ' col-16 alpha push-8';
		$desc_column_class = ' col-8 omega pull-16';
	}
	else {
		$media_column_class = '';
		$desc_column_class = '';	
	}	
}

//start loop
if (have_posts()) { while (have_posts()) : the_post(); 
?>
<article class="article single-article">
	<?php edit_post_link(__('Edit Post', 'aquilo'), '<span class="post-edit">', '</span>');
		
	if($navigation == 1) {?>             
		<div class="project-nav">
			<?php
				previous_post_link('<span class="project-nav-prev">%link</span>', __('&larr; Prev','aquilo'), false);					
				echo '<span class="project-nav-back-to-portfolio"><a href="'.$link_to_portfolio.'">'.__('Back to portfolio','aquilo').'</a></span>';
				next_post_link('<span class="project-nav-next">%link</span>', __('Next &rarr;','aquilo'), false);				   
			?>
			<div class="clear"></div>
		</div><!-- end .project-nav -->        
	<?php } ?>
		
	<div class="project-media<?php echo $media_column_class; ?>">	
		<?php mb2_post_thumbnail($width,$height,''.$align.'',false,true,$slider_count,true,false,$echo);?>
	</div><!-- end .project-media -->
        
	<div class="project-desc<?php echo $desc_column_class; ?>">
		<?php the_content();?>            
            
		<?php if($project_info == 1) {?>             
        	<div class="project-info">
				<?php
					mb2_term_list('project_types',true,true,true);
					mb2_term_list('project_skills',true,true,true);				   
				?>
			</div><!-- end .project-info -->        
		<?php } ?>          
	</div><!-- end .project-desc --> 	 
	<div class="clear"></div>       
</article><!-- end article -->
<?php
endwhile;
}
//end loop