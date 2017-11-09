<?php
/**
 * Attitude defining constants, adding files and WordPress core functionality.
 *
 * Defining some constants, loading all the required files and Adding some core functionality.
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menu() To add support for navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 700;

add_action( 'attitude_init', 'attitude_constants', 10 );
/**
 * This function defines the Attitude theme constants
 *
 * @since 1.0
 */
function attitude_constants() {

	/** Define Directory Location Constants */
	define( 'ATTITUDE_PARENT_DIR', get_template_directory() );
	define( 'ATTITUDE_CHILD_DIR', get_stylesheet_directory() );
	define( 'ATTITUDE_IMAGES_DIR', ATTITUDE_PARENT_DIR . '/images' );
	define( 'ATTITUDE_LIBRARY_DIR', ATTITUDE_PARENT_DIR. '/library' );
	define( 'ATTITUDE_ADMIN_DIR', ATTITUDE_LIBRARY_DIR . '/admin' );
	define( 'ATTITUDE_ADMIN_IMAGES_DIR', ATTITUDE_ADMIN_DIR . '/images' );
	define( 'ATTITUDE_ADMIN_JS_DIR', ATTITUDE_ADMIN_DIR . '/js' );
	define( 'ATTITUDE_ADMIN_CSS_DIR', ATTITUDE_ADMIN_DIR . '/css' );
	define( 'ATTITUDE_JS_DIR', ATTITUDE_LIBRARY_DIR . '/js' );
	define( 'ATTITUDE_CSS_DIR', ATTITUDE_LIBRARY_DIR . '/css' );	
	define( 'ATTITUDE_FUNCTIONS_DIR', ATTITUDE_LIBRARY_DIR . '/functions' );
	define( 'ATTITUDE_SHORTCODES_DIR', ATTITUDE_LIBRARY_DIR . '/footer_info' );
	define( 'ATTITUDE_STRUCTURE_DIR', ATTITUDE_LIBRARY_DIR . '/structure' );
	if ( ! defined( 'ATTITUDE_LANGUAGES_DIR' ) ) /** So we can define with a child theme */
		define( 'ATTITUDE_LANGUAGES_DIR', ATTITUDE_LIBRARY_DIR . '/languages' );
	define( 'ATTITUDE_WIDGETS_DIR', ATTITUDE_LIBRARY_DIR . '/widgets' );

	/** Define URL Location Constants */
	define( 'ATTITUDE_PARENT_URL', get_template_directory_uri() );
	define( 'ATTITUDE_CHILD_URL', get_stylesheet_directory_uri() );
	define( 'ATTITUDE_IMAGES_URL', ATTITUDE_PARENT_URL . '/images' );
	define( 'ATTITUDE_LIBRARY_URL', ATTITUDE_PARENT_URL . '/library' );
	define( 'ATTITUDE_ADMIN_URL', ATTITUDE_LIBRARY_URL . '/admin' );
	define( 'ATTITUDE_ADMIN_JS_URL', ATTITUDE_ADMIN_URL . '/js' );
	define( 'ATTITUDE_JS_URL', ATTITUDE_LIBRARY_URL . '/js' );
	define( 'ATTITUDE_CSS_URL', ATTITUDE_LIBRARY_URL . '/css' );
	define( 'ATTITUDE_FUNCTIONS_URL', ATTITUDE_LIBRARY_URL . '/functions' );
	define( 'ATTITUDE_SHORTCODES_URL', ATTITUDE_LIBRARY_URL . '/footer_info' );
	define( 'ATTITUDE_STRUCTURE_URL', ATTITUDE_LIBRARY_URL . '/structure' );
	if ( ! defined( 'ATTITUDE_LANGUAGES_URL' ) ) /** So we can predefine to child theme */
		define( 'ATTITUDE_LANGUAGES_URL', ATTITUDE_LIBRARY_URL . '/languages' );
	define( 'ATTITUDE_WIDGETS_URL', ATTITUDE_LIBRARY_URL . '/widgets' );

}

add_action( 'attitude_init', 'attitude_load_files', 15 );
/**
 * Loading the included files.
 *
 * @since 1.0
 */
function attitude_load_files() {
	/** 
	 * attitude_add_files hook
	 *
	 * Adding other addtional files if needed.
	 */
	do_action( 'attitude_add_files' );

	/** Load functions */
	require_once( ATTITUDE_FUNCTIONS_DIR . '/i18n.php' );
	require_once( ATTITUDE_FUNCTIONS_DIR . '/custom-header.php' );
	require_once( ATTITUDE_FUNCTIONS_DIR . '/functions.php' );
	require_once( ATTITUDE_FUNCTIONS_DIR . '/customizer.php' );

	require_once( ATTITUDE_ADMIN_DIR . '/attitude-themeoptions-defaults.php' );
	require_once( ATTITUDE_ADMIN_DIR . '/attitude-metaboxes.php' );
	require_once( ATTITUDE_ADMIN_DIR . '/attitude-show-post-id.php' );

	/** Load Shortcodes */
	require_once( ATTITUDE_SHORTCODES_DIR . '/attitude-footer_info.php' );

	/** Load Structure */
	require_once( ATTITUDE_STRUCTURE_DIR . '/header-extensions.php' );
	require_once( ATTITUDE_STRUCTURE_DIR . '/searchform-extensions.php' );
	require_once( ATTITUDE_STRUCTURE_DIR . '/sidebar-extensions.php' );
	require_once( ATTITUDE_STRUCTURE_DIR . '/footer-extensions.php' );
	require_once( ATTITUDE_STRUCTURE_DIR . '/content-extensions.php' );

	/** Load Widgets and Widgetized Area */
	require_once( ATTITUDE_WIDGETS_DIR . '/attitude_widgets.php' );
}

add_action( 'attitude_init', 'attitude_core_functionality', 20 );
/**
 * Adding the core functionality of WordPess.
 *
 * @since 1.0
 */
function attitude_core_functionality() {
	/** 
	 * attitude_add_functionality hook
	 *
	 * Adding other addtional functionality if needed.
	 */
	do_action( 'attitude_add_functionality' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );


	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page.
	add_theme_support( 'post-thumbnails' ); 
		
	// Remove WordPress version from header for security concern
	remove_action( 'wp_head', 'wp_generator' );
 
	// This theme uses wp_nav_menu() in header menu location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'attitude' ) );

	// Add Attitude custom image sizes
	add_image_size( 'featured', 670, 300, true );
	add_image_size( 'featured-medium', 230, 230, true );
	add_image_size( 'slider-narrow', 1038, 460, true ); 		// used on Featured Slider on Homepage Header for narrow layout
	add_image_size( 'slider-wide', 1400, 460, true ); 			// used on Featured Slider on Homepage Header for wide layout
	add_image_size( 'gallery', 474, 342, true ); 				// used to show gallery all images
	add_image_size( 'icon', 80, 80, true );						//used for icon on business layout

	// Support for WooCommerce Product gallery
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/**
	 * This theme supports custom background color and image
	 */
	add_theme_support( 'custom-background' );

	// Adding excerpt option box for pages as well
	add_post_type_support( 'page', 'excerpt' );
}

/** 
 * attitude_init hook
 *
 * Hooking some functions of functions.php file to this action hook.
 */
do_action( 'attitude_init' );

add_action( 'after_setup_theme', 'attitude_woocommerce_support' );
function attitude_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


add_action('woocommerce_before_main_content', 'attitude_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'attitude_wrapper_end', 10);
function attitude_wrapper_start() { echo '<div id="primary"> <div id="content">'; }

function attitude_wrapper_end() { echo '</div></div>'; }
?>