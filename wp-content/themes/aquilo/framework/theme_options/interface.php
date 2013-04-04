<?php
/**
 * Master theme class
 * 
 * @package Bolts
 * @since 1.0
 * http://alisothegeek.com/2011/01/wordpress-settings-api-tutorial-1/
 */
class Mb2_Theme_Options {
	
	private $sections;
	private $checkboxes;
	private $settings;
	
	/**
	 * Construct
	 *
	 * @since 1.0
	 */
	public function __construct() {
		
		// This will keep track of the checkbox options for the validate_settings function.
		$this->checkboxes = array();
		$this->settings = array();
		$this->get_option();
		
		$this->sections['general'] = __( 'General', 'aquilo' );
		$this->sections['front_page'] = __( 'Home', 'aquilo');
		$this->sections['slider'] = __( 'Slider', 'aquilo' );
		$this->sections['blog_page'] = __( 'Blog', 'aquilo');
		$this->sections['portfolio_page'] = __( 'Portfolio', 'aquilo');		
		$this->sections['style'] = __( 'Style', 'aquilo' );				
		$this->sections['fonts'] = __( 'Fonts', 'aquilo' );
		$this->sections['utility_pages'] = __( 'Utility', 'aquilo' );
		$this->sections['extra'] = __( 'Extra', 'aquilo' );		
		
		add_action( 'admin_menu', array( &$this, 'add_pages' ) );
		add_action( 'admin_init', array( &$this, 'register_settings' ) );
		
		if ( ! get_option( 'mb2_theme_options' ) )
			$this->initialize_settings();
		
	}
	
	/**
	 * Add options page
	 *
	 * @since 1.0
	 */
	public function add_pages() {
		
		$admin_page = add_theme_page( __( 'Theme Options','aquilo' ), __( 'Theme Options','aquilo' ), 'manage_options', 'aquilo-theme-options', array( &$this, 'display_page' ) );
		
		add_action( 'admin_print_scripts-' . $admin_page, array( &$this, 'scripts' ) );
		add_action( 'admin_print_styles-' . $admin_page, array( &$this, 'styles' ) );
		
	}
	
	/**
	 * Create settings field
	 *
	 * @since 1.0
	 */
	public function create_setting( $args = array() ) {
		
		$defaults = array(
			'id'      => 'default_field',
			'title'   => __('Default Field','aquilo'),
			'desc'    => __('This is a default description.','aquilo'),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'choices' => array(),
			'class'   => ''
		);
			
		extract( wp_parse_args( $args, $defaults ) );
		
		$field_args = array(
			'type'      => $type,
			'id'        => $id,
			'desc'      => $desc,
			'std'       => $std,
			'choices'   => $choices,
			'label_for' => $id,
			'class'     => $class
		);
		
		if ( $type == 'checkbox' )
			$this->checkboxes[] = $id;
		
		add_settings_field( $id, $title, array( $this, 'display_setting' ), 'aquilo-theme-options', $section, $field_args );
	}
	
	/**
	 * Display options page
	 *
	 * @since 1.0
	 */
	public function display_page() {
		
		echo '<div class="wrap">';
	
		if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true )
			echo '<div class="updated fade"><p>' . __('Theme options updated.','aquilo') . '</p></div>';
		
		echo '<form action="options.php" method="post">';
	
		settings_fields( 'mb2_theme_options' );
		echo '<div class="ui-tabs theme-options-container">';
		
		
		
		if( function_exists( 'wp_get_theme' ) ) {
			if( is_child_theme() ) {
				$temp_obj = wp_get_theme();
				$theme_obj = wp_get_theme( $temp_obj->get('Template') );
			} else {
				$theme_obj = wp_get_theme();    
			}

			$theme_version = $theme_obj->get('Version');
			$theme_name = $theme_obj->get('Name');
			$theme_uri = $theme_obj->get('ThemeURI');
			$author_uri = $theme_obj->get('AuthorURI');
		}
		
		
		
	
		echo'<div class="theme-info"><div class="base-info"><span class="theme-name">'.$theme_name.'</span><span class="theme-version">'.$theme_version.'</span></div><div class="theme-links"><a href="http://themeforest.net/user/marbol2/portfolio?ref=marbol2" target="_blank">'.__('More Themes','aquilo').'</a> <a href="http://support.marbol2.com/" target="_blank">'.__('Support','aquilo').'</a></div><div class="clear"></div></div>';
			
		
		
			
		echo '<ul class="ui-tabs-nav">';
		foreach ( $this->sections as $section_slug => $section )
			echo '<li><a href="#' . $section_slug . '"><span class="tab-icon icon-' . $section_slug . '">' . $section . '</span></a></li>';
		
		echo '<div class="clear"></div></ul>';
		
		do_settings_sections( $_GET['page'] );
		
		echo '</div><p class="submit" style="text-align:left;margin-left:10px;"><input name="Submit" type="submit" class="button button-primary button-large" value="' . __('Save Changes','aquilo') . '" /></p>
		
	</form>';
	
