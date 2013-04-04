<?php

/*-----------------------------------------------------------------------------------*/
/*	Search results page
/*-----------------------------------------------------------------------------------*/
$this->settings['search_page_heading'] = array(
	'section' => 'utility_pages',
	'title'   => '',
	'desc'    => __('Search Page', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_search_page_title'] = array(
	'section' => 'utility_pages',
	'title'   => __( 'Title', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_search_page_breadcrumb'] = array(
	'section' => 'utility_pages',
	'title'   => __( 'Breadcrumb', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_search_page_search'] = array(
	'section' => 'utility_pages',
	'title'   => __( 'Search Form', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_search_page_layout'] = array(
	'section' => 'utility_pages',
	'title'   => __( 'Layout', 'aquilo'),
	'desc'    => __( 'Load style (background color and image) from selected page or leave \'&#8211; Select &#8211;\' to use general theme style.', 'aquilo'),
	'std'     => 'custom_layout',
	'type'    => 'select',	
	'choices' => $options_pages
);
$this->settings[''.$theme_prefix.'_search_page_sidebar'] = array(
	'section' => 'utility_pages',
	'title'   => __( 'Sidebar', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_search_page_sidebar_name'] = array(
	'section' => 'utility_pages',
	'title'   => __( 'Sidebar &rarr; Name', 'aquilo'),
	'desc'    => '',
	'std'     => '',
	'type'    => 'select',	
	'choices' => array('' => __('&#8211; Select &#8211;', 'aquilo'),
		'blog-sidebar' => __('Blog Sidebar', 'aquilo'),
		'home-sidebar' => __('Home Sidebar', 'aquilo'),
		'portfolio-sidebar' => __('Portfolio Sidebar', 'aquilo'),
		'page1-sidebar' => __('Page 1 Sidebar', 'aquilo'),
		'page2-sidebar' => __('Page 2 Sidebar', 'aquilo'),
		'page3-sidebar' => __('Page 3 Sidebar', 'aquilo'),
		'contact-sidebar' => __('Contact Sidebar', 'aquilo'),
		'search-sidebar' => __('Search Sidebar', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_search_page_sidebar_position'] = array(
	'section' => 'utility_pages',
	'title'   => __( 'Sidebar &rarr; Position', 'aquilo'),
	'desc'    => '',
	'std'     => 'right',
	'type'    => 'select',	
	'choices' => array(
		'left' => __('Left', 'aquilo'),
		'right' => __('Right', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_search_page_style'] = array(
	'section' => 'utility_pages',
	'title'   => __( 'Style', 'aquilo'),
	'desc'    => __( 'Load style (background color and image) from selected page or leave "&#8211; Select &#8211;" to use general theme style.', 'aquilo'),
	'std'     => '',
	'type'    => 'select',	
	'choices' => $options_pages
);
$this->settings[''.$theme_prefix.'_search_post_word_count'] = array(
	'section' => 'utility_pages',
	'title'   => __( 'Search Results Word Count', 'aquilo'),
	'desc'    => '',
	'type'    => 'text',
	'std'     => '25'
);
$this->settings[''.$theme_prefix.'_search_post_readmore_text'] = array(
	'section' => 'utility_pages',
	'title'   => __( 'Read More Text', 'aquilo'),
	'desc'    => __( 'Read more...', 'aquilo'),
	'type'    => 'text',
	'std'     => ''
);



/*-----------------------------------------------------------------------------------*/
/*	Error page
/*-----------------------------------------------------------------------------------*/
$this->settings['error_page_heading'] = array(
	'section' => 'utility_pages',
	'title'   => '',
	'desc'    => __('404 Page', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_error_page_title'] = array(
	'section' => 'utility_pages',
	'title'   => __( 'Title', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_error_page_breadcrumb'] = array(
	'section' => 'utility_pages',
	'title'   => __('Breadcrumb', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_error_page_search'] = array(
	'section' => 'utility_pages',
	'title'   => __('Search Form', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_error_page_content'] = array(
	'title'   => __( 'Content', 'aquilo'),
	'desc'    => __( 'Optional', 'aquilo'),
	'std'     => '',
	'type'    => 'textarea',
	'section' => 'utility_pages'
);