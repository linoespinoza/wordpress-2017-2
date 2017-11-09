<?php
/**
 * Displays the header section of the theme.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<?php		
		/** 
		 * attitude_title hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * attitude_add_meta 5
		 *
		 */
		do_action( 'attitude_title' );

		/** 
		 * attitude_meta hook
		 */
		do_action( 'attitude_meta' );

		/** 
		 * attitude_links hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * attitude_add_links 10
		 *
		 */
		do_action( 'attitude_links' );

		/** 
		 * This hook is important for wordpress plugins and other many things
		 */
		wp_head();
	?>

</head>

<body <?php body_class(); ?>>
	<?php
		/** 
		 * attitude_before hook
		 */
		do_action( 'attitude_before' );
	?>

	<div class="wrapper">
		<?php
			/** 
			 * attitude_before_header hook
			 */
			do_action( 'attitude_before_header' );
		?>
		<header id="branding" >
			<?php
				/** 
				 * attitude_header hook
				 *
				 * HOOKED_FUNCTION_NAME PRIORITY
				 *
				 * attitude_headerdetails 10
				 */
				do_action( 'attitude_header' );
			?>
		</header>
		<?php
			/** 
			 * attitude_after_header hook
			 */
			do_action( 'attitude_after_header' );
		?>

		<?php
			/** 
			 * attitude_before_main hook
			 */
			do_action( 'attitude_before_main' );
		?>
		<div id="main" class="container clearfix">