<?php
/**
 * Shows the sidebar content.
 *
 * @package 		Theme Horse
 * @subpackage 	Attitude
 * @since 			Attitude 1.0
 * @license 		http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link 			http://themehorse.com/themes/attitude
 */

/****************************************************************************************/

add_action( 'attitude_left_sidebar', 'attitude_display_left_sidebar', 10 );
/**
 * Show widgets of left sidebar.
 *
 * Shows all the widgets that are dragged and dropped on the left Sidebar.
 */
function attitude_display_left_sidebar() {
	if ( is_active_sidebar( 'attitude_left_sidebar' ) ) :
   	dynamic_sidebar( 'attitude_left_sidebar' );
   endif;
}

/****************************************************************************************/

add_action( 'attitude_right_sidebar', 'attitude_display_right_sidebar', 10 );
/**
 * Show widgets of right sidebar.
 *
 * Shows all the widgets that are dragged and dropped on the right Sidebar.
 */
function attitude_display_right_sidebar() {
	// Calling the right sidebar
	global $options, $array_of_default_settings;
   $options = wp_parse_args( get_option( 'attitude_theme_options', array() ), attitude_get_option_defaults());
		$content_layout = $options['default_layout'];
	if ( class_exists( 'WooCommerce' ) && is_woocommerce() && $content_layout == 'right-sidebar' ){ 
		echo '<div id="secondary">';
		// Calling the right sidebar
		if ( is_active_sidebar( 'attitude_right_sidebar' ) ) :
			dynamic_sidebar( 'attitude_right_sidebar' );
		endif;
		echo '</div>';
	}elseif( class_exists( 'WooCommerce' ) && is_woocommerce() && $content_layout == 'left-sidebar' ){
		echo '<div id="secondary">';
		// Calling the left sidebar
		if ( is_active_sidebar( 'attitude_left_sidebar' ) ) :
			dynamic_sidebar( 'attitude_left_sidebar' );
		endif;
		echo '</div>';
	}
	if(!class_exists( 'WooCommerce' )){
	// Calling the right sidebar
		if ( is_active_sidebar( 'attitude_right_sidebar' ) ) :
			dynamic_sidebar( 'attitude_right_sidebar' );
		endif;
	}
	if(class_exists( 'WooCommerce' ) && !is_woocommerce()){
	// Calling the right sidebar
		if ( is_active_sidebar( 'attitude_right_sidebar' ) ) :
			dynamic_sidebar( 'attitude_right_sidebar' );
		endif;
	}
}

/****************************************************************************************/

add_action( 'attitude_contact_page_sidebar', 'attitude_display_contact_page_sidebar', 10 );
/**
 * Show widgets on Contact Page Template's sidebar.
 *
 * Shows all the widgets that are dragged and dropped on the Contact Page Sidebar.
 */
function attitude_display_contact_page_sidebar() {
	if ( is_active_sidebar( 'attitude_contact_page_sidebar' ) ) :
		dynamic_sidebar( 'attitude_contact_page_sidebar' );
	endif;
}

/****************************************************************************************/

add_action( 'attitude_footer_sidebar', 'attitude_display_footer_sidebar', 10 );
/**
 * Show widgets on Footer of the theme.
 *
 * Shows all the widgets that are dragged and dropped on the Footer Sidebar.
 */
function attitude_display_footer_sidebar() {
	if( is_active_sidebar( 'attitude_footer_sidebar' ) ) {
		?>
		<div class="widget-wrap">
			<div class="container">
				<div class="widget-area clearfix">
				<?php
					if ( is_active_sidebar( 'attitude_footer_sidebar' ) ) :
						dynamic_sidebar( 'attitude_footer_sidebar' );
					endif;
				?>
				</div><!-- .widget-area -->
			</div><!-- .container -->
		</div><!-- .widget-wrap -->
		<?php
	}
}

?>