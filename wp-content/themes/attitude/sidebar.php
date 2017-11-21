<?php
/**
 * Displays the right sidebar of the theme.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */
?>

<?php
	/**
	 * attitude_before_right_sidebar
	 */
	do_action( 'attitude_before_right_sidebar' );
?>

<?php
	/** 
	 * attitude_right_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * attitude_display_right_sidebar 10
	 */
	do_action( 'attitude_right_sidebar' );
?>

<?php
	/**
	 * attitude_after_right_sidebar
	 */
	do_action( 'attitude_after_right_sidebar' );
?>