<?php
/**
 * Displays the footer sidebar of the theme.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */
?>

<?php
	/**
	 * attitude_before_footer_sidebar
	 */
	do_action( 'attitude_before_footer_sidebar' );
?>

<?php
	/** 
	 * attitude_footer_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * attitude_display_footer_sidebar 10
	 */
	do_action( 'attitude_footer_sidebar' );
?>

<?php
	/**
	 * attitude_after_footer_sidebar
	 */
	do_action( 'attitude_after_footer_sidebar' );
?>