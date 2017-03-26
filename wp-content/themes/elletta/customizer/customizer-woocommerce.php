<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_woocommerce_section', array(
        'priority' => 180,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Woocommerce Settings', 'elletta' ),
        'description' => ''
    ) );

   
$wp_customize->add_setting( 'sidebar_woocommerce_list', array(
        'default'        => $elletta_customizer_defaults['sidebar_woocommerce_list'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'sidebar_woocommerce_list',
        array(
            'label'   	=> esc_html__( 'Sidebar Woocommerce Products/List', 'elletta' ),
            'section' 	=> 'elletta_woocommerce_section',
            'description' => esc_html__( 'Configure Woocommerce Products/List Sidebar', 'elletta' ),
            'priority' => 10,
            'choices'	=> array(
                    'right' => 'sidebar-right.gif',                   
                    'none'  => 'no-sidebar.gif',
                    'left'  => 'sidebar-left.gif',
            )
        )
    )
);

$wp_customize->add_setting( 'sidebar_woocommerce', array(
        'default'        => $elletta_customizer_defaults['sidebar_woocommerce'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'sidebar_woocommerce',
        array(
            'label'   	=> esc_html__( 'Sidebar Woocommerce', 'elletta' ),
            'section' 	=> 'elletta_woocommerce_section',
            'description' => esc_html__( 'Configure Woocommerce Sidebar', 'elletta' ),
            'priority' => 20,
            'choices'	=> array(
                    'right' => 'sidebar-right.gif',                   
                    'none'  => 'no-sidebar.gif',
                    'left'  => 'sidebar-left.gif',
            )
        )
    )
);
/*
$wp_customize->add_setting( 'layout_page', array(
    'default'        => $elletta_customizer_defaults['layout_page'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'layout_page',
        array(
            'label'   	=> esc_html__( 'Layout Page', 'elletta' ),
            'section' 	=> 'elletta_page_section',
            'description' => esc_html__( 'Configure Page Layout', 'elletta' ),
            'priority' => 20,
            'choices'	=> array(
                    'list' => 'list.gif',
                    'grid'  => 'grid.gif',
                    'blog'  => 'open.gif',                 
            )
        )
    )
);

*/