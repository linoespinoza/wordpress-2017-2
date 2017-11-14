<?php
function enqueue_styles() {
	// Embebe el archivo style.css del tema actual (en nuestro caso por estar usando child themes nos devuelve la url del tema padre)
	wp_enqueue_style('style_css', get_template_directory_uri() . '/style.css');
	
	// Embebe el archivo main.css ubicado en la carpeta /css del tema activo (al estar utilizando child themes, nos devuelve la url del tema hijo
	wp_enqueue_style('main_css', get_stylesheet_directory_uri() . '/css/main.css');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

?>