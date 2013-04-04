<?php

/*-----------------------------------------------------------------------------------*/
/*	General
/*-----------------------------------------------------------------------------------*/
$this->settings['general_portfolio_heading'] = array(
	'section' => 'portfolio_page',
	'title'   => '',
	'desc'    => __('General', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_portfolio_breadcrumb_link'] = array(
	'section' => 'portfolio_page',
	'title'   => __('Portfolio Breadcrumb Link', 'aquilo'),
	'desc'    => __( 'Select portfolio page.', 'aquilo'),
	'type'    => 'select',
	'std'     => '',
	'choices' => $options_pages
);

$this->settings[''.$theme_prefix.'_single_project_link_to_portfolio'] = array(
	'section' => 'portfolio_page',
	'title'   => __('Back To Portfolio Link', 'aquilo'),
	'desc'    => __( 'Select portfolio page.', 'aquilo'),
	'type'    => 'select',
	'std'     => '',
	'choices' => $options_pages
);
$this->settings[''.$theme_prefix.'_portfolio_thumbnail_width'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Thumbnail Width', 'aquilo'),
	'desc'    => __('You may also set this value different for different portfolio pages at page metaboxes.','aquilo'),
	'type'    => 'text',
	'std'     => '690'
);
$this->settings[''.$theme_prefix.'_portfolio_thumbnail_height'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Thumbnail Height', 'aquilo'),
	'desc'    => __('You may also set this value different for different portfolio pages at page metaboxes.','aquilo'),
	'type'    => 'text',
	'std'     => '380'
);






/*-----------------------------------------------------------------------------------*/
/*	Single project page
/*-----------------------------------------------------------------------------------*/
$this->settings['single_project_page_heading'] = array(
	'section' => 'portfolio_page',
	'title'   => '',
	'desc'    => __('Single Project Page', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_single_project_style'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Style', 'aquilo'),
	'desc'    => __( 'Load style (background color and image) from selected page or leave \'&#8211; Select &#8211;\' to use custom style for project page.', 'aquilo'),
	'std'     => '',
	'type'    => 'select',	
	'choices' => $options_pages
);
$this->settings['related_projects_heading'] = array(
	'section' => 'portfolio_page',
	'title'   => '',
	'desc'    => __('Related Projects', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_related_projects'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Related Projects', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_related_projects_gallery'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Gallery Style', 'aquilo'),
	'desc'    => '',
	'std'     => '0',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_related_projects_column'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Columns', 'aquilo'),
	'desc'    => '',
	'std'     => '4',
	'type'    => 'select',	
	'choices' => array(
		//'1' => '1',
		//'2' => '2',
		'3' => '3',
		'4' => '4'
		)
);
$this->settings[''.$theme_prefix.'_related_projects_thumbnail_width'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Thumbnail Width', 'aquilo'),
	'desc'    => '',
	'type'    => 'text',
	'std'     => '690'
);
$this->settings[''.$theme_prefix.'_related_projects_thumbnail_height'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Thumbnail Height', 'aquilo'),
	'desc'    => '',
	'type'    => 'text',
	'std'     => '380'
);






/*-----------------------------------------------------------------------------------*/
/*	Taxonomy page
/*-----------------------------------------------------------------------------------*/
$this->settings['portfolio_archive_heading'] = array(
	'section' => 'portfolio_page',
	'title'   => '',
	'desc'    => __('Archive Page', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_portfolio_archive_page_style'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Style', 'aquilo'),
	'desc'    => __( 'Load style (background color and image) from selected page or leave \'&#8211; Select &#8211;\' to use general theme style.', 'aquilo'),
	'std'     => '',
	'type'    => 'select',	
	'choices' => $options_pages
);
$this->settings[''.$theme_prefix.'_portfolio_archive_column'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Columns', 'aquilo'),
	'desc'    => '',
	'std'     => '4',
	'type'    => 'select',	
	'choices' => array(
		'1' => '1',
		'2' => '2',
		'3' => '3',
		'4' => '4'
		)
);
$this->settings[''.$theme_prefix.'_portfolio_archive_gallery_style'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Gallery Style', 'aquilo'),
	'desc'    => '',
	'std'     => '0',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_portfolio_archive_thumbnail_width'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Thumbnail Width', 'aquilo'),
	'desc'    => '',
	'type'    => 'text',
	'std'     => '690'
);
$this->settings[''.$theme_prefix.'_portfolio_archive_thumbnail_height'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Thumbnail Height', 'aquilo'),
	'desc'    => '',
	'type'    => 'text',
	'std'     => '380'
);
$this->settings[''.$theme_prefix.'_portfolio_archive_description_word_count'] = array(
	'section' => 'portfolio_page',
	'title'   => __( 'Description Word Count', 'aquilo'),
	'desc'    => __( 'Only for 1 column layout.', 'aquilo'),
	'type'    => 'text',
	'std'     => '35'
);