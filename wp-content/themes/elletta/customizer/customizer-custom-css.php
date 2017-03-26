<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_custom_css', array(
        'priority' => 160,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Custom CSS', 'elletta' ),
        'description' => ''
    ) );
    
$wp_customize->add_setting( 'custom_css', array(
        'default'    => '',
        'sanitize_callback' => 'elletta_sanitize_textarea_field'
    ) 
);

$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'custom_css',
        array(
                'label'      => esc_html__( 'Custom CSS', 'elletta' ),
                'section'    => 'elletta_custom_css',
                'settings'   => 'custom_css',
                'type'		 => 'textarea',
                'priority'	 => 10
            )
        )
);