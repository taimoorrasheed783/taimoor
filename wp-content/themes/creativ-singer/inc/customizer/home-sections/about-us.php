<?php
/**
 * about_us options.
 *
 * @package Creativ Singer
 */

$default = creativ_singer_get_default_theme_options();

// Featured About Us Section
$wp_customize->add_section( 'section_home_about_us',
	array(
		'title'      => __( 'About Us', 'creativ-singer' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable About Us Section
$wp_customize->add_setting('theme_options[disable_about_us_section]', 
	array(
	'default' 			=> $default['disable_about_us_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_singer_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_about_us_section]', 
	array(		
	'label' 	=> __('Disable about_us Section', 'creativ-singer'),
	'section' 	=> 'section_home_about_us',
	'settings'  => 'theme_options[disable_about_us_section]',
	'type' 		=> 'checkbox',	
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_ss_items]', 
	array(
	'default' 			=> $default['number_of_ss_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_singer_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_ss_items]', 
	array(
	'label'       => __('Number Of Items', 'creativ-singer'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3.', 'creativ-singer'),
	'section'     => 'section_home_about_us',   
	'settings'    => 'theme_options[number_of_ss_items]',		
	'type'        => 'number',
	'active_callback' => 'creativ_singer_about_us_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[ss_content_type]', 
	array(
	'default' 			=> $default['ss_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_singer_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[ss_content_type]', 
	array(
	'label'       => __('Content Type', 'creativ-singer'),
	'section'     => 'section_home_about_us',   
	'settings'    => 'theme_options[ss_content_type]',		
	'type'        => 'select',
	'active_callback' => 'creativ_singer_about_us_active',
	'choices'	  => array(
			'ss_page'	  => __('Page','creativ-singer'),
			'ss_post'	  => __('Post','creativ-singer'),
		),
	)
);

$number_of_ss_items = creativ_singer_get_option( 'number_of_ss_items' );

for( $i=1; $i<=$number_of_ss_items; $i++ ){

	// Page
	$wp_customize->add_setting('theme_options[about_us_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_singer_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[about_us_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'creativ-singer'), $i),
		'section'     => 'section_home_about_us',   
		'settings'    => 'theme_options[about_us_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'creativ_singer_about_us_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[about_us_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_singer_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[about_us_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'creativ-singer'), $i),
		'section'     => 'section_home_about_us',   
		'settings'    => 'theme_options[about_us_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => creativ_singer_dropdown_posts(),
		'active_callback' => 'creativ_singer_about_us_post',
		)
	);
}
