<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */ 
	
if (sidebar_exist_and_active('sidebar-contact')) {
	dynamic_sidebar('sidebar-contact');
}
else {
?>

<div class="widget">            
<h4 class="title-widget">How to use Contact Sidebar?</h4>
	<p>To use this sidebar go to <strong><em>Appearance &rarr; Widgets</em></strong> and publish some widgets in <strong>Contact Sidebar</strong> widgets position.</p>
</div> 
            
<?php
}