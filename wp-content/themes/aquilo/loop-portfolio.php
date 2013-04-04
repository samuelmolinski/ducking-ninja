<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */ 
global $post;

//load parameters from portfolio metaboxes
$post_column = get_post_meta ($post->ID, 'meta_portfolio_page_post_column', true);
$post_count = get_post_meta ($post->ID, 'meta_portfolio_page_post_count', true);
$description_word_count = get_post_meta ($post->ID, 'meta_portfolio_page_post_description_word_count', true);
$gallery_style = get_post_meta ($post->ID, 'meta_portfolio_page_post_gallery', true);

//set portfolio image width and height (check settings at metaboxes and theme options panel)
$meta_thumbnail_width = get_post_meta ($post->ID, 'meta_portfolio_page_thumbnail_width', true);
$meta_thumbnail_height = get_post_meta ($post->ID, 'meta_portfolio_page_thumbnail_height', true);
$theme_thumbnail_width = mb2_theme_option('aquilo_portfolio_thumbnail_width');
$theme_thumbnail_height = mb2_theme_option('aquilo_portfolio_thumbnail_height');

if($meta_thumbnail_width !='' || $meta_thumbnail_height !=''){
	$width = $meta_thumbnail_width;
	$height = $meta_thumbnail_height;
}
else {
	$width = $theme_thumbnail_width;
	$height = $theme_thumbnail_height;
}

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
	<?php
	$post_counter = 0;	
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;						
	$portfolio_query = new WP_Query('post_type=portfolio&posts_per_page='. $post_count .'&paged='.$paged.'');
	
	if ($portfolio_query->have_posts()) { while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
	?>    
    
	<div id="post-<?php the_ID(); ?>" class="portfolio-item col-<?php echo $portfolio_item_col; ?>">
		<?php edit_post_link(__('Edit Post', 'aquilo'), '<span class="post-edit">', '</span>'); ?>

		<?php
        //load parameters of single portfolio projects
        $slider = get_post_meta ($post->ID, 'meta_post_thumbnail_slider', true);
        $slider_count = get_post_meta ($post->ID, 'meta_post_thumbnail_slider_count', true);
        $link_to_post = get_post_meta ($post->ID, 'meta_post_thumbnail_link', true);
        $post_title_link = get_post_meta ($post->ID, 'meta_portfolio_post_title_link', true);
        		
			
		if($gallery_style != 1){ ?>		
        	<div class="portfolio-item-bg">		
				<div class="portfolio-item-thumb<?php echo $portfolio_item_thumb_class; ?>">
					<?php mb2_post_thumbnail($width,$height,'none',$link_to_post,$slider,$slider_count,false,true,true);?> 
    			</div><!-- end .portfolio-item-thumb -->                              	
            	<div class="portfolio-item-details<?php echo $portfolio_item_details_class; ?>">  	
					<?php	
                    //portfolio item tile		
                    if ($post_title_link == 1) { ?>
                            <h4 class="title"><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>				
                    <?php }			
                    else {	?>			
                        <h4 class="title"><?php echo get_the_title(); ?></h4>			
                    <?php 
                    }								
					//portfolio project terms
					mb2_term_list('project_types',false,false,true); ?>       
        		</div><!-- end .portfolio-item-details -->           
            </div><!-- end .portfolio-item-bg -->
        <?php			
		}		
		else {
		?>
        	<div class="portfolio-item-gallery">            
				<div class="portfolio-item-thumb<?php echo $portfolio_item_thumb_class; ?>">
					<?php mb2_post_thumbnail($width,$height,''.$align.'',false,$slider,$slider_count,false,true,true);?> 
    			</div><!-- end .portfolio-item-gallery -->           
            </div><!-- end .portfolio-item-thumb -->
        <?php		
		 }	
		?>
        </div><!-- end .portfolio-item -->    					
	<?php 
	endwhile;
	}
	else { 
	?> 
    <div class="col-24">         
		<h4><?php echo __('Not Found', 'aquilo'); ?></h4>
		<p><?php echo __("Sorry, no projects matched your criteria.", 'aquilo'); ?></p>
		<?php get_search_form();  ?>
    </div><!-- end .col-24 --> 
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
	mb2_pagination($portfolio_query->max_num_pages,2,'col-24'); 
}
else{ ?>
<nav class="pagination text-pagination">
	<?php next_posts_link(__('<span class="pagination-prev">&larr; Older posts</span>', 'aquilo'), $portfolio_query->max_num_pages); ?>
	<?php previous_posts_link(__('<span class="pagination-next">Newer posts &rarr;</span>', 'aquilo'), $portfolio_query->max_num_pages); ?>
	<div class="clear"></div>
</nav><!-- end .pagination -->
<div class="clear"></div>
<?php 
}