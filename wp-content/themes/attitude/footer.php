<?php
/**
 * Displays the footer section of the theme.
 *
 * @package 		Theme Horse
 * @subpackage 	Attitude
 * @since 			Attitude 1.0
 */
?>
	   </div><!-- #main -->

	   <?php
	      /** 
	       * attitude_after_main hook
	       */
	      do_action( 'attitude_after_main' );
	   ?>

	   <?php 
	   	/**
	   	 * attitude_before_footer hook
	   	 */
	   	do_action( 'attitude_before_footer' );
	   ?>	
	   
	   <footer id="colophon" class="clearfix">
			<?php
		      /** 
		       * attitude_footer hook		       
				 *
				 * HOOKED_FUNCTION_NAME PRIORITY
				 *
				 * attitude_footer_widget_area 10
				 * attitude_open_sitegenerator_div 20
				 * attitude_socialnetworks 25
				 * attitude_footer_info 30
				 * attitude_close_sitegenerator_div 35
				 * attitude_backtotop_html 40
		       */
		      do_action( 'attitude_footer' );
		   ?>
		</footer>
	   
		<?php 
	   	/**
	   	 * attitude_after_footer hook
	   	 */
	   	do_action( 'attitude_after_footer' );
	   ?>	

	</div><!-- .wrapper -->

	<?php
		/** 
		 * attitude_after hook
		 */
		do_action( 'attitude_after' );
	?> 

<?php wp_footer(); ?>

</body>
</html>