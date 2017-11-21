<?php
/**
 * Displays the index section of the theme.
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
		 * attitude_main_container hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * attitude_content 10
		 */
		do_action( 'attitude_main_container' );
	?>
</div><!-- #container -->

<?php
	/** 
	 * attitude_after_main_container hook
	 */
	do_action( 'attitude_after_main_container' );
?>

<?php get_footer(); ?>
