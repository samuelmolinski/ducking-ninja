<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */ 
	
if (sidebar_exist_and_active('sidebar-search')) {
	dynamic_sidebar('sidebar-search');
}
else {
?>

<div class="widget">           
<h4 class="title-widget">How to use Search Sidebar?</h4>
	<p>To use this sidebar go to <strong><em>Appearance &rarr; Widgets</em></strong> and publish some widgets in <strong>Search Sidebar</strong> widgets position.</p>
</div> 
            
<?php
}