	echo '<script type="text/javascript">
		jQuery(document).ready(function($) {
			var sections = [];';
			
			foreach ( $this->sections as $section_slug => $section )
				echo "sections['$section'] = '$section_slug';";
			
			echo 'var wrapped = $(".wrap h3").wrap("<div class=\"ui-tabs-panel\">");
			wrapped.each(function() {
				$(this).parent().append($(this).parent().nextUntil("div.ui-tabs-panel"));
			});
			$(".ui-tabs-panel").each(function(index) {
				$(this).attr("id", sections[$(this).children("h3").text()]);
				if (index > 0)
					$(this).addClass("ui-tabs-hide");
			});
			$(".ui-tabs").tabs({
				fx: { opacity: "toggle", duration: "fast" }
			});
			
			$("input[type=text], textarea").each(function() {
				if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "")
					$(this).css("color", "#999");
			});
			
			$("input[type=text], textarea").focus(function() {
				if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "") {
					$(this).val("");
					$(this).css("color", "#000");
				}
			}).blur(function() {
				if ($(this).val() == "" || $(this).val() == $(this).attr("placeholder")) {
					$(this).val($(this).attr("placeholder"));
					$(this).css("color", "#999");
				}
			});
			
			$(".wrap h3, .wrap table").show();
			
			// This will make the "warning" checkbox class really stand out when checked.
			// I use it here for the Reset checkbox.
			$(".warning").change(function() {
				if ($(this).is(":checked"))
					$(this).parent().css("background", "#c00").css("color", "#fff").css("fontWeight", "bold");
				else
					$(this).parent().css("background", "none").css("color", "inherit").css("fontWeight", "normal");
			});
			
			// Browser compatibility
			if ($.browser.mozilla) 
			         $("form").attr("autocomplete", "off");
		});
	</script>
