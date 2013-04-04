<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */ 
get_header();
global $post;

//defaine parameters
$related_projects = mb2_theme_option('aquilo_related_projects');
$post_sidebar = get_post_meta ($post->ID, 'meta_sidebar', true);
$post_sidebar_position = get_post_meta ($post->ID, 'meta_sidebar_position', true);
$post_sidebar_name = get_post_meta ($post->ID, 'meta_sidebar_name', true);
$post_content_class = '';
$post_sidebar_class = '';

//width of post container
if ($post_sidebar != 0) {
	$post_content_width = 'col-16';
	
	//content class if sidebar is on right or left position
	if ($post_sidebar_position == 'left') {	
	$post_content_class	= 'push-8';
	$post_sidebar_class	= 'pull-16';
	}
}
elseif (is_attachment()){
	$post_content_width = 'col-24';	
}
else {
	$post_content_width = 'col-24';
}
?>
<section id="main-content">
	<div class="wrap main-content-wrap">    
		<div class="content single-project <?php echo $post_content_width; ?> <?php echo $post_content_class; ?>">			
			<?php get_template_part( 'loop', 'singlePortfolio' ); ?>                     
        </div><!-- end .content -->
		
		<?php if ($post_sidebar  != 0 && !is_attachment()){ ?>             
			<aside class="sidebar post-sidebar col-8 <?php echo $post_sidebar_class; ?> <?php echo $post_sidebar_position; ?>">
                           
                <?php								
					if ($post_sidebar_name == 'home-sidebar'){					
						get_sidebar('home');
					}
					elseif ($post_sidebar_name == 'blog-sidebar'){					
						get_sidebar('blog');
					}
					elseif ($post_sidebar_name == 'page1-sidebar'){					
						get_sidebar('page1');
					}
					elseif ($post_sidebar_name == 'page2-sidebar'){					
						get_sidebar('page2');
					}
					elseif ($post_sidebar_name == 'page3-sidebar'){					
						get_sidebar('page3');
					}
					elseif ($post_sidebar_name == 'contact-sidebar'){					
						get_sidebar('contact');
					}
					elseif ($post_sidebar_name == 'search-sidebar'){					
						get_sidebar('search');
					}
					else {					
						get_sidebar('portfolio');
					}				
				?>         	
           	</aside><!-- end .sidebar -->			
		<?php }	
			//related projects
			if($related_projects == 1){
				get_template_part('framework/includes/blocks/block','related_projects');
			}		
		?>        
        <div class="clear"></div>
    </div><!-- end .wrap -->
</section><!-- end #main-content -->
<?php get_footer(); ?>