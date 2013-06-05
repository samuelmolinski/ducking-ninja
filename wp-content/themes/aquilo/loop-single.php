<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */
global $post;

//parameters form metaboxes
$thumbnail = get_post_meta ($post->ID, 'meta_post_thumbnail', true);
$slider_count = get_post_meta ($post->ID, 'meta_post_thumbnail_slider_count', true);
$width = get_post_meta ($post->ID, 'meta_post_thumbnail_width', true);
$height = get_post_meta ($post->ID, 'meta_post_thumbnail_height', true);
$align = get_post_meta ($post->ID, 'meta_post_thumbnail_align', true);
$echo = $thumbnail;

//parameters from theme options
$related_posts = mb2_theme_option('aquilo_single_blog_post_related_posts');
$post_meta_date = mb2_theme_option('aquilo_single_blog_post_meta_date');
$post_meta_date_format = mb2_theme_option('aquilo_single_blog_post_date_format');
$post_meta_author = mb2_theme_option('aquilo_single_blog_post_meta_author');
$post_meta_comment = mb2_theme_option('aquilo_single_blog_post_meta_comment');
$post_meta_category = mb2_theme_option('aquilo_single_blog_post_meta_category');
$post_meta_tags = mb2_theme_option('aquilo_single_blog_post_meta_tags');
$post_meta_google = mb2_theme_option('aquilo_single_blog_post_meta_google');
$post_meta_twitter = mb2_theme_option('aquilo_single_blog_post_meta_twitter');
$post_meta_facebook = mb2_theme_option('aquilo_single_blog_post_meta_facebook');
$post_meta_pinit = mb2_theme_option('aquilo_single_blog_post_meta_pinit');


//start loop
if (have_posts()){ while (have_posts()) : the_post(); 
?>
<article id="single-post-<?php the_ID(); ?>" class="article single-article">
	<header>	
    	<?php edit_post_link(__('Edit Post', 'aquilo'), '<span class="post-edit">', '</span>');
		
		if ($post_meta_author == 1 || $post_meta_date == 1 ||$post_meta_comment == 1 ) { ?>
        	<div class="header-article-info">
        		<ul>            		     
                	<?php if ($post_meta_date == 1) {  ?>
                   		<li class="blog-post-meta-date">
                			<span><?php the_time(''.$post_meta_date_format.''); ?></span>
                    	</li>                            
                	<?php } ?> 
                    <?php if ($post_meta_author == 1) { ?>
                		<li class="blog-post-meta-author">
                      	  <span><?php echo the_author_posts_link(); ?></span>
                    	</li>							
               	 	<?php } ?>
                    <?php if ($post_meta_category == 1) {  ?>
					<li class="blog-post-meta-category">
						<span><?php the_category(', '); ?></span>
					</li>                            
					<?php } ?>   
                	<?php if ($post_meta_comment == 1) {  ?>
                		<li class="blog-post-meta-comment">
                    		<span><?php comments_popup_link( __('0 comments', 'aquilo'), __('1 comment', 'aquilo'), __('% comments', 'aquilo'), __('comments-link', 'aquilo'), __('Comments are', 'aquilo')); ?></span>
                		</li>                            
          			<?php } ?>
                                						
				</ul>
            	<div class="clear"></div>
			</div><!-- end .header-article-info -->            
          <?php 
		  }
		  ?>                                
	</header><!-- end article header -->	               
                
	<?php 
		mb2_post_thumbnail($width,$height,''.$align.'',false,true,$slider_count,true,false,$echo); 
		the_content();
	
			 
		if ($post_meta_tags == 1 && has_tag() || $post_meta_google == 1 ||	$post_meta_twitter == 1 || $post_meta_facebook == 1 || $post_meta_pinit == 1){ 
		?>            
	<footer>
    	<div class="clear"></div> 
    	<div class="footer-article-info">			    
			<?php if ($post_meta_tags == 1 && has_tag()) { ?>
				<div class="post-meta-tags">                        
					<?php the_tags('<ul class="tags-list">'. __('<li class="tags-text">Tags:</li>', 'aquilo') .' <li>', '</li><li> ', '</li></ul><div class="clear"></div>'); ?>                        
				</div><!-- end .post-meta-tags -->
			<?php } 
			 if ($post_meta_google == 1 ||	$post_meta_twitter == 1 || $post_meta_facebook == 1 || $post_meta_pinit == 1){ ?>
				<div class="clear"></div>
                <div class="post-meta-social-share">
					<ul>
                        <li class="social-share-text"><?php echo __('Social Shares:', 'aquilo'); ?></li>									
						<?php if($post_meta_google == 1) { ?>		
							<li class="social-google">
								<g:plusone size="medium"></g:plusone>
								<script type="text/javascript">
									(function() {
										var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
										po.src = 'https://apis.google.com/js/plusone.js';
										var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
									})();
								</script>
							</li>
						<?php } ?>
						<?php if($post_meta_twitter == 1) { ?>
							<li class="social-twitter">							
								<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
								<script type="text/javascript">
									!function(d,s,id){
										var js,fjs=d.getElementsByTagName(s)[0];
										if(!d.getElementById(id)){
										js=d.createElement(s);js.id=id;
										js.src="//platform.twitter.com/widgets.js";
										fjs.parentNode.insertBefore(js,fjs);}
									}(document,"script","twitter-wjs");
								</script>
							</li>
						<?php } ?>
						<?php if($post_meta_facebook == 1) { ?>
							<li class="social-facebook">
								<div id="fb-root"></div>
								<script type="text/javascript">
									(function(d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (d.getElementById(id)) return;
										js = d.createElement(s); js.id = id;
										js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
										fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));
								</script>
								<div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true"></div>
							</li>
						<?php } ?>							
						<?php if($post_meta_pinit == 1) { ?>
							<li class="social-pinit">									
								<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($display_post->ID), 'thumbnail' ); echo $thumb['0']; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
								<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>								
							</li>
						<?php } ?>
					</ul>
				</div><!-- end .post-meta-social-share -->
			<?php }	?>          
            <div class="clear"></div>
        </div><!-- end .footer-article-info -->
	</footer><!-- end article footer -->
    <?php }	?>           
	<div class="clear"></div>    
   
   	<?php 
   	//related posts 
   	if($related_posts == 1) {
		//get_template_part('framework/includes/blocks/block','related_posts');
   	}
	
	//comments_template('', true); 
	?>		 
     <div class="clear"></div>       
</article>

<?php 
endwhile;				
} 
//end loop