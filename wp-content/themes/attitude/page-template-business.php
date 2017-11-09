<?php
/**
 * Template Name: Business Template
 *
 * Displays the Business Layout of the theme.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.1
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
		 * attitude_business_template_content hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * attitude_display_business_template_content 10
		 */
		do_action( 'attitude_business_template_content' );
	?>
</div><!-- #container -->

<?php
	/** 
	 * attitude_after_main_container hook
	 */
	do_action( 'attitude_after_main_container' );
?>

<?php get_footer(); ?>