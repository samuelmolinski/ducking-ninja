<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php if(is_front_page()){bloginfo('name'); echo ' | '; bloginfo('description'); }else{wp_title('|', true, 'right'); bloginfo('name');} ?></title>
<!--[if lt IE 8]>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common-css/ie8.css" media="screen" type="text/css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/ie-html5.js"></script>
<![endif]-->
<?php 
global $post;

$logo_type = mb2_theme_option('aquilo_logo_type');
$custom_logo_link = mb2_theme_option('aquilo_custom_logo_link');
$site_slogan = mb2_theme_option('aquilo_site_slogan');
$favicon = mb2_theme_option('aquilo_favicon');
$header_content = mb2_theme_option('aquilo_header_content');
$tracking_code = mb2_theme_option('aquilo_tracking_code');
$tracking_code_location = mb2_theme_option('aquilo_tracking_code_location');

$static_home_page_id = mb2_theme_option('aquilo_static_home_page');
$blog_page_id = mb2_page_id_by_page_template('template-blog.php');
$portfolio_page_id = mb2_page_id_by_page_template('template-portfolio.php');
$search_page_title = mb2_theme_option('aquilo_search_page_title');
$search_page_breadcrumb = mb2_theme_option('aquilo_search_page_breadcrumb');
$search_page_search = mb2_theme_option('aquilo_search_page_search');
$error_page_title = mb2_theme_option('aquilo_error_page_title');
$error_page_breadcrumb = mb2_theme_option('aquilo_error_page_breadcrumb');
$error_page_search = mb2_theme_option('aquilo_error_page_search');

//enable page heading elements (title, breadcrumb and search form)
if(is_home() || is_front_page()){	
$meta_slider_enabler = get_post_meta($static_home_page_id, 'meta_slider_enabler', true);
$meta_slider = get_post_meta($static_home_page_id, 'meta_slider', true);
$meta_page_title = get_post_meta($static_home_page_id, 'meta_page_heading_title', true);
$meta_breadcrumb = get_post_meta($static_home_page_id, 'meta_page_heading_breadcrumb', true);
$meta_search = get_post_meta($static_home_page_id, 'meta_page_heading_search', true);
$page_title = get_the_title($static_home_page_id);
}
elseif(is_archive()){
	if(is_tax()){
	$meta_slider_enabler = get_post_meta($portfolio_page_id, 'meta_slider_enabler', true);
	$meta_slider = get_post_meta($portfolio_page_id, 'meta_slider', true);
	$meta_page_title = get_post_meta($portfolio_page_id, 'meta_page_heading_title', true);
	$meta_breadcrumb = get_post_meta($portfolio_page_id, 'meta_page_heading_breadcrumb', true);
	$meta_search = get_post_meta($portfolio_page_id, 'meta_page_heading_search', true);	
	}
	else{
	$meta_slider_enabler = get_post_meta($blog_page_id, 'meta_slider_enabler', true);
	$meta_slider = get_post_meta($blog_page_id, 'meta_slider', true);
	$meta_page_title = get_post_meta($blog_page_id, 'meta_page_heading_title', true);
	$meta_breadcrumb = get_post_meta($blog_page_id, 'meta_page_heading_breadcrumb', true);
	$meta_search = get_post_meta($blog_page_id, 'meta_page_heading_search', true);		
	}
}
elseif(is_search()){
$meta_slider_enabler = 0;
$meta_slider = '';
$meta_page_title = $search_page_title;
$meta_breadcrumb = $search_page_breadcrumb;
$meta_search = $search_page_search;
}
elseif(is_404()){
$meta_slider_enabler = 0;
$meta_slider = '';
$meta_page_title = $error_page_title;
$meta_breadcrumb = $error_page_breadcrumb;
$meta_search = $error_page_search;	
$page_title = __('Page not found','aquilo');
}
else{
$meta_slider_enabler = get_post_meta($post->ID, 'meta_slider_enabler', true);
$meta_slider = get_post_meta($post->ID, 'meta_slider', true);
$meta_page_title = get_post_meta($post->ID, 'meta_page_heading_title', true);
$meta_breadcrumb = get_post_meta($post->ID, 'meta_page_heading_breadcrumb', true);
$meta_search = get_post_meta($post->ID, 'meta_page_heading_search', true);
$page_title = get_the_title($post->ID);	
}


