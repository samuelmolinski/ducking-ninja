<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */

//init widget
add_action( 'widgets_init', 'flickr_widgets' );


//register widget
function flickr_widgets() {
	register_widget( 'Flickr_Widget' );
}
//custom category widget class
class Flickr_Widget extends WP_Widget {
	
	
	//widget setup
	function Flickr_Widget() {
		//settings
		$widget_ops = array( 'classname' => 'widget_flickr', 'description' => __('A widget that displays the images from flickr.', 'nb4') );		
		//control settings
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'flickr-widget' );		
		//create the widget
		$this->WP_Widget( 'flickr-widget', __('Mb2 &rarr; Flickr Widget', 'nb4'), $widget_ops, $control_ops );
	}
	
	
	//display the widget on the screen
	function widget( $args, $instance ) {
		extract( $args );
		//Variables from the widget settings.
		$title 					= apply_filters('widget_title', $instance['title'] );
		$flickr_id 				= $instance['flickr_id'];
		$image_count 			= $instance['image_count'];

		echo $before_widget;
		
		//display widget title
    	if ( $title )
			echo $before_title . $title . $after_title;   
						
		//start widget html layout	
			
		?>    
       
       
       
       
       <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?show_name=1&amp;count=<?php echo $image_count ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flickr_id ?>"></script>
	<div class="clear"></div>
        
        
        
        
		
		<?php
		
		echo $after_widget;
	}
	

	//Update the widget	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags to remove HTML 
		$instance['title'] 			= strip_tags( $new_instance['title'] );	
		$instance['flickr_id'] 		= strip_tags( $new_instance['flickr_id'] );
		$instance['image_count'] 	= strip_tags( $new_instance['image_count'] );
			

		return $instance;
	}
	
	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'title' => __('Flickr Photostream', 'nb4'), 'flickr_id' => '52617155@N08', 'image_count' => 8 ); 
		$instance = wp_parse_args( (array) $instance, $defaults ); 	?>
        
        
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'nb4'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="background:#fff;" class="widefat" />
	</p>
    
    
    
     <p>
		<label for="<?php echo $this->get_field_id( 'flickr_id' ); ?>"><?php _e('Flickr ID <a style=\'text-decoration:none;\' href=\'http://idgettr.com/\' target=\'_blank\'>Get ID.</a>:', 'nb4'); ?></label>
		<input id="<?php echo $this->get_field_id( 'flickr_id' ); ?>" type="text" name="<?php echo $this->get_field_name( 'flickr_id' ); ?>" value="<?php echo $instance['flickr_id']; ?>" style="background:#fff;" class="widefat" />
	</p>
    
    
    <p>
		<label for="<?php echo $this->get_field_id( 'image_count' ); ?>"><?php _e('Count of Images:', 'nb4'); ?></label>
		<input id="<?php echo $this->get_field_id( 'image_count' ); ?>" type="text" name="<?php echo $this->get_field_name( 'image_count' ); ?>" value="<?php echo $instance['image_count']; ?>" style="background:#fff;" class="widefat" />
	</p>             
        
		
		

	<?php
	}
}