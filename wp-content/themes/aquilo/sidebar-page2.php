<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */ 
	
if (sidebar_exist_and_active('sidebar-page2')) {
	dynamic_sidebar('sidebar-page2');
}
else {
?>
            
<div class="widget">          
<h4 class="title-widget">How to use Page 2 Sidebar?</h4>
<p>To use this sidebar go to <strong><em>Appearance &rarr; Widgets</em></strong> and publish some widgets in <strong>Page 2 Sidebar</strong> widgets position.</p>
</div>            
<?php
}