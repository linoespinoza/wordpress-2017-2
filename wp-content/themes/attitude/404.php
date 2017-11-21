<?php
/**
 * Displays the 404 error page of the theme.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */
?>

<?php get_header(); ?>

<?php
	/** 
	 * attitude_404_content hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * attitude_display_404_page_content 10
	 */
	do_action( 'attitude_404_content' );
?>

<?php get_footer(); ?>