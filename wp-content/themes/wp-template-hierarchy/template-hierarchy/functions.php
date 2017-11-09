<?php 

// Enable Theme Support
add_theme_support( 'menus' ); // Se active en el administrador de WP la opción Menús dentro de Apariencia
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'image', 'quote' ) );
add_theme_support( 'html5' );

// Load Theme CSS
function theme_styles() {	

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css' );	
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );	

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

// Load Theme JS
function theme_js() {
	
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '', true );
	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery','bootstrap_js'), '', true );

}
add_action( 'wp_enqueue_scripts', 'theme_js' );

// Create a custom menus
function register_theme_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Main Menu' )      
    )
  );
}
add_action( 'init', 'register_theme_menus' );


// Function for creating Widegets
function create_widget($name, $id, $description) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}

// Create widgets 
create_widget("Primary Sidebar", "primary", "Displays on the side of most pages");
create_widget("Blog Sidebar", "blog", "Displays on the side of the blog section");

?>