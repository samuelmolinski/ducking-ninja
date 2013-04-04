<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */
global $post;

$post_column = mb2_theme_option('aquilo_portfolio_archive_column');
$description_word_count = mb2_theme_option('aquilo_portfolio_archive_description_word_count');
$gallery_style = mb2_theme_option('aquilo_portfolio_archive_gallery_style');
$width = mb2_theme_option('aquilo_portfolio_archive_thumbnail_width');
$height = mb2_theme_option('aquilo_portfolio_archive_thumbnail_height');

//set portfolio columns layout
$portfolio_item_thumb_class	= '';
$portfolio_item_details_class	= '';

if($post_column == 2) {
	$portfolio_item_col = 12;
}
elseif($post_column == 3) {
	$portfolio_item_col = 8;
}
elseif($post_column == 4) {
	$portfolio_item_col = 6;
}
else {
	$portfolio_item_col = 24;
	$portfolio_item_thumb_class	= ' col-14 alpha';
	$portfolio_item_details_class = ' col-10 omega';
}


?>
<div id="portfolio-wrap" class="portfolio-wrap-col-<?php echo $post_column; ?>">
<?php if ( have_posts()) { while ( have_posts()): the_post(); ?> 
	
    <div id="post-<?php the_ID(); ?>" class="portfolio-item col-<?php echo $portfolio_item_col; ?>">
		<?php
        $slider = get_post_meta ($post->ID, 'meta_post_thumbnail_slider', true);
        $slider_count = get_post_meta ($post->ID, 'meta_post_thumbnail_slider_count', true);
        $link_to_post = get_post_meta ($post->ID, 'meta_post_thumbnail_link', true);
        $post_description = get_post_meta ($post->ID, 'meta_portfolio_post_description', true);
        $post_title_link = get_post_meta ($post->ID, 'meta_portfolio_post_title_link', true);
        
        edit_post_link(__('Edit Post', 'aquilo'), '<span class="post-edit">', '</span>');		
		
		if($gallery_style == 1 && $post_column != 1){?>			
            <div class="portfolio-item-gallery">            
				<div class="portfolio-item-thumb<?php echo $portfolio_item_thumb_class; ?>">
					<?php mb2_post_thumbnail($width,$height,'none',$link_to_post,$slider,$slider_count,false,true,true);?> 
    			</div><!-- end .portfolio-item-thumb -->          
            </div><!-- end .portfolio-item-gallery -->
        <?php		
		 }		 
		 else {			 
		?>		
        	<div class="portfolio-item-bg">
            	<div class="portfolio-item-thumb<?php echo $portfolio_item_thumb_class; ?>">
					<?php mb2_post_thumbnail($width,$height,'none',$link_to_post,$slider,$slider_count,false,true,true);?> 
    			</div><!-- end .portfolio-item-thumb -->
                                	
            	<div class="portfolio-item-details<?php echo $portfolio_item_details_class; ?>">			
					<?php	
                    if ($post_title_link == 1) { ?>
                        <h4 class="title"><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>				
                    <?php }			
                        else {	?>			
                        <h4 class="title"><?php echo get_the_title(); ?></h4>			
                    <?php 			
                    }				
					if($description_word_count > 0 && $post_column == 1) {?>
						<div class="portfolio-item-desc">
							<?php echo mb2_string_length_by_words(get_the_excerpt(),$description_word_count); ?>
						</div><!-- end .portfolio-item-desc -->
					<?php
					}			
					if($post_column == 1){
					//portfolio project terms
						mb2_term_list('project_types',false,true,true);
					}
					else {
						mb2_term_list('project_types',false,false,true);			
					} ?>		        	
        		</div><!-- end .portfolio-item-details -->        					
            	<div class="clear"></div>
            </div><!-- end .portfolio-item-bg -->
			<?php		 
		}?> 
	</div><!-- end .portfolio-item -->

<?php
endwhile;               
}
else { ?> 
	<div class="col-24">         
		<h4><?php echo __('Not Found', 'aquilo'); ?></h4>
		<p><?php echo __('Sorry, no posts matched your criteria.', 'aquilo'); ?></p>
		<?php get_search_form();  ?>
	</div> 	
<?php
wp_reset_postdata();				
} 
wp_reset_query(); 
?>

<div class="clear"></div>		
</div><!-- end #portfolio-wrap -->
				
<?php
//pagination 
if (function_exists('mb2_pagination')) {
	mb2_pagination('',2,'col-24'); 
}
else{ ?>
	<nav class="pagination text-pagination">
		<?php next_posts_link(__('<span class="pagination-prev">&larr; Older posts</span>', 'aquilo')); ?>
		<?php previous_posts_link(__('<span class="pagination-next">Newer posts &rarr;</span>', 'aquilo')); ?>
		<div class="clear"></div>
	</nav><!-- end .pagination -->
	<div class="clear"></div>
<?php 
}