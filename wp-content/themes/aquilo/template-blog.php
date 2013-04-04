<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 * Template Name: Blog Template
 *
 */
get_header();
global $post;

//defaine parameters
$page_sidebar = get_post_meta ($post->ID, 'meta_sidebar', true);
$page_sidebar_position = get_post_meta ($post->ID, 'meta_sidebar_position', true);
$page_sidebar_name = get_post_meta ($post->ID, 'meta_sidebar_name', true);
$page_content_class = '';
$page_sidebar_class = '';

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
			<?php get_template_part( 'loop', 'index');?>
        </div><!-- end .content -->   
        <?php if ($page_sidebar  != 0 && !is_attachment()){ ?>             
			<aside class="sidebar page-sidebar col-8 <?php echo $page_sidebar_class; ?> <?php echo $page_sidebar_position; ?>">       	             
                
                <?php								
					if ($page_sidebar_name == 'home-sidebar'){					
						get_sidebar('home');
					}
					elseif ($page_sidebar_name == 'portfolio-sidebar'){					
						get_sidebar('portfolio');
					}
					elseif ($page_sidebar_name == 'page1-sidebar'){					
						get_sidebar('page1');
					}
					elseif ($page_sidebar_name == 'page2-sidebar'){					
						get_sidebar('page2');
					}
					elseif ($page_sidebar_name == 'page3-sidebar'){					
						get_sidebar('page3');
					}
					elseif ($page_sidebar_name == 'contact-sidebar'){					
						get_sidebar('contact');
					}
					elseif ($page_sidebar_name == 'search-sidebar'){					
						get_sidebar('search');
					}
					else {					
						get_sidebar('blog');
					}				
				?>
                        	
           	</aside><!-- end .sidebar -->			
		<?php }	?>  
        <div class="clear"></div>  
	</div><!-- end .wrap -->
</section><!-- end #main-content -->
<?php get_footer(); ?>