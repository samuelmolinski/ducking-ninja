<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */
get_header();
global $post;

//get page id wich use blog page template
$archive_page_layout = mb2_theme_option('aquilo_archive_page_layout');
$page_content_class = '';
$page_sidebar_class = '';

//check if archive loaded layout from blog page
if($archive_page_layout != '') {
	$page_sidebar = get_post_meta ($archive_page_layout, 'meta_sidebar', true);
	$page_sidebar_position = get_post_meta ($archive_page_layout, 'meta_sidebar_position', true);
	$page_sidebar_name = get_post_meta ($archive_page_layout, 'meta_sidebar_name', true);	
}
else {
	$page_sidebar = mb2_theme_option('aquilo_archive_page_sidebar');
	$page_sidebar_position = mb2_theme_option('aquilo_archive_page_sidebar_position');
	$page_sidebar_name = mb2_theme_option('aquilo_archive_page_sidebar_name');	
}

//width of post container
if ($page_sidebar != 0) {
	$page_content_width = 'col-16';
	
	//content class if sidebar is on right or left position
	if ($page_sidebar_position == 'left') {	
	$page_content_class	= 'push-8';
	$page_sidebar_class	= 'pull-16';
	}
}
elseif (is_attachment()){
	$page_content_width = 'col-24';	
}
else {
	$page_content_width = 'col-24';
}
?>
<section id="main-content">
	<div class="wrap main-content-wrap blog-main-content-wrap">
    	<div class="content blog-content <?php echo $page_content_width; ?> <?php echo $page_content_class; ?>">
        	<?php get_template_part( 'loop', 'archive');?> 
        </div><!-- end .content -->       
        
		<?php if ($page_sidebar != 0 && !is_attachment()) { ?>            
			<aside class="sidebar post-sidebar col-8 <?php echo $page_sidebar_class; ?> <?php echo $page_sidebar_position; ?>">  	                  
                <?php
								
				if ($page_sidebar_name == 'home-sidebar') {					
					get_sidebar('home');
				}
				elseif ($page_sidebar_name == 'portfolio-sidebar') {					
					get_sidebar('portfolio');
				}
				elseif ($page_sidebar_name == 'page1-sidebar') {					
					get_sidebar('page1');
				}
				elseif ($page_sidebar_name == 'page2-sidebar') {					
					get_sidebar('page2');
				}
				elseif ($page_sidebar_name == 'page3-sidebar') {					
					get_sidebar('page3');
				}
				elseif ($page_sidebar_name == 'contact-sidebar') {					
					get_sidebar('contact');
				}
				elseif ($page_sidebar_name == 'search-sidebar') {					
					get_sidebar('search');
				}
				else {					
					get_sidebar('blog');
				}				
				?>           	
           	</aside><!-- end .sidebar -->			
		<?php }	?>         
        <div class="clear"></div>  
	</div><!-- end .wrap main-content-wrap -->
</section><!-- end #main-content -->

<?php get_footer(); ?>