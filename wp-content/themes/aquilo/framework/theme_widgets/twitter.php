<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */

//init widget
add_action( 'widgets_init', 'twitter_widgets' );


//register widget
function twitter_widgets() {
	register_widget( 'Twitter_Widget' );
}
//custom category widget class
class Twitter_Widget extends WP_Widget {
	
	
	//widget setup
	function Twitter_Widget() {
		//settings
		$widget_ops = array( 'classname' => 'widget_twitter', 'description' => __('A widget that displays the latest posts from Twitter.', 'aquilo') );		
		//control settings
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'twitter-widget' );		
		//create the widget
		$this->WP_Widget( 'twitter-widget', __('Mb2 &rarr; Twitter Widget', 'aquilo'), $widget_ops, $control_ops );
	}
	
	
	//display the widget on the screen
	function widget( $args, $instance ) {
		extract( $args );
		//Variables from the widget settings.
		$title 					= apply_filters('widget_title', $instance['title'] );
		$twitter_username 		= $instance['twitter_username'];
		$post_count 			= $instance['post_count'];
		$follow_text 			= $instance['follow_text'];

		echo $before_widget;
		
		//display widget title
    	if ( $title )
			echo $before_title . $title . $after_title;   
						
		//start widget html layout	
			
		?>    
       
       
       <script type="text/javascript">    
	    jQuery(document).ready(function($) {    	
	    	$.getJSON('https://api.twitter.com/1/statuses/user_timeline/<?php echo $twitter_username ?>.json?count=<?php echo $post_count ?>&callback=?', function(data){
	    		$.each(data, function(index, item){
	    			$('#twitter').append('<li class="tweet"><span class="tweet-content">' + item.text.linkify().parseUsername() + '<br/></span><span class="time-ago">' + relative_time(item.created_at) + '</span></li>');
	    		});	    	
	    	});
			
	    	function relative_time(time_value) {
	    	  var values = time_value.split(" ");
	    	  time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
	    	  var parsed_date = Date.parse(time_value);
	    	  var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
	    	  var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
	    	  delta = delta + (relative_to.getTimezoneOffset() * 60);
	    	  
	    	  var r = '';
	    	  if (delta < 60) {
	    		r = 'a minute ago';
	    	  } else if(delta < 120) {
	    		r = 'couple of minutes ago';
	    	  } else if(delta < (45*60)) {
	    		r = (parseInt(delta / 60)).toString() + ' minutes ago';
	    	  } else if(delta < (90*60)) {
	    		r = 'an hour ago';
	    	  } else if(delta < (24*60*60)) {
	    		r = '' + (parseInt(delta / 3600)).toString() + ' hours ago';
	    	  } else if(delta < (48*60*60)) {
	    		r = '1 day ago';
	    	  } else {
	    		r = (parseInt(delta / 86400)).toString() + ' days ago';
	    	  }	    	  
	    	  return r;
	    	}			
			String.prototype.parseUsername = function() {
    			return this.replace(/[@]+[A-Za-z0-9-_]+/g, function(u) {
       			var username = u.replace("@","")
        		return u.link("http://twitter.com/"+username);
    			});
			};	    	
	    	String.prototype.linkify = function() {
	    		return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/, function(m) {
	    			return m.link(m);
	    		});
	    	};
				    	
	    });		
    </script>
	
	<ul id="twitter"></ul> 
	
	<?php if ($follow_text !='') : ?>
		<a class="twitter-link" href="https://twitter.com/<?php echo $twitter_username ?>"><?php echo $follow_text ?></a>	
	<?php endif; ?>
        
        
        
        
		
		<?php
		
		echo $after_widget;
	}
	

	//Update the widget	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags to remove HTML 
		$instance['title'] 				= strip_tags( $new_instance['title'] );	
		$instance['twitter_username'] 	= strip_tags( $new_instance['twitter_username'] );
		$instance['post_count'] 		= strip_tags( $new_instance['post_count'] );
		$instance['follow_text'] 		= strip_tags( $new_instance['follow_text'] );
			

		return $instance;
	}
	
	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 
			'title' => __('Latest Tweets', 'aquilo'), 
			'twitter_username' => 'envato', 
			'post_count' => 3, 
			'follow_text' => 'Follow Us on Twitter' 
			); 
			
		$instance = wp_parse_args( (array) $instance, $defaults ); 	?>
        
        
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'aquilo'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="background:#fff;" class="widefat" />
	</p>
    
    
    
     <p>
		<label for="<?php echo $this->get_field_id( 'twitter_username' ); ?>"><?php _e('Twitter Username:', 'aquilo'); ?></label>
		<input id="<?php echo $this->get_field_id( 'twitter_username' ); ?>" type="text" name="<?php echo $this->get_field_name( 'twitter_username' ); ?>" value="<?php echo $instance['twitter_username']; ?>" style="background:#fff;" class="widefat" />
	</p>
    
    
    <p>
		<label for="<?php echo $this->get_field_id( 'post_count' ); ?>"><?php _e('Posts Count:', 'aquilo'); ?></label>
		<input id="<?php echo $this->get_field_id( 'post_count' ); ?>" type="text" name="<?php echo $this->get_field_name( 'post_count' ); ?>" value="<?php echo $instance['post_count']; ?>" style="background:#fff;" class="widefat" />
	</p> 
    
    
    <p>
		<label for="<?php echo $this->get_field_id( 'follow_text' ); ?>"><?php _e('Follow Text:', 'aquilo'); ?></label>
		<input id="<?php echo $this->get_field_id( 'follow_text' ); ?>" type="text" name="<?php echo $this->get_field_name( 'follow_text' ); ?>" value="<?php echo $instance['follow_text']; ?>" style="background:#fff;" class="widefat" />
	</p>             
        
		
		

	<?php
	}
}