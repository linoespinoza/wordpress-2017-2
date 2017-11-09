<?php
/**
 * Contains all the functions related to sidebar and widget.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */

add_action( 'widgets_init', 'attitude_widgets_init');
/**
 * Function to register the widget areas(sidebar) and widgets.
 */
function attitude_widgets_init() {

	// Registering main left sidebar
	register_sidebar( array(
		'name' 				=> __( 'Left Sidebar', 'attitude' ),
		'id' 					=> 'attitude_left_sidebar',
		'description'   	=> __( 'Shows widgets at Left side.', 'attitude' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );

	// Registering main right sidebar
	register_sidebar( array(
		'name' 				=> __( 'Right Sidebar', 'attitude' ),
		'id' 					=> 'attitude_right_sidebar',
		'description'   	=> __( 'Shows widgets at Right side.', 'attitude' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );

	// Registering Business Page template sidebar
	register_sidebar( array(
		'name' 				=> __( 'Business Page Sidebar', 'attitude' ),
		'id' 					=> 'attitude_business_page_sidebar',
		'description'   	=> __( 'Shows widgets on Business Page Template. Sutiable widget: Theme Horse: Featured widget, Theme Horse: Testimonial, Theme Horse: Services', 'attitude' ),
		'before_widget' 	=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</section>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );

	// Registering contact Page sidebar
	register_sidebar( array(
		'name' 				=> __( 'Contact Page Sidebar', 'attitude' ),
		'id' 					=> 'attitude_contact_page_sidebar',
		'description'   	=> __( 'Shows widgets on Contact Page Template.', 'attitude' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );

	// Registering footer sidebar
	register_sidebar( array(
		'name' 				=> __( 'Footer Sidebar', 'attitude' ),
		'id' 					=> 'attitude_footer_sidebar',
		'description'   	=> __( 'Shows widgets at footer.', 'attitude' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );

	// Registering widgets
	register_widget( "attitude_custom_tag_widget" );
	register_widget( "attitude_service_widget" );
	register_widget( "attitude_recent_work_widget" );
	register_widget( "attitude_Widget_Testimonial" );
	register_widget( "attitude_promobox_widget" );
	
}

/****************************************************************************************/

/** 
 * Extends class wp_widget
 * 
 * Creates a function CustomTagWidget
 * $widget_ops option array passed to wp_register_sidebar_widget().
 * $control_ops option array passed to wp_register_widget_control().
 * $name, Name for this widget which appear on widget bar.
 */
class attitude_custom_tag_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'classname' => 'widget_custom-tagcloud', 'description' => __( 'Displays Custom Tag Cloud', 'attitude' ) );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name = __( 'Theme Horse: Custom Tag Cloud', 'attitude' ), $widget_ops, $control_ops );
	}
	
	/** Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$title = empty( $instance[ 'title' ] ) ? 'Tags' : $instance[ 'title' ];
		
		echo $before_widget;

		if ( $title ):
			echo $before_title . $title . $after_title;
		endif;

		wp_tag_cloud('smallest=13&largest=13px&unit=px');

		echo $after_widget;
	}
	
	/**
	 * update the particular instant  
	 * 
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		return $instance;
	}	
	
	/**
	 * Creates the form for the widget in the back-end which includes the Title 
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args( ( array ) $instance, array( 'title'=>'Tags' ) );
		$title = esc_attr( $instance[ 'title' ] );
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'attitude' ); ?></label> 
		<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
	<?php			
	}
}

/**
 * Widget for business layout that shows selected page content,title and featured image.
 * Construct the widget. 
 * i.e. Name, description and control options.
 */
 class attitude_service_widget extends WP_Widget {
 	function __construct() {
 		$widget_ops = array( 'classname' => 'widget_service', 'description' => __( 'Display Services( Business Layout )', 'attitude' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 ); 
		parent::__construct( false, $name = __( 'Theme Horse: Services', 'attitude' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
 		for ( $i=0; $i<6; $i++ ) {
 			$var = 'page_id'.$i;
 			$defaults[$var] = '';
 		}
 		$instance = wp_parse_args( (array) $instance, $defaults );
 		for ( $i=0; $i<6; $i++ ) {
 			$var = 'page_id'.$i;
 			$var = absint( $instance[ $var ] );
		}
	?>
		<?php for( $i=0; $i<6; $i++) { ?>
			<p>
				<label for="<?php echo $this->get_field_id( key($defaults) ); ?>"><?php _e( 'Page', 'attitude' ); ?>:</label>
				<?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name( key($defaults) ), 'selected' => $instance[key($defaults)] ) ); ?>
			</p>
		<?php
		next( $defaults );// forwards the key of $defaults array
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		for( $i=0; $i<6; $i++ ) {
			$var = 'page_id'.$i;
			$instance[ $var] = absint( $new_instance[ $var ] );
		}

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$page_array = array();
 		for( $i=0; $i<6; $i++ ) {
 			$var = 'page_id'.$i;
 			$page_id = isset( $instance[ $var ] ) ? $instance[ $var ] : '';
 			
 			if( !empty( $page_id ) )
 				array_push( $page_array, $page_id );// Push the page id in the array
 		}
		$get_featured_pages = new WP_Query( array(
			'posts_per_page' 			=> -1,
			'post_type'					=>  array( 'page' ),
			'post__in'		 			=> $page_array,
			'orderby' 		 			=> 'post__in'
		) ); 
		echo $before_widget; ?>
			<div class="column clearfix">
				<?php 
				$j = 1;
	 			while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post();
					$page_title = get_the_title();
					if( $j % 2 == 1 && $j > 1 ) {
						$service_class = "one-third clearfix-half";
					}
					elseif ( $j % 3 == 1 && $j > 1 ) {
						$service_class = "one-third clearfix-third";
					}	
					else {
						$service_class = "one-third";
					}				
					?>
					<div class="<?php echo $service_class; ?>">
						<div class="service-item clearfix">
							<?php 
							if ( has_post_thumbnail() ) {
								echo'<div class="service-icon">'.get_the_post_thumbnail( $post->ID, 'icon' ).'</div>';
							}
							?>
							<h3 class="service-title"><?php echo esc_attr($page_title); ?></h3>
						</div><!-- .service-item -->
						<article>
							<?php the_excerpt(); ?>
						</article>
						<a class="more-link" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php _e( 'Read more','attitude' ); ?></a>
					</div><!-- .one-third --> 
					<?php $j++; ?>					
				<?php endwhile;
		 		// Reset Post Data
	 			wp_reset_query(); 
	 			?>
			</div><!-- .column -->
		<?php echo $after_widget;
 		}
 	}

/**************************************************************************************/

/**
 * Widget for business layout that shows Featured page title and featured image.
 * Construct the widget. 
 * i.e. Name, description and control options.
 */
 class attitude_recent_work_widget extends WP_Widget {
 	function __construct() {
 		$widget_ops = array( 'classname' => 'widget_recent_work', 'description' => __( 'Use this widget to show recent work, portfolio or any pages as your wish ( Business Layout )', 'attitude' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 ); 
		parent::__construct( false, $name = __( 'Theme Horse: Featured Widget', 'attitude' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
 		for ( $i=0; $i<4; $i++ ) {
 			$var = 'page_id'.$i;
 			$defaults[$var] = '';
 		}
 		$att_defaults = $defaults;
 		$att_defaults['title'] = '';
 		$att_defaults['text'] = '';
 		$instance = wp_parse_args( (array) $instance, $att_defaults );
 		for ( $i=0; $i<4; $i++ ) {
 			$var = 'page_id'.$i;
 			$var = absint( $instance[ $var ] );
		}
		$title = esc_attr( $instance[ 'title' ] );
		$text = esc_textarea($instance['text']);
		?>
	
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'attitude' ); ?></label> 
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description','attitude' ); ?>
		<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		<?php
		for( $i=0; $i<4; $i++) { 
			?>
			<p>
				<label for="<?php echo $this->get_field_id( key($defaults) ); ?>"><?php _e( 'Page', 'attitude' ); ?>:</label>
				<?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name( key($defaults) ), 'selected' => $instance[key($defaults)] ) ); ?>
			</p>
		<?php
		next( $defaults );// forwards the key of $defaults array
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		for( $i=0; $i<4; $i++ ) {
			$var = 'page_id'.$i;
			$instance[ $var] = absint( $new_instance[ $var ] );
		}
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
 		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
 		$page_array = array();
 		for( $i=0; $i<6; $i++ ) {
 			$var = 'page_id'.$i;
 			$page_id = isset( $instance[ $var ] ) ? $instance[ $var ] : '';
 			
 			if( !empty( $page_id ) )
 				array_push( $page_array, $page_id );// Push the page id in the array
 		}
		$get_featured_pages = new WP_Query( array(
			'posts_per_page' 			=> -1,
			'post_type'					=>  array( 'page' ),
			'post__in'		 			=> $page_array,
			'orderby' 		 			=> 'post__in'
		) );
		echo $before_widget;
			if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; } ?>
			<p><?php echo esc_textarea( $text ); ?></p>
			<div class="column clearfix">
				<?php 
	 			while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post();
					$page_title = get_the_title();
					?>	
					<div class="one-fourth">
						<?php 
						if ( has_post_thumbnail( ) ) {
							echo '<a title="'.get_the_title().'"href="'.get_permalink().'">'.get_the_post_thumbnail( $post->ID,'gallery').'</a>';				
						}
						?>
						<h3 class="custom-gallery-title"><a href="<?php the_permalink(); ?>" title=""><?php echo esc_attr($page_title); ?></a></h3>
					</div><!-- .one-fourth -->			
				<?php endwhile;
		 		// Reset Post Data
	 			wp_reset_query(); 
	 			?>
			</div><!-- .column -->
		<?php echo $after_widget;
 		}
 	}

/**************************************************************************************/

 /**
 * Testimonial widget
 */
class attitude_Widget_Testimonial extends WP_Widget {

	function __construct() {
 		$widget_ops = array( 'classname' => 'widget_testimonial', 'description' => __( 'Display Testimonial( Business Layout )', 'attitude' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 ); 
		parent::__construct( false, $name = __( 'Theme Horse: Testimonial', 'attitude' ), $widget_ops, $control_ops);
 	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		$name = apply_filters( 'widget_name', empty( $instance['name'] ) ? '' : $instance['name'], $instance, $this->id_base );
		$byline = apply_filters( 'widget_byline', empty( $instance['byline'] ) ? '' : $instance['byline'], $instance, $this->id_base );

		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; } ?>
		<div class="testimonial-icon"></div>
		<div class="testimonial-post"><?php echo esc_textarea( $text ); ?></div>
		<div class="testimonial-author">
			<span><?php echo esc_html( $name ); ?></span>
			<?php echo esc_html( $byline ); ?>
		</div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['name'] = strip_tags($new_instance['name']);
		$instance['byline'] = strip_tags($new_instance['byline']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'name' =>'', 'byline'=>'' ) );
		$title = strip_tags($instance['title']);
		$name = strip_tags($instance['name']);
		$byline = strip_tags($instance['byline']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'attitude' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<?php _e( 'Testimonial Description','attitude'); ?>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_attr($text); ?></textarea>

		<p><label for="<?php echo $this->get_field_id('name'); ?>"><?php _e( 'Name:', 'attitude' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo esc_attr($name); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('byline'); ?>"><?php _e( 'Byline:', 'attitude' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('byline'); ?>" name="<?php echo $this->get_field_name('byline'); ?>" type="text" value="<?php echo esc_attr($byline); ?>" /></p>

<?php
	}
}
/**************************************************************************************/
/**
 * Widget for business layout to shows Promo Box.
 * Construct the widget.
 * i.e. Primay Promotional Box, Secondary Promotional Box, Redirect Button Text and Redirect Button Link
 */
class attitude_promobox_widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array('classname' => 'widget_promotional_bar', 'description' => __('Display PromoBox ( Business Layout )', 'attitude'));
		$control_ops = array('width'     => 200, 'height'     => 250);
		parent::__construct(false, $name = __('Theme Horse: PromoBox', 'attitude'), $widget_ops, $control_ops);
	}
	function widget($args, $instance) {
		extract($args);
		$promotional_img_background = apply_filters( 'promotional_img_background', empty( $instance['promotional_img_background'] ) ? '' : $instance['promotional_img_background'], $instance,  $this->id_base );
		$widget_primary   = apply_filters('widget_primary', empty($instance['widget_primary'])?'':$instance['widget_primary'], $instance, $this->id_base);
		$widget_secondary = apply_filters('widget_secondary', empty($instance['widget_secondary'])?'':$instance['widget_secondary'], $instance, $this->id_base);
		$redirect_text    = apply_filters('redirect_text', empty($instance['redirect_text'])?'':$instance['redirect_text'], $instance);
		$widget_redirecturl = apply_filters('widget_redirecturl', empty($instance['widget_redirecturl'])?'':$instance['widget_redirecturl'], $instance, $this->id_base);
		echo $before_widget; ?>
		<div class="promotional_bar_content" <?php if(!empty($promotional_img_background)){ ?> style="background-image:url('<?php echo esc_url($promotional_img_background);?>');" <?php } ?> >
		<?php
			if (!empty($widget_primary)) {echo '<div class="promotional-text">'.esc_html($widget_primary);}?> <span> <?php echo esc_html($widget_secondary);
			?> </span> <?php echo '</div><!-- .promotional-text -->';
			?> <a class="call-to-action" href="<?php echo esc_html($widget_redirecturl);?>" title="<?php echo $redirect_text;?>"><?php echo esc_html($redirect_text);
			?></a>
		</div><!-- .promotional_bar_content -->
		<?php
		echo $after_widget;
	}
	function update($new_instance, $old_instance) {
		$instance                       = $old_instance;
		$instance['promotional_img_background']     = strip_tags($new_instance['promotional_img_background']);
		$instance['widget_primary']     = esc_textarea($new_instance['widget_primary']);
		$instance['widget_secondary']   = esc_textarea($new_instance['widget_secondary']);
		$instance['widget_redirecturl'] = esc_url($new_instance['widget_redirecturl']);
		$instance['redirect_text']      = strip_tags($new_instance['redirect_text']);
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}
	function form($instance) {
		$instance           = wp_parse_args((array) $instance, array('promotional_img_background' => '','widget_primary' => '', 'widget_secondary' => '', 'redirect_text' => '', 'widget_redirecturl' => ''));
		$promotional_img_background      = strip_tags($instance['promotional_img_background']);
		$widget_primary     = esc_textarea($instance['widget_primary']);
		$widget_secondary   = esc_textarea($instance['widget_secondary']);
		$redirect_text      = strip_tags($instance['redirect_text']);
		$widget_redirecturl = esc_url($instance['widget_redirecturl']);
		?>
			<p>
				<label for="<?php echo $this->get_field_id('promotional_img_background');?>">
						<?php _e('Background Image:', 'attitude');?>
				</label>
					<input class="upload1" type="text" id="<?php echo $this->get_field_id( 'promotional_img_background' ); ?>"  name="<?php echo $this->get_field_name('promotional_img_background'); ?>" value="<?php echo esc_url($promotional_img_background); ?>" />
					<input class="button custom_media_button" name="<?php echo $this->get_field_name('promotional_img_background'); ?>" id="custom_media_button_services" type="button" value="<?php esc_attr_e( 'Upload', 'attitude' ); ?>" onclick="mediaupload.uploader( '<?php echo $this->get_field_id( 'promotional_img_background' ); ?>' ); return false;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('widget_primary');?>">
					<?php _e('Primary Promotional:', 'attitude');?>
				</label>
				<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('widget_primary');?>" name="<?php echo $this->get_field_name('widget_primary');?>"><?php echo $widget_primary;
		?></textarea>
			</p>
					<?php _e('Secondary Promotional', 'attitude');?>
				<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('widget_secondary');?>" name="<?php echo $this->get_field_name('widget_secondary');?>"><?php echo $widget_secondary;
		?></textarea>
			<p>
				<label for="<?php echo $this->get_field_id('redirect_text');?>">
					<?php _e('Redirect Text:', 'attitude');?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id('redirect_text');?>" name="<?php echo $this->get_field_name('redirect_text');?>" type="text" value="<?php echo esc_attr($redirect_text);?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('widget_redirecturl');?>">
					<?php _e('Redirect Url:', 'attitude');?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id('widget_redirecturl');?>" name="<?php echo $this->get_field_name('widget_redirecturl');?>" type="text" value="<?php echo $widget_redirecturl;?>" />
			</p>
		<?php
	}
}
 ?>