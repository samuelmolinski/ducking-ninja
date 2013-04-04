<?php

/*-----------------------------------------------------------------------------------*/
/*	General
/*-----------------------------------------------------------------------------------*/
$this->settings['general_fonts_heading'] = array(
	'section' => 'fonts',
	'title'   => '',
	'desc'    => __('General', 'aquilo'),
	'type'    => 'heading'
);


$this->settings[''.$theme_prefix.'_general_google_font'] = array(
	'section' => 'fonts',
	'title'   => __( 'Google Fonts', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo') 
		)
);


$this->settings[''.$theme_prefix.'_general_google_font_family'] = array(
	'title'   => __( 'Google Font Name', 'aquilo'),
	'desc'    => '',
	'std'     => 'Source Sans Pro',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_general_font_family'] = array(
	'section' => 'fonts',
	'title'   => __( 'Font Family', 'aquilo'),
	'desc'    => '',
	'std'     => 'Arial, Helvetica, sans-serif',
	'type'    => 'select',	
	'choices' => array(
		'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
		'Georgia, \'Times New Roman\', Times, serif' => 'Georgia, \'Times New Roman\', Times, serif',
		'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
		'\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif' => '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif',
		'\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif' => '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif',
		'\'Trebuchet MS\', Arial, Helvetica, sans-serif' => '\'Trebuchet MS\', Arial, Helvetica, sans-serif'
		)
);


$this->settings[''.$theme_prefix.'_general_font_size'] = array(
	'title'   => __( 'Font Size', 'aquilo'),
	'desc'    => '',
	'std'     => '14px',
	'type'    => 'text',
	'section' => 'fonts'
);





/*-----------------------------------------------------------------------------------*/
/*	Headings
/*-----------------------------------------------------------------------------------*/
$this->settings['headings_fonts_heading'] = array(
	'section' => 'fonts',
	'title'   => '',
	'desc'    => 'Headings',
	'type'    => 'heading'
);


