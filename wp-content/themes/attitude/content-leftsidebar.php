<?php
/**
 * This file displays page with left sidebar.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */
?>

<?php
   /**
    * attitude_before_primary
    */
   do_action( 'attitude_before_primary' );
?>

<div id="primary">
   <?php
      /**
       * attitude_before_loop_content
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * attitude_loop_before 10
       */
      do_action( 'attitude_before_loop_content' );

      /**
       * attitude_loop_content
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * attitude_theloop 10
       */
      do_action( 'attitude_loop_content' );

      /**
       * attitude_after_loop_content
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * attitude_next_previous 5
		 * attitude_loop_after 10
       */
      do_action( 'attitude_after_loop_content' );      
   ?>
</div><!-- #primary -->

<?php
   /**
    * attitude_after_primary
    */
   do_action( 'attitude_after_primary' );
?>

<div id="secondary">
	<?php get_sidebar( 'left' ); ?>
</div><!-- #secondary -->