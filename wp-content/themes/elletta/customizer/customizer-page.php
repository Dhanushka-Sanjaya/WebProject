<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_page_section', array(
        'priority' => 121,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Pages Settings', 'elletta' ),
        'description' => ''
    ) );

   
$wp_customize->add_setting( 'sidebar_page', array(
    'default'        => $elletta_customizer_defaults['sidebar_page'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'sidebar_page',
        array(
            'label'   	=> esc_html__( 'Sidebar Page', 'elletta' ),
            'section' 	=> 'elletta_page_section',
            'description' => esc_html__( 'Configure Page Sidebar', 'elletta' ),
            'priority' => 10,
            'choices'	=> array(
                    'right' => 'sidebar-right.gif',                   
                    'none'  => 'no-sidebar.gif',
                    'left'  => 'sidebar-left.gif',
            )
        )
    )
);

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
$wp_customize->add_setting( 'show_comments_page', array(
    'default'    => $elletta_customizer_defaults['show_comments_page'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_comments_page',
        array(
            'label'   	=> esc_html__( 'Show Comments', 'elletta' ),
            'priority' => 30,
            'section' 	=> 'elletta_page_section' ,
            'settings'   => 'show_comments_page'
        )
    )
);
