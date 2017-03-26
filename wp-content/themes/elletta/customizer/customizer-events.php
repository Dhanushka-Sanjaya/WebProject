<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_events_section', array(
        'priority' => 190,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Events Calendar Settings', 'elletta' ),
        'description' => ''
    ) );

   
$wp_customize->add_setting( 'sidebar_events', array(
        'default'        => $elletta_customizer_defaults['sidebar_events'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'sidebar_events',
        array(
            'label'   	=> esc_html__( 'Sidebar Events Calendar', 'elletta' ),
            'section' 	=> 'elletta_events_section',
            'description' => esc_html__( 'Configure Events Calendar Sidebar', 'elletta' ),
            'priority' => 10,
            'choices'	=> array(
                    'right' => 'sidebar-right.gif',                   
                    'none'  => 'no-sidebar.gif',
                    'left'  => 'sidebar-left.gif',
            )
        )
    )
);