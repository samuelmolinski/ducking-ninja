<?php



/*-----------------------------------------------------------------------------------*/
/*	General
/*-----------------------------------------------------------------------------------*/
$this->settings['general_slider_heading'] = array(
	'section' => 'slider',
	'title'   => '',
	'desc'    => __('General', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_slide_order'] = array(
	'section' => 'slider',
	'title'   => __( 'Order', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => 'DESC',
	'choices' => array(
		'ASC' => __('Ascending', 'aquilo'),
		'DESC' => __('Descending', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_slide_orderby'] = array(
	'section' => 'slider',
	'title'   => __('Order By', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => 'date',
	'choices' => array(
		'none' => __('None', 'aquilo'),
		'ID' => __('ID', 'aquilo'),
		'title' => __('Title', 'aquilo'),
		'date' => __('Date', 'aquilo'),
		'modifed' => __('Modifed', 'aquilo'),
		'rand' => __('Random', 'aquilo')
		)
);





/*-----------------------------------------------------------------------------------*/
/*	Flexslider
/*-----------------------------------------------------------------------------------*/
$this->settings['flexslider_heading'] = array(
	'section' => 'slider',
	'title'   => '',
	'desc'    => 'Flexslider',
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_flexslider_animation_type'] = array(
	'section' => 'slider',
	'title'   => __( 'Animation Type', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => 'fade',
	'choices' => array(
		'fade' => __('Fade', 'aquilo'),
		'slide' => __('Slide', 'aquilo')
		)
);

$this->settings[''.$theme_prefix.'_flexslider_direction'] = array(
	'section' => 'slider',
	'title'   => __( 'Direction', 'aquilo'),
	'desc'    => __( 'Only for \'slide\' animation type.', 'aquilo'),
	'type'    => 'select',
	'std'     => 'horizontal',
	'choices' => array(
		'horizontal' => __('Horizontal', 'aquilo'),
		'vertical' => __('Vertical', 'aquilo')
		)
);

$this->settings[''.$theme_prefix.'_flexslider_slideshow_speed'] = array(
	'title'   => __( 'Slideshow Speed', 'aquilo'),
	'desc'    => '',
	'std'     => '7000',
	'type'    => 'text',
	'section' => 'slider'
);


$this->settings[''.$theme_prefix.'_flexslider_animation_speed'] = array(
	'title'   => __( 'Animation Speed', 'aquilo'),
	'desc'    => '',
	'std'     => '600',
	'type'    => 'text',
	'section' => 'slider'
);

$this->settings[''.$theme_prefix.'_flexslider_direction_navigation'] = array(
	'section' => 'slider',
	'title'   => __( 'Direction Nav', 'aquilo'),
	'desc'    => __( 'Next and Prev navigation.', 'aquilo'),
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);

$this->settings[''.$theme_prefix.'_flexslider_control_navigation'] = array(
	'section' => 'slider',
	'title'   => __('Control Nav', 'aquilo'),
	'desc'    => __('1,2,3... navigation.', 'aquilo'),
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_flexslider_thumbnail_width'] = array(
	'title'   => __( 'Control Thumbnail Width', 'aquilo'),
	'desc'    => '',
	'std'     => '100',
	'type'    => 'text',
	'section' => 'slider'
);
$this->settings[''.$theme_prefix.'_flexslider_thumbnail_height'] = array(
	'title'   => __( 'Control Thumbnail Height', 'aquilo'),
	'desc'    => '',
	'std'     => '50',
	'type'    => 'text',
	'section' => 'slider'
);