$this->settings[''.$theme_prefix.'_headings_google_font'] = array(
	'section' => 'fonts',
	'title'   => __( 'Google Fonts', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);


$this->settings[''.$theme_prefix.'_headings_google_font_family'] = array(
	'title'   => __( 'Google Font Name', 'aquilo'),
	'desc'    => '',
	'std'     => 'Oxygen',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_headings_font_family'] = array(
	'section' => 'fonts',
	'title'   => __( 'Font Family', 'aquilo'),
	'desc'    => '',
	'std'     => 'Arial, Helvetica, sans-serif',
	'type'    => 'select',	
	'choices' => array(
		'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
		'Georgia, \'Times New Roman\', Times, serif' => 'Georgia, \'Times New Roman\', Times, serif',
		'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
		'\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif' => '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif',
		'\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif' => '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif',
		'\'Trebuchet MS\', Arial, Helvetica, sans-serif' => '\'Trebuchet MS\', Arial, Helvetica, sans-serif'
		)
);


$this->settings[''.$theme_prefix.'_h1_font_size'] = array(
	'title'   => __( 'Heading 1 Size', 'aquilo'),
	'desc'    => '',
	'std'     => '26px',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_h2_font_size'] = array(
	'title'   => __( 'Heading 2 Size', 'aquilo'),
	'desc'    => '',
	'std'     => '24px',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_h3_font_size'] = array(
	'title'   => __( 'Heading 3 Size', 'aquilo'),
	'desc'    => '',
	'std'     => '22px',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_h4_font_size'] = array(
	'title'   => __( 'Heading 4 Size', 'aquilo'),
	'desc'    => '',
	'std'     => '18px',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_h5_font_size'] = array(
	'title'   => __( 'Heading 5 Size', 'aquilo'),
	'desc'    => '',
	'std'     => '16px',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_h6_font_size'] = array(
	'title'   => __( 'Heading 6 Size', 'aquilo'),
	'desc'    => '',
	'std'     => '14px',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_headings_font_weight'] = array(
	'section' => 'fonts',
	'title'   => __( 'Font Weight', 'aquilo'),
	'desc'    => '',
	'std'     => 'normal',
	'type'    => 'select',	
	'choices' => array(
		'normal' => __('Normal', 'aquilo'),
		'bold' => __('Bold', 'aquilo'),
		'bolder' => __('Bolder', 'aquilo'),
		'lighter' => __('Lighter', 'aquilo'),
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900'
		)
);

$this->settings[''.$theme_prefix.'_headings_text_transform'] = array(
	'section' => 'fonts',
	'title'   => __( 'Text Transform', 'aquilo'),
	'desc'    => '',
	'std'     => 'none',
	'type'    => 'select',	
	'choices' => array(
		'none' => __('None','aquilo'),
		'uppercase' => __('Uppercase', 'aquilo'),
		'lowercase' => __('Lowercase', 'aquilo'),
		'capitalize' => __('Capitalize', 'aquilo')
		)
);

$this->settings[''.$theme_prefix.'_headings_font_style'] = array(
	'section' => 'fonts',
	'title'   => __( 'Font Style', 'aquilo'),
	'desc'    => '',
	'std'     => 'normal',
	'type'    => 'select',	
	'choices' => array(
		'normal' => __('Normal', 'aquilo'),
		'italic' => __('Italic', 'aquilo'),
		'oblique' => __('Oblique', 'aquilo')
		)
);




/*-----------------------------------------------------------------------------------*/
/*	Menu
/*-----------------------------------------------------------------------------------*/
$this->settings['menu_fonts_heading'] = array(
	'section' => 'fonts',
	'title'   => '',
	'desc'    => __('Menu', 'aquilo'),
	'type'    => 'heading'
);


$this->settings[''.$theme_prefix.'_menu_google_font'] = array(
	'section' => 'fonts',
	'title'   => __( 'Google Fonts', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);


$this->settings[''.$theme_prefix.'_menu_google_font_family'] = array(
	'title'   => __( 'Google Font Name', 'aquilo', 'aquilo'),
	'desc'    => '',
	'std'     => 'Source Sans Pro',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_menu_font_family'] = array(
	'section' => 'fonts',
	'title'   => __( 'Font Family', 'aquilo'),
	'desc'    => '',
	'std'     => 'Arial, Helvetica, sans-serif',
	'type'    => 'select',	
	'choices' => array(
		'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
		'Georgia, \'Times New Roman\', Times, serif' => 'Georgia, \'Times New Roman\', Times, serif',
		'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
		'\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif' => '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif',
		'\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif' => '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif',
		'\'Trebuchet MS\', Arial, Helvetica, sans-serif' => '\'Trebuchet MS\', Arial, Helvetica, sans-serif'
		)
);


$this->settings[''.$theme_prefix.'_menu_font_size'] = array(
	'title'   => __( 'Font Size', 'aquilo'),
	'desc'    => '',
	'std'     => '14px',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_menu_font_weight'] = array(
	'section' => 'fonts',
	'title'   => __( 'Font Weight', 'aquilo'),
	'desc'    => '',
	'std'     => 'normal',
	'type'    => 'select',	
	'choices' => array(
		'normal' => __('Normal', 'aquilo'),
		'bold' => __('Bold', 'aquilo'),
		'bolder' => __('Bolder', 'aquilo'),
		'lighter' => __('Lighter', 'aquilo'),
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900'
		)
);

$this->settings[''.$theme_prefix.'_menu_text_transform'] = array(
	'section' => 'fonts',
	'title'   => __( 'Text Transform', 'aquilo'),
	'desc'    => '',
	'std'     => 'none',
	'type'    => 'select',	
	'choices' => array(
		'none' => __('None','aquilo'),
		'uppercase' => __('Uppercase', 'aquilo'),
		'lowercase' => __('Lowercase', 'aquilo'),
		'capitalize' => __('Capitalize', 'aquilo')
		)
);

$this->settings[''.$theme_prefix.'_menu_font_style'] = array(
	'section' => 'fonts',
	'title'   => __( 'Font Style', 'aquilo'),
	'desc'    => '',
	'std'     => 'normal',
	'type'    => 'select',	
	'choices' => array(
		'normal' => __('Normal', 'aquilo'),
		'italic' => __('Italic', 'aquilo'),
		'oblique' => __('Oblique', 'aquilo')
		)
);



/*-----------------------------------------------------------------------------------*/
/*	Sub-menu
/*-----------------------------------------------------------------------------------*/
$this->settings['submenu_fonts_heading'] = array(
	'section' => 'fonts',
	'title'   => '',
	'desc'    => __('Sub-Menu', 'aquilo'),
	'type'    => 'heading'
);


$this->settings[''.$theme_prefix.'_submenu_google_font'] = array(
	'section' => 'fonts',
	'title'   => __( 'Google Fonts', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);


$this->settings[''.$theme_prefix.'_submenu_google_font_family'] = array(
	'title'   => __( 'Google Font Name', 'aquilo'),
	'desc'    => '',
	'std'     => 'Source Sans Pro',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_submenu_font_family'] = array(
	'section' => 'fonts',
	'title'   => __( 'Font Family', 'aquilo'),
	'desc'    => '',
	'std'     => 'Arial, Helvetica, sans-serif',
	'type'    => 'select',	
	'choices' => array(
		'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
		'Georgia, \'Times New Roman\', Times, serif' => 'Georgia, \'Times New Roman\', Times, serif',
		'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
		'\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif' => '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif',
		'\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif' => '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif',
		'\'Trebuchet MS\', Arial, Helvetica, sans-serif' => '\'Trebuchet MS\', Arial, Helvetica, sans-serif'
		)
);


$this->settings[''.$theme_prefix.'_submenu_font_size'] = array(
	'title'   => __( 'Font Size', 'aquilo'),
	'desc'    => '',
	'std'     => '14px',
	'type'    => 'text',
	'section' => 'fonts'
);


$this->settings[''.$theme_prefix.'_submenu_font_weight'] = array(
	'section' => 'fonts',
	'title'   => __( 'Font Weight', 'aquilo'),
	'desc'    => '',
	'std'     => 'normal',
	'type'    => 'select',	
	'choices' => array(
		'normal' => __('Normal', 'aquilo'),
		'bold' => __('Bold', 'aquilo'),
		'bolder' => __('Bolder', 'aquilo'),
		'lighter' => __('Lighter', 'aquilo'),
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900'
		)
);

$this->settings[''.$theme_prefix.'_submenu_text_transform'] = array(
	'section' => 'fonts',
	'title'   => __( 'Text Transform', 'aquilo'),
	'desc'    => '',
	'std'     => 'none',
	'type'    => 'select',	
	'choices' => array(
		'none' => __('None','aquilo'),
		'uppercase' => __('Uppercase', 'aquilo'),
		'lowercase' => __('Lowercase', 'aquilo'),
		'capitalize' => __('Capitalize', 'aquilo')
		)
);

$this->settings[''.$theme_prefix.'_submenu_font_style'] = array(
	'section' => 'fonts',
	'title'   => __( 'Font Style', 'aquilo'),
	'desc'    => '',
	'std'     => 'normal',
	'type'    => 'select',	
	'choices' => array(
		'normal' => __('Normal', 'aquilo'),
		'italic' => __('Italic', 'aquilo'),
		'oblique' => __('Oblique', 'aquilo')
		)
);