<?php

/*-----------------------------------------------------------------------------------*/
/*	General
/*-----------------------------------------------------------------------------------*/
$this->settings['style_general_heading'] = array(
	'section' => 'style',
	'title'   => '',
	'desc'    => __('General', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_predefined_style'] = array(
	'section' => 'style',
	'title'   => __( 'Predefined Style', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => 'blue',
	'choices' => array(
		'blue' => __('Blue','aquilo'),
		'brown' => __('Brown','aquilo'),
		'dark-blue' => __('Dark Blue','aquilo'),
		'gold' => __('Gold','aquilo'),
		'gray' => __('Gray','aquilo'),
		'green' => __('Green','aquilo'),
		'orange' => __('Orange','aquilo'),
		'red' => __('Red','aquilo'),
		'violet' => __('Violet','aquilo')
		)
);
$this->settings[''.$theme_prefix.'_custom_color'] = array(
	'title'   => __( 'Custom Color', 'aquilo'),
	'std'     => '',
	'type'    => 'color',
	'section' => 'style'
);





/*-----------------------------------------------------------------------------------*/
/*	Text and headings
/*-----------------------------------------------------------------------------------*/
$this->settings['style_text_heading'] = array(
	'section' => 'style',
	'title'   => '',
	'desc'    => __('Text and Headings', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_general_text_color'] = array(
	'title'   => __('Text Color', 'aquilo'),
	'std'     => '',
	'type'    => 'color',
	'section' => 'style'
);
$this->settings[''.$theme_prefix.'_general_headings_color'] = array(
	'title'   => __( 'Headings Color', 'aquilo'),
	'std'     => '',
	'type'    => 'color',
	'section' => 'style'
);






/*-----------------------------------------------------------------------------------*/
/*	Links
/*-----------------------------------------------------------------------------------*/
$this->settings['style_links_heading'] = array(
	'section' => 'style',
	'title'   => '',
	'desc'    => __('Links', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_general_links_color'] = array(
	'title'   => __( 'Links Color', 'aquilo'),
	'std'     => '',
	'type'    => 'color',
	'section' => 'style'
);
$this->settings[''.$theme_prefix.'_general_hover_links_color'] = array(
	'title'   => __( 'Hover Links Color', 'aquilo'),
	'std'     => '',
	'type'    => 'color',
	'section' => 'style'
);






/*-----------------------------------------------------------------------------------*/
/*	Background
/*-----------------------------------------------------------------------------------*/
$this->settings['style_background_heading'] = array(
	'section' => 'style',
	'title'   => '',
	'desc'    => __('Background', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_general_background_color'] = array(
	'title'   => __( 'Background Color', 'aquilo'),
	'std'     => '',
	'type'    => 'color',
	'section' => 'style'
);
$this->settings[''.$theme_prefix.'_general_background_image'] = array(
	'title'   => __( 'Background Image', 'aquilo'),
	'desc'    => '',
	'std'     => '',
	'type'    => 'upload',
	'section' => 'style'
);
$this->settings[''.$theme_prefix.'_general_background_image_repeat'] = array(
	'section' => 'style',
	'title'   => __( 'Background Repeat', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => 'no-repeat',
	'choices' => array(
		'repeat' => __('Repeat','aquilo'),		
		'repeat-x' => __('Repeat X','aquilo'),
		'repeat-y' => __('Repeat Y','aquilo'),
		'no-repeat' => __('No Repeat','aquilo')
		)
);
$this->settings[''.$theme_prefix.'_general_background_image_position'] = array(
	'section' => 'style',
	'title'   => __( 'Background Position', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => 'left top',
	'choices' => array(		
		'left top' => __('Left Top', 'aquilo'),
		'left center' => __('Left Center', 'aquilo'),
		'left bottom' => __('Left Bottom', 'aquilo'),
		'right top' => __('Right Top', 'aquilo'),
		'right center' => __('Right Center', 'aquilo'),
		'right bottom' => __('Right Bottom', 'aquilo'),
		'center top' => __('Center Top', 'aquilo'),
		'center bottom' => __('Center Bottom', 'aquilo'),
		'center center' => __('Center', 'aquilo')
		)

);
$this->settings[''.$theme_prefix.'_general_background_image_attachment'] = array(
	'section' => 'style',
	'title'   => __( 'Background Attachment', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => 'scroll',
	'choices' => array(		
		'scroll' => __('Scroll', 'aquilo'),
		'fixed' => __('Fixed', 'aquilo')
		)

);




/*-----------------------------------------------------------------------------------*/
/*	Page heading style
/*-----------------------------------------------------------------------------------*/
$this->settings['style_page_heading'] = array(
	'section' => 'style',
	'title'   => '',
	'desc'    => __('Page Heading Section', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_page_heading_text_color'] = array(
	'title'   => __('Text Color', 'aquilo'),
	'std'     => '',
	'type'    => 'color',
	'section' => 'style'
);
$this->settings[''.$theme_prefix.'_page_heading_headings_color'] = array(
	'title'   => __( 'Headings Color', 'aquilo'),
	'std'     => '',
	'type'    => 'color',
	'section' => 'style'
);
$this->settings[''.$theme_prefix.'_page_heading_links_color'] = array(
	'title'   => __( 'Links Color', 'aquilo'),
	'std'     => '',
	'type'    => 'color',
	'section' => 'style'
);
$this->settings[''.$theme_prefix.'_page_heading_hover_links_color'] = array(
	'title'   => __( 'Hover Links Color', 'aquilo'),
	'std'     => '',
	'type'    => 'color',
	'section' => 'style'
);
$this->settings[''.$theme_prefix.'_page_heading_background_color'] = array(
	'title'   => __( 'Background Color', 'aquilo'),
	'std'     => '',
	'type'    => 'color',
	'section' => 'style'
);
$this->settings[''.$theme_prefix.'_page_heading_background_image'] = array(
	'title'   => __( 'Background Image', 'aquilo'),
	'desc'    => '',
	'std'     => '',
	'type'    => 'upload',
	'section' => 'style'
);
$this->settings[''.$theme_prefix.'_page_heading_background_image_repeat'] = array(
	'section' => 'style',
	'title'   => __( 'Background Repeat', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => 'no-repeat',
	'choices' => array(
		'repeat' => __('Repeat', 'aquilo'),		
		'repeat-x' => __('Repeat X', 'aquilo'),
		'repeat-y' => __('Repeat Y', 'aquilo'),
		'no-repeat' => __('No Repeat', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_page_heading_background_image_position'] = array(
	'section' => 'style',
	'title'   => __( 'Background Position', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => 'left top',
	'choices' => array(		
		'left top' => __('Left Top', 'aquilo'),
		'left center' => __('Left Center', 'aquilo'),
		'left bottom' => __('Left Bottom', 'aquilo'),
		'right top' => __('Right Top', 'aquilo'),
		'right center' => __('Right Center', 'aquilo'),
		'right bottom' => __('Right Bottom', 'aquilo'),
		'center top' => __('Center Top', 'aquilo'),
		'center bottom' => __('Center Bottom', 'aquilo'),
		'center center' => __('Center', 'aquilo')
		)

);




/*-----------------------------------------------------------------------------------*/
/*	Custom CSS
/*-----------------------------------------------------------------------------------*/
$this->settings['custm_css_style_heading'] = array(
		'section' => 'style',
		'title'   => '',
		'desc'    => __('Custom CSS','aquilo'),
		'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_custom_css_style'] = array(
	'title'   => __( 'Custom CSS', 'aquilo'),
	'desc'    => '',
	'std'     => '',
	'type'    => 'textarea',
	'section' => 'style'
);


