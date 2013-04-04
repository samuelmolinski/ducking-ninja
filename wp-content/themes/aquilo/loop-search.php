<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */
global $post;

//general blog parameters from theme options
$post_readmore_text = mb2_theme_option('aquilo_search_post_readmore_text');
$post_word_count = mb2_theme_option('aquilo_search_post_word_count');


//start loop
if (have_posts()) { while (have_posts()): the_post(); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
    	<?php edit_post_link(__('Edit Post', 'aquilo'), '<span class="post-edit">', '</span>'); ?>                
		<h4 class="title blog-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h4>              
	</header><!-- end article header -->	
    <?php echo mb2_string_length_by_words(get_the_excerpt(),$post_word_count); ?>
    <?php  if ($post_readmore_text !='') { ?>                
    	<a class="search-readmore" href="<?php echo the_permalink(); ?>">
        	<span><?php echo $post_readmore_text; ?></span>
        </a>
    <?php } ?>    
</article><!-- end article -->

<?php
endwhile;               
}
else { 
?> 
<article class="article">
	<h4><?php echo __("Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'aquilo'); ?></h4>
	<?php get_search_form();?>
</article><!-- end article -->	
<?php 
wp_reset_postdata();				
} 
//end loop 
wp_reset_query();

//pagination 
if (function_exists('mb2_pagination')) {
	mb2_pagination(); 
}
else{ ?>
<nav class="pagination text-pagination">
	<?php next_posts_link(__('<span class="pagination-prev">&larr; Older posts</span>', 'aquilo')); ?>
	<?php previous_posts_link(__('<span class="pagination-next">Newer posts &rarr;</span>', 'aquilo')); ?>
	<div class="clear"></div>
</nav><!-- end pagination -->
<div class="clear"></div>
<?php 
}