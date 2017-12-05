<?php

add_theme_support('menus');

add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', __( 'Menu Principal', 'theme-slug' ) );
}

/**
 ** Funcion que embebe archivos css a nuestro tema
 **/
function enqueue_styles() {

	wp_enqueue_style('bootstrap_min_css', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css");
	wp_enqueue_style('carousel_css', get_template_directory_uri() . '/css/carousel.css');

}
add_action('wp_enqueue_scripts', 'enqueue_styles');

/**
 ** Funcion que embebe archivos js a nuestro tema
 **/
function enqueue_js() {
	wp_enqueue_script('jQuery_js', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', array(), '3.2.1', true);
	wp_enqueue_script('popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array(), '1.12.3', true);
	wp_enqueue_script('bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js', array(), '4.0.0-beta.2', true);
	//wp_enqueue_script();
}
add_action('wp_enqueue_scripts', 'enqueue_js');

?>