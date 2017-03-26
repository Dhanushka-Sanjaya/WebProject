<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}
$wp_customize->add_section( 'elletta_fonts_section', array(
        'priority' => 119,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Custom Fonts', 'elletta' ),
        'description' => ''
    ) );

$wp_customize->add_setting( 'body_font_text', array('sanitize_callback' => 'elletta_sanitize_textarea_field') );

$wp_customize->add_control( new Info_Custom_control(
        $wp_customize,
        'body_font_text',
        array(
            'label'      => esc_html__( 'Configuration Body Font', 'elletta' ),
            'section'    => 'elletta_fonts_section',
            'settings'   => 'body_font_text',
            'priority' => 100,
        )
    )
);

$wp_customize->add_setting( 'body_font', array(
	'default'    => '',
        'sanitize_callback' => 'elletta_sanitize_textarea_field'
	) );
    
$wp_customize->add_control( new Google_Font_Dropdown_Custom_Control(
        $wp_customize,
        'body_font',
        array(
            'label'   	=> esc_html__( 'Body Font', 'elletta' ),
            'section' 	=> 'elletta_fonts_section',
            'priority'      => 110
        )
    )
);

$wp_customize->add_setting( 'body_font_weight', array(
    'default'    => $elletta_customizer_defaults['body_font_weight'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) 
);


$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'body_font_weight',
        array(
            'label'          => esc_html__( 'Body Font Weight', 'elletta' ),
            'section'        => 'elletta_fonts_section',
            'settings'       => 'body_font_weight',
            'type'           => 'select',
            'priority'       => 120,
            'choices'        => array(
                '100'   => 100,
                '200'   => 200,
                '300'   => 300,
                '400'   => 400,
                '500'   => 500,
                '600'   => 600,
                '700'   => 700,
                '800'   => 800,
                '900'   => 900,
            )
        )
    )
);

$wp_customize->add_setting( 'body_font_size', array(
	'default'    => $elletta_customizer_defaults['body_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'body_font_size',
        array(
            'label'   	=> esc_html__( 'Body Font Size', 'elletta' ),
            'section' 	=> 'elletta_fonts_section',
            'priority'      => 130
        )
    )
);

$wp_customize->add_setting( 'titles_font_text', array('sanitize_callback' => 'elletta_sanitize_textarea_field') );

$wp_customize->add_control( new Info_Custom_control(
        $wp_customize,
        'titles_font_text',
        array(
            'label'      => esc_html__( 'Configuration Titles Font', 'elletta' ),
            'section'    => 'elletta_fonts_section',
            'settings'   => 'titles_font_text',
            'priority' => 200,
        )
    )
);

$wp_customize->add_setting( 'title_font', array(
	'default'    => '',
        'sanitize_callback' => 'elletta_sanitize_textarea_field'
	)
);

$wp_customize->add_control( new Google_Font_Dropdown_Custom_Control(
        $wp_customize,
        'title_font',
        array(
            'label'   	=> esc_html__( 'Titles Font', 'elletta' ),
            'section' 	=> 'elletta_fonts_section',
            'priority'      => 210
        )
    )
);

$wp_customize->add_setting( 'title_font_weight', array(
    'default'    => $elletta_customizer_defaults['title_font_weight'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) 
);


$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'title_font_weight',
        array(
            'label'          => esc_html__( 'Titles Font Weight', 'elletta' ),
            'section'        => 'elletta_fonts_section',
            'settings'       => 'title_font_weight',
            'type'           => 'select',
            'priority'       => 220,
            'choices'        => array(
                '100'   => 100,
                '200'   => 200,
                '300'   => 300,
                '400'   => 400,
                '500'   => 500,
                '600'   => 600,
                '700'   => 700,
                '800'   => 800,
                '900'   => 900,
            )
        )
    )
);

$wp_customize->add_setting( 'title_post_font_size', array(
	'default'    => $elletta_customizer_defaults['title_post_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'title_post_font_size',
        array(
            'label'   	=> esc_html__( 'Title Post Font Size', 'elletta' ),
            'section' 	=> 'elletta_fonts_section',
            'priority'      => 230
        )
    )
);

$wp_customize->add_setting( 'title_list_font_size', array(
	'default'    => $elletta_customizer_defaults['title_list_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'title_list_font_size',
        array(
            'label'   	=> esc_html__( 'Title List Font Size', 'elletta' ),
            'section' 	=> 'elletta_fonts_section',
            'priority'      => 240
        )
    )
);

$wp_customize->add_setting( 'title_widget_font_size', array(
	'default'    => $elletta_customizer_defaults['title_widget_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'title_widget_font_size',
        array(
            'label'   	=> esc_html__( 'Title Widget Font Size', 'elletta' ),
            'section' 	=> 'elletta_fonts_section',
            'priority'      => 250
        )
    )
);

$wp_customize->add_setting( 'header_font_text', array('sanitize_callback' => 'elletta_sanitize_textarea_field') );

$wp_customize->add_control( new Info_Custom_control(
        $wp_customize,
        'header_font_text',
        array(
            'label'      => esc_html__( 'Configuration Header Fonts', 'elletta' ),
            'section'    => 'elletta_fonts_section',
            'settings'   => 'header_font_text',
            'priority' => 300,
        )
    )
);

$wp_customize->add_setting( 'header_font', array(
	'default'    => '',
        'sanitize_callback' => 'elletta_sanitize_textarea_field'
	) );
    
$wp_customize->add_control( new Google_Font_Dropdown_Custom_Control(
        $wp_customize,
        'header_font',
        array(
            'label'   	=> esc_html__( 'Header Menu Font', 'elletta' ),
            'section' 	=> 'elletta_fonts_section',
            'priority'      => 310
        )
    )
);

$wp_customize->add_setting( 'header_font_weight', array(
    'default'    => $elletta_customizer_defaults['header_font_weight'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) 
);


$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'header_font_weight',
        array(
            'label'          => esc_html__( 'Header Font Weight', 'elletta' ),
            'section'        => 'elletta_fonts_section',
            'settings'       => 'header_font_weight',
            'type'           => 'select',
            'priority'       => 320,
            'choices'        => array(
                '100'   => 100,
                '200'   => 200,
                '300'   => 300,
                '400'   => 400,
                '500'   => 500,
                '600'   => 600,
                '700'   => 700,
                '800'   => 800,
                '900'   => 900,
            )
        )
    )
);