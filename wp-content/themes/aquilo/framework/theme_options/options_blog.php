<?php

/*-----------------------------------------------------------------------------------*/
/*	General settings
/*-----------------------------------------------------------------------------------*/
$this->settings['general_blog_heading'] = array(
	'section' => 'blog_page',
	'title'   => '',
	'desc'    => __('Blog Page', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_blog_exclude_cats'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Exclude Categories Id', 'aquilo'),
	'desc'    => '-1, -2, -3, ...',
	'type'    => 'text',
	'std'     => ''
);
$this->settings[''.$theme_prefix.'_blog_post_count'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Count', 'aquilo'),
	'desc'    => '',
	'type'    => 'text',
	'std'     => '5'
);
$this->settings[''.$theme_prefix.'_blog_excerpt_content_type'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Excerpt Content Type', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_blog_post_word_count'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Excerpt Word Count', 'aquilo'),
	'desc'    => '',
	'type'    => 'text',
	'std'     => '25'
);
$this->settings[''.$theme_prefix.'_blog_post_readmore_text'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Read More Text', 'aquilo'),
	'desc'    => __( 'Read more...', 'aquilo'),
	'type'    => 'text',
	'std'     => 'Read More'
);
$this->settings[''.$theme_prefix.'_blog_post_meta_author'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Author', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_blog_post_meta_date'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Date', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_blog_post_date_format'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Date Format', 'aquilo'),
	'desc'    => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\' target=\'_blank\'>'.__('Documentation','aquilo').'</a>',
	'type'    => 'text',
	'std'     => 'F j, Y'
);
$this->settings[''.$theme_prefix.'_blog_post_meta_category'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Category', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_blog_post_meta_comment'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Comment', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_blog_post_meta_tags'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Tags', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);







/*-----------------------------------------------------------------------------------*/
/*	Single post page
/*-----------------------------------------------------------------------------------*/
$this->settings['single_blog_posts_heading'] = array(
	'section' => 'blog_page',
	'title'   => '',
	'desc'    => __('Single Post Page', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_single_blog_post_layout'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Layout', 'aquilo'),
	'desc'    => __( 'Load layout (sidebar name and position) from selected page or leave \'&#8211; Select &#8211;\' to use custom layout for single post page.', 'aquilo'),
	'std'     => '',
	'type'    => 'select',	
	'choices' => $options_pages
);
$this->settings[''.$theme_prefix.'_single_blog_post_style'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Style', 'aquilo'),
	'desc'    => __( 'Load style (background color and image) from selected page or leave \'&#8211; Select &#8211;\' to use custom or general theme style for single post page.', 'aquilo'),
	'std'     => '',
	'type'    => 'select',	
	'choices' => $options_pages
);
$this->settings[''.$theme_prefix.'_single_blog_post_related_posts'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Related Posts', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_single_blog_post_related_posts_columns'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Related Posts &rarr; Columns', 'aquilo'),
	'desc'    => '',
	'std'     => '3',
	'type'    => 'select',	
	'choices' => array(
		'2' => '2',
		'3' => '3',
		'4' => '4'
		)
);
$this->settings[''.$theme_prefix.'_single_blog_post_meta_author'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Author', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_single_blog_post_meta_date'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Date', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_single_blog_post_date_format'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Date Format', 'aquilo'),
	'desc'    => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\' target=\'_blank\'>'.__('Documentation','aquilo').'</a>',
	'type'    => 'text',
	'std'     => 'F j, Y'
);
$this->settings[''.$theme_prefix.'_single_blog_post_meta_category'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Category', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_single_blog_post_meta_comment'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Comment', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_single_blog_post_meta_tags'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Tags', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_single_blog_post_meta_google'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Google +', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_single_blog_post_meta_twitter'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Twitter', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_single_blog_post_meta_facebook'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Facebook', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_single_blog_post_meta_pinit'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Pinit', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);





/*-----------------------------------------------------------------------------------*/
/*	Archive pages
/*-----------------------------------------------------------------------------------*/
$this->settings['archive_posts_heading'] = array(
	'section' => 'blog_page',
	'title'   => '',
	'desc'    => __('Archive Page', 'aquilo'),
	'type'    => 'heading'
);
$this->settings[''.$theme_prefix.'_archive_page_layout'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Layout', 'aquilo'),
	'desc'    => __( 'Load layout (sidebar name and position) from selected page or leave \'&#8211; Select &#8211;\' to set custom layout for archive page below.', 'aquilo'),
	'std'     => '',
	'type'    => 'select',	
	'choices' => $options_pages
);
$this->settings[''.$theme_prefix.'_archive_page_sidebar'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Sidebar', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_archive_page_sidebar_name'] = array(
	'section' => 'blog_page',
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
$this->settings[''.$theme_prefix.'_archive_page_sidebar_position'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Sidebar &rarr; Position', 'aquilo'),
	'desc'    => '',
	'std'     => 'right',
	'type'    => 'select',	
	'choices' => array(
		'left' => __('Left', 'aquilo'),
		'right' => __('Right', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_archive_page_style'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Style', 'aquilo'),
	'desc'    => __( 'Load style (background color and image) from selected page or leave \'&#8211; Select &#8211;\' to use general theme style.', 'aquilo'),
	'std'     => '',
	'type'    => 'select',	
	'choices' => $options_pages
);
$this->settings[''.$theme_prefix.'_archive_post_meta_author'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Author', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_archive_post_meta_date'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Date', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_archive_post_date_format'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Date Format', 'aquilo'),
	'desc'    => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\' target=\'_blank\'>'.__('Documentation','aquilo').'</a>',
	'type'    => 'text',
	'std'     => 'F j, Y'
);
$this->settings[''.$theme_prefix.'_archive_post_meta_category'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Category', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_archive_post_meta_comment'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Comment', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);
$this->settings[''.$theme_prefix.'_archive_post_meta_tags'] = array(
	'section' => 'blog_page',
	'title'   => __( 'Post Meta &rarr; Tags', 'aquilo'),
	'desc'    => '',
	'std'     => '1',
	'type'    => 'radio',	
	'choices' => array(
		'1' => __('Yes','aquilo'),
		'0' => __('No', 'aquilo')
		)
);