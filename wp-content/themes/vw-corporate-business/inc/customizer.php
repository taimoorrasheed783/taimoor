<?php
/**
 * VW Corporate Business Theme Customizer
 *
 * @package VW Corporate Business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_corporate_business_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_corporate_business_custom_controls' );

function vw_corporate_business_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_corporate_business_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-corporate-business' ),
	    'description' => __( 'Description of what this panel does.', 'vw-corporate-business' ),
	) );

	$wp_customize->add_section( 'vw_corporate_business_left_right', array(
    	'title'      => __( 'General Settings', 'vw-corporate-business' ),
		'priority'   => 30,
		'panel' => 'vw_corporate_business_panel_id'
	) );

	$wp_customize->add_setting('vw_corporate_business_width_option',array(
        'default' => __('Full Width','vw-corporate-business'),
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Corporate_Business_Image_Radio_Control($wp_customize, 'vw_corporate_business_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-corporate-business'),
        'description' => __('Here you can change the width layout of Website.','vw-corporate-business'),
        'section' => 'vw_corporate_business_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_corporate_business_theme_options',array(
        'default' => __('Right Sidebar','vw-corporate-business'),
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_corporate_business_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-corporate-business'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-corporate-business'),
        'section' => 'vw_corporate_business_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-corporate-business'),
            'Right Sidebar' => __('Right Sidebar','vw-corporate-business'),
            'One Column' => __('One Column','vw-corporate-business'),
            'Three Columns' => __('Three Columns','vw-corporate-business'),
            'Four Columns' => __('Four Columns','vw-corporate-business'),
            'Grid Layout' => __('Grid Layout','vw-corporate-business')
        ),
	));

	$wp_customize->add_setting('vw_corporate_business_page_layout',array(
        'default' => __('One Column','vw-corporate-business'),
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control('vw_corporate_business_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-corporate-business'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-corporate-business'),
        'section' => 'vw_corporate_business_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-corporate-business'),
            'Right Sidebar' => __('Right Sidebar','vw-corporate-business'),
            'One Column' => __('One Column','vw-corporate-business')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_corporate_business_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-corporate-business' ),
		'section' => 'vw_corporate_business_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_corporate_business_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-corporate-business' ),
		'section' => 'vw_corporate_business_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_corporate_business_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-corporate-business' ),
        'section' => 'vw_corporate_business_left_right'
    )));

	$wp_customize->add_setting('vw_corporate_business_loader_icon',array(
        'default' => __('Two Way','vw-corporate-business'),
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control('vw_corporate_business_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-corporate-business'),
        'section' => 'vw_corporate_business_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-corporate-business'),
            'Dots' => __('Dots','vw-corporate-business'),
            'Rotate' => __('Rotate','vw-corporate-business')
        ),
	) );
    
	//Topbar section
	$wp_customize->add_section('vw_corporate_business_topbar',array(
		'title'	=> __('Topbar Section','vw-corporate-business'),
		'description'	=> __('Add TopBar Content here','vw-corporate-business'),
		'priority'	=> null,
		'panel' => 'vw_corporate_business_panel_id',
	));

	$wp_customize->add_setting( 'vw_corporate_business_topbar_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_topbar_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Topbar','vw-corporate-business' ),
          'section' => 'vw_corporate_business_topbar'
    )));

    //Sticky Header
	$wp_customize->add_setting( 'vw_corporate_business_sticky_header',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-corporate-business' ),
        'section' => 'vw_corporate_business_topbar'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_search_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_search_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Search','vw-corporate-business' ),
          'section' => 'vw_corporate_business_topbar'
    )));

	$wp_customize->add_setting('vw_corporate_business_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_corporate_business_location',array(
		'label'	=> __('Add Location Address','vw-corporate-business'),
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_location',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_corporate_business_call',array(
		'label'	=> __('Add Call Number','vw-corporate-business'),
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_call',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_corporate_business_email',array(
		'label'	=> __('Add Email Address','vw-corporate-business'),
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_corporate_business_started_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_corporate_business_started_text',array(
		'label'	=> __('Add Get Started Text','vw-corporate-business'),
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_started_text',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('vw_corporate_business_started_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_corporate_business_started_link',array(
		'label'	=> __('Add Get Started Link','vw-corporate-business'),
		'section'	=> 'vw_corporate_business_topbar',
		'setting'	=> 'vw_corporate_business_started_link',
		'type'		=> 'text'
	));	

	//Slider
	$wp_customize->add_section( 'vw_corporate_business_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-corporate-business' ),
		'priority'   => null,
		'panel' => 'vw_corporate_business_panel_id'
	) );

	$wp_customize->add_setting( 'vw_corporate_business_slider_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_slider_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Slider','vw-corporate-business' ),
          'section' => 'vw_corporate_business_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_corporate_business_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_corporate_business_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_corporate_business_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-corporate-business' ),
			'description' => __('Slider image size (1500 x 765)','vw-corporate-business'),
			'section'  => 'vw_corporate_business_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('vw_corporate_business_slider_content_option',array(
        'default' => __('Center','vw-corporate-business'),
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Corporate_Business_Image_Radio_Control($wp_customize, 'vw_corporate_business_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-corporate-business'),
        'section' => 'vw_corporate_business_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_corporate_business_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_corporate_business_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-corporate-business' ),
		'section'     => 'vw_corporate_business_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_corporate_business_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_corporate_business_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_corporate_business_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-corporate-business' ),
	'section'     => 'vw_corporate_business_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_corporate_business_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-corporate-business'),
      '0.1' =>  esc_attr('0.1','vw-corporate-business'),
      '0.2' =>  esc_attr('0.2','vw-corporate-business'),
      '0.3' =>  esc_attr('0.3','vw-corporate-business'),
      '0.4' =>  esc_attr('0.4','vw-corporate-business'),
      '0.5' =>  esc_attr('0.5','vw-corporate-business'),
      '0.6' =>  esc_attr('0.6','vw-corporate-business'),
      '0.7' =>  esc_attr('0.7','vw-corporate-business'),
      '0.8' =>  esc_attr('0.8','vw-corporate-business'),
      '0.9' =>  esc_attr('0.9','vw-corporate-business')
	),
	));

	// About Us
	$wp_customize->add_section('vw_corporate_business_about_section',array(
		'title'	=> __('About Section','vw-corporate-business'),
		'description'	=> __('Add About sections below.','vw-corporate-business'),
		'panel' => 'vw_corporate_business_panel_id',
	));
	
	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_corporate_business_about_post',array(
		'sanitize_callback' => 'vw_corporate_business_sanitize_choices',
	));
	$wp_customize->add_control('vw_corporate_business_about_post',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','vw-corporate-business'),
		'description'	=> __('Size of image should be 1280 x 853','vw-corporate-business'),
		'section' => 'vw_corporate_business_about_section',
	));

	//About excerpt
	$wp_customize->add_setting( 'vw_corporate_business_about_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_corporate_business_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','vw-corporate-business' ),
		'section'     => 'vw_corporate_business_about_section',
		'type'        => 'range',
		'settings'    => 'vw_corporate_business_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_section('vw_corporate_business_blog_post',array(
		'title'	=> __('Blog Post Settings','vw-corporate-business'),
		'panel' => 'vw_corporate_business_panel_id',
	));	

	$wp_customize->add_setting( 'vw_corporate_business_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-corporate-business' ),
        'section' => 'vw_corporate_business_blog_post'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_toggle_author',array(
		'label' => esc_html__( 'Author','vw-corporate-business' ),
		'section' => 'vw_corporate_business_blog_post'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-corporate-business' ),
		'section' => 'vw_corporate_business_blog_post'
    )));

    $wp_customize->add_setting( 'vw_corporate_business_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_corporate_business_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-corporate-business' ),
		'section'     => 'vw_corporate_business_blog_post',
		'type'        => 'range',
		'settings'    => 'vw_corporate_business_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_corporate_business_blog_layout_option',array(
        'default' => __('Default','vw-corporate-business'),
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Corporate_Business_Image_Radio_Control($wp_customize, 'vw_corporate_business_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-corporate-business'),
        'section' => 'vw_corporate_business_blog_post',
        'choices' => array(
            'Default' => get_template_directory_uri().'/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/images/blog-layout3.png',
    ))));

	//Content Creation
	$wp_customize->add_section( 'vw_corporate_business_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'vw-corporate-business' ),
		'priority' => null,
		'panel' => 'vw_corporate_business_panel_id'
	) );

	$wp_customize->add_setting('vw_corporate_business_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Corporate_Business_Content_Creation( $wp_customize, 'vw_corporate_business_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-corporate-business' ),
		),
		'section' => 'vw_corporate_business_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-corporate-business' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_corporate_business_footer',array(
		'title'	=> __('Footer','vw-corporate-business'),
		'description'=> __('This section will appear in the footer','vw-corporate-business'),
		'panel' => 'vw_corporate_business_panel_id',
	));	
	
	$wp_customize->add_setting('vw_corporate_business_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_corporate_business_footer_text',array(
		'label'	=> __('Copyright Text','vw-corporate-business'),
		'section'=> 'vw_corporate_business_footer',
		'setting'=> 'vw_corporate_business_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'vw_corporate_business_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_corporate_business_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Corporate_Business_Toggle_Switch_Custom_Control( $wp_customize, 'vw_corporate_business_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-corporate-business' ),
      	'section' => 'vw_corporate_business_footer'
    )));

	$wp_customize->add_setting('vw_corporate_business_scroll_top_alignment',array(
        'default' => __('Right','vw-corporate-business'),
        'sanitize_callback' => 'vw_corporate_business_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Corporate_Business_Image_Radio_Control($wp_customize, 'vw_corporate_business_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-corporate-business'),
        'section' => 'vw_corporate_business_footer',
        'settings' => 'vw_corporate_business_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/layout1.png',
            'Center' => get_template_directory_uri().'/images/layout2.png',
            'Right' => get_template_directory_uri().'/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'vw_corporate_business_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Corporate_Business_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Corporate_Business_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Corporate_Business_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Business Pro Theme', 'vw-corporate-business' ),
			'pro_text' => esc_html__( 'Upgrade Pro', 'vw-corporate-business' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-themes-for-business/'),
		)));

		$manager->add_section(new VW_Corporate_Business_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-corporate-business' ),
			'pro_text' => esc_html__( 'Docs', 'vw-corporate-business' ),
			'pro_url'  => admin_url('themes.php?page=vw_corporate_business_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-corporate-business-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-corporate-business-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Corporate_Business_Customize::get_instance();