<?php
/**
 * WP Customizer panel section to handle header options
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

$wp_customize->add_section( 'elletta_colors_section', array(
        'priority' => 118,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Custom Colors', 'elletta' ),
        'description' => ''
    ) );

$wp_customize->add_setting( 'body_background_color', array(
	'default' => $elletta_customizer_defaults['body_background_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'body_background_color', 
        array(
            'label' => esc_html__( 'Background Color', 'elletta' ),
            'priority' => 9,
            'section' => 'elletta_colors_section',
            'settings' => 'body_background_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'body_text_color', array(
	'default' => $elletta_customizer_defaults['body_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'body_text_color', 
        array(
            'label' => esc_html__( 'Body Text Color', 'elletta' ),
            'priority' => 10,
            'section' => 'elletta_colors_section',
            'settings' => 'body_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'title_text_color', array(
	'default' => $elletta_customizer_defaults['title_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'title_text_color', 
        array(
            'label' => esc_html__( 'Titles Text Color', 'elletta' ),
            'priority' => 20,
            'section' => 'elletta_colors_section',
            'settings' => 'title_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'title_widget_text_color', array(
	'default' => $elletta_customizer_defaults['title_widget_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'title_widget_text_color', 
        array(
            'label' => esc_html__( 'Title Widgets Text Color', 'elletta' ),
            'priority' => 30,
            'section' => 'elletta_colors_section',
            'settings' => 'title_widget_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'link_text_color', array(
	'default' => $elletta_customizer_defaults['link_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'link_text_color', 
        array(
            'label' => esc_html__( 'Link Text Color', 'elletta' ),
            'priority' => 40,
            'section' => 'elletta_colors_section',
            'settings' => 'link_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'link_hover_text_color', array(
	'default' => $elletta_customizer_defaults['link_hover_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'link_hover_text_color', 
        array(
            'label' => esc_html__( 'Link Hover Text Color', 'elletta' ),
            'priority' => 50,
            'section' => 'elletta_colors_section',
            'settings' => 'link_hover_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'button_read_more_color', array(
	'default' => $elletta_customizer_defaults['button_read_more_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'button_read_more_color', 
        array(
            'label' => esc_html__( 'Button Read More/Pagination Color', 'elletta' ),
            'priority' => 60,
            'section' => 'elletta_colors_section',
            'settings' => 'button_read_more_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'button_read_more_text_color', array(
	'default' => $elletta_customizer_defaults['button_read_more_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'button_read_more_text_color', 
        array(
            'label' => esc_html__( 'Button Read More/Pagination Text Color', 'elletta' ),
            'priority' => 70,
            'section' => 'elletta_colors_section',
            'settings' => 'button_read_more_text_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'other_buttons_color', array(
	'default' => $elletta_customizer_defaults['other_buttons_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'other_buttons_color', 
        array(
            'label' => esc_html__( 'Other Buttons Color', 'elletta' ),
            'priority' => 80,
            'section' => 'elletta_colors_section',
            'settings' => 'other_buttons_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'other_buttons_text_color', array(
	'default' => $elletta_customizer_defaults['other_buttons_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'other_buttons_text_color', 
        array(
            'label' => esc_html__( 'Other Buttons Text Color', 'elletta' ),
            'priority' => 90,
            'section' => 'elletta_colors_section',
            'settings' => 'other_buttons_text_color',
        ) 
    )
);

$wp_customize->add_setting( 'tags_categories_color', array(
	'default' => $elletta_customizer_defaults['tags_categories_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'tags_categories_color', 
        array(
            'label' => esc_html__( 'Tags/Categories Color', 'elletta' ),
            'priority' => 100,
            'section' => 'elletta_colors_section',
            'settings' => 'tags_categories_color',
        ) 
    ) 
);

$wp_customize->add_setting( 'tags_categories_text_color', array(
	'default' => $elletta_customizer_defaults['tags_categories_text_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'tags_categories_text_color', 
        array(
            'label' => esc_html__( 'Tags/Categories Text Color', 'elletta' ),
            'priority' => 110,
            'section' => 'elletta_colors_section',
            'settings' => 'tags_categories_text_color',
        ) 
    )
);

$wp_customize->add_setting( 'comments_background_color', array(
	'default' => $elletta_customizer_defaults['comments_background_color'],
        'sanitize_callback' => 'sanitize_hex_color'
        ) 
);

$wp_customize->add_control( new WP_Customize_Color_Control( 
        $wp_customize, 
        'comments_background_color', 
        array(
            'label' => esc_html__( 'Comments/Category Title Background Color', 'elletta' ),
            'priority' => 120,
            'section' => 'elletta_colors_section',
            'settings' => 'comments_background_color',
        ) 
    )
);