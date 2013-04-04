<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */ 
	
if (sidebar_exist_and_active('sidebar-page1')) {
	dynamic_sidebar('sidebar-page1');
}
else {
?>
            
<div class="widget">          
<h4 class="title-widget">How to use Page 1 Sidebar?</h4>
<p>To use this sidebar go to <strong><em>Appearance &rarr; Widgets</em></strong> and publish some widgets in <strong>Page 1 Sidebar</strong> widgets position.</p>
</div> 
            
<?php
}