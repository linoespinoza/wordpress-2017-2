<?php
/**
 * Displays the sidebar on contact page template.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */
?>

<?php
	/**
	 * attitude_before_contact_page_sidebar
	 */
	do_action( 'attitude_before_contact_page_sidebar' );
?>

<?php
	/** 
	 * attitude_contact_page_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * attitude_display_contact_page_sidebar 10
	 */
	do_action( 'attitude_contact_page_sidebar' );
?>

<?php
	/**
	 * attitude_after_contact_page_sidebar
	 */
	do_action( 'attitude_after_contact_page_sidebar' );
?>