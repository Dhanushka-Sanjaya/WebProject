<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_featured_area_section', array(
        'priority' => 150,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Featured Area Settings', 'elletta' ),
        'description' => ''
    ) );

$wp_customize->add_setting( 'show_featured_area', array(
        'default'    => $elletta_customizer_defaults['show_featured_area'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_featured_area',
        array(
            'label'   	=> esc_html__( 'Show Featured Area', 'elletta' ),
            'priority' => 10,
            'section' 	=> 'elletta_featured_area_section' ,
            'settings'   => 'show_featured_area'
        )
    )
);

$wp_customize->add_setting( 'featured_area_columns', array(
        'default'    => $elletta_customizer_defaults['featured_area_columns'],
        'sanitize_callback' => 'elletta_sanitize_choices_field'
    ) );

$wp_customize->add_control( new Layout_Control(
        $wp_customize,
        'featured_area_columns',
        array(
            'label'   	=> esc_html__( 'Featured Area Columns', 'elletta' ),
            'section' 	=> 'elletta_featured_area_section',
            'description' => esc_html__( 'Configure Featured Area Columns', 'elletta' ),
            'choices'	=> array(
                    '2' => 'footer-x2.gif',
                    '3' => 'footer-x3.gif',
                    '4' => 'footer-x4.gif',
            ),
            'priority'	 => 11,
            'settings'   => 'featured_area_columns'
        )
    )
);

$wp_customize->add_setting( 'category_posts_featured_area' , array(
        'default'    => $elletta_customizer_defaults['category_posts_featured_area'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
    ) 
);

$wp_customize->add_control( new Category_Control(
        $wp_customize,
        'category_posts_featured_area',
        array(
            'label'    => esc_html__( 'Select Category', 'elletta' ),
            'settings' => 'category_posts_featured_area',
            'section'  => 'elletta_featured_area_section',
            'priority' => 20,
        )
    )
);
 
$wp_customize->add_setting( 'show_categories_featured_area', array(
        'default'    => $elletta_customizer_defaults['show_categories_featured_area'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_categories_featured_area',
        array(
            'label'   	=> esc_html__( 'Show Categories', 'elletta' ),
            'priority' => 30,
            'section' 	=> 'elletta_featured_area_section' ,
            'settings'   => 'show_categories_featured_area'
        )
    )
);

$wp_customize->add_setting( 'show_date_featured_area', array(
        'default'    => $elletta_customizer_defaults['show_date_featured_area'],
        'sanitize_callback' => 'elletta_sanitize_checkbox_field'
    ) 
);

$wp_customize->add_control( new Toggle_Checkbox_Custom_control(
        $wp_customize,
        'show_date_featured_area',
        array(
            'label'   	=> esc_html__( 'Show Date', 'elletta' ),
            'priority' => 40,
            'section' 	=> 'elletta_featured_area_section' ,
            'settings'   => 'show_date_featured_area'
        )
    )
);

$wp_customize->add_setting( 'title_featured_font_size', array(
	'default'    => $elletta_customizer_defaults['title_featured_font_size'],
        'sanitize_callback' => 'elletta_sanitize_number_field'
	) );
    
$wp_customize->add_control( new Slider_Control(
        $wp_customize,
        'title_featured_font_size',
        array(
            'label'   	=> esc_html__( 'Title Featured Font Size', 'elletta' ),
            'section' 	=> 'elletta_featured_area_section',
            'priority'      => 50
        )
    )
);
