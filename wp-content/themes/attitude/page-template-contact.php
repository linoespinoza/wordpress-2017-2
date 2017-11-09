<?php
/**
 * Template Name: Contact Page Template
 *
 * Displays the contact page template.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */
?>

<?php get_header(); ?>

<?php
	/** 
	 * attitude_before_main_container hook
	 */
	do_action( 'attitude_before_main_container' );
?>

<div id="container">
	<?php
		/** 
		 * attitude_contact_page_template_content hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * attitude_display_contact_page_template_content 10
		 */
		do_action( 'attitude_contact_page_template_content' );
	?>
</div><!-- #container -->

<?php
	/** 
	 * attitude_after_main_container hook
	 */
	do_action( 'attitude_after_main_container' );
?>

<?php get_footer(); ?>