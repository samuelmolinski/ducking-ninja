<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */ 
	
if (sidebar_exist_and_active('sidebar-page3')) {
	dynamic_sidebar('sidebar-page3');
}
else {
?>

<div class="widget">           
<h4 class="title-widget">How to use Page 3 Sidebar?</h4>
	<p>To use this sidebar go to <strong><em>Appearance &rarr; Widgets</em></strong> and publish some widgets in <strong>Page 3 Sidebar</strong> widgets position.</p>
</div>
            
<?php
}