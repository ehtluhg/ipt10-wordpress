<?php
/**
 * VW School Education Theme Customizer
 *
 * @package VW School Education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_school_education_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_school_education_custom_controls' );

function vw_school_education_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'blogname', array( 
        'selector' => '.logo .site-title a', 
        'render_callback' => 'vw_school_education_customize_partial_blogname', 
    )); 

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
        'selector' => 'p.site-description', 
        'render_callback' => 'vw_school_education_customize_partial_blogdescription', 
    ));

    //add home page setting pannel
	$VWSchoolEducationParentPanel = new VW_School_Education_WP_Customize_Panel( $wp_customize, 'vw_school_education_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-school-education' ),
		'priority' => 10,
	));

	$wp_customize->add_panel( $VWSchoolEducationParentPanel );

	$HomePageParentPanel = new VW_School_Education_WP_Customize_Panel( $wp_customize, 'vw_school_education_homepage_panel', array(
		'title' => __( 'Homepage Settings', 'vw-school-education' ),
		'panel' => 'vw_school_education_panel_id',
	));

	$wp_customize->add_panel( $HomePageParentPanel );

	//Topbar section
	$wp_customize->add_section('vw_school_education_topbar',array(
		'title'	=> __('Topbar Section','vw-school-education'),
		'description'	=> __('Add TopBar Content here','vw-school-education'),
		'priority'	=> null,
		'panel' => 'vw_school_education_homepage_panel',
	));

	//Sticky Header
	$wp_customize->add_setting( 'vw_school_education_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-school-education' ),
        'section' => 'vw_school_education_topbar'
    )));

    $wp_customize->add_setting('vw_school_education_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_navigation_menu_font_weight',array(
        'default' => 'Default',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control('vw_school_education_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-school-education'),
        'section' => 'vw_school_education_topbar',
        'choices' => array(
        	'Default' => __('Default','vw-school-education'),
            'Normal' => __('Normal','vw-school-education')
        ),
	) );

	$wp_customize->add_setting('vw_school_education_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_school_education_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-school-education'),
		'section'  => 'vw_school_education_topbar',
	)));

	$wp_customize->add_setting('vw_school_education_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_school_education_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-school-education'),
		'section'  => 'vw_school_education_topbar',
	)));

	$wp_customize->add_setting('vw_school_education_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_school_education_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-school-education'),
		'section'  => 'vw_school_education_topbar',
	)));

	$wp_customize->add_setting('vw_school_education_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_school_education_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-school-education'),
		'section'  => 'vw_school_education_topbar',
	)));

    $wp_customize->add_setting( 'vw_school_education_search_hide_show',
       array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_search_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Search','vw-school-education' ),
      'section' => 'vw_school_education_topbar'
    )));

    $wp_customize->add_setting('vw_school_education_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_School_Education_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_school_education_search_icon',array(
		'label'	=> __('Add Search Icon','vw-school-education'),
		'transport' => 'refresh',
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_school_education_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_School_Education_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_school_education_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-school-education'),
		'transport' => 'refresh',
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_school_education_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_search_font_size',array(
		'label'	=> __('Search Font Size','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_school_education_search_border_radius', array(
		'default'              => "",
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-school-education' ),
		'section'     => 'vw_school_education_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_school_education_location_text', array( 
        'selector' => '#top-bar p.email', 
        'render_callback' => 'vw_school_education_customize_partial_vw_school_education_location_text', 
    ));

    $wp_customize->add_setting('vw_school_education_location_address_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_School_Education_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_school_education_location_address_icon',array(
		'label'	=> __('Add Location Icon','vw-school-education'),
		'transport' => 'refresh',
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_location_address_icon',
		'type'		=> 'icon'
	)));
	
	$wp_customize->add_setting('vw_school_education_location_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_location_text',array(
		'label'	=> __('Add Location Text','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_location_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_address',array(
		'label'	=> __('Add Location','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_contact_icon',array(
		'default'	=> 'fas fa-mobile-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_School_Education_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_school_education_contact_icon',array(
		'label'	=> __('Add Contact Icon','vw-school-education'),
		'transport' => 'refresh',
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_contact_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_school_education_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'vw_school_education_sanitize_phone_number'
	));	
	$wp_customize->add_control('vw_school_education_contact',array(
		'label'	=> __('Add Contact Details','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_contact',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('vw_school_education_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('vw_school_education_email',array(
		'label'	=> __('Add Email Address','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_timing_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_School_Education_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_school_education_timing_icon',array(
		'label'	=> __('Add Timing Icon','vw-school-education'),
		'transport' => 'refresh',
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_timing_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_school_education_day',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_day',array(
		'label'	=> __('Add Day','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_day',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_time',array(
		'label'	=> __('Add Time','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_time',
		'type'		=> 'text'
	));

	//Social links
	$wp_customize->add_section(
		'vw_school_education_social_links', array(
			'title'		=>	__('Social Links', 'vw-school-education'),
			'priority'	=>	null,
			'panel'		=>	'vw_school_education_homepage_panel'
		));

	$wp_customize->add_setting('vw_school_education_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_social_icons',array(
		'label' =>  __('Steps to setup social icons','vw-school-education'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Social Icon Widget area.</p>
			<p>3. Add social icons url and save.</p>','vw-school-education'),
		'section'=> 'vw_school_education_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('vw_school_education_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'vw_school_education_social_links',
		'type'=> 'hidden'
	));

	//Slider
	$wp_customize->add_section( 'vw_school_education_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-school-education' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/premium-school-wordpress-theme/">GO PRO</a>','vw-school-education'),
		'priority'   => null,
		'panel' => 'vw_school_education_homepage_panel'
	) );

	$wp_customize->add_setting( 'vw_school_education_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_slider_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Slider','vw-school-education' ),
      'section' => 'vw_school_education_slidersettings'
    )));

    $wp_customize->add_setting('vw_school_education_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	) );
	$wp_customize->add_control('vw_school_education_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vw-school-education'),
        'section' => 'vw_school_education_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vw-school-education'),
            'Advance slider' => __('Advance slider','vw-school-education'),
        ),
	));

	$wp_customize->add_setting('vw_school_education_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-school-education'),
		'section'=> 'vw_school_education_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_school_education_advance_slider'
	));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_school_education_slider_hide_show',array(
        'selector'        => '#slider .inner_carousel h1',
        'render_callback' => 'vw_school_education_customize_partial_vw_school_education_slider_hide_show',
    ));

	for ( $count = 1; $count <= 3; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_school_education_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control( 'vw_school_education_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-school-education' ),
			'description' => __('Slider image size (1500 x 765)','vw-school-education'),
			'section'  => 'vw_school_education_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'vw_school_education_default_slider'
		) );
	}

	$wp_customize->add_setting('vw_school_education_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_school_education_default_slider'
	));

	//content layout
	$wp_customize->add_setting('vw_school_education_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control(new VW_School_Education_Image_Radio_Control($wp_customize, 'vw_school_education_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-school-education'),
        'section' => 'vw_school_education_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/slider-content3.png',
    ),'active_callback' => 'vw_school_education_default_slider'
    )));

    //Slider content padding
    $wp_customize->add_setting('vw_school_education_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-school-education'),
		'description'	=> __('Enter a value in %. Example:20%','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_school_education_default_slider'
	));

	$wp_customize->add_setting('vw_school_education_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-school-education'),
		'description'	=> __('Enter a value in %. Example:20%','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_school_education_default_slider'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_school_education_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-school-education' ),
		'section'     => 'vw_school_education_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_school_education_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'vw_school_education_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('vw_school_education_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_school_education_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-school-education' ),
	'section'     => 'vw_school_education_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_school_education_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-school-education'),
      '0.1' =>  esc_attr('0.1','vw-school-education'),
      '0.2' =>  esc_attr('0.2','vw-school-education'),
      '0.3' =>  esc_attr('0.3','vw-school-education'),
      '0.4' =>  esc_attr('0.4','vw-school-education'),
      '0.5' =>  esc_attr('0.5','vw-school-education'),
      '0.6' =>  esc_attr('0.6','vw-school-education'),
      '0.7' =>  esc_attr('0.7','vw-school-education'),
      '0.8' =>  esc_attr('0.8','vw-school-education'),
      '0.9' =>  esc_attr('0.9','vw-school-education')
	),'active_callback' => 'vw_school_education_default_slider'
	));

	//Slider height
	$wp_customize->add_setting('vw_school_education_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_slider_height',array(
		'label'	=> __('Slider Height','vw-school-education'),
		'description'	=> __('Specify the slider height (px).','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_school_education_default_slider'
	));

	$wp_customize->add_setting( 'vw_school_education_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_school_education_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_school_education_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-school-education'),
		'section' => 'vw_school_education_slidersettings',
		'type'  => 'number',
		'active_callback' => 'vw_school_education_default_slider'
	) );

	//Welcome Section
	$wp_customize->add_section('vw_school_education_welcome_section',array(
		'title'	=> __('Welcome Section','vw-school-education'),
		'description' => __('For more options of welcome section <br/><a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/premium-school-wordpress-theme/">GO PRO</a>','vw-school-education'),
		'panel' => 'vw_school_education_homepage_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'vw_school_education_welcome_post', array( 
        'selector' => '#welcome-sec h2', 
        'render_callback' => 'vw_school_education_customize_partial_vw_school_education_welcome_post',
    ));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$posts[]='Select';	
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_school_education_welcome_post',array(
		'sanitize_callback' => 'vw_school_education_sanitize_choices',
	));
	$wp_customize->add_control('vw_school_education_welcome_post',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-school-education'),
		'section' => 'vw_school_education_welcome_section',
	));

	//Welcome excerpt
	$wp_customize->add_setting( 'vw_school_education_welcome_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_welcome_excerpt_number', array(
		'label'       => esc_html__( 'Welcome Excerpt Length','vw-school-education' ),
		'section'     => 'vw_school_education_welcome_section',
		'type'        => 'range',
		'settings'    => 'vw_school_education_welcome_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_school_education_welcome_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_welcome_button_text',array(
		'label'	=> __('Add Welcome Button Text','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( 'LEARN MORE', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_welcome_section',
		'type'=> 'text'
	));

	//Courses Section
	$wp_customize->add_section('vw_school_education_courses', array(
		'title'       => __('Courses Section', 'vw-school-education'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-school-education'),
		'priority'    => null,
		'panel'       => 'vw_school_education_homepage_panel',
	));

	$wp_customize->add_setting('vw_school_education_courses_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_courses_text',array(
		'description' => __('<p>1. More options for courses section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for courses section.</p>','vw-school-education'),
		'section'=> 'vw_school_education_courses',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_school_education_courses_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_courses_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_school_education_guide') ." '>More Info</a>",
		'section'=> 'vw_school_education_courses',
		'type'=> 'hidden'
	));

	//video Section
	$wp_customize->add_section('vw_school_education_video', array(
		'title'       => __('Video Section', 'vw-school-education'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-school-education'),
		'priority'    => null,
		'panel'       => 'vw_school_education_homepage_panel',
	));

	$wp_customize->add_setting('vw_school_education_video_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_video_text',array(
		'description' => __('<p>1. More options for video section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for video section.</p>','vw-school-education'),
		'section'=> 'vw_school_education_video',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_school_education_video_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_video_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_school_education_guide') ." '>More Info</a>",
		'section'=> 'vw_school_education_video',
		'type'=> 'hidden'
	));

	//events Section
	$wp_customize->add_section('vw_school_education_events', array(
		'title'       => __('Events Section', 'vw-school-education'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-school-education'),
		'priority'    => null,
		'panel'       => 'vw_school_education_homepage_panel',
	));

	$wp_customize->add_setting('vw_school_education_events_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_events_text',array(
		'description' => __('<p>1. More options for events section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for events section.</p>','vw-school-education'),
		'section'=> 'vw_school_education_events',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_school_education_events_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_events_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_school_education_guide') ." '>More Info</a>",
		'section'=> 'vw_school_education_events',
		'type'=> 'hidden'
	));

	//school gallery Section
	$wp_customize->add_section('vw_school_education_school_gallery', array(
		'title'       => __('School Gallery Section', 'vw-school-education'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-school-education'),
		'priority'    => null,
		'panel'       => 'vw_school_education_homepage_panel',
	));

	$wp_customize->add_setting('vw_school_education_school_gallery_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_school_gallery_text',array(
		'description' => __('<p>1. More options for school gallery section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for school gallery section.</p>','vw-school-education'),
		'section'=> 'vw_school_education_school_gallery',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_school_education_school_gallery_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_school_gallery_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_school_education_guide') ." '>More Info</a>",
		'section'=> 'vw_school_education_school_gallery',
		'type'=> 'hidden'
	));

	//team Section
	$wp_customize->add_section('vw_school_education_team', array(
		'title'       => __('Team Section', 'vw-school-education'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-school-education'),
		'priority'    => null,
		'panel'       => 'vw_school_education_homepage_panel',
	));

	$wp_customize->add_setting('vw_school_education_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_team_text',array(
		'description' => __('<p>1. More options for team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for team section.</p>','vw-school-education'),
		'section'=> 'vw_school_education_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_school_education_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_school_education_guide') ." '>More Info</a>",
		'section'=> 'vw_school_education_team',
		'type'=> 'hidden'
	));

	//testimonials Section
	$wp_customize->add_section('vw_school_education_testimonials', array(
		'title'       => __('Testimonials Section', 'vw-school-education'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-school-education'),
		'priority'    => null,
		'panel'       => 'vw_school_education_homepage_panel',
	));

	$wp_customize->add_setting('vw_school_education_testimonials_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_testimonials_text',array(
		'description' => __('<p>1. More options for testimonials section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonials section.</p>','vw-school-education'),
		'section'=> 'vw_school_education_testimonials',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_school_education_testimonials_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_testimonials_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_school_education_guide') ." '>More Info</a>",
		'section'=> 'vw_school_education_testimonials',
		'type'=> 'hidden'
	));

	//latest post Section
	$wp_customize->add_section('vw_school_education_latest_post', array(
		'title'       => __('Latest Post Section', 'vw-school-education'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-school-education'),
		'priority'    => null,
		'panel'       => 'vw_school_education_homepage_panel',
	));

	$wp_customize->add_setting('vw_school_education_latest_post_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_latest_post_text',array(
		'description' => __('<p>1. More options for latest post section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest post section.</p>','vw-school-education'),
		'section'=> 'vw_school_education_latest_post',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_school_education_latest_post_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_latest_post_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_school_education_guide') ." '>More Info</a>",
		'section'=> 'vw_school_education_latest_post',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_school_education_footer',array(
		'title'	=> __('Footer','vw-school-education'),
		'description' => __('For more options of footer section <br/><a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/premium-school-wordpress-theme/">GO PRO</a>','vw-school-education'),
		'panel' => 'vw_school_education_homepage_panel',
	));	

	$wp_customize->add_setting('vw_school_education_footer_background_color', array(
		'default'           => '#002b46',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_school_education_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-school-education'),
		'section'  => 'vw_school_education_footer',
	)));

	// footer padding
	$wp_customize->add_setting('vw_school_education_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-school-education' ),
    ),
		'section'=> 'vw_school_education_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control('vw_school_education_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-school-education'),
        'section' => 'vw_school_education_footer',
        'choices' => array(
        	'Left' => __('Left','vw-school-education'),
            'Center' => __('Center','vw-school-education'),
            'Right' => __('Right','vw-school-education')
        ),
	) );

	$wp_customize->add_setting('vw_school_education_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control('vw_school_education_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-school-education'),
        'section' => 'vw_school_education_footer',
        'choices' => array(
        	'Left' => __('Left','vw-school-education'),
            'Center' => __('Center','vw-school-education'),
            'Right' => __('Right','vw-school-education')
        ),
	) );

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_school_education_footer_text', array( 
        'selector' => '.copyright p', 
        'render_callback' => 'vw_school_education_customize_partial_vw_school_education_footer_text', 
    ));
	
	$wp_customize->add_setting('vw_school_education_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_footer_text',array(
		'label'	=> __('Copyright Text','vw-school-education'),
		'section'=> 'vw_school_education_footer',
		'setting'=> 'vw_school_education_footer_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control(new VW_School_Education_Image_Radio_Control($wp_customize, 'vw_school_education_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-school-education'),
        'section' => 'vw_school_education_footer',
        'settings' => 'vw_school_education_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_school_education_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_school_education_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-school-education' ),
      	'section' => 'vw_school_education_footer'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_school_education_scroll_to_top_icon', array( 
        'selector' => '.scrollup i', 
        'render_callback' => 'vw_school_education_customize_partial_vw_school_education_scroll_to_top_icon', 
    ));

    $wp_customize->add_setting('vw_school_education_scroll_to_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_School_Education_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_school_education_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-school-education'),
		'transport' => 'refresh',
		'section'	=> 'vw_school_education_footer',
		'setting'	=> 'vw_school_education_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_school_education_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-school-education'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_school_education_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-school-education' ),
		'section'     => 'vw_school_education_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );


	$wp_customize->add_setting('vw_school_education_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control(new VW_School_Education_Image_Radio_Control($wp_customize, 'vw_school_education_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-school-education'),
        'section' => 'vw_school_education_footer',
        'settings' => 'vw_school_education_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/layout3.png'
    ))));	

	//Blog Post
	$wp_customize->add_panel( $VWSchoolEducationParentPanel );

	$BlogPostParentPanel = new VW_School_Education_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-school-education' ),
		'panel' => 'vw_school_education_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_school_education_post_settings', array(
		'title' => __( 'Post Settings', 'vw-school-education' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_school_education_toggle_postdate', array( 
        'selector' => '.post-main-box h2 a', 
        'render_callback' => 'vw_school_education_customize_partial_vw_school_education_toggle_postdate', 
    ));

	$wp_customize->add_setting( 'vw_school_education_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-school-education' ),
        'section' => 'vw_school_education_post_settings'
    )));

    $wp_customize->add_setting( 'vw_school_education_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_toggle_author',array(
		'label' => esc_html__( 'Author','vw-school-education' ),
		'section' => 'vw_school_education_post_settings'
    )));

    $wp_customize->add_setting( 'vw_school_education_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-school-education' ),
		'section' => 'vw_school_education_post_settings'
    )));

    $wp_customize->add_setting( 'vw_school_education_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_toggle_time',array(
		'label' => esc_html__( 'Time','vw-school-education' ),
		'section' => 'vw_school_education_post_settings'
    )));

    $wp_customize->add_setting( 'vw_school_education_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
	));
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-school-education' ),
		'section' => 'vw_school_education_post_settings'
    )));

    $wp_customize->add_setting( 'vw_school_education_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-school-education' ),
		'section'     => 'vw_school_education_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_school_education_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-school-education' ),
		'section'     => 'vw_school_education_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'vw_school_education_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-school-education' ),
		'section'     => 'vw_school_education_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_school_education_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_school_education_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-school-education'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-school-education'),
		'section'=> 'vw_school_education_post_settings',
		'type'=> 'text'
	));

	//Blog layout
    $wp_customize->add_setting('vw_school_education_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_School_Education_Image_Radio_Control($wp_customize, 'vw_school_education_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-school-education'),
        'section' => 'vw_school_education_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_school_education_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
    ));
    $wp_customize->add_control('vw_school_education_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-school-education'),
        'section' => 'vw_school_education_post_settings',
        'choices' => array(
            'Content' => __('Content','vw-school-education'),
            'Excerpt' => __('Excerpt','vw-school-education'),
            'No Content' => __('No Content','vw-school-education')
        ),
    ) );

    $wp_customize->add_setting('vw_school_education_excerpt_suffix',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_school_education_excerpt_suffix',array(
        'label' => __('Add Excerpt Suffix','vw-school-education'),
        'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-school-education' ),
        ),
        'section'=> 'vw_school_education_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'vw_school_education_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-school-education' ),
      'section' => 'vw_school_education_post_settings'
    )));

	$wp_customize->add_setting( 'vw_school_education_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_school_education_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_school_education_blog_pagination_type', array(
        'section' => 'vw_school_education_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-school-education' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-school-education' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-school-education' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_school_education_button_settings', array(
		'title' => __( 'Button Settings', 'vw-school-education' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_school_education_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_school_education_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-school-education' ),
		'section'     => 'vw_school_education_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_school_education_button_text', array( 
        'selector' => '.post-main-box .content-bttn a', 
        'render_callback' => 'vw_school_education_customize_partial_vw_school_education_button_text', 
    ));

    $wp_customize->add_setting('vw_school_education_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_button_text',array(
		'label'	=> __('Add Button Text','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_school_education_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-school-education' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_school_education_related_post_title', array( 
        'selector' => '.related-post h3', 
        'render_callback' => 'vw_school_education_customize_partial_vw_school_education_related_post_title', 
    ));

    $wp_customize->add_setting( 'vw_school_education_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_related_post',array(
		'label' => esc_html__( 'Related Post','vw-school-education' ),
		'section' => 'vw_school_education_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_school_education_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_school_education_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_school_education_sanitize_float'
	));
	$wp_customize->add_control('vw_school_education_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_school_education_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-school-education' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_school_education_single_post_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-school-education'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-school-education'),
		'section'=> 'vw_school_education_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_school_education_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
	));
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-school-education' ),
		'section' => 'vw_school_education_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_school_education_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
	));
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-school-education' ),
		'section' => 'vw_school_education_single_blog_settings'
    )));

    $wp_customize->add_setting( 'vw_school_education_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_single_post_breadcrumb',array(
		'label' => esc_html__( 'Single Post Breadcrumb','vw-school-education' ),
		'section' => 'vw_school_education_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_school_education_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_single_blog_settings',
		'type'=> 'text'
	));

   // other settings
	$OtherParentPanel = new VW_School_Education_WP_Customize_Panel( $wp_customize, 'vw_school_education_other_panel_id', array(
		'title' => __( 'Others Settings', 'vw-school-education' ),
		'panel' => 'vw_school_education_panel_id',
	));

	$wp_customize->add_panel( $OtherParentPanel );

	$wp_customize->add_section( 'vw_school_education_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-school-education' ),
		'panel' => 'vw_school_education_other_panel_id'
	) );

	$wp_customize->add_setting('vw_school_education_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control(new VW_School_Education_Image_Radio_Control($wp_customize, 'vw_school_education_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-school-education'),
        'description' => __('Here you can change the width layout of Website.','vw-school-education'),
        'section' => 'vw_school_education_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_school_education_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_school_education_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-school-education'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-school-education'),
        'section' => 'vw_school_education_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-school-education'),
            'Right Sidebar' => __('Right Sidebar','vw-school-education'),
            'One Column' => __('One Column','vw-school-education'),
            'Three Columns' => __('Three Columns','vw-school-education'),
            'Four Columns' => __('Four Columns','vw-school-education'),
            'Grid Layout' => __('Grid Layout','vw-school-education')
        ),
	));

	$wp_customize->add_setting('vw_school_education_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control('vw_school_education_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-school-education'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-school-education'),
        'section' => 'vw_school_education_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-school-education'),
            'Right Sidebar' => __('Right Sidebar','vw-school-education'),
            'One Column' => __('One Column','vw-school-education')
        ),
	) );

	$wp_customize->add_setting( 'vw_school_education_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_single_page_breadcrumb',array(
		'label' => esc_html__( 'Single Page Breadcrumb','vw-school-education' ),
		'section' => 'vw_school_education_left_right'
    )));

	//Wow Animation
	$wp_customize->add_setting( 'vw_school_education_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_animation',array(
        'label' => esc_html__( 'Animations','vw-school-education' ),
        'description' => __('Here you can disable overall site animation effect','vw-school-education'),
        'section' => 'vw_school_education_left_right'
    )));

    $wp_customize->add_setting('vw_school_education_reset_all_settings',array(
      'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new VW_School_Education_Reset_Custom_Control($wp_customize, 'vw_school_education_reset_all_settings',array(
      'type' => 'reset_control',
      'label' => __('Reset All Settings', 'vw-school-education'),
      'description' => 'vw_school_education_reset_all_settings',
      'section' => 'vw_school_education_left_right'
   	)));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_school_education_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-school-education' ),
        'section' => 'vw_school_education_left_right'
    )));

	$wp_customize->add_setting('vw_school_education_preloader_bg_color', array(
		'default'           => '#c2272d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_school_education_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-school-education'),
		'section'  => 'vw_school_education_left_right',
	)));

	$wp_customize->add_setting('vw_school_education_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_school_education_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-school-education'),
		'section'  => 'vw_school_education_left_right',
	)));
    
	

    //404 Page Setting
	$wp_customize->add_section('vw_school_education_404_page',array(
		'title'	=> __('404 Page Settings','vw-school-education'),
		'panel' => 'vw_school_education_other_panel_id',
	));	

	$wp_customize->add_setting('vw_school_education_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_404_page_title',array(
		'label'	=> __('Add Title','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_404_page_content',array(
		'label'	=> __('Add Text','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_school_education_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-school-education'),
		'panel' => 'vw_school_education_other_panel_id',
	));	

	$wp_customize->add_setting('vw_school_education_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_school_education_no_results_page_title',array(
		'label'	=> __('Add Title','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_school_education_no_results_page_content',array(
		'label'	=> __('Add Text','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_school_education_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-school-education'),
		'panel' => 'vw_school_education_other_panel_id',
	));	

	$wp_customize->add_setting('vw_school_education_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_social_icon_width',array(
		'label'	=> __('Icon Width','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_social_icon_height',array(
		'label'	=> __('Icon Height','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_school_education_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-school-education' ),
		'section'     => 'vw_school_education_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_school_education_responsive_media',array(
		'title'	=> __('Responsive Media','vw-school-education'),
		'panel' => 'vw_school_education_other_panel_id',
	));

    $wp_customize->add_setting( 'vw_school_education_stickyheader_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-school-education' ),
      'section' => 'vw_school_education_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_school_education_resp_slider_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-school-education' ),
      'section' => 'vw_school_education_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_school_education_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-school-education' ),
      'section' => 'vw_school_education_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_school_education_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-school-education' ),
      'section' => 'vw_school_education_responsive_media'
    )));

    $wp_customize->add_setting('vw_school_education_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_School_Education_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_school_education_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-school-education'),
		'transport' => 'refresh',
		'section'	=> 'vw_school_education_responsive_media',
		'setting'	=> 'vw_school_education_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_school_education_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_School_Education_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_school_education_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-school-education'),
		'transport' => 'refresh',
		'section'	=> 'vw_school_education_responsive_media',
		'setting'	=> 'vw_school_education_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_school_education_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_school_education_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-school-education'),
		'section'  => 'vw_school_education_responsive_media',
	)));

	

    //Woocommerce settings
	$wp_customize->add_section('vw_school_education_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-school-education'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_school_education_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar', 
		'render_callback' => 'vw_school_education_customize_partial_vw_school_education_woocommerce_shop_page_sidebar', ) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_school_education_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-school-education' ),
		'section' => 'vw_school_education_woocommerce_section'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_school_education_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar', 
		'render_callback' => 'vw_school_education_customize_partial_vw_school_education_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_school_education_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-school-education' ),
		'section' => 'vw_school_education_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_school_education_products_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'vw_school_education_sanitize_float'
	));
	$wp_customize->add_control('vw_school_education_products_per_page',array(
		'label'	=> __('Products Per Page','vw-school-education'),
		'description' => __('Display on shop page','vw-school-education'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_school_education_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_school_education_products_per_row',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control('vw_school_education_products_per_row',array(
		'label'	=> __('Products Per Row','vw-school-education'),
		'description' => __('Display on shop page','vw-school-education'),
		'choices' => array(
            2 => 2,
			3 => 3,
			4 => 4,
        ),
		'section'=> 'vw_school_education_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_school_education_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_school_education_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-school-education' ),
		'section'     => 'vw_school_education_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_school_education_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-school-education' ),
		'section'     => 'vw_school_education_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_school_education_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_school_education_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-school-education' ),
		'section'     => 'vw_school_education_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_school_education_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control('vw_school_education_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-school-education'),
        'section' => 'vw_school_education_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-school-education'),
            'right' => __('Right','vw-school-education'),
        ),
	) );

	$wp_customize->add_setting('vw_school_education_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_school_education_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-school-education'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-school-education'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-school-education' ),
        ),
		'section'=> 'vw_school_education_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_school_education_woocommerce_sale_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_school_education_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_school_education_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-school-education' ),
		'section'     => 'vw_school_education_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_School_Education_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_School_Education_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_school_education_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_School_Education_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_school_education_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_School_Education_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_school_education_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
	}
}

// Enqueue our scripts and styles
function vw_school_education_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_school_education_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_School_Education_Customize {

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
		$manager->register_section_type( 'VW_School_Education_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_School_Education_Customize_Section_Pro($manager,'vw_school_education_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW School Pro', 'vw-school-education' ),
			'pro_text' => esc_html__( 'Upgrade Pro', 'vw-school-education' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/premium-school-wordpress-theme/'),
		)));
		// Register sections.
		$manager->add_section(new VW_School_Education_Customize_Section_Pro($manager,'vw_school_education_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-school-education' ),
			'pro_text' => esc_html__( 'Docs', 'vw-school-education' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-vw-school-education/'),
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

		wp_enqueue_script( 'vw-school-education-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-school-education-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );

		wp_localize_script(
		'vw-school-education-customize-controls',
		'vw_school_education_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
VW_School_Education_Customize::get_instance();