<?php

//sidebar exist function
function sidebar_exist_and_active( $sidebar_name ) {
    global $wp_registered_sidebars;
    foreach ( (array) $wp_registered_sidebars as $index => $sidebar ) {
		if ( in_array($sidebar_name, $sidebar) ) {
			return is_active_sidebar( $sidebar['id'] );
		}
    }
    return false;
}


function my_widgets_init() {
	
	
	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'nb4' ),
		'id' => 'sidebar-blog',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '<div class="clear"></div></div>', 
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);
	
	register_sidebar( array(
		'name' => __( 'Home Sidebar', 'nb4' ),
		'id' => 'sidebar-home',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);
	
	register_sidebar( array(
		'name' => __( 'Portfolio Sidebar', 'nb4' ),
		'id' => 'sidebar-portfolio',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);
	
	register_sidebar( array(
		'name' => __( 'Page 1 Sidebar', 'nb4' ),
		'id' => 'sidebar-page1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);
	
	register_sidebar( array(
		'name' => __( 'Page 2 Sidebar', 'nb4' ),
		'id' => 'sidebar-page2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);
	
	
	
	register_sidebar( array(
		'name' => __( 'Page 3 Sidebar', 'nb4' ),
		'id' => 'sidebar-page3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);
	
	
	register_sidebar( array(
		'name' => __( 'Contact Sidebar', 'nb4' ),
		'id' => 'sidebar-contact',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);
	
	
	register_sidebar( array(
		'name' => __( 'Search Sidebar', 'nb4' ),
		'id' => 'sidebar-search',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '<div class="clear"></div></div>', 
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);	
	
	register_sidebar( array(
		'name' => __( 'Bottom A', 'nb4' ),
		'id' => 'bottom-a',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);
	
	register_sidebar( array(
		'name' => __( 'Bottom B', 'nb4' ),
		'id' => 'bottom-b',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);
	
	register_sidebar( array(
		'name' => __( 'Bottom C', 'nb4' ),
		'id' => 'bottom-c',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);
	
	register_sidebar( array(
		'name' => __( 'Bottom D', 'nb4' ),
		'id' => 'bottom-d',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="title-widget">',
		'after_title' => '</h4>',
		) 
	);
}



add_action( 'widgets_init', 'my_widgets_init' );
?>