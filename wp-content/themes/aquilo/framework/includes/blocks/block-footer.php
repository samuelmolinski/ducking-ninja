<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */ 


//define parameters
$footer_menu = has_nav_menu('footer_navigation');
$footer_menu_array = array(
	'menu_class' => 'footer-menu',
	'menu_id' => '',
	'container' => 'none',
	'link_before'=> '',
	'link_after' => '',
	'theme_location' => 'footer_navigation',
	'fallback_cb' => '');
$custom_footer_content = mb2_theme_option('aquilo_footer_content');
$custom_footer_content_align = mb2_theme_option('aquilo_footer_content_align');




//check if custom footer content isn't empty
if($custom_footer_content != ''){
	$footer_content = (do_shortcode($custom_footer_content));	
}
else {
	$footer_content = 'Copyright &copy; '.date('Y').' '.get_bloginfo('name').'. All rights reserved.';	
}




//add align class to footer blocks
if($custom_footer_content_align == 'left'){
	$footer_content_class = 'footer-content float-left text-align-left';
	$footer_menu_class = 'float-right text-align-right';	
}
else{	
	$footer_content_class = 'footer-content float-right text-align-right';
	$footer_menu_class = 'float-left text-align-left';
}


?>





<footer id="footer">
<div class="wrap">
<div class="clear separator"></div>
<div class="col-24">

<?php 
if($footer_menu){ ?>
	
    <div class="<?php echo $footer_content_class; ?>"><?php echo $footer_content; ?></div>
	<div class="<?php echo $footer_menu_class; ?>"><?php wp_nav_menu($footer_menu_array); ?></div>    
	
	<?php
}
else { ?>

	<div class="<?php echo $footer_content_class; ?>"><?php echo $footer_content; ?></div>
    	
<?php	
}
?>	
     
</div>
<div class="clear"></div>
</div>
</footer>