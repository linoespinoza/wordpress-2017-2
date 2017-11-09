<?php
/**
 * Displays the left sidebar of the theme.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */
?>

<?php
	/**
	 * attitude_before_left_sidebar
	 */
	do_action( 'attitude_before_left_sidebar' );
?>

<?php
	/** 
	 * attitude_left_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * attitude_display_left_sidebar 10
	 */
	do_action( 'attitude_left_sidebar' );
?>

<?php
	/**
	 * attitude_after_left_sidebar
	 */
	do_action( 'attitude_after_left_sidebar' );
?>