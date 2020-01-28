<?php
/**
 * Creativ Singer Theme Customizer
 *
 * @package Creativ Singer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function creativ_singer_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Register custom section types.
	$wp_customize->register_section_type( 'creativ_singer_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new creativ_singer_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Creativ Singer Pro', 'creativ-singer' ),
				'pro_text' => esc_html__( 'Buy Pro', 'creativ-singer' ),
				'pro_url'  => 'http://www.creativthemes.com/downloads/creativ-singer-pro/',
				'priority'  => 10,
			)
		)
	);

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/active-callback.php';

	// Load topbar sections option.
	include get_template_directory() . '/inc/customizer/topbar.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-section.php';

	// Load home page sections option.
	include get_template_directory() . '/inc/customizer/home-section.php';
	
}
add_action( 'customize_register', 'creativ_singer_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function creativ_singer_customize_preview_js() {
	wp_enqueue_script( 'creativ_singer_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'creativ_singer_customize_preview_js' );
/**
 *
 */
function creativ_singer_customize_backend_scripts() {

	wp_enqueue_style( 'creativ-singer-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
	wp_enqueue_script( 'creativ-singer-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-script.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'creativ_singer_customize_backend_scripts', 10 );

if ( ! function_exists( 'creativ_singer_inline_css' ) ) :
	// Add Custom Css
	function creativ_singer_inline_css() {
		
		$custom_theme_color = creativ_singer_get_option( 'custom_theme_color' );
		$custom_theme_color_css = '';
		if ( ( '#ff0078' == $custom_theme_color ) ) {
			$custom_theme_color = '';
		}

		if ( ! empty( $custom_theme_color ) ) {
			$custom_theme_color_css = '

			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.main-navigation ul.nav-menu > li.current-menu-item > a, 
			.main-navigation ul.nav-menu > li.current_page_item > a,
			.pagination .page-numbers.current,
			.pagination .page-numbers:hover,
			.pagination .page-numbers:focus,
			.widget_search form.search-form button.search-submit,
			.jetpack_subscription_widget input[type="submit"]:hover,
			.jetpack_subscription_widget input[type="submit"]:focus,
			#secondary .jetpack_subscription_widget input[type="submit"]:hover,
			#secondary .jetpack_subscription_widget input[type="submit"]:focus,
			.blog-posts .post-categories,
			.reply a,
			.btn,
			.slick-prev,
			.slick-next,
			.slick-dots li.slick-active button:before,
			#additional-info article .icon-container,
			#colophon .widget_search form.search-form button.search-submit,
			.backtotop,
			#gallery .fa:hover,
			#gallery .fa:focus,
			.wp-playlist-tracks .wp-playlist-item.wp-playlist-playing, 
			.wp-playlist-tracks .wp-playlist-item:hover,
			.wp-playlist .mejs-inner .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
			.wp-playlist .mejs-inner .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current:after,
			.wp-playlist .mejs-inner .mejs-controls .mejs-time-rail .mejs-time-current {
			    background-color: '.esc_attr( $custom_theme_color ).';
			}

			button:hover,
			input[type="button"]:hover,
			input[type="reset"]:hover,
			input[type="submit"]:hover,
			button:focus,
			input[type="button"]:focus,
			input[type="reset"]:focus,
			input[type="submit"]:focus,
			button:active,
			input[type="button"]:active,
			input[type="reset"]:active,
			input[type="submit"]:active,
			.logged-in-as a:hover,
			.logged-in-as a:focus,
			a,
			.site-title a:hover,
			.site-title a:focus,
			.main-navigation ul.nav-menu > li:not(.current-menu-item):hover > a,
			.main-navigation ul.nav-menu .current_page_item > a,
			.main-navigation ul.nav-menu .current-menu-item > a,
			.main-navigation ul.nav-menu .current_page_ancestor > a,
			.main-navigation ul.nav-menu .current-menu-ancestor > a,
			.post-navigation a:hover, 
			.posts-navigation a:hover,
			.post-navigation a:focus, 
			.posts-navigation a:focus,
			.pagination .page-numbers,
			.pagination .page-numbers.dots:hover,
			.pagination .page-numbers.dots:focus,
			.pagination .page-numbers.prev,
			.pagination .page-numbers.next,
			#secondary a:hover,
			#secondary a:focus,
			.widget_popular_post h3 a:hover,
			.widget_popular_post h3 a:focus,
			.widget_popular_post a:hover time,
			.widget_popular_post a:focus time,
			.widget_latest_post h3 a:hover,
			.widget_latest_post h3 a:focus,
			.widget_latest_post a:hover time,
			.widget_latest_post a:focus time,
			.page-header small,
			.post-categories a,
			.post-categories a:hover,
			.post-categories a:focus,
			.tags-links a,
			.reply a:hover,
			.reply a:focus,
			.comment-meta .url:hover,
			.comment-meta .url:focus,
			.comment-metadata a:hover,
			.comment-metadata a:focus,
			.comment-metadata a:hover time,
			.comment-metadata a:focus time,
			.btn:hover,
			.btn:focus,
			.featured-content-wrapper .entry-title a:hover,
			.featured-content-wrapper .entry-title a:focus,
			#latest-albums article .entry-title a:hover,
			#latest-albums article .entry-title a:focus,
			#services .section-title a:hover,
			#services .section-title a:focus,
			#additional-info .entry-title,
			#additional-info article .entry-title a:hover,
			#additional-info article .entry-title a:focus,
			#testimonial .featured-image .entry-title a:hover,
			#testimonial .featured-image .entry-title a:focus,
			.post-item .entry-meta a:hover, 
			.post-item .entry-meta a:focus, 
			.cat-links:hover:before,
			.author.vcard:hover:before,
			.post-item .entry-title a:hover,
			.post-item .entry-title a:focus,
			.blog-posts-wrapper .entry-meta .date a:hover:before,
			.blog-posts-wrapper .entry-meta .date a:focus:before,
			.entry-meta a:hover,
			.entry-meta a:focus,
			.entry-meta a:hover:before,
			.entry-meta a:focus:before,
			#colophon a:hover,
			#colophon a:focus,
			#colophon li:hover:before,
			#secondary li:hover:before,
			#colophon .site-info a,
			#colophon .widget_recent_comments li a:hover,
			#colophon .widget_recent_comments li a:focus,
			#team .entry-title a:hover, 
			#team .entry-title a:focus,
			#gallery article .entry-title a:hover, 
			#gallery article .entry-title a:focus,
			.wp-playlist .mejs-button.mejs-volume-button.mejs-mute>button:before, 
			.wp-playlist .mejs-button.mejs-volume-button.mejs-unmute>button:before, 
			.wp-playlist .mejs-button.mejs-playpause-button.mejs-play>button:before, 
			.wp-playlist .mejs-button.mejs-playpause-button.mejs-pause>button:before, 
			.wp-playlist .wp-playlist-prev:before, .wp-playlist .wp-playlist-next:before,
			#top-bar .widget_address_block ul li a:hover,
			#top-bar .widget_address_block ul li a:focus,
			.main-navigation ul.nav-menu > li > a:hover,
			.main-navigation ul.nav-menu > li > a:focus {
			    color: '.esc_attr( $custom_theme_color ).';
			}

			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.widget_search form.search-form input[type="search"]:focus,
			.tags-links a {
			    border-color: '.esc_attr( $custom_theme_color ).';
			}

			@media screen and (min-width: 1024px) {
				.main-navigation ul ul li:hover > a {
			        background-color: '.esc_attr( $custom_theme_color ).';
			        color: #fff;
			    }
			}';
		}

		$css = $custom_theme_color_css;	
		wp_add_inline_style( 'creativ-singer-style', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'creativ_singer_inline_css', 10 );