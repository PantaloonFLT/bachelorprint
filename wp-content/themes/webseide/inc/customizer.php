<?php
/**
 * webseide Theme Customizer.
 *
 * @package webseide
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function webseide_customize_register( $wp_customize ) {
    global $modules;
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	// Rename website information section
	$wp_customize->get_section('title_tagline')->title = __( 'General', 'webseide' );


    // Remove waste controls
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_control('display_header_text');


    /* --- Start of Basics section ---*/
    
    // Inner header and footer width
    $wp_customize->add_setting( 'webseide_frame_width', array(
        'default'           => 1200,
        'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_frame_width', array(
		'label'    		=> __( 'Inner header and footer width', 'webseide' ),
		'section'  		=> 'title_tagline',
		'settings' 		=> 'webseide_frame_width',
	)));


    // Page, media and multi column content width
    $wp_customize->add_setting( 'webseide_max_width', array(
        'default'           => 960,
        'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_max_width', array(
		'label'    		=> __( 'Page width', 'webseide' ),
		'section'  		=> 'title_tagline',
		'settings' 		=> 'webseide_max_width',
	)));


    // Single column content width
    $wp_customize->add_setting( 'webseide_max-content_width', array(
        'default'           => 960,
        'sanitize_callback' => 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_max-content_width', array(
		'label'    		=> __( 'Single column content width', 'webseide' ),
		'section'  		=> 'title_tagline',
		'settings' 		=> 'webseide_max-content_width',
	)));


	// Button border radius
	$wp_customize->add_setting( 'webseide_button_borderradius', array(
        'default'           => 0,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_button_borderradius', array(
        'label'	   => __( 'Border radius for buttons', 'webseide' ),
        'section'  => 'title_tagline',
        'settings' => 'webseide_button_borderradius',
    )));


	// Input border radius
	$wp_customize->add_setting( 'webseide_input_borderradius', array(
        'default'           => 0,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_input_borderradius', array(
        'label'	   => __( 'Border radius for input fields', 'webseide' ),
        'section'  => 'title_tagline',
        'settings' => 'webseide_input_borderradius',
    )));


    /* --- End of Basics and start of Header section --- */


    // Header section
 	$wp_customize->add_section( 'webseide_headersettings_section' , array(
	    'title'       => __( 'Header', 'webseide' ),
	    'priority'    => 29,
	));


    // Header background color
	$wp_customize->add_setting( 'webseide_color_header_background', array(
        'default'           => '#f4f3f2',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_header_background', array(
        'label'	   => __( 'Background', 'webseide' ),
        'section'  => 'webseide_headersettings_section',
        'settings' => 'webseide_color_header_background',
    )));


    // Header height
	$wp_customize->add_setting( 'webseide_header_height', array(
        'default'           => 80,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_header_height', array(
        'label'	   => __( 'Height', 'webseide' ),
        'section'  => 'webseide_headersettings_section',
        'settings' => 'webseide_header_height',
    )));

    // Fixed header
    $wp_customize->add_setting( 'webseide_header_fixed', array(
        'default'           => 80,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_header_fixed', array(
        'label'	   	=> __( 'Fixed header', 'webseide' ),
        'section'  	=> 'webseide_headersettings_section',
        'default'	=> '',
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_header_fixed',
    )));

    // Logo
	$wp_customize->add_setting( 'webseide_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'debut_logo', array(
		'label'    => __( 'Logo', 'webseide' ),
		'section'  => 'webseide_headersettings_section',
		'settings' => 'webseide_logo',
	)));


	// Logo height
	$wp_customize->add_setting( 'webseide_logo_height', array(
	    'default'           => 80,
	    'transport'         => 'postMessage',
	    'sanitize_callback' => 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_logo_height', array(
	    'label'	   => __( 'Logo height', 'webseide' ),
	    'section'  => 'webseide_headersettings_section',
	    'settings' => 'webseide_logo_height',
	)));


	/*
    // Logo height
	$wp_customize->add_setting( 'webseide_logo_height', array(
        'default'           => '.6',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_logo_height', array(
        'label'	   => __( 'Logo height in relation to header height', 'webseide' ),
        'section'  => 'webseide_headersettings_section',
        'settings' => 'webseide_logo_height',
        'type'    	=> 'select',
	    'choices' => array(
	        '.1' => __( '10%', 'webseide' ),
	        '.2' => __( '20%', 'webseide' ),
            '.3' => __( '30%', 'webseide' ),
            '.4' => __( '40%', 'webseide' ),
            '.5' => __( '50%', 'webseide' ),
            '.6' => __( '60%', 'webseide' ),
            '.7' => __( '70%', 'webseide' ),
            '.8' => __( '80%', 'webseide' ),
            '.9' => __( '90%', 'webseide' ),
	    ),
    )));
    */



    // Menu alignment
	$wp_customize->add_setting( 'webseide_mainmenu_alignment', array(
        'default'           => 'menualignright',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_mainmenu_alignment', array(
        'label'	   	=> __( 'Menu alignment', 'webseide' ),
        'section'  	=> 'webseide_headersettings_section',
        'default'	=> 'menualignright',
        'type'    	=> 'select',
	    'choices' => array(
	        'menualignleft' => __( 'Left', 'webseide' ),
            'menualignright' => __( 'Right', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_mainmenu_alignment',
    )));


	// Show mobile menu on desktop
	$wp_customize->add_setting( 'webseide_hamburger_desktop', array(
        'default'		=> '',
        'transport'		=> 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_hamburger_desktop', array(
        'label'	   	=> __( 'Show mobile menu on desktop resolution', 'webseide' ),
        'section'  	=> 'webseide_headersettings_section',
        'default'	=> '',
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_hamburger_desktop',
    )));

    webseideModules()->get('mobilemenu_toggle')->customizer($wp_customize);


	// Header font size
	$wp_customize->add_setting( 'webseide_headerfont_desktop', array(
        'default'           => 18,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_headerfont_desktop', array(
        'label'	   => __( 'Font size', 'webseide' ),
        'section'  => 'webseide_headersettings_section',
        'settings' => 'webseide_headerfont_desktop',
    )));


	// Header font style
	$wp_customize->add_setting( 'webseide_headerfontstyle', array(
        'default'           => 'sans-serif',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_headerfontstyle', array(
        'label'	   	=> __( 'Font style', 'webseide' ),
        'section'  	=> 'webseide_headersettings_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        'sans-serif' => __( 'Sans-serif', 'webseide' ),
	        'serif' => __( 'Serif', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_headerfontstyle',
    )));


    // Header font weight
	$wp_customize->add_setting( 'webseide_headerfontweight', array(
        'default'           => 'normal',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_headerfontweight', array(
        'label'	   	=> __( 'Font weight', 'webseide' ),
        'section'  	=> 'webseide_headersettings_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        '300' => __( 'Thin', 'webseide' ),
	        'normal' => __( 'Normal', 'webseide' ),
            'bold' => __( 'Bold', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_headerfontweight',
    )));


    // Header font color
	$wp_customize->add_setting( 'webseide_color_header_font', array(
        'default'           => '#000000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_header_font', array(
        'label'	   => __( 'Font color', 'webseide' ),
        'section'  => 'webseide_headersettings_section',
        'settings' => 'webseide_color_header_font',
    )));


    // Header link hover color
	$wp_customize->add_setting( 'webseide_color_header_font_hover', array(
        'default'           => '#8e8e8e',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_header_font_hover', array(
        'label'	   => __( 'Mouse over color for links', 'webseide' ),
        'section'  => 'webseide_headersettings_section',
        'settings' => 'webseide_color_header_font_hover',
    )));


    // Mobile menu background color
	$wp_customize->add_setting( 'webseide_color_mobile_menu_background', array(
        'default'           => '#313131',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_mobile_menu_background', array(
        'label'	   => __( 'Mobile menu background', 'webseide' ),
        'section'  => 'webseide_headersettings_section',
        'settings' => 'webseide_color_mobile_menu_background',
    )));


    // Mobile menu font color
	$wp_customize->add_setting( 'webseide_color_mobile_menu_font', array(
        'default'           => '#f4f3f2',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_mobile_menu_font', array(
        'label'	   => __( 'Mobile menu font', 'webseide' ),
        'section'  => 'webseide_headersettings_section',
        'settings' => 'webseide_color_mobile_menu_font',
    )));


    /* --- End of Header and start of Extra Header section --- */


 	$wp_customize->add_section( 'webseide_headstrip_section' , array(
	    'title'       => __( 'Extra header (desktop only)', 'webseide' ),
	    'priority'    => 30,
	));

    // Extra header height
	$wp_customize->add_setting( 'webseide_headstrip_height', array(
        'default'           => 0,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_headstrip_height', array(
        'label'	   => __( 'Height', 'webseide' ),
        'section'  => 'webseide_headstrip_section',
        'settings' => 'webseide_headstrip_height',
    )));

    // Fixed header
    $wp_customize->add_setting( 'webseide_headstrip_fixed', array(
        'default'           => 80,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_headstrip_fixed', array(
        'label'	   	=> __( 'Fixed extra header', 'webseide' ),
        'section'  	=> 'webseide_headstrip_section',
        'default'	=> '',
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_headstrip_fixed',
    )));


    // Extra header background color
	$wp_customize->add_setting( 'webseide_color_extra_header_background', array(
        'default'           => '#cacaca',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_extra_header_background', array(
        'label'	   => __( 'Background color', 'webseide' ),
        'section'  => 'webseide_headstrip_section',
        'settings' => 'webseide_color_extra_header_background',
    )));


	// Extra header font size
	$wp_customize->add_setting( 'webseide_headstrip_font', array(
        'default'           => 14,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_headstrip_font', array(
        'label'	   => __( 'Font size', 'webseide' ),
        'section'  => 'webseide_headstrip_section',
        'settings' => 'webseide_headstrip_font',
    )));


    // Extra header font color
	$wp_customize->add_setting( 'webseide_color_extra_header_font', array(
        'default'           => '#000000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_extra_header_font', array(
        'label'	   => __( 'Font color', 'webseide' ),
        'section'  => 'webseide_headstrip_section',
        'settings' => 'webseide_color_extra_header_font',
    )));


    // Extra header link hover color
	$wp_customize->add_setting( 'webseide_color_extra_header_font_hover', array(
        'default'           => '#333333',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_extra_header_font_hover', array(
        'label'	   => __( 'Mouse over color for links', 'webseide' ),
        'section'  => 'webseide_headstrip_section',
        'settings' => 'webseide_color_extra_header_font_hover',
    )));


    // Extra header alignment
	$wp_customize->add_setting( 'webseide_headstrip_alignment', array(
        'default'           => 'alignright',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_headstrip_alignment', array(
        'label'	   	=> __( 'Alignment', 'webseide' ),
        'section'  	=> 'webseide_headstrip_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        'alignleft' => __( 'Left', 'webseide' ),
            'alignmiddle' => __( 'Middle', 'webseide' ),
            'alignright' => __( 'Right', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_headstrip_alignment',
    )));


    // Extra header position
	$wp_customize->add_setting( 'webseide_headstrip_position', array(
        'default'           => 'aboveheader',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_headstrip_position', array(
        'label'	   	=> __( 'Position', 'webseide' ),
        'section'  	=> 'webseide_headstrip_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        'aboveheader' => __( 'Above Header', 'webseide' ),
	        'belowheader' => __( 'Below Header', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_headstrip_position',
    )));


    /* --- End of Extra Header section and start of Content Typography section --- */

    $wp_customize->add_section( 'webseide_contentstyling_section' , array(
	    'title'       => __( 'Content Typography', 'webseide' ),
	    'priority'    => 31,
	));


    // Content text color
	$wp_customize->add_setting( 'webseide_color_content_text', array(
        'default'           => '#3a3a3a',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_content_text', array(
        'label'	   => __( 'Content text color', 'webseide' ),
        'section'  => 'webseide_contentstyling_section',
        'settings' => 'webseide_color_content_text',
    )));


    // Content font size
	$wp_customize->add_setting( 'webseide_contentfont_desktop', array(
        'default'           => 18,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_contentfont_desktop', array(
        'label'	   => __( 'Font size', 'webseide' ),
        'section'  => 'webseide_contentstyling_section',
        'settings' => 'webseide_contentfont_desktop',
    )));


	// Content font style
	$wp_customize->add_setting( 'webseide_contentfontstyle', array(
        'default'           => 'sans-serif',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_contentfontstyle', array(
        'label'	   	=> __( 'Font style', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        'sans-serif' => __( 'Sans-serif', 'webseide' ),
	        'serif' => __( 'Serif', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_contentfontstyle',
    )));


    // Content font weight
	$wp_customize->add_setting( 'webseide_contentfontweight', array(
        'default'           => 'normal',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_contentfontweight', array(
        'label'	   	=> __( 'Font weight', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        '300' => __( 'Thin', 'webseide' ),
	        'normal' => __( 'Normal', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_contentfontweight',
    )));


    // H1 font color
	$wp_customize->add_setting( 'webseide_color_content_h1', array(
        'default'           => '#000000',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_content_h1', array(
        'label'	   => __( 'Headline 1', 'webseide' ),
        'section'  => 'webseide_contentstyling_section',
        'settings' => 'webseide_color_content_h1',
    )));


    // H1 font style
	$wp_customize->add_setting( 'webseide_h1fontstyle', array(
        'default'           => 'sans-serif',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h1fontstyle', array(
        'label'	   	=> __( 'H1 font style', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        'sans-serif' => __( 'Sans-serif', 'webseide' ),
	        'serif' => __( 'Serif', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_h1fontstyle',
    )));


    // H1 font weight
	$wp_customize->add_setting( 'webseide_h1fontweight', array(
        'default'           => 'bold',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h1fontweight', array(
        'label'	   	=> __( 'H1 font weight', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
            '300' => __( 'Thin', 'webseide' ),
	        'normal' => __( 'Normal', 'webseide' ),
            'bold' => __( 'Bold', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_h1fontweight',
    )));


    // H1 font size
    /*
	$wp_customize->add_setting( 'webseide_h1fontsize', array(
        'default'           => '2.5em',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h1fontsize', array(
        'label'	   	=> __( 'H1 font size', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
            '1.8em' => __( '180%', 'webseide' ),
            '2em' => __( '200%', 'webseide' ),
            '2.5em' => __( '250%', 'webseide' ),
            '3em' => __( '300%', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_h1fontsize',
    )));
    */

    // H1 font size
    $wp_customize->add_setting( 'webseide_h1fontsize', array(
        'default'           => 32,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h1fontsize', array(
        'label'	   	=> __( 'H1 font size', 'webseide' ),
        'section'  => 'webseide_contentstyling_section',
        'settings' => 'webseide_h1fontsize',
    )));


    // Disable auto h1 on archives
	$wp_customize->add_setting( 'webseide_h1-archives', array(
        'default'		=> '',
        'transport'		=> 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h1-archives', array(
        'label'	   	=> __( 'Disable auto h1 on archives and categories', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_h1-archives',
    )));


    // H2 font color
	$wp_customize->add_setting( 'webseide_color_content_h2', array(
        'default'           => '#3399CC',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_content_h2', array(
        'label'	   => __( 'Headline 2', 'webseide' ),
        'section'  => 'webseide_contentstyling_section',
        'settings' => 'webseide_color_content_h2',
    )));


    // H2 font style
	$wp_customize->add_setting( 'webseide_h2fontstyle', array(
        'default'           => 'sans-serif',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h2fontstyle', array(
        'label'	   	=> __( 'H2 font style', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        'sans-serif' => __( 'Sans-serif', 'webseide' ),
	        'serif' => __( 'Serif', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_h2fontstyle',
    )));


    // H2 font weight
	$wp_customize->add_setting( 'webseide_h2fontweight', array(
        'default'           => 'bold',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h2fontweight', array(
        'label'	   	=> __( 'H2 font weight', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
            '300' => __( 'Thin', 'webseide' ),
	        'normal' => __( 'Normal', 'webseide' ),
            'bold' => __( 'Bold', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_h2fontweight',
    )));


    /*
    // H2 font size
	$wp_customize->add_setting( 'webseide_h2fontsize', array(
        'default'           => '1.5em',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h2fontsize', array(
        'label'	   	=> __( 'H2 font size', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        '1.3em' => __( '130%', 'webseide' ),
            '1.5em' => __( '150%', 'webseide' ),
            '1.8em' => __( '180%', 'webseide' ),
            '2.5em' => __( '250%', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_h2fontsize',
    )));
    */

    // H2 font size
    $wp_customize->add_setting( 'webseide_h2fontsize', array(
        'default'           => 24,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h2fontsize', array(
        'label'	   	=> __( 'H2 font size', 'webseide' ),
        'section'  => 'webseide_contentstyling_section',
        'settings' => 'webseide_h2fontsize',
    )));


    // H3 font color
	$wp_customize->add_setting( 'webseide_color_content_h3', array(
        'default'           => '#66CCCC',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_content_h3', array(
        'label'	   => __( 'Headline 3', 'webseide' ),
        'section'  => 'webseide_contentstyling_section',
        'settings' => 'webseide_color_content_h3',
    )));


	// H3 font style
	$wp_customize->add_setting( 'webseide_h3fontstyle', array(
        'default'           => 'sans-serif',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h3fontstyle', array(
        'label'	   	=> __( 'H3 font style', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        'sans-serif' => __( 'Sans-serif', 'webseide' ),
	        'serif' => __( 'Serif', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_h3fontstyle',
    )));


    // H3 font weight
	$wp_customize->add_setting( 'webseide_h3fontweight', array(
        'default'           => 'normal',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h3fontweight', array(
        'label'	   	=> __( 'H3 font weight', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
            '300' => __( 'Thin', 'webseide' ),
	        'normal' => __( 'Normal', 'webseide' ),
            'bold' => __( 'Bold', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_h3fontweight',
    )));

/*
    // H3 font size
	$wp_customize->add_setting( 'webseide_h3fontsize', array(
        'default'           => '1.3em',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h3fontsize', array(
        'label'	   	=> __( 'H3 font size', 'webseide' ),
        'section'  	=> 'webseide_contentstyling_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
            '1.1em' => __( '110%', 'webseide' ),
	        '1.3em' => __( '130%', 'webseide' ),
            '1.5em' => __( '150%', 'webseide' ),
            '1.8em' => __( '180%', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_h3fontsize',
    )));
    */

    // H3 font size
    $wp_customize->add_setting( 'webseide_h3fontsize', array(
        'default'           => 18.72,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_h3fontsize', array(
        'label'	   	=> __( 'H3 font size', 'webseide' ),
        'section'  => 'webseide_contentstyling_section',
        'settings' => 'webseide_h3fontsize',
    )));


    // Content link and button color
	$wp_customize->add_setting( 'webseide_color_content_links', array(
        'default'           => '#ff6d63',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_content_links', array(
        'label'	   => __( 'Links &amp; button background color in content area', 'webseide' ),
        'section'  => 'webseide_contentstyling_section',
        'settings' => 'webseide_color_content_links',
    )));


    // Content link and button hover color
	$wp_customize->add_setting( 'webseide_color_content_links_hover', array(
        'default'           => '#e72655',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_content_links_hover', array(
        'label'	   => __( 'Mouse over color for links &amp; button backgrounds in content area', 'webseide' ),
        'section'  => 'webseide_contentstyling_section',
        'settings' => 'webseide_color_content_links_hover',
    )));


    // Content button text hover color
	$wp_customize->add_setting( 'webseide_color_content_buttons_hover', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_content_buttons_hover', array(
        'label'	   => __( 'Mouse over color for font in buttons in content area', 'webseide' ),
        'section'  => 'webseide_contentstyling_section',
        'settings' => 'webseide_color_content_buttons_hover',
    )));



    /* --- End of Content Styling section and start of Content Settings section --- */

 	$wp_customize->add_section( 'webseide_contentsettings_section' , array(
	    'title'       => __( 'Content Settings', 'webseide' ),
	    'priority'    => 32,
	));


    // Content background color
	$wp_customize->add_setting( 'webseide_color_content_background', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_content_background', array(
        'label'	   => __( 'Content background color', 'webseide' ),
        'section'  => 'webseide_contentsettings_section',
        'settings' => 'webseide_color_content_background',
    )));
    
    
    // Extra color 1
	$wp_customize->add_setting( 'webseide_extra-color_1', array(
        'default'           => '#448AFF',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_extra-color_1', array(
        'label'	   => __( 'Extra color 1 for block editor', 'webseide' ),
        'section'  => 'webseide_contentsettings_section',
        'settings' => 'webseide_extra-color_1',
    )));
    
    
    // Extra color 2
	$wp_customize->add_setting( 'webseide_extra-color_2', array(
        'default'           => '#FFD34E',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_extra-color_2', array(
        'label'	   => __( 'Extra color 2 for block editor', 'webseide' ),
        'section'  => 'webseide_contentsettings_section',
        'settings' => 'webseide_extra-color_2',
    )));


    // Background image
    $wp_customize->add_setting( 'webseide_background_image', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'webseide_background_image', array(
		'label'    => __( 'Background image', 'webseide' ),
		'section'  => 'webseide_contentsettings_section',
		'settings' => 'webseide_background_image',
	)));


    // Background image style
	$wp_customize->add_setting( 'webseide_background_image_style', array(
        'default'           => 'cover',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_background_image_style', array(
        'label'	   	=> __( 'Background image style', 'webseide' ),
        'section'  	=> 'webseide_contentsettings_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        'cover' => __( 'Cover', 'webseide' ),
	        'pattern' => __( 'Pattern', 'webseide' ),
            'stretch' => __( 'Stretch', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_background_image_style',
    )));


    // Limit media width
	$wp_customize->add_setting( 'webseide_limitmediawidth', array(
        'default'		=> '',
        'transport'		=> 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_limitmediawidth', array(
        'label'	   	=> __( 'Limit featured image and videos on theme width', 'webseide' ),
        'section'  	=> 'webseide_contentsettings_section',
        'default'	=> '',
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_limitmediawidth',
    )));
    
    
    // Links not underlined
	$wp_customize->add_setting( 'webseide_linksnotunderlined', array(
        'default'		=> 0,
        'transport'		=> 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_linksnotunderlined', array(
        'label'	   	=> __( 'Do not underline links', 'webseide' ),
        'section'  	=> 'webseide_contentsettings_section',
        'default'	=> 0,
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_linksnotunderlined',
    )));


    // Padding top for columns
	$wp_customize->add_setting( 'webseide_vertical-padding_top', array(
        'default'           => 0,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_vertical-padding_top', array(
        'label'	   => __( 'Padding top for columns', 'webseide' ),
        'section'  => 'webseide_contentsettings_section',
        'settings' => 'webseide_vertical-padding_top',
    )));


    // Padding bottom for columns
	$wp_customize->add_setting( 'webseide_vertical-padding_bottom', array(
        'default'           => 0,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_vertical-padding_bottom', array(
        'label'	   => __( 'Padding bottom for columns', 'webseide' ),
        'section'  => 'webseide_contentsettings_section',
        'settings' => 'webseide_vertical-padding_bottom',
    )));


    // Comment columns on pages
	$wp_customize->add_setting( 'webseide_commentpagecolumns', array(
        'default'           => 3,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_commentpagecolumns', array(
        'label'	   => __( 'Comment columns on pages', 'webseide' ),
        'section'  => 'webseide_contentsettings_section',
        'settings' => 'webseide_commentpagecolumns',
        'type'    	=> 'select',
	    'choices' => array(
	        '1' => __( '1', 'webseide' ),
	        '2' => __( '2', 'webseide' ),
            '3' => __( '3', 'webseide' ),
            '4' => __( '4', 'webseide' ),
            '5' => __( '5', 'webseide' ),
	    ),
    )));


    // Show comment dates on pages
	$wp_customize->add_setting( 'webseide_page_showcommentdates', array(
        'default'		=> 0,
        'transport'		=> 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_page_showcommentdates', array(
        'label'	   	=> __( 'Show comment dates on pages', 'webseide' ),
        'section'  	=> 'webseide_contentsettings_section',
        'default'	=> 0,
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_page_showcommentdates',
    )));

    // Show Above Blog widgets also on categories
    $wp_customize->add_setting( 'webseide_blogwidgets_archives', array(
        'default'		=> 0,
        'transport'		=> 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_blogwidgets_archives', array(
        'label'	   	=> __( 'Show Above Blog widgets also on categories', 'webseide' ),
        'section'  	=> 'webseide_contentsettings_section',
        'default'	=> 0,
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_blogwidgets_archives',
    )));


	// Blog columns
	$wp_customize->add_setting( 'webseide_blogcolumns', array(
        'default'           => 3,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_blogcolumns', array(
        'label'	   => __( 'Blog columns', 'webseide' ),
        'section'  => 'webseide_contentsettings_section',
        'settings' => 'webseide_blogcolumns',
        'type'    	=> 'select',
	    'choices' => array(
	        '1' => __( '1', 'webseide' ),
	        '2' => __( '2', 'webseide' ),
            '3' => __( '3', 'webseide' ),
            '4' => __( '4', 'webseide' ),
            '5' => __( '5', 'webseide' ),
	    ),
    )));


    // Activate thumbnails on blogview
    $wp_customize->add_setting( 'webseide_thumbnailsonblogview', array(
        'default'		=> 0,
        'transport'		=> 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_thumbnailsonblogview', array(
        'label'	   	=> __( 'Activate thumbnails on blogview', 'webseide' ),
        'section'  	=> 'webseide_contentsettings_section',
        'default'	=> 0,
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_thumbnailsonblogview',
    )));


    // Show post dates
	$wp_customize->add_setting( 'webseide_post_showdates', array(
        'default'		=> 1,
        'transport'		=> 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_post_showdates', array(
        'label'	   	=> __( 'Show post dates', 'webseide' ),
        'section'  	=> 'webseide_contentsettings_section',
        'default'	=> 1,
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_post_showdates',
    )));


    // Show post categories in archives
	$wp_customize->add_setting( 'webseide_post_showcategory', array(
        'default'		=> 0,
        'transport'		=> 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_post_showcategory', array(
        'label'	   	=> __( 'Show post categories in archives', 'webseide' ),
        'section'  	=> 'webseide_contentsettings_section',
        'default'	=> 0,
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_post_showcategory',
    )));


    // Show post authors in archives
	$wp_customize->add_setting( 'webseide_post_showauthor', array(
        'default'		=> 0,
        'transport'		=> 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_post_showauthor', array(
        'label'	   	=> __( 'Show post author in archives', 'webseide' ),
        'section'  	=> 'webseide_contentsettings_section',
        'default'	=> 0,
        'type'   	=> 'checkbox',
        'settings' 	=> 'webseide_post_showauthor',
    )));


    // 404 error page image
    $wp_customize->add_setting( '404_image', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'error_image', array(
		'label'    => __( '404 error page image', 'webseide' ),
		'section'  => 'webseide_contentsettings_section',
		'settings' => '404_image',
	)));


    /* --- End of Content Settings and start of Footer section --- */


	// Footer section
 	$wp_customize->add_section( 'webseide_footersettings_section' , array(
	    'title'       => 'Footer',
	    'priority'    => 33,
	));


	// Footer font size
	$wp_customize->add_setting( 'webseide_footerfont_desktop', array(
        'default'           => 18,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_footerfont_desktop', array(
        'label'	   => __( 'Font size', 'webseide' ),
        'section'  => 'webseide_footersettings_section',
        'settings' => 'webseide_footerfont_desktop',
    )));


	// Footer font style
	$wp_customize->add_setting( 'webseide_footerfontstyle', array(
        'default'           => 'sans-serif',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_footerfontstyle', array(
        'label'	   	=> __( 'Font style', 'webseide' ),
        'section'  	=> 'webseide_footersettings_section',
        'default'	=> '',
        'type'    	=> 'select',
	    'choices' => array(
	        'sans-serif' => __( 'Sans-serif', 'webseide' ),
	        'serif' => __( 'Serif', 'webseide' ),
	    ),
        'settings' 	=> 'webseide_footerfontstyle',
    )));


    // Footer background color
	$wp_customize->add_setting( 'webseide_color_footer_background', array(
        'default'           => '#313131',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_footer_background', array(
        'label'	   => __( 'Background color', 'webseide' ),
        'section'  => 'webseide_footersettings_section',
        'settings' => 'webseide_color_footer_background',
    )));


	// Footer font color
	$wp_customize->add_setting( 'webseide_color_footer_font', array(
        'default'           => '#f4f3f2',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_footer_font', array(
        'label'	   => __( 'Font color', 'webseide' ),
        'section'  => 'webseide_footersettings_section',
        'settings' => 'webseide_color_footer_font',
    )));


    // Footer link hover
	$wp_customize->add_setting( 'webseide_color_footer_font_hover', array(
        'default'           => '#8e8e8e',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'webseide_color_footer_font_hover', array(
        'label'	   => __( 'Mouse over color for links', 'webseide' ),
        'section'  => 'webseide_footersettings_section',
        'settings' => 'webseide_color_footer_font_hover',
    )));


    // Footer columns
    $wp_customize->add_setting( 'webseide_footer_columns', array(
        'default'           => 2,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_footer_columns', array(
        'label'	   => __( 'Widget columns', 'webseide' ),
        'section'  => 'webseide_footersettings_section',
        'settings' => 'webseide_footer_columns',
    )));


    /* --- End of footer section --- */


}
add_action( 'customize_register', 'webseide_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function webseide_customize_preview_js() {
	wp_enqueue_script( 'webseide-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'webseide_customize_preview_js' );