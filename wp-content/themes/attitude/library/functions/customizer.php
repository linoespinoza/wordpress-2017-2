<?php 
/**
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 3.0
 */
if ( ! class_exists( 'WP_Customize_Section' ) ) {
	return null;
}
function attitude_textarea_register($wp_customize){
	class Attitude_Customize_Attitude_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
		<div class="theme-info">
			<a title="<?php esc_attr_e( 'Review Attitude', 'attitude' ); ?>" href="<?php echo esc_url( 'http://wordpress.org/support/view/theme-reviews/attitude' ); ?>" target="_blank">
			<?php _e( 'Rate Attitude', 'attitude' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://themehorse.com/theme-instruction/attitude/' ); ?>" title="<?php esc_attr_e( 'Attitude Theme Instructions', 'attitude' ); ?>" target="_blank">
			<?php _e( 'Theme Instructions', 'attitude' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://themehorse.com/support-forum/' ); ?>" title="<?php esc_attr_e( 'Support Forum', 'attitude' ); ?>" target="_blank">
			<?php _e( 'Support Forum', 'attitude' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://themehorse.com/preview/attitude/' ); ?>" title="<?php esc_attr_e( 'Attitude Demo', 'attitude' ); ?>" target="_blank">
			<?php _e( 'View Demo', 'attitude' ); ?>
			</a>
		</div>
		<?php
		}
	}
	class Attitude_Customize_Category_Control extends WP_Customize_Control {
		/**
		* The type of customize control being rendered.
		*/
		public $type = 'multiple-select';
		/**
		* Displays the multiple select on the customize screen.
		*/
		public function render_content() {
		global $options, $array_of_default_settings;
		$options = wp_parse_args(  get_option( 'attitude_theme_options', array() ),  attitude_get_option_defaults());
		$categories = get_categories(); ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
				<option value="0" <?php if ( empty( $options['front_page_category'] ) ) { selected( true, true ); } ?>><?php _e( '--Disabled--', 'attitude' ); ?></option>
				<?php
					foreach ( $categories as $category) :?>
						<option value="<?php echo $category->cat_ID; ?>" <?php if ( in_array( $category->cat_ID, $options['front_page_category']) ) { echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
					<?php endforeach; ?>
				</select>
			</label>
		<?php 
		}
	}
}
/**
 * Upsell customizer section.
 *
 * @since  1.0.0
 * @access public
 */
class Attitude_Customize_Section_Upsell extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'upsell';

	/**
	 * Custom button text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_text = '';

	/**
	 * Custom pro button URL.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_url = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function json() {
		$json = parent::json();

		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );

		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() { ?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}

				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="upgrade-to-pro" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

function attitude_customize_register($wp_customize){
	$wp_customize->add_panel( 'attitude_design_options_panel', array(
	'priority'       => 200,
	'capability'     => 'edit_theme_options',
	'title'          => __('Design Options', 'attitude')
	));

	$wp_customize->add_panel( 'attitude_advanced_options_panel', array(
	'priority'       => 300,
	'capability'     => 'edit_theme_options',
	'title'          => __('Advanced Options', 'attitude')
	));

	$wp_customize->add_panel( 'attitude_featured_post_page_panel', array(
	'priority'       => 400,
	'capability'     => 'edit_theme_options',
	'title'          => __('Featured Post/ Page Slider', 'attitude')
	));
	global $options, $array_of_default_settings;
	$options = wp_parse_args(  get_option( 'attitude_theme_options', array() ), attitude_get_option_defaults());
/********************Attitude Upgrade ******************************************/
	$wp_customize->add_section('attitude_upgrade', array(
		'title'					=> __('Attitude Support', 'attitude'),
		'priority'				=> 1,
	));
	$wp_customize->add_setting( 'attitude_theme_options[attitude_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Attitude_Customize_Attitude_upgrade(
		$wp_customize,
		'attitude_upgrade',
			array(
				'label'					=> __('Attitude Upgrade','attitude'),
				'section'				=> 'attitude_upgrade',
				'settings'				=> 'attitude_theme_options[attitude_upgrade]',
			)
		)
	);
	/******************** Design Options ******************************************/
/******************** Custom Header ******************************************/
	$wp_customize->add_section('custom_header_setting', array(
		'title'					=> __('Custom Header', 'attitude'),
		'priority'				=> 200,
		'panel'					=>'attitude_design_options_panel'
	));
	$wp_customize->add_setting( 'attitude_theme_options[hide_header_searchform]', array(
		'default'				=> 0,
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control( 'custom_header_setting', array(
		'label'					=> __('Hide Searchform from Header', 'attitude'),
		'section'				=> 'custom_header_setting',
		'settings'				=> 'attitude_theme_options[hide_header_searchform]',
		'type'					=> 'checkbox',
	));
	$wp_customize->add_setting( 'attitude_theme_options[header_logo]',array(
		'sanitize_callback'	=> 'esc_url_raw',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
		$wp_customize,
		'header_logo',
			array(
				'label'				=> __('Header Logo','attitude'),
				'section'			=> 'custom_header_setting',
				'settings'			=> 'attitude_theme_options[header_logo]'
			)
		)
	);
	$wp_customize->add_setting('attitude_theme_options[header_show]', array(
		'default'				=> 'header-text',
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('custom_header_display', array(
		'label'					=> __('Display', 'attitude'),
		'section'				=> 'custom_header_setting',
		'settings'				=> 'attitude_theme_options[header_show]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
			'choices'			=> array(
			'header-logo'		=> __('Header Logo Only','attitude'),
			'header-text'		=> __('Header Text Only','attitude'),
			'disable-both'		=> __('Disable','attitude'),
			),
	));
	/********************Site Layout Options******************************************/
	$wp_customize->add_section('attitude_site_layout', array(
		'title'					=> __('Site Layout Options', 'attitude'),
		'priority'				=> 230,
		'panel'					=>'attitude_design_options_panel'
	));
	$wp_customize->add_setting('attitude_theme_options[site_layout]', array(
		'default'				=> 'narrow-layout',
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('attitude_site_layout', array(
		'section'				=> 'attitude_site_layout',
		'settings'				=> 'attitude_theme_options[site_layout]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
		'choices'				=> array(
			'wide-layout'					=> __('Wide Layout','attitude'),
			'narrow-layout'					=> __('Narrow Layout','attitude'),
		),
	));
	/********************Default Layout options ******************************************/
	$wp_customize->add_section('attitude_default_layout', array(
		'title'					=> __('Default Layout Options', 'attitude'),
		'description'			=> __('Make sure that you have not set the layout from specific page','attitude'),
		'priority'				=> 240,
		'panel'					=>'attitude_design_options_panel'
	));
	$wp_customize->add_setting('attitude_theme_options[default_layout]', array(
		'default'				=> 'right-sidebar',
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('attitude_default_layout', array(
		'section'				=> 'attitude_default_layout',
		'settings'				=> 'attitude_theme_options[default_layout]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
		'choices'				=> array(
			'right-sidebar'				=> __('Right Sidebar','attitude'),
			'left-sidebar'				=> __('Left Sidebar','attitude'),
			'no-sidebar'			=> __('No Sidebar','attitude'),
			'no-sidebar-full-width'			=> __('No Sidebar, Full Width','attitude'),
			'no-sidebar-one-column'	=> __('No Sidebar, One Column','attitude'),
		),
	));
	/********************Custom Css ******************************************/
	$wp_customize->add_section( 'attitude_custom_css', array(
		'title'					=> __('Custom CSS', 'attitude'),
		'description'			=> __('This CSS will overwrite the CSS of style.css file.','attitude'),
		'priority'				=> 250,
		'panel'					=>'attitude_design_options_panel'
	));
	$wp_customize->add_setting( 'attitude_theme_options[custom_css]', array(
		'default'				=> '',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'custom_css', array(
		'section'				=> 'attitude_custom_css',
				'settings'				=> 'attitude_theme_options[custom_css]',
				'type'					=> 'textarea'
	));
	/******************** Advanced Options ******************************************/
	/******************** Home Slogan Options ******************************************/
	$wp_customize->add_section('home_slogan_options', array(
		'title'					=> __('Home Slogan Options', 'attitude'),
		'priority'				=> 300,
		'panel'					=>'attitude_advanced_options_panel'
	));
	$wp_customize->add_setting( 'attitude_theme_options[disable_slogan]', array(
		'default'				=> '0',
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control( 'home_slogan_options', array(
		'label'					=> __('Disable Slogan Part', 'attitude'),
		'section'				=> 'home_slogan_options',
		'settings'				=> 'attitude_theme_options[disable_slogan]',
		'type'					=> 'checkbox',
	));
	$wp_customize->add_setting('attitude_theme_options[slogan_position]', array(
		'default'				=> 'below-slider',
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('attitude_design_layout', array(
		'label'					=> __('Slogan Position', 'attitude'),
		'section'				=> 'home_slogan_options',
		'settings'				=> 'attitude_theme_options[slogan_position]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
		'choices'				=> array(
			'below-slider'					=> __('Below Slider','attitude'),
			'above-slider'					=> __('Above Slider','attitude'),
		),
	));
	$wp_customize->add_setting( 'attitude_theme_options[home_slogan1]', array(
		'default'				=> '',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options',
		'sanitize_callback'	=> 'esc_textarea'
	));
	$wp_customize->add_control( 'home_slogan1', array(
		'label'					=> __('Home Page Slogan1', 'attitude'),
		'description'			=> __('The appropriate length of the slogan is around 10 words.','attitude'),
		'section'				=> 'home_slogan_options',
		'settings'				=> 'attitude_theme_options[home_slogan1]',
		'type'					=> 'textarea'
	));
	$wp_customize->add_setting( 'attitude_theme_options[home_slogan2]', array(
		'default'				=> '',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options',
		'sanitize_callback'	=> 'esc_textarea'
	));
	$wp_customize->add_control( 'home_slogan2', array(
		'label'					=> __('Home Page Slogan2', 'attitude'),
		'description'			=> __('The appropriate length of the slogan is around 10 words.','attitude'),
		'section'				=> 'home_slogan_options',
		'settings'				=> 'attitude_theme_options[home_slogan2]',
		'type'					=> 'textarea'
	));
	$wp_customize->add_setting('attitude_theme_options[button_text]', array(
		'default'					=>'',
		'sanitize_callback'		=> 'sanitize_text_field',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('button_text', array(
		'label'						=> __('Redirect Button Text', 'attitude'),
		'description'			=> __('Text to show in Button','attitude'),
		'section'					=> 'home_slogan_options',
		'settings'					=> 'attitude_theme_options[button_text]',
		'type'						=> 'text',
	));
	$wp_customize->add_setting('attitude_theme_options[redirect_button_link]', array(
		'default'					=>'',
		'sanitize_callback'		=> 'esc_url_raw',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('redirect_button_link', array(
		'label'						=> __('Redirect Button Link', 'attitude'),
		'description'			=> __('Link this button to show your special work, portfolio','attitude'),
		'section'					=> 'home_slogan_options',
		'settings'					=> 'attitude_theme_options[redirect_button_link]',
		'type'						=> 'text',
	));
	/******************** Feed Url *****************************************/
	$wp_customize->add_section('feed_redirect', array(
		'title'					=> __('Feed Redirect', 'attitude'),
		'priority'				=> 310,
		'panel'					=>'attitude_advanced_options_panel'
	));
	$wp_customize->add_setting('attitude_theme_options[feed_url]', array(
		'default'					=>'',
		'sanitize_callback'		=> 'esc_url',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('feed_url', array(
		'priority'					=>9,
		'label'						=> __('Feed Redirect URL', 'attitude'),
		'section'					=> 'feed_redirect',
		'settings'					=> 'attitude_theme_options[feed_url]',
		'type'						=> 'text',
	));
	/******************** Homepage / Frontpage Category Setting *********************/
	$wp_customize->add_section(
		'attitude_category_section', array(
		'title' 						=> __('Homepage / Frontpage Category Setting','attitude'),
		'description'				=> __('Only posts that belong to the categories selected here will be displayed on the front page. ( You may select multiple categories by holding down the CTRL key. ) ','attitude'),
		'priority'					=> 320,
		'panel'					=>'attitude_advanced_options_panel'
	));
	$wp_customize->add_setting( 'attitude_theme_options[front_page_category]', array(
		'default'					=>array(),
		'sanitize_callback'		=> 'prefix_sanitize_integer',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control(
		new Attitude_Customize_Category_Control(
		$wp_customize,
			'front_page_category',
			array(
			'label'					=> __('Front page posts categories','attitude'),
			'section'				=> 'attitude_category_section',
			'settings'				=> 'attitude_theme_options[front_page_category]',
			'type'					=> 'multiple-select',
			)
		)
	);
	/********************Slider Options ******************************************************/
	/********************Featured Post/ Page Slider******************************************/
	$wp_customize->add_section( 'attitude_featured_content_setting', array(
		'title'					=> __('Slider Options', 'attitude'),
		'priority'				=> 400,
		'panel'					=>'attitude_featured_post_page_panel'
	));
	$wp_customize->add_setting( 'attitude_theme_options[disable_slider]', array(
		'default'					=> 0,
		'sanitize_callback'		=> 'prefix_sanitize_integer',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control( 'attitude_disable_slider', array(
		'priority'					=>410,
		'label'						=> __('Disable Slider', 'attitude'),
		'section'					=> 'attitude_featured_content_setting',
		'settings'					=> 'attitude_theme_options[disable_slider]',
		'type'						=> 'checkbox',
	));
	$wp_customize->add_setting('attitude_theme_options[slider_quantity]', array(
		'default'					=> '4',
		'sanitize_callback'		=> 'attitude_sanitize_delay_transition',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('slider_quantity', array(
		'priority'					=>420,
		'label'						=> __('Number of Slides', 'attitude'),
		'section'					=> 'attitude_featured_content_setting',
		'settings'					=> 'attitude_theme_options[slider_quantity]',
		'type'						=> 'text',
	) );
	$wp_customize->add_setting('attitude_theme_options[transition_effect]', array(
		'default'					=> 'fade',
		'sanitize_callback'		=> 'attitude_sanitize_effect',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('transition_effect', array(
		'priority'					=>430,
		'label'						=> __('Transition Effect', 'attitude'),
		'section'					=> 'attitude_featured_content_setting',
		'settings'					=> 'attitude_theme_options[transition_effect]',
		'type'						=> 'select',
		'choices'					=> array(
			'fade'					=> __('Fade','attitude'),
			'wipe'					=> __('Wipe','attitude'),
			'scrollUp'				=> __('Scroll Up','attitude' ),
			'scrollDown'			=> __('Scroll Down','attitude' ),
			'scrollLeft'			=> __('Scroll Left','attitude' ),
			'scrollRight'			=> __('Scroll Right','attitude' ),
			'blindX'					=> __('Blind X','attitude' ),
			'blindY'					=> __('Blind Y','attitude' ),
			'blindZ'					=> __('Blind Z','attitude' ),
			'cover'					=> __('Cover','attitude' ),
			'shuffle'				=> __('Shuffle','attitude' ),
		),
	));
	$wp_customize->add_setting('attitude_theme_options[transition_delay]', array(
		'default'					=> '4',
		'sanitize_callback'		=> 'attitude_sanitize_delay_transition',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('transition_delay', array(
		'priority'					=>440,
		'label'						=> __('Transition Delay', 'attitude'),
		'section'					=> 'attitude_featured_content_setting',
		'settings'					=> 'attitude_theme_options[transition_delay]',
		'type'						=> 'text',
	) );
	$wp_customize->add_setting('attitude_theme_options[transition_duration]', array(
		'default'					=> '1',
		'sanitize_callback'		=> 'attitude_sanitize_delay_transition',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('transition_duration', array(
		'priority'					=>450,
		'label'						=> __('Transition Length', 'attitude'),
		'section'					=> 'attitude_featured_content_setting',
		'settings'					=> 'attitude_theme_options[transition_duration]',
		'type'						=> 'text',
	) );
	/******************** Featured Post/ Page Slider Options  *********************************************/
		$wp_customize->add_section( 'attitude_page_post_options', array(
			'title' 						=> __('Featured Post/ Page Slider Options','attitude'),
			'priority'					=> 460,
			'panel'					=>'attitude_featured_post_page_panel'
		));
		$wp_customize->add_setting('attitude_theme_options[exclude_slider_post]', array(
			'default'					=>0,
			'sanitize_callback'		=>'prefix_sanitize_integer',
			'type' 						=> 'option',
			'capability' 				=> 'manage_options'
		));
		$wp_customize->add_control( 'exclude_slider_post', array(
			'priority'					=>470,
			'label'						=> __('Exclude Slider Post', 'attitude'),
			'description'				=>__('Exclude Slider post from Homepage posts?','attitude'),
			'section'					=> 'attitude_page_post_options',
			'settings'					=> 'attitude_theme_options[exclude_slider_post]',
			'type'						=> 'checkbox',
		));
		// featured post/page
		for ( $i=1; $i <= $options['slider_quantity'] ; $i++ ) {
			$wp_customize->add_setting('attitude_theme_options[featured_post_slider]['. $i.']', array(
				'default'					=>'',
				'sanitize_callback'		=>'prefix_sanitize_integer',
				'type' 						=> 'option',
				'capability' 				=> 'manage_options'
			));
			$wp_customize->add_control( 'featured_post_slider]['. $i .']', array(
				'priority'					=> 480 . $i,
				'label'						=> __(' Featured Slider Post/Page #', 'attitude') . ' ' . $i ,
				'section'					=> 'attitude_page_post_options',
				'settings'					=> 'attitude_theme_options[featured_post_slider]['. $i .']',
				'type'						=> 'text',
			));
		}
	/****************************************************************************/
	/******************** Social Links******************************************/
	$wp_customize->add_section(
		'attitude_sociallinks_section', array(
		'title' 						=> __('Social Links','attitude'),
		'priority'					=> 500,
	));
	$social_links = array(); 
		$social_links_name = array();
		$social_links_name = array( __( 'Facebook', 'attitude' ),
									__( 'Twitter', 'attitude' ),
									__( 'Google Plus', 'attitude' ),
									__( 'Pinterest', 'attitude' ),
									__( 'Youtube', 'attitude' ),
									__( 'Vimeo', 'attitude' ),
									__( 'LinkedIn', 'attitude' ),
									__( 'Flickr', 'attitude' ),
									__( 'Tumblr', 'attitude' ),
									__( 'Myspace', 'attitude' ),
									__( 'RSS', 'attitude' )
									);
		$social_links = array( 	'Facebook' 		=> 'social_facebook',
										'Twitter' 		=> 'social_twitter',
										'Google-Plus'	=> 'social_googleplus',
										'Pinterest' 	=> 'social_pinterest',
										'You-tube'		=> 'social_youtube',
										'Vimeo'			=> 'social_vimeo',
										'Linked'			=> 'social_linkedin',
										'Flickr'			=> 'social_flickr',
										'Tumblr'			=> 'social_tumblr',
										'My-Space'		=> 'social_myspace',
										'RSS'				=> 'social_rss' 
									);
		$i = 0;
		foreach( $social_links as $key => $value ) {
			$wp_customize->add_setting( 'attitude_theme_options['. $value. ']', array(
				'default'					=>'',
				'sanitize_callback'		=> 'esc_url',
				'type' 						=> 'option',
				'capability' 				=> 'manage_options'
			));
			$wp_customize->add_control( $value, array(
					'label'					=> $social_links_name[ $i ],
					'section'				=> 'attitude_sociallinks_section',
					'settings'				=> 'attitude_theme_options['. $value. ']',
					'type'					=> 'text',
					)
			);
			$i++;
		}
	/********************************************************************************/
	/******************** Webmaster Tools ******************************************/
	$wp_customize->add_section('webmaster_analytics_tools', array(
		'title'					=> __('Webmaster Tools', 'attitude'),
		'priority'				=> 600,
	));
	$wp_customize->add_setting( 'attitude_theme_options[analytic_header]', array(
		'default'				=> '',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options',
		'sanitize_callback'	=> 'wp_kses_stripslashes'
	));
	$wp_customize->add_control( 'analytic_header', array(
		'label'					=> __('Code to display on Header','attitude'),
		'description'			=> __('Note: Enter your custom header script.','attitude'),
		'section'				=> 'webmaster_analytics_tools',
		'settings'				=> 'attitude_theme_options[analytic_header]',
		'type'					=> 'textarea'
	));
	$wp_customize->add_setting( 'attitude_theme_options[analytic_footer]', array(
		'default'				=> '',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options',
		'sanitize_callback'	=> 'wp_kses_stripslashes'
	));
	$wp_customize->add_control( 'analytic_footer', array(
		'label'					=> __('Code to display on Footer','attitude'),
		'description'			=> __('Note: Enter your custom footer script.','attitude'),
		'section'				=> 'webmaster_analytics_tools',
		'settings'				=> 'attitude_theme_options[analytic_footer]',
		'type'					=> 'textarea'
	));

}
/********************Sanitize the values ******************************************/
function prefix_sanitize_integer( $input ) {
	return $input;
}
function attitude_sanitize_effect( $input ) {
	if ( ! in_array( $input, array( 'fade', 'wipe', 'scrollUp', 'scrollDown', 'scrollLeft', 'scrollRight', 'blindX', 'blindY', 'blindZ', 'cover', 'shuffle' ) ) ) {
		$input = 'fade';
	}
	return $input;
}
function attitude_sanitize_delay_transition( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}
function attitude_customizer_control_scripts() {

	wp_enqueue_script(
		'attitude-customize-controls',
		get_template_directory_uri() . '/library/js/attitude_customizer.js',
		array(), '3.0',
		true
	);

	wp_enqueue_style( 'attitude-customize-controls',
	 get_template_directory_uri() . '/library/css/customize-controls.css' );

}

add_action( 'customize_controls_enqueue_scripts', 'attitude_customizer_control_scripts', 0 );


function attitude_customize_custom_sections( $wp_customize ) {

	// Register custom section types.
	$wp_customize->register_section_type( 'Attitude_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Attitude_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Attitude Pro', 'attitude' ),
				'pro_text' => esc_html__( 'Upgrade to Pro', 'attitude' ),
				'pro_url'  => 'http://themehorse.com/themes/attitude-pro',
				'priority' => 1,
			)
		)
	);

}

add_action( 'customize_register', 'attitude_customize_custom_sections');
add_action('customize_register', 'attitude_textarea_register');
add_action('customize_register', 'attitude_customize_register');
?>
