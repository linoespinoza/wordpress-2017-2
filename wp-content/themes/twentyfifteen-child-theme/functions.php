<?php
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
	//wp_enqueue_script();
}
add_action('wp_enqueue_scripts', 'enqueue_js');

?>