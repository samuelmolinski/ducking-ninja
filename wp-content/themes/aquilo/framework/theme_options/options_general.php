<?php
	
/*-----------------------------------------------------------------------------------*/
/*	Logo
/*-----------------------------------------------------------------------------------*/
$this->settings['logo_heading'] = array(
		'section' => 'general',
		'title'   => '', // Not used for headings.
		'desc'    => __('Logo','aquilo'),
		'type'    => 'heading'
);

$this->settings[''.$theme_prefix.'_logo_type'] = array(
	'section' => 'general',
	'title'   => __( 'Type', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => 'text',
	'choices' => array(
		'image' => __('Image','aquilo'),
		'text' => __('Text','aquilo')
		)
);

$this->settings[''.$theme_prefix.'_logo_image'] = array(
	'title'   => __( 'Image', 'aquilo'),
	'desc'    => '',
	'std'     => '',
	'type'    => 'upload',
	'section' => 'general'
);

$this->settings[''.$theme_prefix.'_logo_width'] = array(
	'title'   => __( 'Width', 'aquilo'),
	'desc'    => '',
	'std'     => '160px',
	'type'    => 'text',
	'section' => 'general'
);

$this->settings[''.$theme_prefix.'_logo_height'] = array(
	'title'   => __( 'Height', 'aquilo'),
	'desc'    => '',
	'std'     => '58px',
	'type'    => 'text',
	'section' => 'general'
);

$this->settings[''.$theme_prefix.'_logo_margin'] = array(
	'title'   => __( 'Margin', 'aquilo'),
	'desc'    => __( 'Margin: top right bottom left.', 'aquilo'),
	'std'     => '0px 0px 0px 0px',
	'type'    => 'text',
	'section' => 'general'
);

$this->settings[''.$theme_prefix.'_site_slogan'] = array(
	'section' => 'general',
	'title'   => __( 'Site Slogan', 'aquilo'),
	'desc'    => __( 'Site slogan below logo.', 'aquilo'),
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);



/*-----------------------------------------------------------------------------------*/
/*	Favicon
/*-----------------------------------------------------------------------------------*/
$this->settings['favicon_heading'] = array(
		'section' => 'general',
		'title'   => '',
		'desc'    => __('Favicon','aquilo'),
		'type'    => 'heading'
);

$this->settings[''.$theme_prefix.'_favicon'] = array(
	'title'   => __( 'Favicon', 'aquilo'),
	'desc'    => __( 'Upload custom favicon GIF or PNG image 16x16 pixels.', 'aquilo'),
	'std'     => '',
	'type'    => 'upload',
	'section' => 'general'
);




/*-----------------------------------------------------------------------------------*/
/*	Main Menu
/*-----------------------------------------------------------------------------------*/
$this->settings['main_menu_heading'] = array(
		'section' => 'general',
		'title'   => '',
		'desc'    => __( 'Main Menu', 'aquilo'),
		'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_main_menu_margin_top'] = array(
	'title'   => __( 'Margin Top', 'aquilo'),
	'desc'    => '',
	'std'     => '10px',
	'type'    => 'text',
	'section' => 'general'
);



/*-----------------------------------------------------------------------------------*/
/*	Headr content
/*-----------------------------------------------------------------------------------*/
$this->settings['header_heading'] = array(
		'section' => 'general',
		'title'   => '',
		'desc'    => __('Header','aquilo'),
		'type'    => 'heading'
);


$this->settings[''.$theme_prefix.'_header_content'] = array(
	'title'   => __( 'Header Content', 'aquilo'),
	'desc'    => __( 'You may use shortcodes.', 'aquilo'),
	'std'     => '',
	'type'    => 'textarea',
	'section' => 'general'
);




/*-----------------------------------------------------------------------------------*/
/*	Bottom block widgets layout
/*-----------------------------------------------------------------------------------*/
$this->settings['bottom_layout_heading'] = array(
	'section' => 'general',
	'title'   => '',
	'desc'    => __('Bottom Widgets Area Layout', 'aquilo'),
	'type'    => 'heading'
);


$this->settings[''.$theme_prefix.'_bottom_layout_4_cols'] = array(
	'section' => 'general',
	'title'   => __( '4 Columns', 'aquilo'),
	'desc'    => __( 'Case when widgets are published in all Bottom A, B, C, D widgets positions.', 'aquilo'),
	'std'     => '25,25,25,25',
	'type'    => 'select',	
	'choices' => array(
		'25,25,25,25' => '25/25/25/25',
		'50,15,15,15' => '50/15/15/15',
		'15,15,15,50' => '15/15/15/50',
		'15,50,15,15' => '15/50/15/15',
		'15,15,50,15' => '15/15/50/15',
		'40,20,20,20' => '40/20/20/20',
		'20,20,20,40' => '20/20/20/40',
		'20,40,20,20' => '20/40/20/20',
		'20,20,40,20' => '20/20/40/20'		
		)
);


$this->settings[''.$theme_prefix.'_bottom_layout_3_cols'] = array(
	'section' => 'general',
	'title'   => __( '3 Columns', 'aquilo'),
	'desc'    => __( 'Case when widgets are published in 3 from 4 Bottom A, B, C, D widgets positions.', 'aquilo'),
	'std'     => '33,33,33',
	'type'    => 'select',	
	'choices' => array(
		'33,33,33' => '33/33/33',
		'50,25,25' => '50/25/25',
		'25,25,50' => '25/25/50',
		'35,25,40' => '35/25/40',
		'40,25,35' => '40/25/35'	
		)
);


$this->settings[''.$theme_prefix.'_bottom_layout_2_cols'] = array(
	'section' => 'general',
	'title'   => __( '2 Columns', 'aquilo'),
	'desc'    => __( 'Case when widgets are published in 2 from 4 Bottom A, B, C, D widgets positions.', 'aquilo'),
	'std'     => '50,50',
	'type'    => 'select',	
	'choices' => array(
		'50,50' => '50/50',
		'75,25' => '75/25',
		'25,75' => '25/75',
		'60,40' => '60/40',
		'40,60' => '40/60',	
		)
);




/*-----------------------------------------------------------------------------------*/
/*	Footer
/*-----------------------------------------------------------------------------------*/
$this->settings['footer_heading'] = array(
		'section' => 'general',
		'title'   => '',
		'desc'    => __('Footer','aquilo'),
		'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_footer_content'] = array(
	'title'   => __( 'Footer Content', 'aquilo'),
	'desc'    => __( 'You may use shortcodes.', 'aquilo'),
	'std'     => '',
	'type'    => 'textarea',
	'section' => 'general'
);
$this->settings[''.$theme_prefix.'_footer_content_align'] = array(
	'section' => 'general',
	'title'   => __( 'Align', 'aquilo'),
	'desc'    => '',
	'std'     => 'left',
	'type'    => 'select',	
	'choices' => array(
		'left' => __('Left','aquilo'),
		'right' => __('Right','aquilo')
		)
);




/*-----------------------------------------------------------------------------------*/
/*	Tracking code
/*-----------------------------------------------------------------------------------*/
$this->settings['tracking_code_heading'] = array(
	'section' => 'general',
	'title'   => '',
	'desc'    => __('Tracking Code', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_tracking_code_location'] = array(
	'section' => 'general',
	'title'   => __( 'Location', 'aquilo'),
	'desc'    => '',
	'type'    => 'select',
	'std'     => 'footer',
	'choices' => array(
		'header' => __('Header', 'aquilo'),
		'footer' => __('Footer', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_tracking_code'] = array(
	'title'   => __( 'Code', 'aquilo'),
	'desc'    => '',
	'std'     => '',
	'type'    => 'textarea',
	'section' => 'general'
);