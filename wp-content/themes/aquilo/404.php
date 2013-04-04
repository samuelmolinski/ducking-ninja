<?php
/**
 *
 * @package WordPress
 * @subpackage Aquilo Theme
 * 
 */

get_header(); 

$error_page_content = mb2_theme_option('aquilo_error_page_content');

?>

<section id="main-content">
    <div class="wrap main-content-wrap">   
		<div class="page-content col-24">
    		<article>
            	<?php if($error_page_content!=''){ 
					echo do_shortcode($error_page_content);					
				}
				else { ?>                
                <h1 class="error-404">404</h1>
                <h3 class="error-404-message"><?php _e('We are sorry, but the page you requested could not be found.', 'aquilo');?></h3>
                <?php } ?>				
			</article><!-- end article -->
		</div><!-- end .page-content -->             
        <div class="clear"></div>
    </div><!-- end .wrap main-content-wrap -->
</section><!-- end #main-content -->

<?php
get_footer();