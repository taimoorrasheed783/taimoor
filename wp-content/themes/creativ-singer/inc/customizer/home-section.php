<?php
/**
 * Home Page Options.
 *
 * @package Creativ Singer
 */

$default = creativ_singer_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Homepage Sections', 'creativ-singer' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/home-sections/slider.php';
require get_template_directory() . '/inc/customizer/home-sections/about-us.php';
require get_template_directory() . '/inc/customizer/home-sections/cta.php';
require get_template_directory() . '/inc/customizer/home-sections/latest-albums.php';
require get_template_directory() . '/inc/customizer/home-sections/playlist.php';
require get_template_directory() . '/inc/customizer/home-sections/blog.php';