<?php

/*-----------------------------------------------------------------------------------*/
/*	Responsive theme
/*-----------------------------------------------------------------------------------*/
$this->settings['layout_extra_heading'] = array(
		'section' => 'extra',
		'title'   => '',
		'desc'    => __( 'Layout', 'aquilo'),
		'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_responsive_theme'] = array(
	'section' => 'extra',
	'title'   => __( 'Responsive Theme', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);





/*-----------------------------------------------------------------------------------*/
/*	Custom logo link
/*-----------------------------------------------------------------------------------*/
$this->settings['logo_extra_heading'] = array(
		'section' => 'extra',
		'title'   => '',
		'desc'    => __( 'Logo', 'aquilo'),
		'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_custom_logo_link'] = array(
	'title'   => __( 'Custom Logo Link', 'aquilo'),
	'desc'    => __( 'Paste custom link for logo.', 'aquilo'),
	'std'     => '',
	'type'    => 'text',
	'section' => 'extra'
);