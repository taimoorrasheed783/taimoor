<?php
/**
 * latest_albums options.
 *
 * @package Creativ Singer
 */

$default = creativ_singer_get_default_theme_options();

// Featured latest_albums Section
$wp_customize->add_section( 'section_home_latest_albums',
	array(
		'title'      => __( 'Popular Albums', 'creativ-singer' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable latest_albums Section
$wp_customize->add_setting('theme_options[disable_latest_albums_section]', 
	array(
	'default' 			=> $default['disable_latest_albums_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'creativ_singer_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_latest_albums_section]', 
	array(		
	'label' 	=> __('Disable latest_albums Section', 'creativ-singer'),
	'section' 	=> 'section_home_latest_albums',
	'settings'  => 'theme_options[disable_latest_albums_section]',
	'type' 		=> 'checkbox',	
	)
);

// Section Title
$wp_customize->add_setting('theme_options[latest_albums_section_title]', 
	array(
	'default'           => $default['latest_albums_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_albums_section_title]', 
	array(
	'label'       => __('Section Title', 'creativ-singer'),
	'section'     => 'section_home_latest_albums',   
	'settings'    => 'theme_options[latest_albums_section_title]',	
	'active_callback' => 'creativ_singer_latest_albums_active',		
	'type'        => 'text'
	)
);

// Number of Items
$wp_customize->add_setting('theme_options[number_of_cs_column]', 
	array(
	'default' 			=> $default['number_of_cs_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_singer_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_cs_column]', 
	array(
	'label'       => __('Column Per Row', 'creativ-singer'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3', 'creativ-singer'),
	'section'     => 'section_home_latest_albums',   
	'settings'    => 'theme_options[number_of_cs_column]',		
	'type'        => 'number',
	'active_callback' => 'creativ_singer_latest_albums_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);
// Number of items
$wp_customize->add_setting('theme_options[number_of_cs_items]', 
	array(
	'default' 			=> $default['number_of_cs_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_singer_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_cs_items]', 
	array(
	'label'       => __('Number Of Items', 'creativ-singer'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 6.', 'creativ-singer'),
	'section'     => 'section_home_latest_albums',   
	'settings'    => 'theme_options[number_of_cs_items]',		
	'type'        => 'number',
	'active_callback' => 'creativ_singer_latest_albums_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[cs_content_type]', 
	array(
	'default' 			=> $default['cs_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'creativ_singer_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[cs_content_type]', 
	array(
	'label'       => __('Content Type', 'creativ-singer'),
	'section'     => 'section_home_latest_albums',   
	'settings'    => 'theme_options[cs_content_type]',		
	'type'        => 'select',
	'active_callback' => 'creativ_singer_latest_albums_active',
	'choices'	  => array(
			'cs_page'	  => __('Page','creativ-singer'),
			'cs_post'	  => __('Post','creativ-singer'),
		),
	)
);

$number_of_cs_items = creativ_singer_get_option( 'number_of_cs_items' );

for( $i=1; $i<=$number_of_cs_items; $i++ ){

	// latest_albums First Page
	$wp_customize->add_setting('theme_options[latest_albums_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_singer_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[latest_albums_page_'.$i.']', 
		array(
		'label'       => __('Select Page', 'creativ-singer'),
		'section'     => 'section_home_latest_albums',   
		'settings'    => 'theme_options[latest_albums_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'creativ_singer_latest_albums_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[latest_albums_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'creativ_singer_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[latest_albums_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'creativ-singer'), $i),
		'section'     => 'section_home_latest_albums',   
		'settings'    => 'theme_options[latest_albums_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => creativ_singer_dropdown_posts(),
		'active_callback' => 'creativ_singer_latest_albums_post',
		)
	);
}