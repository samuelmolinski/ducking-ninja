<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */
 
global $post;

//get parameters from theme options
$projects_column = mb2_theme_option('aquilo_related_projects_column');
$gallery_style = mb2_theme_option('aquilo_related_projects_gallery');
$width = mb2_theme_option('aquilo_related_projects_thumbnail_width');
$height = mb2_theme_option('aquilo_related_projects_thumbnail_height');

$i = 0;



if($projects_column == 3){	
	$portfolio_item_col = 8;	
}
elseif($projects_column == 4){
	$portfolio_item_col = 6;		
}
else{
	$portfolio_item_col = 24;	
}








$related = mb2_related_posts('project_types',get_the_ID());



?>



<div class="related-portfolio col-24">
<h4 class="title1"><?php _e('Related Projects','aquilo');?></h4>

<?php



if ($related->have_posts()) { while ($related->have_posts()) : $related->the_post();	



//related items parameters
$slider = get_post_meta ($post->ID, 'meta_post_thumbnail_slider', true);
$slider_count = get_post_meta ($post->ID, 'meta_post_thumbnail_slider_count', true);
$link_to_post = get_post_meta ($post->ID, 'meta_post_thumbnail_link', true);
$post_title_link = get_post_meta ($post->ID, 'meta_portfolio_post_title_link', true);





//add alpha and omega class for first and last related portfolio items
++$i;

if($i == 1){
	$alpha_class = ' alpha';	
}
else {
	$alpha_class = '';		
}

if($i == $projects_column){
	$omega_class = ' omega';	
}
else {
	$omega_class = '';		
}






?>			







<div id="post-<?php the_ID(); ?>" class="portfolio-item portfolio-related-item col-<?php echo $portfolio_item_col; ?><?php echo $alpha_class; ?><?php echo $omega_class; ?>">


<?php edit_post_link(__('Edit Post', 'aquilo'), '<span class="post-edit">', '</span>'); ?>






	      
        
		<?php //show portfolio item details	
		if($gallery_style != 1) { ?>
		
        <div class="portfolio-item-bg">
        	
			
			<div class="portfolio-item-thumb">
			<?php mb2_post_thumbnail($width,$height,'none',$link_to_post,$slider,$slider_count,false,true,true);?> 
    		</div>
			
			
			
			   	
            <div class="portfolio-item-details">  	
		
			
			
			
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
        
        
        	
        
        	</div>
        	
            
            </div>
            <?php
			
		}
		
		else {?>
			
            <div class="portfolio-item-gallery">
            
			<div class="portfolio-item-thumb">
			<?php mb2_post_thumbnail($width,$height,'none',false,$slider,$slider_count,false,true,true);?> 
    		</div>
            
            </div>
			
			
			
			<?php 
            }	 	
		
		?> 								


</div>




<?php

endwhile;


} 
?>
<div class="clear"></div>
</div>