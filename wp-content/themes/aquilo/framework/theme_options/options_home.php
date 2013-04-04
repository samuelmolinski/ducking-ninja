<?php

/*-----------------------------------------------------------------------------------*/
/*	Statc home page
/*-----------------------------------------------------------------------------------*/
$this->settings['static_home_page_heading'] = array(
		'section' => 'front_page',
		'title'   => '',
		'desc'    => __( 'Static Front Page', 'aquilo'),
		'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_static_home_page'] = array(
	'section' => 'front_page',
	'title'   => __( 'Static Front Page', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => '',
	'choices' => $options_pages
);