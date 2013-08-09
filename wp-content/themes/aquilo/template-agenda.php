<?php 
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 * Template Name: Agenda Template
 *
 */ 
get_header();
global $post; 

//define parameters
$meta_portfolio_filter = get_post_meta ($post->ID, 'meta_agenda_page_filter', true);
?>
<section id="main-content">
	<div class="wrap main-content-wrap portfolio-content-wrap">                 
		<?php 
		if($meta_portfolio_filter == 0){
			get_template_part( 'loop', 'agenda');			
		}
		else {
			get_template_part( 'loop', 'agendaFilter');	
		}		
		?>     
	</div><!-- end .wrap -->
</section><!-- end #main-content -->
<?php get_footer(); ?>