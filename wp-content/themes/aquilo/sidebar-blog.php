<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */ 
	
if (sidebar_exist_and_active('sidebar-blog')){
	dynamic_sidebar('sidebar-blog');
}
else {
?>

<div class="widget">            
<h4 class="title-widget">How to use Blog Sidebar?</h4>
	<p>To use this sidebar go to <strong><em>Appearance &rarr; Widgets</em></strong> and publish some widgets in <strong>Blog Sidebar</strong> widgets position.</p>
</div>
            
<?php
}