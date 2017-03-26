<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_home_section', array(
        'priority' => 122,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Home Section', 'elletta' ),
        'description' => ''
    ) );

$wp_customize->add_setting( 'home_text', array('sanitize_callback' => 'elletta_sanitize_textarea_field') );

$wp_customize->add_control( new Info_Custom_control(
           $wp_customize,
           'home_text',
           array(
               'label'      => esc_html__( 'Configuration Lastest Posts', 'elletta' ),
               'descrption'      => esc_html__( 'Description Configuration Lastest Posts', 'elletta' ),
               'section'    => 'elletta_home_section',
               'settings'   => 'home_text'
           )
       )
   );
   
$wp_customize->add_setting( 'sidebar_homepage', array(
    'default'        => $elletta_customizer_defaults['sidebar_homepage'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'sidebar_homepage',
        array(
            'label'   	=> esc_html__( 'Sidebar Home', 'elletta' ),
            'section' 	=> 'elletta_home_section',
            'description' => esc_html__( 'Configure Home Sidebar', 'elletta' ),
            'choices'	=> array(
                    'right' => 'sidebar-right.gif',                   
                    'none'  => 'no-sidebar.gif',
                    'left'  => 'sidebar-left.gif',
            )
        )
    )
);

$wp_customize->add_setting( 'layout_homepage', array(
    'default'        => $elletta_customizer_defaults['layout_homepage'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'layout_homepage',
        array(
            'label'   	=> esc_html__( 'Layout Home', 'elletta' ),
            'section' 	=> 'elletta_home_section',
            'description' => esc_html__( 'Configure Home Layout', 'elletta' ),
            'choices'	=> array(
                    'list-nofeatured' => 'list.gif',
                    'grid-nofeatured'  => 'grid.gif',
                    'blog-nofeatured'  => 'open.gif',
                    'list-featured' => 'open+list.gif',
                    'grid-featured'  => 'open+grid.gif',                    
            )
        )
    )
);