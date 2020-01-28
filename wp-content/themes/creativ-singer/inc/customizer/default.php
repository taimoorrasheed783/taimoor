<?php
/**
 * Default theme options.
 *
 * @package Creativ Singer
 */

if ( ! function_exists( 'creativ_singer_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function creativ_singer_get_default_theme_options() {

	$defaults = array();

	$defaults['show_header_contact_info'] 		= true;
    $defaults['header_email']             		= __( 'info@creativthemes.com','creativ-singer' );
    $defaults['header_phone' ]            		= __( '8801 234 567 890','creativ-singer' );
    $defaults['header_location' ]           	= __( 'Labartisan 1205 Dhaka','creativ-singer' );
    $defaults['show_header_social_links'] 		= true;
    $defaults['header_social_links']			= array();

    // Homepage Options
	$defaults['enable_frontpage_content'] 		= true;

	// Featured Slider Section
	$defaults['disable_featured_slider']		= true;
	$defaults['number_of_sr_items']				= 3;
	$defaults['featured_slider_speed']			= 1000;
	$defaults['featured_slider_fontsize']		= 62;
	$defaults['sr_content_type']				= 'sr_page';

	// About us Section
	$defaults['disable_about_us_section']		= true;
	$defaults['number_of_ss_items']				= 1;
	$defaults['ss_content_type']				= 'ss_page';

	//Cta Section	
	$defaults['disable_cta_section']	   		= true;
	$defaults['background_cta_section']			= esc_url(get_template_directory_uri()) .'/assets/images/call-to-action.jpg';
	$defaults['cta_description']	   	 		= esc_html__( 'Music is the strongest form of magic.', 'creativ-singer' );
	$defaults['cta_button_label']	   	 		= esc_html__( 'Buy Ticket Now', 'creativ-singer' );
	$defaults['cta_button_url']	   	 			= '#';

	//Latest albums Section	
	$defaults['disable_latest_albums_section']	= true;
	$defaults['latest_albums_section_title']	= esc_html__( 'Popular Albums', 'creativ-singer' );
	$defaults['number_of_cs_column']			= 3;
	$defaults['number_of_cs_items']				= 3;
	$defaults['cs_content_type']				= 'cs_page';

	//Playlist Section	
	$defaults['disable_playlist_section']	   	= true;
	$defaults['background_playlist_section']	= esc_url(get_template_directory_uri()) .'/assets/images/playlist.jpg';
	$defaults['album_cover_image_section']		= esc_url(get_template_directory_uri()) .'/assets/images/album-cover.jpg';
	$defaults['playlist_section_title']			= esc_html__( 'Featured Music', 'creativ-singer' );

	// Blog Section
	$defaults['disable_blog_section']			= true;
	$defaults['blog_section_title']	   	 		= esc_html__( 'Latest News', 'creativ-singer' );
	$defaults['blog_category']	   				= 0; 
	$defaults['blog_number']					= 3;

	//General Section
	$defaults['readmore_text']					= esc_html__('Read More','creativ-singer');
	$defaults['your_latest_posts_title']		= esc_html__('Blog','creativ-singer');
	$defaults['excerpt_length']					= 25;
	$defaults['layout_options_blog']			= 'right-sidebar';
	$defaults['layout_options_archive']			= 'right-sidebar';
	$defaults['layout_options_page']			= 'right-sidebar';	
	$defaults['layout_options_single']			= 'right-sidebar';	

	//Theme color
	$defaults['custom_theme_color'] 			= '#ff0078';

	//Footer section 		
	$defaults['copyright_text']					= esc_html__( 'Copyright &copy; All rights reserved.', 'creativ-singer' );

	// Pass through filter.
	$defaults = apply_filters( 'creativ_singer_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'creativ_singer_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function creativ_singer_get_option( $key ) {

		$default_options = creativ_singer_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;