</div>';
		
	}
	
	/**
	 * Description for section
	 *
	 * @since 1.0
	 */
	public function display_section() {
		// code
	}
	
	/**
	 * Description for About section
	 *
	 * @since 1.0
	 */
	public function display_about_section() {
		
		// This displays on the "About" tab. Echo regular HTML here, like so:
		// echo '<p>Copyright 2011 me@example.com</p>';
		
	}
	
	/**
	 * HTML output for text field
	 *
	 * @since 1.0
	 */
	public function display_setting( $args = array() ) {
		
		extract( $args );
		
		$options = get_option( 'mb2_theme_options' );
		
		if ( ! isset( $options[$id] ) && $type != 'checkbox' )
			$options[$id] = $std;
		elseif ( ! isset( $options[$id] ) )
			$options[$id] = 0;
		
		$field_class = '';
		if ( $class != '' )
			$field_class = ' ' . $class;
		
		switch ( $type ) {
			
			case 'heading':
				echo '</td></tr><tr valign="top"><td colspan="2"><h4 class="theme-options-heading">' . $desc . '</h4>';
				break;
			
			case 'checkbox':
				
				echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '" name="mb2_theme_options[' . $id . ']" value="1" ' . checked( $options[$id], 1, false ) . ' /> <label for="' . $id . '">' . $desc . '</label>';
				
				break;
			
			case 'select':
				echo '<div class="select-field"><select class="select' . $field_class . '" name="mb2_theme_options[' . $id . ']"></div>';
				
				foreach ( $choices as $value => $label )
					echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
				
				echo '</select>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'radio':
				$i = 0;
				foreach ( $choices as $value => $label ) {
					echo '<input class="radio' . $field_class . '" type="radio" name="mb2_theme_options[' . $id . ']" id="' . $id . $i . '" value="' . esc_attr( $value ) . '" ' . checked( $options[$id], $value, false ) . '> <label style="margin-right:10px;" for="' . $id . $i . '">' . $label . '</label>';
					if ( $i < count( $options ) - 1 )
						//echo '<br />';
					$i++;
				}
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
				
				
				
				case 'radio_thumbnail':
				$i = 0;
				foreach ( $choices as $value => $label ) {
					echo '<div style="float:left;width:35px;text-align:center;margin-right:8px;" class="radio-thumbnail"> <input class="radio' . $field_class . '" type="radio" name="mb2_theme_options[' . $id . ']" id="' . $id . $i . '" value="' . esc_attr( $value ) . '" ' . checked( $options[$id], $value, false ) . '><br/><span><img src="'.$label.'" alt="'.$value.'"/></span></div>';
					if ( $i < count( $options ) - 1 )
						//echo '<br />';
					$i++;
				}
				
				if ( $desc != '' )
					echo '<br/><div class="clear"></div><span class="description">' . $desc . '</span>';
				
				break;
				
				
				
				
			
			case 'textarea':
				echo '<textarea class="' . $field_class . '" id="' . $id . '" name="mb2_theme_options[' . $id . ']" placeholder="' . $std . '" rows="7" cols="30">' . wp_htmledit_pre( $options[$id] ) . '</textarea>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'password':
				echo '<input class="regular-text' . $field_class . '" type="password" id="' . $id . '" name="mb2_theme_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" />';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'text':
			default:
		 		echo '<input class="regular-text' . $field_class . '" type="text" id="' . $id . '" name="mb2_theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
		 		
		 		if ( $desc != '' )
		 			echo '<br /><span class="description">' . $desc . '</span>';
		 		
		 		break;
				
				
				case 'upload':
default:
	
if($options[$id] !='')	{
		echo '<div><img class="uploaded-image" src="'.esc_attr( $options[$id] ).'" alt=""/></div>';
	}
   echo '<input id="' . $id . '" class="upload-url regular-text' . $field_class . '" type="text" name="mb2_theme_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" /><input style="margin-top:10px;display:block;float:none;" id="st_upload_button" class="st_upload_button button-secondary action" type="button" name="upload_button" value="Upload" />';

if ( $desc != '' )
   echo '
   <br /><span class="description">' . $desc . '</span>';

break;




case 'color':
			default:
		 		echo '<input class="rwmb-color' . $field_class . '" type="text" id="' . $id . '" name="mb2_theme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" /><div class="rwmb-color-picker"></div>';
		 		
		 		
		 		
		 		break;




		 	
		}
		
	}
	
	/**
	 * Settings and defaults
	 * 
	 * @since 1.0
	 */
	public function get_option() {
		
				
		$theme_prefix = 'aquilo';

		//wordpress pages array
		$options_pages = array();
		$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
		$options_pages[''] = __( '&#8211; Select &#8211;', 'aquilo');
		foreach ($options_pages_obj as $page) {
			$options_pages[$page->ID] = $page->post_title;
		}
		
		//wordpress categories array
		$options_categories = array();
		$options_categories_obj = get_categories();
		$options_categories[''] = __( '&#8211; Select &#8211;', 'aquilo');
		  foreach($options_categories_obj as $category) { 
			 $options_categories[$category->cat_ID] = $category->name;
		}		
		
		require_once 'options_general.php';
		require_once 'options_home.php';
		require_once 'options_slider.php';
		require_once 'options_blog.php';
		require_once 'options_portfolio.php';
		require_once 'options_style.php';
		require_once 'options_fonts.php';
		require_once 'options_utility.php';
		require_once 'options_extra.php';		
		
		
	}
	
	/**
	 * Initialize settings to their default values
	 * 
	 * @since 1.0
	 */
	public function initialize_settings() {
		
		$default_settings = array();
		foreach ( $this->settings as $id => $setting ) {
			if ( $setting['type'] != 'heading' )
				$default_settings[$id] = $setting['std'];
		}
		
		update_option( 'mb2_theme_options', $default_settings );
		
	}
	
	/**
	* Register settings
	*
	* @since 1.0
	*/
	public function register_settings() {
		
		register_setting( 'mb2_theme_options', 'mb2_theme_options', array ( &$this, 'validate_settings' ) );
		
		foreach ( $this->sections as $slug => $title ) {
			if ( $slug == 'about' )
				add_settings_section( $slug, $title, array( &$this, 'display_about_section' ), 'aquilo-theme-options' );
			else
				add_settings_section( $slug, $title, array( &$this, 'display_section' ), 'aquilo-theme-options' );
		}
		
		$this->get_option();
		
		foreach ( $this->settings as $id => $setting ) {
			$setting['id'] = $id;
			$this->create_setting( $setting );
		}
		
	}
	
	/**
	* jQuery Tabs
	*
	* @since 1.0
	*/
	public function scripts() {
		
		wp_print_scripts( 'jquery-ui-tabs' );
		
	}
	
	/**
	* Styling for the theme options page
	*
	* @since 1.0
	*/
	public function styles() {
		
		wp_register_style( 'mb2_theme-admin', get_stylesheet_directory_uri() . '/framework/theme_options/css/style.css' );
		wp_enqueue_style( 'mb2_theme-admin' );
		
	}
	
	/**
	* Validate settings
	*
	* @since 1.0
	*/
	public function validate_settings( $input ) {
		
		if ( ! isset( $input['reset_theme'] ) ) {
			$options = get_option( 'mb2_theme_options' );
			
			foreach ( $this->checkboxes as $id ) {
				if ( isset( $options[$id] ) && ! isset( $input[$id] ) )
					unset( $options[$id] );
			}
			
			return $input;
		}
		return false;
		
	}
	
}

$theme_options = new Mb2_Theme_Options();

function mb2_theme_option( $option ) {
	$options = get_option( 'mb2_theme_options' );
	if ( isset( $options[$option] ) )
		return $options[$option];
	else
		return false;
}




function mb2_theme_option_scripts() {
//Media Uploader Scripts
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', get_template_directory_uri() . '/framework/theme_options/js/uploader.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
wp_enqueue_script( 'farbtastic' );
wp_register_script('my-color', get_template_directory_uri() . '/framework/theme_options/js/color.js', array('jquery','farbtastic'));
wp_enqueue_script('my-color');
}

 
    
function mb2_theme_option_style() {
//Media Uploader Style
wp_enqueue_style('thickbox');
wp_enqueue_style( 'farbtastic');
}


if (isset($_GET['page']) && $_GET['page'] == 'aquilo-theme-options') {
add_action('admin_print_scripts','mb2_theme_option_scripts');
add_action('admin_print_styles','mb2_theme_option_style');
}