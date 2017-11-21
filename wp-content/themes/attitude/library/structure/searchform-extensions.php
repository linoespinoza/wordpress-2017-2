<?php
/**
 * Renders the search form of the theme.
 *
 * @package 		Theme Horse
 * @subpackage 	Attitude
 * @since 			Attitude 1.0
 * @license 		http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link 			http://themehorse.com/themes/attitude
 */

add_action( 'attitude_searchform', 'attitude_display_searchform', 10 );
/**
 * Displaying the search form.
 *
 */
function attitude_display_searchform() {
?>
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="searchform clearfix" method="get">
		<label class="assistive-text" for="s"><?php _e( 'Search', 'attitude' ); ?></label>
		<input type="text" placeholder="<?php esc_attr_e( 'Search', 'attitude' ); ?>" class="s field" name="s">
	</form><!-- .searchform -->
<?php
}
?>