if ($favicon !='') { ?>
<link rel="shortcut icon" href="<?php echo $favicon; ?>" />
<?php } 
if ($tracking_code !='' && $tracking_code_location == 'header'){
	echo $tracking_code;
}
?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page">
		<div id="page-top">
			<header id="header">
				<div class="wrap">
    				<div class="col-24">
						<div id="logo">				
							<?php 
                                if($logo_type=='text'){
                                    $logo_id='logo-text';	
                                }
                                else {
                                    $logo_id='logo-image';	
                                }
                            ?>                
                			<h1 id="<?php echo $logo_id; ?>"><a href="<?php if($custom_logo_link !='') { echo $custom_logo_link; } else { echo ''.home_url().'/'; }?>"><?php echo bloginfo('name'); ?></a></h1>
                			<?php if($site_slogan==1){?><span id="site-slogan"><?php echo bloginfo('description'); ?></span><?php }?>
                  		</div>		
			
						<div id="header-content">            	
							<?php if ($header_content !='') { ?>
                            <div id="custom-header-content">                 
                                <?php echo do_shortcode($header_content); ?>                
                            </div>
                            <?php } ?>    
                            <div><?php echo wm_search_form(); ?></div>       
                            <nav id="navigation">
                            <?php 
                                wp_nav_menu( array( 	
                                    'menu_class' => 'sf-menu main-nav',
                                    'menu_id' => 'mobile-menu',
                                    'container' => 'none',
                                    'link_before'=> '<span>',
                                    'link_after' => '</span>',
                                    'theme_location' => 'main_navigation',
                                    'fallback_cb' => 'default_menu')
                                );
                            ?>                
                            </nav>
                		</div>						
					</div>			
					<div class="clear"></div>           
				</div><!-- end .wrap -->
			</header><!-- end #header -->
			<?php if ($meta_slider_enabler == 1) { ?>
           		<section id="slider">
           			<div class="wrap">
                   		<?php 
						if($meta_slider == 'flexslider'){
							get_template_part('framework/includes/sliders/slider','flexslider');	
						}						
						?>
               		</div><!-- end .wrap -->
               	</section><!-- end #slider -->
            <?php } ?>
			<?php if($meta_page_title == 1 || $meta_breadcrumb == 1 || $meta_search == 1){ ?>	
                <section id="page-heading">
                    <div class="wrap">
                        <div class="col-24">
                        <?php 
                        if($meta_page_title == 1) {
                            
                            if(is_archive()){
                                
                                echo '<h2 class="page-heading">';
                                if (is_category()){
                                    printf(__('Category: %s','aquilo'),single_cat_title('',false)); 
                                }
                                elseif (is_tag()){
                                    printf(__('Tag: %s','aquilo'),single_tag_title('',false)); 
                                }
                                elseif (is_author()) {
                                    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                                    printf(__('Author: %s','aquilo'), $curauth->nickname); 
                                }
                                elseif (is_day()){
                                    printf(__('Daily Archives: %s','aquilo'),get_the_date());
                                } 
                                elseif (is_month()){
                                    printf(__('Monthly Archives: %s','aquilo'),get_the_date( _x( 'F Y','monthly archives date format','aquilo')));
                                } 
                                elseif (is_year()){
                                    printf( __('Yearly Archives: %s','aquilo'),get_the_date( _x( 'Y','yearly archives date format','aquilo'))); 
                                }
                                elseif(is_tax()){	
                                    printf(single_term_title('', false)  );			
                                } 
                                else {
                                    _e('Archives', 'aquilo'); 
                                }
                                echo '</h2>';
                            }
                            elseif(is_search()){
                                echo '<h2 class="page-heading">';
                                printf(__('Search Results For: %s', 'aquilo' ),''.get_search_query().'');
                                echo '</h2>';	
                            }
                            else{ 
                                echo '<h2 class="page-heading">'.$page_title.'</h2>';
                            }
                        }
                        if($meta_search == 1){
                            get_search_form();
                            }
                        if($meta_breadcrumb == 1){
                            mb2_breadcrumb(); 
                            } 
                        ?>            
                        </div><!-- end .col-24 -->
                        <div class="clear"></div>
                    </div><!-- end .wrap -->
                </section><!-- end #page-heading -->
                <?php
                }	
            ?>
		</div><!-- end #page-top -->
        <div id="page-middle">