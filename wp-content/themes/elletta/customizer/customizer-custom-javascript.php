<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_custom_javascript', array(
        'priority' => 170,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Custom Javascript', 'elletta' ),
        'description' => ''
    ) );    

$wp_customize->add_setting( 'header_javascript', array(
        'default'    => '',
        'sanitize_callback' => 'elletta_sanitize_textarea_field'
    ) 
);

$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'header_javascript',
        array(
                'label'      => esc_html__( 'Header Javascript', 'elletta' ),
                'section'    => 'elletta_custom_javascript',
                'settings'   => 'header_javascript',
                'type'		 => 'textarea',
                'priority'	 => 20
            )
        )
);

$wp_customize->add_setting( 'footer_javascript', array(
        'default'    => '',
        'sanitize_callback' => 'elletta_sanitize_textarea_field'
    ) 
);

$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_javascript',
        array(
                'label'      => esc_html__( 'Footer Javascript', 'elletta' ),
                'section'    => 'elletta_custom_javascript',
                'settings'   => 'footer_javascript',
                'type'		 => 'textarea',
                'priority'	 => 30
            )
        )
);