<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */
get_header();
global $data;
?>
<section id="main-content">
	<div class="wrap main-content-wrap">		
		<?php get_template_part('loop', 'archivePortfolio');?>          
		<div class="clear"></div>
    </div><!-- end .wrap -->
</section><!-- end #main-content -->
<?php get_footer(); ?>