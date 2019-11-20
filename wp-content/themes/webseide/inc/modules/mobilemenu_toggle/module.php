<?php

if(!class_exists('mobilemenu_toggle')){

    class mobilemenu_toggle {

        var $status = true;

        function __construct(){
            if(get_theme_mod('webseide_support_dropdowns_in_mobile_menu')){
                add_action('wp_enqueue_scripts', array($this, 'enqeueScripts'));
            }
        }

        function enqeueScripts(){
            wp_register_script('webseide-mobilemenu-toggle', get_template_directory_uri() . '/inc/modules/mobilemenu_toggle/js/module.js', array( 'jquery' ), null, true);
            wp_enqueue_script('webseide-mobilemenu-toggle');
        }

        function customizer($wp_customize){
            $wp_customize->add_setting( 'webseide_support_dropdowns_in_mobile_menu', array(
                'default'		=> '',
                'transport'		=> 'postMessage',
                'sanitize_callback' => 'wp_filter_nohtml_kses',
            ));

            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'webseide_support_dropdowns_in_mobile_menu', array(
                'label'	   	=> __( 'Support dropdown menus in mobile resolution', 'webseide' ),
                'section'  	=> 'webseide_headersettings_section',
                'default'	=> '',
                'type'   	=> 'checkbox',
                'settings' 	=> 'webseide_support_dropdowns_in_mobile_menu',
            )));
        }

    }

}