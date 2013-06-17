<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */
global $post; $more; $more = 0;

//general blog parameters from theme options
$post_count = mb2_theme_option('aquilo_blog_post_count');
$exclude_cats = mb2_theme_option('aquilo_blog_exclude_cats');
$excerpt_content_type = mb2_theme_option('aquilo_blog_excerpt_content_type');
$post_readmore_text = mb2_theme_option('aquilo_blog_post_readmore_text');

//posts parameters from theme options
$post_meta_date = mb2_theme_option('aquilo_blog_post_meta_date');
$post_meta_date_format = mb2_theme_option('aquilo_blog_post_date_format');
$post_meta_author = mb2_theme_option('aquilo_blog_post_meta_author');
$post_meta_comment = mb2_theme_option('aquilo_blog_post_meta_comment');
$post_meta_category = mb2_theme_option('aquilo_blog_post_meta_category');
$post_meta_tags = mb2_theme_option('aquilo_blog_post_meta_tags');

//define blog query
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$blog_query = new WP_Query('posts_per_page='.$post_count.'&cat='.$exclude_cats.'&paged='.$paged.'');


//start loop
if ( $blog_query->have_posts()) { while ( $blog_query->have_posts()): $blog_query->the_post();

	//posts thumbnail parameters from posts metaboxes
	$thumbnail = get_post_meta ($post->ID, 'meta_post_thumbnail', true);
	$video_embed_code = get_post_meta ($post->ID, 'meta_post_video_embed_code', true);
	$width = get_post_meta ($post->ID, 'meta_post_thumbnail_width', true);
	$height = get_post_meta ($post->ID, 'meta_post_thumbnail_height', true);
	$align = get_post_meta ($post->ID, 'meta_post_thumbnail_align', true);
	$slider_count = get_post_meta ($post->ID, 'meta_post_thumbnail_slider_count', true);
	$slider = get_post_meta ($post->ID, 'meta_post_thumbnail_slider', true);
	$link_to_post = get_post_meta ($post->ID, 'meta_post_thumbnail_link', true);
	?> 

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header>
            <?php edit_post_link(__('Edit Post', 'aquilo'), '<span class="post-edit">', '</span>'); ?>                
            <h3 class="title blog-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
            <?php if ($post_meta_date == 1 || $post_meta_author == 1 || $post_meta_category == 1 || $post_meta_comment == 1) { ?>
            <div class="header-article-info">
                <ul>            	     
                    <?php if ($post_meta_date == 1) {  ?>
                        <li class="blog-post-meta-date">
                            <span><?php the_time(''.$post_meta_date_format.''); ?></span>
                        </li>                            
                    <?php } ?> 
                    <?php /*if ($post_meta_author == 1) { ?>
                        <li class="blog-post-meta-author">
                            <?php  echo __('by', 'aquilo');  ?> <span><?php echo the_author_posts_link(); ?></span>
                        </li>							
                    <?php } ?>
                    <?php if ($post_meta_category == 1) {  ?>
                        <li class="blog-post-meta-category">
                            <?php  _e('in', 'aquilo');  ?> <span><?php the_category(', '); ?></span>
                        </li>                            
                        <?php } ?>                   
                    <?php if ($post_meta_comment == 1) {  ?>
                        <li class="blog-post-meta-comment">
                            <span><?php comments_popup_link( __('0 comments', 'aquilo'), __('1 comment', 'aquilo'), __('% comments', 'aquilo'), __('comments-link', 'aquilo'), __('Comments are', 'aquilo')); ?></span>
                        </li>                            
                    <?php }*/ ?>                                						
                </ul>
                <div class="clear"></div>
            </div><!-- end .header-article-info -->        
            <?php } ?>            
        </header><!-- end article header -->             
                    
        <?php mb2_post_thumbnail($width,$height,''.$align.'',$link_to_post,$slider,$slider_count,true,false,true);?>             
                    
        <?php if ($excerpt_content_type == 1) {                 
              the_excerpt();        				
              } else {
                the_content(''); //remove default redmore text with ''
              } ?>
        <?php  if ($post_readmore_text !='') { ?>                
            <a class="readmore" href="<?php echo the_permalink(); ?>">
                <span><?php echo $post_readmore_text; ?></span>
            </a>
        <?php } ?>               
        
        <?php  if ($post_meta_tags == 1 && has_tag()) { ?>
        <footer><div class="clear"></div>  	
            <div class="footer-article-info">		
                <div class="post-meta-tags">                        
                    <?php the_tags('<ul class="tags-list">'. __('<li class="tags-text">Tags:</li>', 'aquilo') .' <li>', '</li><li> ', '</li></ul><div class="clear"></div>'); ?>
                </div><!-- end post-meta-tags -->		               		
            <div class="clear"></div>
            </div><!-- end .footer-article-info -->
        </footer><!-- end article footer -->
        <?php  } ?>        
        <div class="clear"></div>       
    </article><!-- end article -->   
    <?php    
    endwhile;               
    }
    else { ?> 
    <article class="article">         
		<h4><?php echo __('Not Found', 'aquilo'); ?></h4>
		<p><?php echo __("Sorry, no posts matched your criteria.", 'aquilo'); ?></p>
		<?php get_search_form();  ?>
	</article><!-- end article -->	
    <?php 
    wp_reset_postdata();				
} 
//end loop 
wp_reset_query();

//pagination 
if (function_exists('mb2_pagination')) {
	mb2_pagination($blog_query->max_num_pages,2,''); 
}
else{ ?>
<nav class="pagination text-pagination">
	<?php next_posts_link(__('<span class="pagination-prev">&larr; Older posts</span>', 'aquilo'), $blog_query->max_num_pages); ?>
	<?php previous_posts_link(__('<span class="pagination-next">Newer posts &rarr;</span>', 'aquilo'), $blog_query->max_num_pages); ?>
	<div class="clear"></div>
</nav><!-- end .pagination -->
<div class="clear"></div>
<?php 
}