<?php
/**
 * Call to action options.
 *
 * @package Creativ Singer
 */

$default = creativ_singer_get_default_theme_options();

// Call to action section
$wp_customize->add_section( 'section_playlist',
	array(
		'title'      => __( 'Featured Music', 'creativ-singer' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Cta Section
$wp_customize->add_setting('theme_options[disable_playlist_section]', 
	array(
	'default' 			=> $default['disable_playlist_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_singer_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_playlist_section]', 
	array(		
	'label' 	=> __('Disable Call to action section', 'creativ-singer'),
	'section' 	=> 'section_playlist',
	'settings'  => 'theme_options[disable_playlist_section]',
	'type' 		=> 'checkbox',	
	)
);

// Section Title
$wp_customize->add_setting('theme_options[playlist_section_title]', 
	array(
	'default'           => $default['playlist_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[playlist_section_title]', 
	array(
	'label'       => __('Section Title', 'creativ-singer'),
	'section'     => 'section_playlist',   
	'settings'    => 'theme_options[playlist_section_title]',	
	'active_callback' => 'creativ_singer_playlist_active',		
	'type'        => 'text'
	)
);

// Background Image
$wp_customize->add_setting('theme_options[background_playlist_section]', 
	array(
	'type'              => 'theme_mod',
	'default' 			=> $default['background_playlist_section'],
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_singer_sanitize_image'
	)
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
	'theme_options[background_playlist_section]', 
	array(
	'label'       => __('Background Image', 'creativ-singer'),
	'section'     => 'section_playlist',   
	'settings'    => 'theme_options[background_playlist_section]',		
	'active_callback' => 'creativ_singer_playlist_active',
	'type'        => 'image',
	)
	)
);

// Album Cover Image
$wp_customize->add_setting('theme_options[album_cover_image_section]', 
	array(
	'type'              => 'theme_mod',
	'default' 			=> $default['album_cover_image_section'],
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_singer_sanitize_image'
	)
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
	'theme_options[album_cover_image_section]', 
	array(
	'label'       => __('Album Cover', 'creativ-singer'),
	'section'     => 'section_playlist',   
	'settings'    => 'theme_options[album_cover_image_section]',		
	'active_callback' => 'creativ_singer_playlist_active',
	'type'        => 'image',
	)
	)
);

// playlist posts drop down chooser control and setting
$wp_customize->add_setting( 'theme_options[playlist_content]', array(
	'sanitize_callback' => 'creativ_singer_sanitize_array_int',
) );

$wp_customize->add_control( new Creativ_Singer_Multiple_Dropdown_Chooser( $wp_customize, 'theme_options[playlist_content]', array(
	'label'             => __( 'Select Multiple Audios', 'creativ-singer' ),
	'description'		=> __( 'Upload audio files from Media', 'creativ-singer' ),
	'section'           => 'section_playlist',
	'choices'			=> creativ_singer_audio_choices(),
	'active_callback'	=> 'creativ_singer_playlist_active',
) ) );