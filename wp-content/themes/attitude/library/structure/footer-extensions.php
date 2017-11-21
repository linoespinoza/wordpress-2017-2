<?php
/**
 * Adds footer structures.
 *
 * @package 		Theme Horse
 * @subpackage 	Attitude
 * @since 			Attitude 1.0
 * @license 		http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link 			http://themehorse.com/themes/attitude
 */

/****************************************************************************************/

add_action( 'attitude_footer', 'attitude_footer_widget_area', 10 );
/** 
 * Displays the footer widgets
 */
function attitude_footer_widget_area() {
	get_sidebar( 'footer' );
}

/****************************************************************************************/

add_action( 'attitude_footer', 'attitude_open_sitegenerator_div', 20 );
/**
 * Opens the site generator div.
 */
function attitude_open_sitegenerator_div() {
	echo '<div id="site-generator" class="clearfix">
				<div class="container">';
}

/****************************************************************************************/

add_action( 'attitude_footer', 'attitude_socialnetworks', 25 );

/****************************************************************************************/

add_action( 'attitude_footer', 'attitude_footer_info', 30 );
/**
 * function to show the footer info, copyright information
 */
function attitude_footer_info() {         
   $output = '<div class="copyright">'.__( 'Copyright &copy;', 'attitude' ).' '.attitude_the_year().' ' .attitude_site_link().' | ' . ' '.__( 'Theme by:', 'attitude' ).' '.attitude_themehorse_link().' | '.' '.__( 'Powered by:', 'attitude' ).' '.attitude_wp_link() .'</div><!-- .copyright -->';
   echo $output;
}

/****************************************************************************************/

add_action( 'attitude_footer', 'attitude_close_sitegenerator_div', 35 );
/**
 * Closes the site generator div.
 */
function attitude_close_sitegenerator_div() {
	echo '</div><!-- .container -->
			</div><!-- #site-generator -->';
}

/****************************************************************************************/

add_action( 'attitude_footer', 'attitude_backtotop_html', 40 );
/**
 * Shows the back to top icon to go to top.
 */
function attitude_backtotop_html() {
	echo '<div class="back-to-top"><a href="#branding"></a></div>';
}

?>