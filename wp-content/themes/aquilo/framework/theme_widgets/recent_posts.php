<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */

//init widget
add_action( 'widgets_init', 'recent_posts_widgets' );


//register widget
function recent_posts_widgets() {
	register_widget( 'Recent_Posts_Widget' );
}
//custom category widget class
class Recent_Posts_Widget extends WP_Widget {
	
	
	//widget setup
	function Recent_Posts_Widget() {
		//settings
		$widget_ops = array( 'classname' => 'widget_recent_posts', 'description' => __('A widget that displays the recent posts by category.', 'aquilo') );		
		//control settings
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'recent-posts-widget' );		
		//create the widget
		$this->WP_Widget( 'recent-posts-widget', __('Mb2 &rarr; Recent Posts', 'aquilo'), $widget_ops, $control_ops );
	}	
	
	//display the widget on the screen
	function widget( $args, $instance ) {
		global $post;
		extract( $args );
		//Variables from the widget settings.
		$title 					= apply_filters('widget_title', $instance['title'] );
		
		//basic parameters
		$basic_post_type 			= $instance['basic_post_type'];
		$basic_category 			= $instance['basic_category'];
		$basic_count 				= $instance['basic_count'];
		$basic_order 				= $instance['basic_order'];
		$basic_order_by				= $instance['basic_order_by'];
		
		//layout parameters
		$layout_gallery_style		= $instance['layout_gallery_style'];
		$layout_post_title 			= $instance['layout_post_title'];
		$layout_post_date			= $instance['layout_post_date'];
		$layout_post_date_format	= $instance['layout_post_date_format'];
		$layout_post_title_link		= $instance['layout_post_title_link'];
		$layout_word_count			= $instance['layout_word_count'];
		$layout_read_more_link		= $instance['layout_read_more_link'];
				
		//thumbnail parameters
		$thumbnail_echo				= $instance['thumbnail_echo'];		
		$thumbnail_width 			= $instance['thumbnail_width'];
		$thumbnail_height	 		= $instance['thumbnail_height'];
		$thumbnail_align			= $instance['thumbnail_align'];			
		
		
		echo $before_widget;
		
		//display widget title
    	if ( $title )
			echo $before_title . $title . $after_title;   
		
		
        
           
           
         echo '<div class="recent-posts-wrap">';
		 
		 
		 
		 $lp = new WP_Query('post_type='.$basic_post_type.'&cat='.$basic_category.'&showposts='.$basic_count.'&order='.$basic_order.'&orderby='.$basic_order_by.'');		
		
		if ($lp->have_posts()) { while ($lp->have_posts()) : $lp->the_post(); 
		
		$width = $thumbnail_width;
		$height = $thumbnail_height;
		$align = $thumbnail_align;
		$video_embed_code = get_post_meta ($post->ID, 'meta_post_video_embed_code', true);
		
		
		//if post have video link thumbnail omage to post
		if($video_embed_code !=''){
			$link_to_post = true;			
		}
		else{
		$link_to_post = get_post_meta ($post->ID, 'meta_post_thumbnail_link', true);	
		}
		
				
		?>
		 
              
        		      
           <?php     
				
				if ($layout_gallery_style == 1) { ?>
						
                        <div class="recent-posts-item recent-posts-item-gallery">
							<?php mb2_post_thumbnail($width,$height,''.$align.'',$link_to_post,false,0,false,false,true);?>
                        </div>
                        
                        
                         						
					<?php
					
					}
				
				else { ?>
                
                <div class="recent-posts-item"> 
                
                <?php				
                 
					if($thumbnail_echo == 1){						
						mb2_post_thumbnail($width,$height,''.$align.'',$link_to_post,false,0,false,false,true);						
					} 				
					
					
					if($layout_post_title == 1 || $layout_post_date == 1 || $layout_word_count > 0){ ?>
						
						<div class="recent-posts-content">
						
						<?php 
						if($layout_post_title == 1) {
							
							if($layout_post_title_link == 1){?>									
								<h6 class="recent-posts-title"><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h6>                                <?php								
								}																
								else { ?>
									<h6 class="recent-posts-title"><?php echo get_the_title(); ?></h6><?php						
								}
							}
							
							if($layout_post_date == 1) { ?>
								
                                <div class="recent-posts-date">
                                	<span><?php the_time(''.$layout_post_date_format.''); ?></span>
                                </div>
								
							<?php 	
							}						
							
							if($layout_word_count > 0) {?>
								
                                <div class="recent-posts-decription">
                                	<?php echo mb2_string_length_by_words(get_the_excerpt(),$layout_word_count); ?> 
                                </div>
                                
                                
                                <?php if ($layout_read_more_link !='') : ?>
                    				<a href="<?php echo the_permalink() ?>" class="readmore recent-posts-readmore"><?php echo $layout_read_more_link; ?></a>
                    			<?php endif; ?>
                                	
							
                            <?php
                            }							
							
							?>                  				
						
						</div>
						<?php						
						}
						
					?>
                    	<div class="clear"></div>                 
            		</div>
                    
                    <?php				
						
				}
				?>
                           
            
            
        	<?php 
			endwhile; 			
			}
			else { ?>
            
            <div class="recent-posts-item">
            	<h6 class="recent-posts-title"><?php echo __('Not Found', 'aquilo'); ?></h6>
                <div class="recent-posts-decription"><?php echo __("Sorry, no posts matched your criteria.", 'aquilo') ?></div>
            </div>
            
            <?php				
				wp_reset_postdata(); 
			} 
			wp_reset_query(); 
	
			
						
			
			
            
        echo '</div><div class="clear"></div>';//end .recent-post-wrap
        
        
        
               
         
        
		
		echo $after_widget;
	}
	

	//Update the widget	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags to remove HTML 
		$instance['title'] 						= strip_tags($new_instance['title']);
		
		//basic parameters
		$instance['basic_post_type'] 			= $new_instance['basic_post_type'];	
		$instance['basic_category'] 			= strip_tags($new_instance['basic_category']);		
		$instance['basic_count'] 				= strip_tags($new_instance['basic_count']);
		$instance['basic_order'] 				= $new_instance['basic_order'];
		$instance['basic_order_by'] 			= $new_instance['basic_order_by'];
				
		//layout parameters
		$instance['layout_gallery_style'] 		= $new_instance['layout_gallery_style'];	
		$instance['layout_post_title'] 			= $new_instance['layout_post_title'];
		$instance['layout_post_date'] 			= $new_instance['layout_post_date'];
		$instance['layout_post_date_format'] 	= $new_instance['layout_post_date_format'];
		$instance['layout_post_title_link'] 	= $new_instance['layout_post_title_link'];
		$instance['layout_word_count'] 			= strip_tags($new_instance['layout_word_count']);	
		$instance['layout_read_more_link'] 		= $new_instance['layout_read_more_link'];
						
		//thumbnail parameters
		$instance['thumbnail_echo'] 			= $new_instance['thumbnail_echo'];
		$instance['thumbnail_width'] 			= strip_tags($new_instance['thumbnail_width']);
		$instance['thumbnail_height'] 			= strip_tags($new_instance['thumbnail_height']);
		$instance['thumbnail_align'] 			= $new_instance['thumbnail_align'];	
			

		return $instance;
	}
	
	function form( $instance ) {
		//default values of parameters
		$defaults = array( 
			'title' => __('Recent Posts', 'aquilo'), 
			
			//basic parameters
			'basic_post_type' => 'post',
			'basic_category' => '',
			'basic_count' => 3,
			'basic_order' => 'DESC',
			'basic_order_by' => 'date', 			
			
			//layout parameters		 
			'layout_gallery_style' => 0,
			'layout_post_title' => 1,
			'layout_post_date' => 1,
			'layout_post_date_format' => 'F j, Y',  
			'layout_post_title_link' => 1, 
			'layout_word_count' => 0, 
			'layout_read_more_link' => __('Read more', 'aquilo'),
			
			 //thumbnail parameters
			'thumbnail_echo' => 1, 
			'thumbnail_width' => 68, 
			'thumbnail_height' => 68,
			'thumbnail_position' => 'left'
			  
			);
			
		$instance = wp_parse_args( (array) $instance, $defaults ); 	?>
        
        
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'aquilo'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="background:#fff;" class="widefat" />
	</p>
    
    
    
      <div style="padding:0 10px;margin-bottom:13px;background:#fcfcfc;border:solid 1px #dfdfdf;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;">
    	
        <h4><?php _e('Basic:', 'aquilo'); ?></h4>
     
     
     
     <p>
    <label for="<?php echo $this->get_field_id('basic_post_type'); ?>"><?php _e('Post Type:', 'aquilo'); ?></label>
	<select style="width:100%;" id="<?php echo $this->get_field_id('basic_post_type'); ?>" name="<?php echo $this->get_field_name('basic_post_type'); ?>">		
        <option value="post" <?php selected ('post', $instance ['basic_post_type']); ?>><?php _e('Normal Post', 'aquilo'); ?></option>
        <option value="portfolio" <?php selected ('portfolio', $instance ['basic_post_type']); ?>><?php _e('Portfolio Post', 'aquilo'); ?></option>        
	</select>
    </p>
    
     
     
     <p>
		<label for="<?php echo $this->get_field_id( 'basic_category' ); ?>"><?php _e('Category ID:', 'aquilo'); ?></label>
		<input id="<?php echo $this->get_field_id( 'basic_category' ); ?>" type="text" name="<?php echo $this->get_field_name( 'basic_category' ); ?>" value="<?php echo $instance['basic_category']; ?>" style="background:#fff;" class="widefat" />
	</p>
    
    
    
    
    
    <p>
		<label for="<?php echo $this->get_field_id( 'basic_count' ); ?>"><?php _e('Post Count:', 'aquilo'); ?></label>
		<input id="<?php echo $this->get_field_id( 'basic_count' ); ?>" type="text" name="<?php echo $this->get_field_name( 'basic_count' ); ?>" value="<?php echo $instance['basic_count']; ?>" style="background:#fff;" class="widefat" />
	</p>
    
    
    
    <p>
    <label for="<?php echo $this->get_field_id('basic_order_by'); ?>"><?php _e('Order:', 'aquilo'); ?></label>
	<select style="width:100%;" id="<?php echo $this->get_field_id('basic_order_by'); ?>" name="<?php echo $this->get_field_name('basic_order_by'); ?>">		
        <option value="none" <?php selected ('none', $instance ['basic_order_by']); ?>><?php _e('None', 'aquilo'); ?></option>
        
        <option value="ID" <?php selected ('ID', $instance ['basic_order_by']); ?>><?php _e('ID', 'aquilo'); ?></option>
        <option value="author" <?php selected ('author', $instance ['basic_order_by']); ?>><?php _e('Author', 'aquilo'); ?></option>
        <option value="title" <?php selected ('title', $instance ['basic_order_by']); ?>><?php _e('Title', 'aquilo'); ?></option>
        <option value="date" <?php selected ('date', $instance ['basic_order_by']); ?>><?php _e('Date', 'aquilo'); ?></option>
        <option value="modified" <?php selected ('modified', $instance ['basic_order_by']); ?>><?php _e('Modified', 'aquilo'); ?></option>
        <option value="parent" <?php selected ('none', $instance ['basic_order_by']); ?>><?php _e('Parent', 'aquilo'); ?></option>
        <option value="rand" <?php selected ('rand', $instance ['basic_order_by']); ?>><?php _e('Rand', 'aquilo'); ?></option>
        <option value="comment_count" <?php selected ('comment_count', $instance ['basic_order_by']); ?>><?php _e('Comment Count', 'aquilo'); ?></option>
        <option value="menu_order" <?php selected ('menu_order', $instance ['basic_order_by']); ?>><?php _e('Menu Order', 'aquilo'); ?></option>
        <option value="meta_value" <?php selected ('meta_value', $instance ['basic_order_by']); ?>><?php _e('Meta Value', 'aquilo'); ?></option>
        <option value="meta_value_num" <?php selected ('meta_value_num', $instance ['basic_order_by']); ?>><?php _e('Meta Value Num', 'aquilo'); ?></option>
        
	</select>
    </p>
    
    
    
    
    
    <p>
    <label for="<?php echo $this->get_field_id('basic_order'); ?>"><?php _e('Order:', 'aquilo'); ?></label>
	<select style="width:100%;" id="<?php echo $this->get_field_id('basic_order'); ?>" name="<?php echo $this->get_field_name('basic_order'); ?>">		
        <option value="ASC" <?php selected ('ASC', $instance ['basic_order']); ?>><?php _e('Ascending', 'aquilo'); ?></option>
        <option value="DESC" <?php selected ('DESC', $instance ['basic_order']); ?>><?php _e('Descending ', 'aquilo'); ?></option>
	</select>
    </p>
    
    
    
    
    
    
    
    
    
    
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
     <div style="padding:0 10px;margin-bottom:13px;background:#fcfcfc;border:solid 1px #dfdfdf;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;">
    	
        <h4><?php _e('Layout:', 'aquilo'); ?></h4>
    
    
    
    
    
     <p>
    <label for="<?php echo $this->get_field_id('layout_gallery_style'); ?>"><?php _e('Gallery Style:', 'aquilo'); ?></label>
	<select style="width:100%;" id="<?php echo $this->get_field_id('layout_gallery_style'); ?>" name="<?php echo $this->get_field_name('layout_gallery_style'); ?>">		
        <option value="0" <?php selected (0, $instance ['layout_gallery_style']); ?>><?php _e('No', 'aquilo'); ?></option>
        <option value="1" <?php selected (1, $instance ['layout_gallery_style']); ?>><?php _e('Yes', 'aquilo'); ?></option>
	</select>
    </p>
    
    
    
    <p>
    <label for="<?php echo $this->get_field_id('layout_post_title'); ?>"><?php _e('Post Title:', 'aquilo'); ?></label>
	<select style="width:100%;" id="<?php echo $this->get_field_id('layout_post_title'); ?>" name="<?php echo $this->get_field_name('layout_post_title'); ?>">		
        <option value="0" <?php selected (0, $instance ['layout_post_title']); ?>><?php _e('No', 'aquilo'); ?></option>
        <option value="1" <?php selected (1, $instance ['layout_post_title']); ?>><?php _e('Yes', 'aquilo'); ?></option>
	</select>
    </p>
    
    
    
    <p>
    <label for="<?php echo $this->get_field_id('layout_post_title_link'); ?>"><?php _e('Title as Link:', 'aquilo'); ?></label>
	<select style="width:100%;" id="<?php echo $this->get_field_id('layout_post_title_link'); ?>" name="<?php echo $this->get_field_name('layout_post_title_link'); ?>">		
        <option value="0" <?php selected (0, $instance ['layout_post_title_link']); ?>><?php _e('No', 'aquilo'); ?></option>
        <option value="1" <?php selected (1, $instance ['layout_post_title_link']); ?>><?php _e('Yes', 'aquilo'); ?></option>
	</select>
    </p>
    
    
    <p>
    <label for="<?php echo $this->get_field_id('layout_post_date'); ?>"><?php _e('Date:', 'aquilo'); ?></label>
	<select style="width:100%;" id="<?php echo $this->get_field_id('layout_post_date'); ?>" name="<?php echo $this->get_field_name('layout_post_date'); ?>">		
        <option value="0" <?php selected (0, $instance ['layout_post_date']); ?>><?php _e('No', 'aquilo'); ?></option>
        <option value="1" <?php selected (1, $instance ['layout_post_date']); ?>><?php _e('Yes', 'aquilo'); ?></option>
	</select>
    </p>
    
    
    
    <p>
	<label for="<?php echo $this->get_field_id( 'layout_post_date_format' ); ?>"><?php _e('Date Format:', 'aquilo'); ?></label>
	<input id="<?php echo $this->get_field_id( 'layout_post_date_format' ); ?>" type="text" name="<?php echo $this->get_field_name( 'layout_post_date_format' ); ?>" value="<?php echo $instance['layout_post_date_format']; ?>" style="background:#fff;" class="widefat" />
	</p>
    
       
        
        
    <p>
	<label for="<?php echo $this->get_field_id( 'layout_word_count' ); ?>"><?php _e('Word Count:', 'aquilo'); ?></label>
	<input id="<?php echo $this->get_field_id( 'layout_word_count' ); ?>" type="text" name="<?php echo $this->get_field_name( 'layout_word_count' ); ?>" value="<?php echo $instance['layout_word_count']; ?>" style="background:#fff;" class="widefat" />
	</p>
    
    
     <p>
	<label for="<?php echo $this->get_field_id( 'layout_read_more_link' ); ?>"><?php _e('Read More Text (or leave empty):', 'aquilo'); ?></label>
	<input id="<?php echo $this->get_field_id( 'layout_read_more_link' ); ?>" type="text" name="<?php echo $this->get_field_name( 'layout_read_more_link' ); ?>" value="<?php echo $instance['layout_read_more_link']; ?>" style="background:#fff;" class="widefat" />
	</p>
     
     
     
     
        
 	</div>
       
       
       
           
   
    
    
    
    
    <div style="padding:0 10px;margin-bottom:13px;background:#fcfcfc;border:solid 1px #dfdfdf;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;">
    	
        <h4><?php _e('Thumbnails:', 'aquilo'); ?></h4>
        
        
        
        <p>
    <label for="<?php echo $this->get_field_id('thumbnail_echo'); ?>"><?php _e('Show Thumbnail:', 'aquilo'); ?></label>
	<select style="width:100%;" id="<?php echo $this->get_field_id('thumbnail_echo'); ?>" name="<?php echo $this->get_field_name('thumbnail_echo'); ?>">		
        <option value="0" <?php selected(0, $instance ['thumbnail_echo']); ?>><?php _e('No', 'aquilo'); ?></option>
        <option value="1" <?php selected(1, $instance ['thumbnail_echo']); ?>><?php _e('Yes', 'aquilo'); ?></option>
	</select>
    </p>
        
               
        
        
        <p>
			<label for="<?php echo $this->get_field_id('thumbnail_width'); ?>"><?php _e('Width:', 'aquilo'); ?></label>
			<input id="<?php echo $this->get_field_id('thumbnail_width'); ?>" type="text" name="<?php echo $this->get_field_name( 'thumbnail_width' ); ?>" value="<?php echo $instance['thumbnail_width']; ?>" style="background:#fff;" class="widefat" />        
        
		</p>   
    
    
   		 <p>
			<label for="<?php echo $this->get_field_id('thumbnail_height'); ?>"><?php _e('Height:', 'aquilo'); ?></label>
			<input id="<?php echo $this->get_field_id('thumbnail_height'); ?>" type="text" name="<?php echo $this->get_field_name( 'thumbnail_height' ); ?>" value="<?php echo $instance['thumbnail_height']; ?>" style="background:#fff;" class="widefat" />        
        
		</p>
    
    
    
   		 <p>
  	 		<label for="<?php echo $this->get_field_id('thumbnail_align'); ?>"><?php _e('Position:', 'aquilo'); ?></label>
			<select style="width:100%;" id="<?php echo $this->get_field_id('thumbnail_align'); ?>" name="<?php echo $this->get_field_name('thumbnail_align'); ?>">
				<option value="left" <?php selected ('left', $instance ['thumbnail_align']); ?>><?php _e('Left', 'aquilo'); ?></option>
                <option value="right" <?php selected ('right', $instance ['thumbnail_align']); ?>><?php _e('Right', 'aquilo'); ?></option>
    		    <option value="center" <?php selected ('center', $instance ['thumbnail_align']); ?>><?php _e('Centered', 'aquilo'); ?></option>
   	 	    
			</select>
   		 </p>  
        
      
    </div>    
    
    
    
	<?php
	}
}