<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */ 
$footer_content = mb2_theme_option('aquilo_footer_content');
$tracking_code = mb2_theme_option('aquilo_tracking_code');
$tracking_code_location = mb2_theme_option('aquilo_tracking_code_location');

?>
</div><!-- end #page-middle -->
<div id="page-bottom">

<?php	
	get_template_part('framework/includes/blocks/block','bottom');
	get_template_part('framework/includes/blocks/block','footer');
?>

</div><!-- end #page-bottom -->
</div><!-- end #page -->

<?php if ($tracking_code !='' && $tracking_code_location =='footer' ) {
	echo $tracking_code;	
}

wp_footer(); 
?>
</body>
</html>