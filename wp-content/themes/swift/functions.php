<?php
 $swift_opt = get_option('swift_opt');
 $swift_design_opt = get_option('swift_design_opt');
/**
 * Loads all the core files
 * Initializes widgets
 * Add action hooks and filters
 */
/* Constant paths. */

// Directory constants
define('INCLUDES', TEMPLATEPATH . '/includes');
define('WIDGETS', TEMPLATEPATH . '/widgets');
define('LAYOUTS', TEMPLATEPATH . '/layouts');
define('ADMIN', TEMPLATEPATH . '/admin');
define('CB', ADMIN . '/css-base');
define('JSB', ADMIN . '/js-base');
// Defining uploads directory parameters
$wud = wp_upload_dir();
if (isset($wud['basedir'])) define('U_DIR', $wud['basedir']);
if (isset($wud['baseurl'])) define('U_URL', $wud['baseurl']);
define('TEMPLATE_URL',get_bloginfo('template_url'));

/* WP3.0 Features  and requirements*/
add_theme_support('automatic-feed-links');
if ( ! isset( $content_width ) ) $content_width = 580;
add_editor_style('admin/custom-editor-style.css'); //Add's stylsheet to WP post editor.
//Registering wordpress menus
add_action( 'init', 'swift_register_my_menus' );
function swift_register_my_menus() {
register_nav_menus(
array(
'top-nav' => __( 'Top Navigation' ),
'bottom-nav' => __( 'Bottom Navigation' ),
'footer-links' => __( 'Footer Links' )
)
);
}

//Adding the thumbnail SIZES
add_theme_support( 'post-thumbnails', array( 'post', 'page','roundup' ) );
add_image_size('full-post-thumb',576,150,true );
add_image_size('popular-posts-home',210, 90,true );
add_image_size('popular-posts-widget',32, 32,true );
add_image_size('mag1',170, 0,true );
add_image_size('mag2',284,0 ,true );
add_image_size('blog-thumb',135, 90,true );
add_image_size('slider1',250, 130,true );
add_image_size('slider2',576,280,true );

//Loading files
require_once (INCLUDES . '/sidebar-init.php'); 	// Initializes the sidebars
require_once (INCLUDES . '/wp-pagenavi.php');  	// Add's wp page nav support, script by Lester Chann
require_once (INCLUDES. '/custom-functions.php');	// Some MISC functions
require_once (INCLUDES. '/custom-post-types.php');	// We define our custom post types here

require_once (ADMIN. '/admin-header.php');     	//Header of options page
require_once (ADMIN. '/admin-core.php');       	// Work horse for SWIFT admin options.
require_once (ADMIN. '/swift-options-init.php');	// SWIFT options array
require_once (ADMIN. '/swift-design-options-init.php');	//SWIFT design options array
require_once (ADMIN. '/swift-options.php');    //Displays options page
require_once (ADMIN. '/swift-design-options.php'); //Displays design options page

require_once (ADMIN. '/create-styles.php');		// Generates custom-styles.css files
require_once (ADMIN. '/create-js-file.php');	// Generates the javaScript file dynamically

require_once (WIDGETS . '/widgets.php'); // Adds widgets
require_once (WIDGETS . '/widget-functions.php');	// Functions for the above loaded widgets

/**
 * Initializing our widgets
 */
add_action('widgets_init', create_function('', 'return register_widget("swiftTabs");'));
add_action('widgets_init', create_function('', 'return register_widget("swiftPopularPosts");')); 
add_action('widgets_init', create_function('', 'return register_widget("swiftAdsWidget");')); 
add_action('widgets_init', create_function('', 'return register_widget("SubscribeBox");')); 
add_action('widgets_init', create_function('', 'return register_widget("HomePageOnlyText");')); 
add_action('widgets_init', create_function('', 'return register_widget("SwiftLite");')); 
 
// add the admin settings and such
add_action('admin_init', 'swift_options_init');
function swift_options_init(){
	add_settings_section('swift_options', '', 'swift_admin_header', 'swift-options');
	add_settings_field('swift_opt', '', 'swift_options_display', 'swift-options', 'swift_options');
	register_setting( 'swift-opt', 'swift_opt','swift_options_validate');
	
	add_settings_section('swift_design_options', '', 'swift_admin_header', 'swift-design-options');
	add_settings_field('swift_design_opt','', 'swift_design_options_display', 'swift-design-options', 'swift_design_options');
	register_setting( 'swift-design-opt', 'swift_design_opt','swift_design_options_validate');
}

?>